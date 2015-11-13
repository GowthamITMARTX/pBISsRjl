<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 10/29/2015
 * Time: 3:11 PM
 */
class Payment extends MY_Controller
{

    function confirm(){
        if($this->input->get('code')){
            $this->load->model('sys/student_model','student');
            $this->load->model('sys/Transaction_model','tran');

            $this->form_validation->set_rules('t_id', '', 'required');

            if ($this->form_validation->run() == TRUE){
                if( $this->tran->paymentSuccess($this->input->post('t_id')) ){
                    $this->session->set_flashdata('valid', 'Record Inserted Successfully');
                }else{
                    $this->session->set_flashdata('error', 'Record Insert Failure !!!');
                }
                redirect(current_url());
            }
            $result = $this->student->getPaymentDetails($this->input->get('code'),'code');
            $this->load->view('cashier/payment/payment_conform',array('record'=>$result));
        }else
            $this->load->view('cashier/payment/payment_conform');
    }
    function view(){
        $this->load->model('sys/Transaction_model','tran');

        $d['records'] = $this->tran->getRecords();

        $this->load->view('cashier/payment/payment_history',$d);
    }
}