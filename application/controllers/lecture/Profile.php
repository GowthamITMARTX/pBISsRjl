<?php

class Profile extends CI_Controller {
    function index(){
        if($this->session->userdata('lecture')){
            $this->load->view('lecture/timetable');
        }
        else{
            redirect(base_url('lecture/login'));
            exit();
        }
    }
}
