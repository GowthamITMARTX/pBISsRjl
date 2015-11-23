<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 10/21/2015
 * Time: 3:58 PM
 */
class Batch_model  extends MY_Model{

    var $table = "batch";

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
            $this->db->trans_commit();
            return TRUE ;
        }

    }


}