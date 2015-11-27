<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 11/9/2015
 * Time: 2:44 PM
 */
class Expenses_model extends MY_Model
{
    var $table = "batch";
    var $type = "expenses_type";
    var $other = "expenses_other";
    var $employee = "expenses_employee";
    var $lecture = "expenses_lecture";
    var $income = "other_income";

    function update($d=null,$con=null){
        return  $this->db->update($this->type,$d,$con) ? true : false ;
    }

    function create(){
        $d = $this->input->post('form');
        $d['create_by'] = $this->session->userdata('id');
        $d['create_date'] = date('d-m-Y') ;
        $this->db->trans_begin();
        $this->db->insert($this->type, $d );
        $id = $this->db->insert_id();
        $this->db->update($this->type,array('code'=>"EXC-".str_repeat(0,5-strlen($id)).$id),"id=$id");
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return FALSE ;
        }else{
            $this->db->trans_commit();
            return TRUE ;
        }
    }

    function getRecords(){
        return $this->db->from($this->type)
            ->select("{$this->type}.* , {$this->user}.name as user ")
            ->join($this->user, "{$this->user}.id = {$this->type}.create_by")
            ->where("{$this->type}.status",1)
            ->get()->result();
    }

    function other_expenses(){
        $d = $this->input->post('form');
        $d['create_by'] = $this->session->userdata('id');
        $d['status'] =  1 ;
        $this->db->trans_begin();
        $this->db->insert($this->other, $d );
        $id = $this->db->insert_id();
        $this->db->update($this->other,array('code'=>"OEX-".str_repeat(0,5-strlen($id)).$id),"id=$id");
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return FALSE ;
        }else{
            $this->db->trans_commit();
            return TRUE ;
        }
    }

    function other_expenses_report(){
        return $this->db->from($this->other)
            ->select("{$this->other}.* , {$this->user}.name as user  , {$this->type}.title  ")
            ->join($this->user, "{$this->user}.id = {$this->other}.create_by")
            ->join($this->type, "{$this->type}.id = {$this->other}.e_type")
            ->where("{$this->other}.status",1)
            ->get()->result();
    }

    function employee_salary(){
        $d = $this->input->post('form');
        $d['create_by'] = $this->session->userdata('id');
        $d['status'] =  1 ;
        $this->db->trans_begin();
        $this->db->insert($this->employee, $d );
        $id = $this->db->insert_id();
        $this->db->update($this->employee,array('code'=>"EEX-".str_repeat(0,5-strlen($id)).$id),"id=$id");
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return FALSE ;
        }else{
            $this->db->trans_commit();
            return TRUE ;
        }
    }
    function lecture_salary(){
        $d = $this->input->post('form');
        $d['create_by'] = $this->session->userdata('id');
        $d['status'] =  1 ;
        $this->db->trans_begin();
        $this->db->insert($this->lecture, $d );
        $id = $this->db->insert_id();
        $this->db->update($this->lecture,array('code'=>"LEX-".str_repeat(0,5-strlen($id)).$id),"id=$id");
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return FALSE ;
        }else{
            $this->db->trans_commit();
            return TRUE ;
        }
    }

    function other_income(){
        $d = $this->input->post('form');
        $d['create_by'] = $this->session->userdata('id');
        $d['create_date'] = date('d-m-Y') ;
        $this->db->trans_begin();
        $this->db->insert($this->income, $d );




        $id = $this->db->insert_id();
        $this->db->update($this->income,array('code'=>"OTI-".str_repeat(0,5-strlen($id)).$id),"id=$id");
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return FALSE ;
        }else{
            $this->db->trans_commit();
            return TRUE ;
        }
    }

    function getIncomeList(){
        return $this->db->from($this->income)
            ->select("{$this->income}.* , {$this->user}.name as user ")
            ->join($this->user, "{$this->user}.id = {$this->income}.create_by")
            ->where("{$this->income}.status",1)
            ->get()->result();
    }

    function getIncomeById($id){
        return $this->db->from($this->income)
            ->where('id',$id)
            ->get()->row();
    }

    function update_income(){
        return $this->db->update($this->income,$this->input->post('form'),"id=".$this->input->get('id')) ? true : false ;
    }

    function employee_salary_report(){
        return $this->db->from($this->employee)
            ->select("{$this->employee}.* ,employee.index , concat(employee.title,employee.name) as name , {$this->user}.name as user " , false )
            ->join($this->user, "{$this->user}.id = {$this->employee}.create_by")
            ->join("employee", "employee.id = {$this->employee}.emp_id")
            ->where("{$this->employee}.status",1)
            ->get()->result();
    }

    function employee_salary_delete($id){
        return $this->db->where('id',$id)
            ->update($this->employee,array( 'status'=>0 ,
                'delete_by' => $this->session->userdata('id') ,
                'delete_date' =>date('Y-m-d h:m:s ')  )) ? true : false ;

    }

    function lecture_salary_report(){
        return $this->db->from($this->lecture)
            ->select("{$this->lecture}.* ,lecture.emp_id , concat(lecture.title,lecture.name) as name , {$this->user}.name as user " , false )
            ->join($this->user, "{$this->user}.id = {$this->lecture}.create_by")
            ->join("lecture", "lecture.id = {$this->lecture}.lec_id")
            ->where("{$this->lecture}.status",1)
            ->get()->result();
    }

    function lecture_salary_delete($id){
        return $this->db->where('id',$id)
            ->update($this->lecture,array( 'status'=>0 ,
                'delete_by' => $this->session->userdata('id') ,
                'delete_date' =>date('Y-m-d h:m:s ')  )) ? true : false ;

    }

}