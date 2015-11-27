<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 11/6/2015
 * Time: 12:33 PM
 */
class Time_table extends MY_Model
{

    function getTimeTableId($id){
        return $this->db->from('timetable')
            ->select("id,title,start,end")
            ->where('cls_id',$id)
            ->where('status',1)
            ->get()->result();
    }
    function updateTimeTableId(){
        $this->db->update('timetable',array(
            'start' => $this->input->post('start'),
            'end' => $this->input->post('end')
        ),'id='.$this->input->post('id'));
    }

    function deleteTime($id){
        $this->db->where("id",$id);
        $this->db->delete('timetable');
    }

    function insertTimeTableId(){
        $this->db->insert('timetable',$this->input->post());
    }
}