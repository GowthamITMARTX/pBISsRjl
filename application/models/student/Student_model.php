<?php

class Student_model extends MY_Model{
	
	function login(){
		$r = "";
	$q = $this->db->get_where('students', array('email' => $this->input->post('Student[email]'), 'nic_no'=> $this->input->post('Student[password]'),  'status'=>1));
	if($q->num_rows() > 0){
		$r = $q->first_row();
		$user = array(
        'id' => $r->id
        );
		
		$this->session->set_userdata('user', $user);
		return true;
	}
	else{
		return false;
	}
	}
    function getStById($id){
       return $this->db->where('id', $id)
                  ->where('status', 1)
                  ->get('students')
                  ->row_array();
    }
	
	function getTimeTable($id){
		return $this->db->from("timetable")
			->select("concat(timetable.title, '- ',class.title) as title, timetable.start, timetable.end ", false)
			->join("student_cls_pool","timetable.cls_id = student_cls_pool.cls_id")
			->join("class","timetable.cls_id = class.id")
			->where("student_cls_pool.std_id",$id)
			->where("timetable.status",1 )
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
    function getAssignment($id){
        return $this->db->select('assignment.*, class.title as cls_t, subject.title as sub_t')
                 ->from('assignment')
                 ->join('class', 'assignment.cls_id = class.id')
                 ->join('subject', 'assignment.sub_id = subject.id')
                 ->join('student_cls_pool', 'student_cls_pool.cls_id = assignment.cls_id')
                 ->where('student_cls_pool.std_id', $id)
                 ->where('assignment.status' , 1)
                 ->get()
                 ->result();
             
    }
    
    function update_assignment($data){
       if($this->db->insert('submitted_assignment', $data)){
           return true;
       }
       else{
            return false;
        }
                 
    }
}
