<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 11/6/2015
 * Time: 12:31 PM
 */
class Timetable extends MY_Controller
{
    function __construct(){
        parent::__construct();
        $this->_checkLogin();
        $this->load->model('sys/class_model', 'cls');
        $this->load->model('time_table','time');
    }

    function index(){
        $d['records'] = $this->cls->getRecords();
        $this->load->view('sys/time/class_list', $d);
    }

    function edit(){
        $d['subject'] = $this->cls->getSubAndLecListByClsIdAll($this->input->get('id'));
        $this->load->view('sys/time/time_table',$d);
    }

    function table_data($id){
        $timetable = $this->time->getTimeTableId($id);
        echo json_encode($timetable);
    }
    function updatetimetable(){
        $this->time->updateTimeTableId();
    }

    function deleteTimeTable(){
        $this->time->deleteTime($this->input->post('id'));
    }

    function addtimetable(){
        $this->time->insertTimeTableId();
        p($this->input->post());
    }
}