<?php

class Report_model extends MY_Model{

    // Get Batch Report
    function getBatch(){
        return $this->db->get('batch')->result();
    }

    function getYear(){
        return $this->db->select('YEAR(date) as year')
            ->group_by('year')
            ->get('std_payment')
            ->result();
    }
    function batchReportByMonth($bid, $month, $year){
        return $this->db->select("class.title as class, course.title as course, sum(student_cls_pool.fee) as tot, sum(std_payment.amount) as paid_tot,")
            ->from('std_payment')
            ->join('student_cls_pool', 'std_payment.std_cls_id = student_cls_pool.id and student_cls_pool.status =1')
            ->join('class', 'std_payment.cls_id = class.id and class.status = 1')
            ->join('course', 'class.c_id = course.id')
            ->where('class.b_id', $bid)
            ->where('MONTH(std_payment.date)', $month)
            ->where('YEAR(std_payment.date)', $year)
            ->where('std_payment.status', 1)
            ->group_by('std_payment.cls_id')
            ->get()
            ->result();
    }
    function batchReportByYear($bid, $year){
        return $this->db->select("class.title as class, course.title as course, sum(student_cls_pool.fee) as tot, sum(std_payment.amount) as paid_tot,")
            ->from('std_payment')
            ->join('student_cls_pool', 'std_payment.std_cls_id = student_cls_pool.id and student_cls_pool.status =1')
            ->join('class', 'std_payment.cls_id = class.id and class.status = 1')
            ->join('course', 'class.c_id = course.id')
            ->where('class.b_id', $bid)
            ->where('YEAR(std_payment.date)', $year)
            ->where('std_payment.status', 1)
            ->group_by('std_payment.cls_id')
            ->get()
            ->result();
    }

    // Get Course Report

    function getCourse(){
        return $this->db->get('course')->result();
    }

    function courseReportByMonth($cid, $month, $year){
        return $this->db->select("batch.title as batch, class.title as class, sum(student_cls_pool.fee) as tot, sum(std_payment.amount) as paid_tot,")
            ->from('std_payment')
            ->join('student_cls_pool', 'std_payment.std_cls_id = student_cls_pool.id and student_cls_pool.status =1')
            ->join('class', 'std_payment.cls_id = class.id and class.status = 1')
            ->join('batch', 'class.b_id = batch.id')
            ->where('class.c_id', $cid)
            ->where('MONTH(std_payment.date)', $month)
            ->where('YEAR(std_payment.date)', $year)
            ->where('std_payment.status', 1)
            ->group_by('std_payment.cls_id')
            ->get()
            ->result();
    }
    function courseReportByYear($cid, $year){
        return $this->db->select("batch.title as batch, class.title as class, sum(student_cls_pool.fee) as tot, sum(std_payment.amount) as paid_tot,")
            ->from('std_payment')
            ->join('student_cls_pool', 'std_payment.std_cls_id = student_cls_pool.id and student_cls_pool.status =1')
            ->join('class', 'std_payment.cls_id = class.id and class.status = 1')
            ->join('batch', 'class.b_id = batch.id')
            ->where('class.c_id', $cid)
            ->where('YEAR(std_payment.date)', $year)
            ->where('std_payment.status', 1)
            ->group_by('std_payment.cls_id')
            ->get()
            ->result();
    }

    //Daily payment Report
//    function getIncome($year, $month , $day){
//        $income->other =  $this->db->where('YEAR(other_income.current_date)', $year)
//            ->where('MONTH(other_income.current_date)', $month)
//            ->where('DAY(other_income.current_date)', $day)
//            ->get('other_income')->result();
//
//        $income->std = $this->db->where('YEAR(std_payment.date)', $year)
//            ->where('MONTH(std_payment.date)', $month)
//            ->where('DAY(std_payment.date)', $day)
//            ->get('std_payment')->result();
//       foreach($income->std as $i){
//           echo $i->amount;
//       }
//    }

