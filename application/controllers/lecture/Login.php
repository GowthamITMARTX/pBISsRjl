<?php 

class Login extends CI_Controller {
    function __construct(){
        parent::__construct();
         if($this->session->userdata('lecture')){
            redirect(base_url('lecture/profile'));
            exit();
        }
        $this->load->model('lecture/Lecture_model', 'lecture');
    }
    
    function index(){
       $d['error'] ="";
       if($this->input->post('Lecture[email]')){
             $this->form_validation->set_rules('Lecture[email]','', 'required|valid_email');
       $this->form_validation->set_rules('Lecture[password]','', 'required');
       
       if($this->form_validation->run()){
          if($this->lecture->login()){
              if($this->session->userdata('lecture')){
                  redirect(base_url('lecture/profile'));
              }
          }
          else{
              $d['error'] = true;
          }
       }
       else{
           $d['error'] = true;
       }
       }
       else{
           $this->session->sess_destroy(); 
       }
       $this->load->view('lecture/login', $d);
    }
}
