<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 11/19/2015
 * Time: 2:06 PM
 */
class Assignment extends MY_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('lecture/Lecture_model', 'lecture');
    }

    function index(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('msg', 'Message', 'required');
        $this->form_validation->set_rules('rdate','Date' ,'required');
        $this->form_validation->set_rules('rtime','Time' ,'required');
        if($this->form_validation->run() == true){
            $lecture = $this->session->userdata('lecture');
            $date = date('Y-m-d', strtotime($this->input->post('rdate')));
            if($this->input->post('send') == 'all'){
                $data = array(
                    'id' => '',
                    'lec_id' => $lecture['id'],
                    'cls_id' => $this->input->post('cls_id'),
                    'sub_id' => $this->input->post('sub_id'),
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('msg'),
                    'date' => $date,
                    'time' => $this->input->post('rtime')
                );
                if( $this->lecture->create_assignment($data)){
                    $this->session->set_flashdata('valid', 'Record Inserted Successfully');
                }else{
                    $this->session->set_flashdata('error', 'Record Insert Failure !!!');
                }

            }

        }elseif($this->input->post('title')){
            $d['error'] = "Please fill all fields";
        }



        $d['class'] = $this->lecture->getClass();
        $this->load->view('lecture/assignment', $d);
    }

    function all(){

        if($this->input->get('cid') && $this->input->get('sid')  ){
            $cid = $this->input->get('cid');
            $sid = $this->input->get('sid');
            $lecture = $this->session->userdata('lecture');
            $result = $this->lecture->getAssignments($cid, $sid , $lecture['id'] );
            echo '<table id="dt_basic" class=" table table-striped table-bordered ">
                                <thead>
                                <tr>
                                    <th width="10%">#</th>
                                    <th width="20%">Title</th>
                                    <th width="30%">End Date </th>
                                    <th width="30%">End Time </th>
                                    <th width="10%"> Edit </th>
                                </tr>
                                </thead>';
            foreach($result as $k=> $r){
                echo "<tr>";
                echo "<td>".($k+1)."</td>";
                echo "<td>".$r->title."</td>";
                echo "<td>".$r->date."</td>";
                echo "<td>".$r->time."</td>";
                echo '<td> <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal"  onClick=sid('.$r->id.');>Remark</button> </td>';  //<button class='btn btn-primary btn-sm' onClick='show($r->id)' >Remark</button>
                echo "</tr>";
            }
            echo "</table>";
        }
    }

}