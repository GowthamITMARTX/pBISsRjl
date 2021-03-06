<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 10/21/2015
 * Time: 10:07 AM
 */
class Course extends MY_Controller
{
    function __construct(){
        parent::__construct();
        $this->_checkLogin();
        $this->load->model('sys/course_model','model');
    }

    function index(){

        if($this->input->is_ajax_request()){
            $d[$this->input->post('name')] = $this->input->post('val');
            $this->model->update($d,"id=".$this->input->post('id'));
        }else{
            $d['records'] = $this->model->getRecords();
            $this->load->view('sys/course/course_list',$d);
        }
    }

    function create(){

        $this->form_validation->set_rules('form[code]', 'Course Code', 'required|is_unique[course.code]');
        $this->form_validation->set_rules('form[title]', 'Name', 'required');
        $this->form_validation->set_rules('form[description]', 'Course Objectives', 'required');

        if ($this->form_validation->run() == TRUE){
                $d = $this->do_upload();
                if($this->model->create($d['file_name'])){
                    $this->session->set_flashdata('valid', 'Record Inserted Successfully');
                }else{
                    $this->session->set_flashdata('error', 'Record Insert Failure !!!');
                }

           redirect(current_url());
        }else{
            if($this->input->post())
                $this->session->set_flashdata('error', validation_errors() );
        }
        $this->load->view('sys/course/course_create');
    }

    public function do_upload()
{
    $config['upload_path'] = './uploads/courses';
    $config['allowed_types'] = 'jpg|png|gif';

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload()) {
        return false;
    } else {
        return $this->upload->data();
    }
}





}