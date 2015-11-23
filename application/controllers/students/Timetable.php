<?php 

class Timetable extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('student/Student_model','student');
      }
    
    function index(){
        if($user = $this->session->userdata('user')){
            $this->load->view('student/timetable');      
        }
        else{
            redirect(base_url('students/login'));
        }
      
    }
    function data(){
         if($user = $this->session->userdata('user')){
            $id = $user['id'];
            $timetable = $this->student->getTimeTable($id);
            echo json_encode($timetable);
        }
    }
}
