<?php 

class Timetable extends MY_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('lecture/Lecture_model','lecture');
      }
    
    function index(){
        if($this->session->userdata('lecture')){
            $this->load->view('lecture/timetable');
        }
        else{
            redirect(base_url('lecture/login'));
        }
    }

   function data(){
         if($user = $this->session->userdata('lecture')){
            $id = $user['id'];
            $timetable = $this->lecture->getTimeTable($id);
             foreach($timetable as &$time)
                 $time->title = strtok($time->title,  "-") ;// substr($time->title, 0, strpos($time->title, "-"));
            echo json_encode($timetable);
        }
    }
}
