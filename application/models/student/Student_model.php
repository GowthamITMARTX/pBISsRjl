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
		return $this->db->from("timetable")
			->select("concat(timetable.title, '- ' ,class.title) as title, timetable.start, timetable.end ", false)
			->join("student_cls_pool","timetable.cls_id = student_cls_pool.cls_id")
			->join("class","timetable.cls_id = class.id")
			->where("student_cls_pool.std_id",$id)
			->where("timetable.status",1 )
			->where("class.status",1 )
			->get()
			->result();
	}
	
	function getTodayRemark($id){
	   
       return $this->db->select("remark.* , lecture.title as lec_t , lecture.name as lec_n, class.title as cls_t")
                       ->from('remark')
                       ->join('lecture', "remark.lec_id = lecture.id")
                       ->join('class', "remark.cls_id = class.id")
                       ->where('(remark.std_id = '.$id.' OR (remark.std_id = 0 AND remark.cls_id in(select cls_id from student_cls_pool where std_id = '.$id.')))')
                       ->where('remark.date', date('Y-m-d'))
                       ->get()
                       ->result();
     }
    
    function getAllRemark($id){
        return $this->db->select("remark.* , lecture.title as lec_t , lecture.name as lec_n, class.title as cls_t")
                        ->from('remark')
                        ->join('lecture', "remark.lec_id = lecture.id")
                        ->join('class', "remark.cls_id = class.id")
                        ->where('(remark.std_id = '.$id.' OR (remark.std_id = 0 AND remark.cls_id in(select cls_id from student_cls_pool where std_id = '.$id.')))')
                        ->get()
                        ->result();
    }
}
