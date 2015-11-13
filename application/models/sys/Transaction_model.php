<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 10/30/2015
 * Time: 1:42 PM
 */
class Transaction_model extends MY_Model
{
    var $table = 'std_payment';

    function getPendingPayment($code = ''){
        if($code != '' ){
            $this->db->group_start()
                    ->like('std_payment.code',$code)
                    ->or_like('students.index',$code)
                    ->or_like('students.nic_no',$code)
                    ->or_like('students.name',$code)
                ->group_end();
        }
        return $this->db->from('std_payment')
            ->where("std_payment.status",0)
            ->join('students' , "students.id = std_payment.std_id ")
            ->select('std_payment.* , students.title , students.name ')
            ->get()->result();
    }

    function paymentSuccess($t_id=0){
        if($t_id){
           return $this->db->update('std_payment',array('status'=>1 ,'create_by'=> $this->session->userdata('id')),'id='.$t_id) ? true : false ;
        }
        return false ;
    }

}