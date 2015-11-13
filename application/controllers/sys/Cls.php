<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 10/23/2015
 * Time: 2:15 PM
 */
class Cls extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->_checkLogin();
        $this->load->model('sys/class_model', 'model');
    }

    function index()
    {
        if ($this->input->is_ajax_request()) {
            $d[$this->input->post('name')] = $this->input->post('val');
            $this->model->update($d, "id=" . $this->input->post('id'));
        } else {
            $d['records'] = $this->model->getRecords();
            $this->load->view('sys/class/class_list', $d);
        }
    }

    function create() {

        $this->form_validation->set_rules('form[code]', 'class Code', 'required|is_unique[class.code]');
        $this->form_validation->set_rules('form[title]', 'Name', 'required');
        $this->form_validation->set_rules('form[fee]', '', 'price');
        $this->form_validation->set_rules('form[initial_amount]', '', 'price');

        if ($this->form_validation->run() == TRUE) {
            if ($this->model->create()) {
                $this->session->set_flashdata('valid', 'Record Inserted Successfully');
            } else {
                $this->session->set_flashdata('error', 'Record Insert Failure !!!');
            }
            redirect(current_url());
        } else {
            if ($this->input->post()) {
                $this->session->set_flashdata('error', validation_errors());
                $d['result'] = (object)$this->input->post('form');
            }
        }
        $this->load->model('sys/batch_model', 'batch');
        $this->load->model('sys/course_model', 'course');
        $this->load->model('sys/subject_model', 'subject');
        $this->load->model('sys/lecture_model', 'lecture');

        $d['batches'] = $this->batch->getRecords();
        $d['courses'] = $this->course->getRecords();
        $subjects = $this->subject->getRecords();
        foreach ($subjects as &$obj) $obj->lec = $this->lecture->getBySubId($obj->id);
        $d['subjects'] = $subjects;

        $this->load->view('sys/class/class_create', $d);
    }

    function edit(){

        if($this->input->get('id')){

            $cls =  $this->model->getBy( array("id"=> $this->input->get('id') ),1);

            if(!is_object($cls)) show_404();

            $d['cls_pool'] = $this->model->getSubAndLecListByClsId($cls->id);


            $this->form_validation->set_rules('form[title]', 'Name', 'required');
            $this->form_validation->set_rules('form[fee]', '', 'price');
            $this->form_validation->set_rules('form[initial_amount]', '', 'price');

            if ($this->form_validation->run() == TRUE) {
                if ($this->model->updateAll()) {
                    $this->session->set_flashdata('valid', 'Record Inserted Successfully');
                } else {
                    $this->session->set_flashdata('error', 'Record Insert Failure !!!');
                }
                redirect(current_url()."?id=".$this->input->get('id'));
            } else {
                if ($this->input->post()) {
                    $this->session->set_flashdata('error', validation_errors());
                    $d['result'] = (object)$this->input->post('form');
                }
            }
            $this->load->model('sys/batch_model', 'batch');
            $this->load->model('sys/course_model', 'course');
            $this->load->model('sys/subject_model', 'subject');
            $this->load->model('sys/lecture_model', 'lecture');

            $d['result'] = $cls ;
            $d['batches'] = $this->batch->getRecords();
            $d['courses'] = $this->course->getRecords();
            $subjects = $this->subject->getRecords();
            foreach ($subjects as &$obj) $obj->lec = $this->lecture->getBySubId($obj->id);
            $d['subjects'] = $subjects;

            $this->load->view('sys/class/class_create', $d);

        }else show_404();


    }

    function getAll(){
        $d['records']  = $this->model->filter($this->input->get('key'));
        if( $this->input->get('type') == 'table'  )
            $this->load->view('sys/class/class_table_view', $d);
    }

    function getSubject(){
        $d['cls'] = $this->model->getBy( array("id"=> $this->input->get('cls_id') ),1);
        $d['records'] = $this->model->getSubAndLecListByClsIdAll($this->input->get('cls_id')) ;
        $this->load->view('sys/class/clsass_subject_list', $d);
    }

}