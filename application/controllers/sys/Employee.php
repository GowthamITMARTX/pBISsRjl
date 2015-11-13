<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 11/12/2015
 * Time: 10:32 AM
 */
class Employee extends MY_Controller
{
    function __construct(){
        parent::__construct();
        $this->_checkLogin();
        $this->load->model('sys/employee_model','model');
    }

    function index(){
        if($this->input->is_ajax_request()){
            $d[$this->input->post('name')] = $this->input->post('val');
            $this->model->update($d,"id=".$this->input->post('id'));
        }else{
            $d['records'] = $this->model->getRecords();
            $this->load->view('sys/employee/employee_list',$d);
        }
    }

    function create(){

        //        $this->form_validation->set_rules('form[code]', 'employee Code', 'required|is_unique[employee.]');
        $this->form_validation->set_rules('form[name]', 'Name', 'required');
        $this->form_validation->set_rules('form[salary]', 'Name', 'price');

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
        $this->load->view('sys/employee/employee_create');
    }

    function edit(){
        if($this->input->get('id')){
            $lec =  $this->model->getBy( array("id"=> $this->input->get('id') ),1);
            if(!is_object($lec)) show_404();

            $this->form_validation->set_rules('form[name]', 'Name', 'required');

            if ($this->form_validation->run() == TRUE){
                if($this->model->update($this->input->post('form') , "id = ".$this->input->get('id') ) ){
                    $this->session->set_flashdata('valid', 'Record Update Successfully');
                }else{
                    $this->session->set_flashdata('error', 'Record Uopdate Failure !!!');
                }
                redirect(current_url()."?id=".$this->input->get('id'));
            }else{
                if($this->input->post())
                    $this->session->set_flashdata('error', validation_errors() );
            }
            $this->load->view('sys/employee/employee_create',array('result'=>$lec));


        }else show_404();

    }

}