    function getIncome($date){
        $income = new stdClass();
        $income->other =  $this->db->from('other_income')
                       -> where('DATE_FORMAT(other_income.current_date, "%Y-%m-%d") = ', $date)
                       ->where('other_income.status', 1)
                       ->get()->result();

        $income->std = $this->db->select('students.index , students.title, students.name , class.title as cls , std_payment.amount')
            ->from('std_payment')
            ->join('students', 'std_payment.std_id = students.id and students.status = 1', 'left')
            ->join('class', 'std_payment.cls_id = class.id and class.status =1 ', 'left')
            -> where('DATE_FORMAT(std_payment.date, "%Y-%m-%d") = ', $date)
            ->where('std_payment.status', 1)
            ->get()->result();
         return $income;
    }

    function getExpenses($date){
        $exp = new stdClass();
        $exp->emp = $this->db->select('expenses_type.title, expenses_employee.voucher, employee.index,employee.title, employee.name , expenses_employee.amount')
            ->from('expenses_employee')
            ->join('expenses_type', 'expenses_employee.code = expenses_type.code ', 'left')
            ->join('employee', 'expenses_employee.emp_id = employee.id', 'left')
            ->where('DATE_FORMAT(expenses_employee.current_date, "%Y-%m-%d") = ', $date)
            ->where('expenses_employee.status', 1)
            ->get()->result();

        $exp->lec = $this->db->select('expenses_type.title, lecture.emp_id , lecture.title, lecture.name ,expenses_lecture.voucher, expenses_lecture.amount')
            ->from('expenses_lecture')
            ->join('expenses_type', 'expenses_lecture.code = expenses_type.code ', 'left')
            ->join('lecture', 'expenses_lecture.lec_id = lecture.id', 'left' )
            ->where('DATE_FORMAT(expenses_lecture.current_date, "%Y-%m-%d") = ', $date)
            ->where('expenses_lecture.status', 1)
            ->get()->result();

        $exp->other = $this->db->select('expenses_type.title, expenses_other.note, expenses_other.amount')
            ->from('expenses_other')
            ->join('expenses_type', 'expenses_other.code = expenses_type.code ', 'left')
            ->where('DATE_FORMAT(expenses_other.current_date, "%Y-%m-%d") = ', $date)
            ->where('expenses_other.status', 1)
            ->get()->result();

        return $exp;

    }

    function getFilterData(){

        $this->db->from('students')
            ->join('std_payment','students.id = std_payment.std_id ')
            ->where('students.status',1)
            ->select('students.* , std_payment.code , std_payment.amount , sum(class_pool.amount) as fee , course.title as course , batch.title as batch , class.title as class  ' )
            ->group_by("students.id");

        if($this->input->get('course') != 0  && $this->input->get('batch') != 0  ){
            $this->db->join("class","class.c_id = {$this->input->get('course')} and class.b_id = {$this->input->get('batch')} and std_payment.cls_id = class.id  ");
            $this->db->join("class_pool","class.id = class_pool.cls_id  ");
        }else if($this->input->get('course') != 0 ){
            $this->db->join("class","class.c_id = {$this->input->get('course')}  and std_payment.cls_id = class.id  ");
            $this->db->join("class_pool","class.id = class_pool.cls_id  ");
        }else if($this->input->get('batch') != 0  ){
            $this->db->join("class","class.b_id = {$this->input->get('batch')} and std_payment.cls_id = class.id  ");
            $this->db->join("class_pool","class.id = class_pool.cls_id  ");
        }else{
            $this->db->join("class_pool","std_payment.cls_id = class_pool.cls_id  ");
            $this->db->join("class","class.id = class_pool.cls_id  ");
        }
        $this->db->join("course","course.id = class.c_id  ");
        $this->db->join("batch","batch.id = class.b_id  ");


        if($this->input->get('lecture') != 0  ){
            $this->db->having('class_pool.lid',  $this->input->get('lecture') );
            $this->db->group_by("class_pool.lid");
        }
        if($this->input->get('subject') != 0  ){
            $this->db->having("class_pool.sid",$this->input->get('subject'));
            $this->db->group_by("class_pool.sid");
        }
        return $this->db->get()->result();
    }

}