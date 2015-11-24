<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 10/22/2015
 * Time: 11:34 AM
 */
class Student_model extends MY_Model{

    var $table ="students";

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
            $this->update(array('index'=>"STD-".str_repeat(0,5-strlen($id)).$id),"id=$id");
            $this->db->trans_commit();
            return TRUE ;
        }
    }

    function filter($key=''){
        return $this->db->from($this->table)
            ->select("{$this->table}.* , {$this->user}.name as user ")
            ->join($this->user, "{$this->user}.id = {$this->table}.create_by")
            ->where("{$this->table}.status",1)
                ->group_start()
                    ->like("{$this->table}.index", $key , 'after')
                    ->or_like("{$this->table}.name", $key , 'after')
                    ->or_like("{$this->table}.nic_no", $key , 'after')
                    ->or_like("{$this->table}.email", $key , 'after')
                ->group_end()
            ->get()->result();
    }

    function enroll(){
        $this->db->trans_begin();
        $sub = $this->input->post('sub') ;
        if($this->input->post('all') || empty($sub) ){
            $d = $this->input->post('form');
            $d['fee'] = $this->input->post('total_fee');
            $d['create_by'] = $this->session->userdata('id');
            $d['create_date'] = date('d-m-Y') ;
            $this->db->insert('student_cls_pool',$d);
            $id = $this->db->insert_id();
        }else{
            $d = $this->input->post('form');
            $fee =  $this->input->post('initial_amount');
            foreach($this->input->post('sub') as $k )
                $fee += $this->input->post("fee[$k]") ;
            $d['fee'] = $fee ;
            $this->db->insert('student_cls_pool',$d);
            $id = $this->db->insert_id();
            foreach($this->input->post('sub') as $k => $v ){
                $cls[] = array('sld_cls_id'=>$id , 'sub_id' => $v , 'fee' => $this->input->post("fee[$v]") );
            }
            $this->db->insert_batch('student_cls_subject',$cls);
        }

        $d = $this->input->post('form');
        $d['amount'] = str_replace(',','',$this->input->post('amount'));
        $d['std_cls_id'] = $id ;
        $this->db->insert('std_payment',$d);
        $id = $this->db->insert_id();
        $this->db->update('std_payment',array('code'=>"INV-".str_repeat(0,5-strlen($id)).$id),"id=$id");
        $this->session->set_flashdata('insert_id', $id );
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return FALSE ;
        }else{
            $this->db->trans_commit();
            return TRUE ;
        }
    }

    function getPaymentDetails($tran_id=0,$field='id'){
        $d = $this->db->from('std_payment')->where($field,$tran_id)->get()->row();
        if(is_object($d)){
            $d->student = $this->db->from('students')->where('id',$d->std_id)->get()->row();
            $d->class = $this->db->from('class')->where('id',$d->cls_id)->get()->row();
            $d->student_cls_pool = $this->db->from('student_cls_pool')->where('id',$d->std_cls_id)->get()->row();
            return $d ;
        }else
            return false;
    }

}