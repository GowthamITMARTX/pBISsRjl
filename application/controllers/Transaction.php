<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 10/30/2015
 * Time: 1:35 PM
 */
class Transaction extends MY_Controller{

    function newStudentPayment(){
        $this->load->model('sys/Transaction_model','tran');

        $d['records'] = $this->tran->getPendingPayment($this->input->get('key'));

        $this->load->view('transaction/student_payment',$d);
    }


}