<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 10/23/2015
 * Time: 1:24 PM
 */
class Lecture extends MY_Controller
{

    function __construct(){
        parent::__construct();
        $this->_checkLogin();
        $this->load->model('sys/lecture_model','model');
    }

    function index(){
        if($this->input->is_ajax_request()){
            $d[$this->input->post('name')] = $this->input->post('val');
            $this->model->update($d,"id=".$this->input->post('id'));
        }else{
            $d['records'] = $this->model->getRecords();
            $this->load->view('sys/lecture/lecture_list',$d);
        }
    }

    function create(){
        //        $this->form_validation->set_rules('form[code]', 'lecture Code', 'required|is_unique[lecture.]');
        $this->form_validation->set_rules('form[name]', 'Name', 'required');

        if ($this->form_validation->run() == TRUE){
            if($this->model->create()){
                $this->session->set_flashdata('valid', 'Record Inserted Successfully');
            }else{
                $this->session->set_flashdata('error', 'Record Insert Failure !!!');
            }
            redirect(current_url());
        }else{
            if($this->input->post()){
                $this->session->set_flashdata('error', validation_errors() );
            }
        }
        $this->load->view('sys/lecture/lecture_create' ,array( "result" => (object) $this->input->post('form') ) );
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
            $this->load->view('sys/lecture/lecture_create',array('result'=>$lec));


        }else show_404();

    }

    function subject(){
        $this->load->model('sys/subject_model','subject');
        $d['subjects'] = $this->subject->getRecords();
        $d['lecture'] = $this->model->getRecords();

        $sub = $this->model->lecture_pool_list();
        foreach($sub as $s)
            $d['sub_list'][] = $s->sub_id ;

        $this->load->view('sys/lecture/lecture_subject',$d);
        $this->form_validation->set_rules('form[lec_id]', 'Lecture', 'required');
        if ($this->form_validation->run() == TRUE){
            if($this->model->lecture_pool()){
                $this->session->set_flashdata('valid', 'Record Inserted Successfully');
            }else{
                $this->session->set_flashdata('error', 'Record Insert Failure !!!');
            }
            redirect(current_url());
        }
    }


}