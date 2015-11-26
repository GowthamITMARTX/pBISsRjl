<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 10/23/2015
 * Time: 2:17 PM
 */
class Class_model  extends MY_Model{

    var $table = "class";
    var $pool = "class_pool";
    var $batch = "batch";
    var $course = "course";
    var $lecture = "lecture";
    var $subject = "subject";

    function create(){
        $d = $this->input->post('form');
        $d['create_by'] = $this->session->userdata('id');
        $d['create_date'] = date('d-m-Y') ;

        $this->db->trans_begin();

        $this->db->insert($this->table, $d );
        $id = $this->db->insert_id();
        $sub = $this->input->post('sub');
        foreach($sub as &$s ){
            $s['cls_id'] = $id;
            $s['amount'] = str_replace(',','',$s['amount']);
        }
        $this->db->insert_batch($this->pool,$sub);

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
            ->select("{$this->table}.* , {$this->user}.name as user , $this->batch.title as batch ,  $this->course.title as course  ")
            ->join($this->user, "{$this->user}.id = {$this->table}.create_by")
            ->join($this->batch, "{$this->batch}.id = {$this->table}.b_id")
            ->join($this->course, "{$this->course}.id = {$this->table}.c_id")
            ->where("{$this->table}.status",1)
            ->get()->result();
    }

    function getSubAndLecListByClsId($id=0){
        return $this->db->from($this->pool)
            ->where('cls_id',$id)
            ->get()
            ->result();
    }
    function getSubAndLecListByClsIdAll($cls_id=0){
        return $this->db->from($this->pool)
            ->where("$this->pool.cls_id" ,$cls_id)
            ->join($this->subject , "$this->pool.sid = $this->subject.id " )
            ->join($this->lecture , "$this->pool.lid = $this->lecture.id " )
            ->select("$this->pool.* , $this->subject.title as subject , Concat($this->lecture.title,$this->lecture.name) as lecture ",false)
            ->get()
            ->result();
    }

    function updateAll(){
        $this->db->update($this->table, $this->input->post('form') , "id=".$this->input->get('id') );

        $this->db->trans_begin();

        $sub = $this->input->post('sub');
        foreach($sub as &$s ){
            $s['cls_id'] = $this->input->get('id');
            $s['amount'] = str_replace(',','',$s['amount']);
        }
        $this->db->delete($this->pool,array("cls_id"=> $this->input->get('id') ));
        $this->db->insert_batch($this->pool,$sub);

        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return FALSE ;
        }else{
            $this->db->trans_commit();
            return TRUE ;
        }
    }

    function filter($key=''){
        return $this->db->from($this->table)
            ->select("{$this->table}.* , {$this->user}.name as user , $this->batch.title as batch ,  $this->course.title as course  ")
            ->join($this->user, "{$this->user}.id = {$this->table}.create_by")
            ->join($this->batch, "{$this->batch}.id = {$this->table}.b_id")
            ->join($this->course, "{$this->course}.id = {$this->table}.c_id")
            ->where("{$this->table}.status",1)
                ->group_start()
                    ->like("{$this->table}.code", $key , 'after')
                    ->or_like("{$this->table}.title", $key , 'after')
                    ->or_like("{$this->batch}.title",$key ,'after' )
                    ->or_like("{$this->course}.title",$key ,'after' )
                ->group_end()
            ->get()->result();
    }

    function getClassByStudentId($std_id){
        return $this->db->from($this->table)
            ->select("$this->table.id,$this->table.c_id,$this->table.title, student_cls_pool.fee ,std_payment.code,std_payment.std_cls_id ")
            ->select_sum("std_payment.amount")
            ->join("student_cls_pool","student_cls_pool.cls_id= $this->table.id")
            ->join("std_payment","std_payment.std_cls_id= student_cls_pool.id")
            ->where("student_cls_pool.std_id",$std_id)
            ->get()->result();
    }

}