<?php

class Jobs extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->_checkLogin();
        $this->load->model('sys/Job_model', 'job');

    }

    function index(){
        $d['jobs'] = $this->job->getAll();
        $this->load->view('sys/job/job_list', $d);
    }

    function create(){
        $user = $this->session->userdata('role');
        if($user != 1){
            show_404();
        }
        else{
            $d =array();
            $this->form_validation->set_rules('form[title]', 'Job Name', 'required');
            $this->form_validation->set_rules('form[description]', 'Job Description', 'required');

            if($this->input->post('form')) {
                if ($this->form_validation->run() === TRUE) {

                    $data = array(
                        'id' => '',
                        'title' => $this->input->post('form[title]'),
                        'description' => $this->input->post('form[description]'),
                        'status' => '1'
                    );

                    $result = $this->job->addJobPortal($data);
                    if ($result) {
                        $d['success'] = "Record Inserted Successfully";
                    } else {
                        $d['error'] = "Error! Unable to Insert this Record.";
                    }

                } else {
                    $d['error'] = "All fields are required";
                }
            }

                $this->load->view('sys/job/job_portal', $d);

        }

    }

    function edit(){
        $d =array();
        $id = $this->input->get('id');

        $this->form_validation->set_rules('form[title]', 'Job Name', 'required');
        $this->form_validation->set_rules('form[description]', 'Job Description', 'required');

        if($this->input->post('form')) {
            if ($this->form_validation->run() === TRUE) {
                $id = $this->input->post('jid');
                $data = array(
                    'id' => $id,
                    'title' => $this->input->post('form[title]'),
                    'description' => $this->input->post('form[description]'),
                    'status' => '1'
                );

                $result = $this->job->addJobPortal($data);
                if ($result) {
                    $d['success'] = "Record Inserted Successfully";
                } else {
                    $d['error'] = "Error! Unable to Insert this Record.";
                }

            } else {
                $d['error'] = "All fields are required";
            }

        }
        $result = $this->job->getById($id);

        if(is_object($result)){
            $d['result'] = $result;
        }
        $this->load->view('sys/job/job_portal', $d);
    }

    function delete(){
        $id = $this->input->post('id');
        $result = $this->job->deleteById($id);
        if($result){
            echo json_encode( array('success' => " Record deleted successfully." )  );
        }else{
            echo json_encode( array('error' => "Sorry!! Student already enrolled in some subjects. You can't delete a enrolled student." )  );
        }
    }
}