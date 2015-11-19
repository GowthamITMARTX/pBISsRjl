<?php

class Student_model extends MY_Model{
	
	function login(){
		$r = "";
	$q = $this->db->get_where('students', array('email' => $this->input->post('Student[email]'), 'nic_no'=> $this->input->post('Student[password]'),  'status'=>1));
	if($q->num_rows() > 0){
		$r = $q->first_row();
		$user = (array) $r;
		$this->session->set_userdata('user', $user);
		return true;
	}
	else{
		return false;
	}
	}
	
	function getTimeTable($id){
		$q = "select concat(timetable.title, '- ' ,class.title) as title, timetable.start, timetable.end from timetable, class where timetable.cls_id in(select cls_id from student_cls_pool where std_id  = ?) and timetable.cls_id = class.c_id";
		if($q = $this->db->query($q, array($id))){
		
		if($q->num_rows() > 0){
		   return $q->result();
		}
		}
	}
	
	function getTodayRemark($id){
	   
       return $this->db->select("remark.* , lecture.title as lec_t , lecture.name as lec_n, class.title as cls_t")
                       ->from('remark')
                       ->join('lecture', "remark.lec_id = lecture.id")
                       ->join('class', "remark.cls_id = class.id")
                       ->where('(remark.std_id = '.$id.' OR (remark.std_id = 0 AND remark.cls_id = 1 AND remark.sub_id = 1))')
                       ->where('remark.date', date('Y-m-d'))
                       ->get()
                       ->result();
     }
    
    function getAllRemark($id){
        return $this->db->select("remark.* , lecture.title as lec_t , lecture.name as lec_n, class.title as cls_t")
                        ->from('remark')
                        ->join('lecture', "remark.lec_id = lecture.id")
                        ->join('class', "remark.cls_id = class.id")
                        ->where('(remark.std_id = '.$id.' OR (remark.std_id = 0 AND remark.cls_id = 1 AND remark.sub_id = 1))')
                        ->get()
                        ->result();
    }
}
