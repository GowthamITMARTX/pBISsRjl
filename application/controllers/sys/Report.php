<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 11/27/2015
 * Time: 3:38 PM
 */
class Report extends MY_Controller
{

    function __construct(){
        parent::__construct();
    }

    function daily_payment(){




        $this->load->view('sys/report/daily_payment');
    }

    function student(){
        $this->load->view('sys/report/student');
    }

    function batch(){
        $this->load->view('sys/report/batch');
    }

    function course(){
        $this->load->view('sys/report/course');
    }

    function subject(){
        $this->load->view('sys/report/subject');
    }

    function lecture(){
        $this->load->view('sys/report/lecture');
    }

}