<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 10/21/2015
 * Time: 4:28 PM
 */
class Subject  extends MY_Controller
{
    function __construct(){
        parent::__construct();
        $this->_checkLogin();
        $this->load->model('sys/subject_model','model');
    }

    function index(){

        if($this->input->is_ajax_request()){
            $d[$this->input->post('name')] = $this->input->post('val');
            $this->model->update($d,"id=".$this->input->post('id'));
        }else{
            $d['records'] = $this->model->getRecords();
            $this->load->view('sys/subject/subject_list',$d);
        }
    }

    function create(){

        $this->form_validation->set_rules('form[code]', 'Subject Code', 'required|is_unique[subject.code]');
        $this->form_validation->set_rules('form[title]', 'Name', 'required');

        if ($this->form_validation->run() == TRUE){
            if($this->model->create()){
                $this->session->set_flashdata('valid', 'Record Inserted Successfully');
            }else{
                $this->session->set_flashdata('error', 'Record Insert Failure !!!');
            }
            redirect(current_url());
        }else{
            if($this->input->post())
                $this->session->set_flashdata('error', validation_errors() );
        }
        $this->load->view('sys/subject/subject_create');
    }

}