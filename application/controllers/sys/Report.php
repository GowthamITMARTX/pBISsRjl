<?php

class Report extends MY_Controller
{

    function __construct(){
        parent::__construct();
        $this->_checkLogin();
        $this->load->model('sys/Report_model', 'report');
    }

    function daily_payment(){
        if($date = $this->input->post('date')){
            sscanf($date, '%d/%d/%d', $m, $d, $y);
            $income = $this->report->getIncome("$y-$m-$d");
            $exp = $this->report->getExpenses("$y-$m-$d");
            $this->load->view('sys/report/daily_payment',array('result'=>$income , 'date' => $date, 'exp' => $exp ));


        }
        else{
            $this->load->view('sys/report/daily_payment' , array("result" => array() , 'date' => date('m/d/Y'), 'exp' => "" ) );
        }

    }

    function student(){

        if($search = $this->input->post('search')){
            $search = htmlspecialchars($search , ENT_QUOTES);
            $this->load->model('student/Student_model', 'student');
            $student = $this->report->filterStudent($search);
            if(is_object($student)){
                $st_payment = $this->student->paymentDetails($student->id);
                $d['personal'] = $student;
                $d['payment'] = $st_payment;
            }
            else{
                $d['error'] = "Sorry no Result found";
            }


            $this->load->view('sys/report/student', $d);


        }
        else{
            $this->load->view('sys/report/student');
        }

    }

    function filter(){

        $this->load->model('sys/Batch_model', 'batch');
        $this->load->model('sys/Course_model', 'course');
        $this->load->model('sys/Subject_model', 'subject');
        $this->load->model('sys/Lecture_model', 'lecture');

        $d['years'] = $this->report->getYear();
        $d['batch'] = $this->batch->getRecords();
        $d['course'] = $this->course->getRecords();
        $d['subject'] = $this->subject->getRecords();
        $d['lecture'] = $this->lecture->getRecords();

        $this->load->view('sys/report/filter', $d);
    }

    function filterData(){
        $result = $this->report->getFilterData($this->input->get());
        $this->load->view('sys/report/filter_ajax',array('result'=>$result));
    }

}