<?php

class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('student/Student_model','student');
    }
    function index(){
        if($user = $this->session->userdata('user')){
            $id = $user['id'];
            $d['user'] = $this->student->getStById($id);
            $remark = $this->student->getTodayRemark($id);
            $d['remark'] = $remark;
            $tot_remark = $this->student->getAllRemark($id);
            $d['tot_remark'] = $tot_remark;
            $payments = $this->student->paymentDetails($id);
            $d['payments'] = $payments;
            $this->load->view('student/dashboard', $d);
        }
        else{
            redirect(base_url('students/login'));
            exit();
        }

    }
}