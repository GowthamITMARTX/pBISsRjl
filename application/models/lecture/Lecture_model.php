<?php

class Lecture_model extends MY_Model
{
    function login()
    {
        $r = "";
        $q = $this->db->get_where('lecture', array('email' => $this->input->post('Lecture[email]'), 'nic_no' => $this->input->post('Lecture[password]'), 'status' => 1));
        if ($q->num_rows() > 0) {
            $r = $q->first_row();
            $user = array('id' => $r->id);
            $this->session->set_userdata('lecture', $user);
            return true;
        } else {
            return false;
        }
    }

    function getTimeTable($id)
    {
        $lec = $this->db->from("lecture")->where('id', $id)->get()->row();
        return $this->db->from("timetable")->like('timetable.title', "$lec->title$lec->name")->join('class', "class.id = timetable.cls_id")->where("timetable.status", 1)->select("timetable.start ,timetable.end  , concat(class.title ,'\n',timetable.title ) as title ", false)->get()->result();
    }

    function getClass()
    {
        //       return $this->db->where('status', 1)
        //                ->get('class')->result();
        return $this->db->select('class.*')->from('class')->join('class_pool', 'class_pool.cls_id =class.id')->where('class_pool.lid', 1)->where('class.status', 1)->group_by('class.id')->get()->result();
    }

    function getSubject($cid,$lid)
    {
        return $this->db->from("subject")
            ->join("class_pool","class_pool.sid =  subject.id ")
            ->select("subject.id, subject.title ")
            ->where("class_pool.cls_id",$cid)
            ->where("class_pool.lid",$lid)
            ->get()
            ->result();
    }

    function getStudent($cls_id, $sub_id , $lid )
    {
        return $this->db->from("students")
            ->select("students.*")
            ->join("student_cls_pool","student_cls_pool.std_id=students.id")
            ->join("class_pool","class_pool.sid =  student_cls_pool.cls_id ")
            ->join("student_cls_subject","student_cls_subject.sld_cls_id = student_cls_pool.id")
            ->where("class_pool.cls_id",$cls_id)
            ->where("class_pool.lid",$lid)
            ->where("student_cls_subject.sub_id ",$sub_id)
            ->get()->result();
    }


    function send_remark($data)
    {
        if ($this->db->insert('remark', $data)) {
            return true;
        }
    }

    function create_assignment($data)
    {
        if (empty($data['id'])) return $this->db->insert('assignment', $data) ? true : false; else
            return $this->db->update('assignment', $data, "id = " . $data['id']) ? true : false;
    }

    function getAssignments($cls_id, $sub_id, $lec_id)
    {
        return $this->db->from('assignment')->where('cls_id', $cls_id)->where('sub_id', $sub_id)->where('lec_id', $lec_id)->where('status', 1)->get()->result();
    }

    function getStudentRemarks($cls_id, $sub_id, $std_id, $lec_id)
    {
        return $this->db->select('remark.title as title, remark.description, remark.date, remark.time ')->from('remark')->where('cls_id', $cls_id)->where('sub_id', $sub_id)->where_in('std_id', array($std_id, 0))->where('lec_id', $lec_id)->get()->result();
    }

    function getStById($id)
    {
        return $this->db->where('id', $id)->get('students')->row();
    }

    function getClsRemarks($cls_id, $sub_id, $lec_id)
    {
        return $this->db->where('cls_id', $cls_id)->where('sub_id', $sub_id)->where('lec_id', $lec_id)->where('std_id', 0)->get('remark')->result();
    }

    function delete_assignment()
    {
        $this->db->update('assignment', array('status' => 0), 'id=' . $this->input->get('a_id'));
    }

    function submitted_assignment($aid)
    {
        return $this->db->from('submitted_assignment')
            ->select("submitted_assignment.*,students.index , concat(students.title,students.name) as name ",false)
            ->join("students","students.id = submitted_assignment.std_id")
            ->where("assi_id",$aid)
            ->get()
            ->result();
    }

    function showAssignmentBySubId($sid, $lid)
    {
        return $this->db->from("assignment")->where("sub_id", $sid)->where("lec_id", $lid)->get()->result();
    }
}
