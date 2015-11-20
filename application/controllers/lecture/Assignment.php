<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 11/19/2015
 * Time: 2:06 PM
 */
class Assignment extends CI_Controller
{

    function __construct(){
        parent::__construct();

        if(!$this->session->userdata('lecture')){
            redirect(base_url().'lecture/login');
        }
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
            $d  = $this->do_upload();
            $data = array(
                'id' => $this->input->post('id'),
                'lec_id' => $lecture['id'],
                'cls_id' => $this->input->post('cls_id'),
                'sub_id' => $this->input->post('sub_id'),
                'title' => $this->input->post('title'),
                'description' => $this->input->post('msg'),
                'file' => $d['file_name'],
                'date' => $date,
                'time' => $this->input->post('rtime')
            );
            if( $this->lecture->create_assignment($data)){
                $this->session->set_flashdata('valid', 'Record Inserted Successfully');
            }else{
                $this->session->set_flashdata('error', 'Record Insert Failure !!!');
            }
            redirect(current_url());
        }elseif($this->input->post('title')){
            $d['error'] = "Please fill all fields";
        }



        $d['class'] = $this->lecture->getClass();
        $this->load->view('lecture/assignment', $d);
    }

    public function do_upload()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'pdf|doc|docx|csv|application/excel|zip';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            return false ;
        }
        else
        {
            return  $this->upload->data();
        }
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
                                    <th width="10%"> Attachment </th>
                                </tr>
                                </thead>';
            foreach($result as $k=> $r){
                echo "<tr>";
                echo "<td>".($k+1)."</td>";
                echo "<td>".$r->title."</td>";
                echo "<td>".$r->date."</td>";
                echo "<td>".$r->time."</td>";
                echo '<td>
                        <button type="button" data-object="'.html_escape(json_encode($r)) .'" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal"  onClick= assaignment.edit($(this)) ;>Edit</button> '.
                        '<button type="button" data-object="'.html_escape(json_encode($r)) .'" class="btn btn-danger btn-sm"   onClick= assaignment.remove($(this)) ;><i class="fa fa-times" ></i></button> </td>'
                ;  //<button class='btn btn-primary btn-sm' onClick='show($r->id)' >Remark</button>
                echo "<td> ";
                if(file_exists("uploads/$r->file") && strlen($r->file) > 0  )
                    echo " <a target='_blank' href='".  base_url() ."uploads/$r->file' > <i  class='fa-2x fa fa-file'  ></i> </a> ";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }

    function remove(){
        $this->lecture->delete_assignment();
    }

}

