<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 11/9/2015
 * Time: 1:54 PM
 */
class Expenses extends MY_Controller{

    function __construct(){
        parent::__construct();
        $this->_checkLogin();
        $this->load->model('sys/expenses_model','model');
    }

    function expenses_type_list(){

        if($this->input->is_ajax_request()){
            $d[$this->input->post('name')] = $this->input->post('val');
            $this->model->update($d,"id=".$this->input->post('id'));
        }else{
            $d['records'] = $this->model->getRecords();
            $this->load->view('sys/expenses/expenses_list',$d);
        }
    }

    function expenses_type(){
//        $this->form_validation->set_rules('form[code]', 'Expenses Code', 'required|is_unique[expenses_type.code]');
        $this->form_validation->set_rules('form[title]', 'Expenses Type ', 'required');

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
        $this->load->view('sys/expenses/expenses_create');
    }

    function lecture_salary(){

        $this->form_validation->set_rules('form[voucher]', 'Voucher', 'required|is_unique[expenses_employee.voucher]|is_unique[expenses_lecture.voucher]');
        $this->form_validation->set_rules('form[amount]', 'Amount', 'required|price');

        if ($this->form_validation->run() == TRUE){
            if($this->model->lecture_salary()){
                $this->session->set_flashdata('valid', 'Record Inserted Successfully');
            }else{
                $this->session->set_flashdata('error', 'Record Insert Failure !!!');
            }
            redirect(current_url());
        }else{
            if($this->input->post())
                $this->session->set_flashdata('error', validation_errors() );
        }
        $this->load->model('sys/lecture_model','lecture');
        $d['lecture'] = $this->lecture->getRecords();

        $this->load->model('sys/Lecture_model','lecture');
        if($this->input->get('lec_id')  ) {
            $emp = $this->lecture->getBy(array('id'=>$this->input->get('lec_id') ) ,1 );
            if(!is_object($emp)) show_404();
            $d['emp'] = $emp ;
        }


        $this->load->view('sys/expenses/lecture_salary',$d);
    }

    function employee_salary(){

        $this->form_validation->set_rules('form[voucher]', 'Voucher', 'required|is_unique[expenses_employee.voucher]|is_unique[expenses_lecture.voucher]');
        $this->form_validation->set_rules('form[amount]', 'Amount', 'required|price');

        if ($this->form_validation->run() == TRUE){
            if($this->model->employee_salary()){
                $this->session->set_flashdata('valid', 'Record Inserted Successfully');
            }else{
                $this->session->set_flashdata('error', 'Record Insert Failure !!!');
            }
            redirect(current_url());
        }else{
            if($this->input->post())
                $this->session->set_flashdata('error', validation_errors() );
        }
        $this->load->model('sys/employee_model','employee');
        $d['employee'] = $this->employee->getRecords();

        if($this->input->get('emp_id')  ) {
            $emp = $this->employee->getBy(array('id'=>$this->input->get('emp_id') ) ,1 );
            if(!is_object($emp)) show_404();
            $d['emp'] = $emp ;
        }

        $this->load->view('sys/expenses/employee_salary',$d);


    }

    function other_expenses(){

        $d['expenses_type'] = $this->model->getRecords() ;

        $this->form_validation->set_rules('form[amount]', 'Amount', 'required|price');

        if ($this->form_validation->run() == TRUE){
            if($this->model->other_expenses()){
                $this->session->set_flashdata('valid', 'Record Inserted Successfully');
            }else{
                $this->session->set_flashdata('error', 'Record Insert Failure !!!');
            }
            redirect(current_url());
        }else{
            if($this->input->post())
                $this->session->set_flashdata('error', validation_errors() );
        }
        $this->load->view('sys/expenses/other_expenses',$d);
    }

    function other_expenses_report(){
        $d['records'] = $this->model->other_expenses_report();
        $this->load->view('sys/expenses/other_expenses_list',$d);
    }

    function lecture_salary_report(){}

    function employee_salary_report(){}

}