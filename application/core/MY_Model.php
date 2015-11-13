<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 10/21/2015
 * Time: 12:35 PM
 */
class MY_Model extends CI_Model
{
    var $table ="";
    var $user = "user_tab";
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

    function getRecords(){
        return $this->db->from($this->table)
            ->select("{$this->table}.* , {$this->user}.name as user ")
            ->join($this->user, "{$this->user}.id = {$this->table}.create_by")
            ->where("{$this->table}.status",1)
            ->get()->result();
    }


        function update($d=null,$con=null){

        return  $this->db->update($this->table,$d,$con) ? true : false ;
    }

    function getBy($con=null,$limit=0,$field=null){
        if( is_null($con) || ! is_array($con)  )
            return false ;
        $this->db->from($this->table);
        if(!is_null($field))
            $this->db->select($field);
        foreach($con as $k => $v )
            $this->db->where($k , $v);
        if($limit == 1 ){
            return $this->db->limit($limit)->get()->row();
        }else
            return $this->db->get()->result();
    }

}