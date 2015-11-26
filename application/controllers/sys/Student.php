<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 10/22/2015
 * Time: 11:33 AM
 */
class Student extends MY_Controller
{

    function __construct(){
        parent::__construct();
        $this->_checkLogin();
        $this->load->model('sys/student_model','model');
    }

    function index(){
        if($this->input->is_ajax_request()){
            $d[$this->input->post('name')] = $this->input->post('val');
            $this->model->update($d,"id=".$this->input->post('id'));
        }else{
            $d['records'] = $this->model->getRecords();
            $this->load->view('sys/student/student_list',$d);
        }
    }

    function create(){

//        $this->form_validation->set_rules('form[code]', 'student Code', 'required|is_unique[student.]');
        $this->form_validation->set_rules('form[name]', 'Name', 'required');

        if ($this->form_validation->run() == TRUE){
            $this->_upload();
            if($this->model->create()){

                $this->session->set_flashdata('valid', 'Record Inserted Successfully');
            }else{
                $this->session->set_flashdata('error', 'Record Insert Failure !!!');
            }
           // redirect(current_url());
        }else{
            if($this->input->post())
                $this->session->set_flashdata('error', validation_errors() );
        }
        $this->load->view('sys/student/student_create');
    }

    function edit(){
        if($this->input->get('id') || $this->input->post('id')   ){
            $id = $this->input->get('id') ? $this->input->get('id') : $this->input->post('id') ;
            $lec =  $this->model->getBy( array("id"=> $this->input->get('id') ),1);
            if(!is_object($lec)) show_404();

            $this->form_validation->set_rules('form[name]', 'Name', 'required');

            if ($this->form_validation->run() == TRUE){
                $this->_upload();
                $data = $this->input->post('form');
                if( strlen($this->session->flashdata('file_name')) > 0 )
                    $data['profile_image'] = $this->session->flashdata('file_name') ;
               // p($data);
                if($this->model->update($data , "id = $id" ) ){
                    $this->session->set_flashdata('valid', 'Record Update Successfully');
                }else{
                    $this->session->set_flashdata('error', 'Record Uopdate Failure !!!');
                }
                redirect(current_url()."?id=".$id);
            }else{
                if($this->input->post())
                    $this->session->set_flashdata('error', validation_errors() );
            }
            $this->load->view('sys/student/student_create',array('result'=>$lec));


        }else show_404();

    }

    function getAll(){
        $key = explode('.',$this->input->get('key'));
        $d['records']  = $this->model->filter(end($key));

        if( $this->input->get('type') == 'table'  )
            $this->load->view('sys/student/student_table_view', $d);
    }

    function enrollment(){
        $this->form_validation->set_rules('form[std_id]', '', 'required');
        $this->form_validation->set_rules('form[cls_id]', '', 'required');
        $this->form_validation->set_rules('amount', '', 'required');
        if ($this->form_validation->run() == TRUE){
            if($this->model->enroll()){
                redirect(current_url()."?tran_id=".$this->session->flashdata('insert_id'));
                $this->session->set_flashdata('valid', 'Record Inserted Successfully');
            }else{
                $this->session->set_flashdata('error', 'Record Insert Failure !!!');
            }
            redirect(current_url());
        }
        $this->load->view('sys/student/student_cls_pool');

    }

    function invoice(){
        $result = $this->model->getPaymentDetails($this->input->get('tran_id'));
//        p($result);
        $this->load->view('sys/student/student_enrollment receipt',array('record'=>$result));
    }

    function _upload(){
        $config['upload_path'] = './uploads/students/profile';
        $config['allowed_types'] = 'jpeg|png|jpg';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
           // p($this->upload->display_errors());
            $this->session->set_flashdata('file_name',null);
        } else {
            $user = $this->upload->data();
          //  p($user);
            $this->session->set_flashdata('file_name', $user['file_name']);
        }
    }

}