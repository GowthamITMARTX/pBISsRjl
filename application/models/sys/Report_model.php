<?php

class Report_model extends MY_Model{

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
}