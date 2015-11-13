<?php
/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 5/8/15
 * Time: 11:03 AM
 */

class MY_Controller extends CI_Controller{

    var $str;
    var $permission = false ;
    public function __construct(){
        parent::__construct();


       /* if($this->input->post('logout')){
            $this->session->sess_destroy();
            redirect(base_url());
        }*/
    }

    function common($url="index"){

        if(is_callable(array($this,$url))){
            call_user_func(array($this,$url));
        }else{
            show_404($page = '', $log_error = TRUE);
        }
    }

    function _checkLogin(){
        if(!$this->session->has_userdata('id')){
            $this->session->set_userdata('url',current_url());
            redirect(base_url());
        }
        if($this->session->has_userdata('url'))
            $this->session->unset_userdata('url');

        $this->checkPermission();

    }

    function checkPermission(){
        $this->load->model('user_m','user');
        $user = $this->session->userdata('role');

        if($user != 1 ){
            $access = $this->user->checkAccess($user,get_class($this));
            if( ! $access ){
                show_error('access privilege',$access);
            }
        }
    }





}