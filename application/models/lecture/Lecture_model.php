<?php

class Lecture_model extends MY_Model{
    function login(){
            $r = "";
    $q = $this->db->get_where('lecture', array('email' => $this->input->post('Lecture[email]'), 'nic_no'=> $this->input->post('Lecture[password]'),  'status'=>1));
    if($q->num_rows() > 0){
        $r = $q->first_row();
        $user = (array) $r;
        $this->session->set_userdata('lecture', $user);
        return true;
    }
    else{
        return false;
    }
    }
    
   function getTimeTable($id){
       $lec = $this->db->from("lecture")->where('id',$id)->get()->row();
      return $this->db->from("timetable")
       ->like('timetable.title', "$lec->title$lec->name" )
       ->join('class',"class.id = timetable.cls_id")
       ->select("timetable.start ,timetable.end  , class.title  ",false)
       ->get()->result();
    }
   function getClass(){
       return $this->db->where('status', 1)
                ->get('class')->result();
   }
   function getSubject($id){
       $q = "select subject.id, subject.title from subject where id in(select sid from class_pool where class_pool.cls_id = ?)";
       $query = $this->db->query($q, array($id));
       return $query->result();
   }
   function getStudent($cls_id , $sub_id){
       $q = "select distinct student_cls_pool.std_id , students.* from student_cls_pool, students where student_cls_pool.id in(select sld_cls_id from student_cls_subject where sub_id = ?) and cls_id = ? and students.id = student_cls_pool.std_id";
       if($query = $this->db->query($q, array($sub_id, $cls_id))){
           return $query->result();
       }
   }
   function send_remark($data){
      if($this->db->insert('remark', $data)){
          return true;
      }
   }
}
