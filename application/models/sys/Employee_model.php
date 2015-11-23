<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 11/12/2015
 * Time: 10:33 AM
 */
class Employee_model extends MY_Model
{

    var $table ="employee";

    function create(){
        $d = $this->input->post('form');
        $d['create_by'] = $this->session->userdata('id');
        $d['create_date'] = date('d-m-Y') ;

        $this->db->trans_begin();
        $this->db->insert($this->table, $d );
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return FALSE ;
        }else{
            $id = $this->db->insert_id();
            $this->update(array('index'=>"EMP-".str_repeat(0,5-strlen($id)).$id),"id=$id");
            $this->db->trans_commit();
            return TRUE ;
        }
    }


}