<?php  

class Login extends CI_Controller{
	function __construct(){
        parent::__construct();
        if($this->session->userdata('user')){
            redirect(base_url('students/profile'));
            exit();
        }
        $this->load->model('student/Student_model','student');
	  }
	
	function index(){
		$d['error'] ="";
        if($this->input->post('Student[email]')){
           $this->form_validation->set_rules('Student[email]','', 'required|valid_email');
            $this->form_validation->set_rules('Student[password]','', 'required');
            if($this->form_validation->run()){
            if($this->student->login()){
            if($this->session->userdata('user')){
                redirect(base_url('students/profile'));
            }
        }
        else{
            $d['error']= true;
         }
      }
      else{
        $d['error'] = true;
      } 
      }
       else{
       $this->session->sess_destroy();      
        }
        $this->load->view('student/login', $d);
	}
	
}
