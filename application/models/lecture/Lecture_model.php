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

    function create_assignment($data){
        if(empty($data['id']))
         return $this->db->insert('assignment', $data) ? true : false ;
        else
            return $this->db->update('assignment', $data , "id = ".$data['id']) ? true : false ;
    }

    function getAssignments($cls_id , $sub_id,$lec_id){
        return $this->db->from('assignment')
            ->where('cls_id',$cls_id)
            ->where('sub_id',$sub_id)
            ->where('lec_id',$lec_id)
            ->where('status',1)
            ->get()->result();
   }
  function getStudentRemarks($cls_id,$sub_id,$std_id, $lec_id){
    return $this->db->select('remark.title as title, remark.description, remark.date, remark.time ')
              ->from('remark')
              ->where('cls_id', $cls_id)
              ->where('sub_id', $sub_id)
              ->where_in('std_id', array($std_id, 0))   
              ->where('lec_id', $lec_id) 
              ->get()->result();
   }
   function getStById($id){
       return $this->db->where('id', $id)
               ->get('students')->row();
   }
   
   function getClsRemarks($cls_id, $sub_id, $lec_id){
       return $this->db->where('cls_id', $cls_id)
                       ->where('sub_id', $sub_id)
                       ->where('lec_id', $lec_id)
                       ->where('std_id', 0)
                       ->get('remark')
                       ->result();
   }

    function delete_assignment(){
        $this->db->update('assignment' , array('status'=> 0 )  ,'id='.$this->input->get('a_id') );
    }
}
