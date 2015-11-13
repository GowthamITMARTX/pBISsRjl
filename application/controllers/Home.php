<?php
/**
 * Created by PhpStorm.
 * User: gowtham
 * Date: 5/11/15
 * Time: 8:11 AM
 */

class Home extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('user_m','user');
    }

    function login(){
        $d['error'] ="";
        $this->form_validation->set_rules('UserLogin[username]','','required');
        $this->form_validation->set_rules('UserLogin[password]','','required');
        if($this->form_validation->run()){
            if($this->user->login()){
                if($this->session->userdata('url'))
                    redirect($this->session->userdata('url'));
                redirect(base_url());
            }else{
                  $d['error'] = true ;
                  $this->load->view('login',$d);
            }
        }else{
            $this->session->sess_destroy();
            $this->load->view('login',$d);
        }

    }

    function index(){
        if($this->input->post('logout')){
            $this->session->sess_destroy();
            redirect(current_url());
        }
        if($this->session->userdata('id') == FALSE){
            $this->login();
        }else{
            $this->load->view('dashboard');
        }
    }

    function logout(){
        $this->session->sess_destroy();
    }

}