<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 10/21/2015
 * Time: 11:43 AM
 */
class Course_Model extends MY_Model{

    var $table = "course";

    function create($file_name){
        $d = $this->input->post('form');
        $d['image'] = $file_name;
        $d['create_by'] = $this->session->userdata('id');
        $d['create_date'] = date('d-m-Y') ;

        $this->db->trans_begin();
        $this->db->insert($this->table, $d );
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return FALSE ;
        }else{
            $this->db->trans_commit();
            return TRUE ;
        }

    }

    function update($d=null,$con=null){

        $this->db->update($this->table,$d,$con);
    }

}