<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 10/23/2015
 * Time: 1:25 PM
 */
class Lecture_model extends MY_Model
{
    var $table ="lecture";
    var $lec_pool ="lecture_pool";

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
            $this->update(array('emp_id'=>"EMP-".str_repeat(0,5-strlen($id)).$id ),"id=$id");
            $this->db->trans_commit();

            return TRUE ;
        }

    }

    function lecture_pool(){
        $lec_id = $this->input->post('form[lec_id]');
        $sub = $this->input->post('form[sub_id]');
        $this->db->delete($this->lec_pool,array('lec_id'=>$lec_id));
        foreach($sub as $v)
            $d[] = array('lec_id'=>$lec_id , 'sub_id' => $v );
        if($d)
            return $this->db->insert_batch($this->lec_pool,$d)? true : false;
        return false ;
    }

    function lecture_pool_list(){
        if($this->input->get('lec_id'))
            return $this->db->from($this->lec_pool)->where('lec_id',$this->input->get('lec_id'))->get()->result();
        return array();
    }

    function getBySubId($sid=0){
        return $this->db->from($this->lec_pool)
            ->where("sub_id",$sid)
            ->join($this->table, "$this->lec_pool.lec_id = $this->table.id")
            ->select("$this->table.title , $this->table.name , $this->table.id")
            ->get()->result();
    }

}