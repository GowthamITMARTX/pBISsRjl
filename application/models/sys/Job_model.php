<?php

class Job_model extends MY_Model {

    function addJobPortal($data){
        if($this->db->replace('job_portal', $data)){
            return true;
        }
        else{
            return false;
        }
    }

    function getAll(){
        return $this->db->where('status', 1)
            ->get('job_portal')
            ->result();
    }

    function getById($id){
        return $this->db->where('status', 1)
            ->where('id', $id)
            ->get('job_portal')
            ->row();
    }
    function deleteById($id){
       $result = $this->db->where('id', $id)
            ->delete('job_portal');
       return $result ? true : false;
    }
}