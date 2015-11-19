<?php 

class Students extends My_Controller{
     function __construct(){
        parent::__construct();
       $this->load->model('lecture/Lecture_model', 'lecture');
       if(!$this->session->userdata('lecture')){
           redirect(base_url().'lecture/login');
       }
    }
     
    function index(){
       $d['class'] = $this->lecture->getClass();
      
      if($this->input->post('title')){
          $this->load->library('form_validation');
          $this->form_validation->set_rules('title', 'Title', 'required');
          $this->form_validation->set_rules('msg', 'Message', 'required');
          $this->form_validation->set_rules('rdate','Date' ,'required');
        $this->form_validation->set_rules('rtime','Time' ,'required'); 
        
        if($this->form_validation->run() == true){
            $lecture = $this->session->userdata('lecture');
            $date = date('Y-m-d', strtotime($this->input->post('rdate')));
            if($this->input->post('send') == 'single'){
             $data = array(
            'id' => '',
            'lec_id' => $lecture['id'],
            'std_id' => $this->input->post('stid'),
            'cls_id' => $this->input->post('cls_id'),
            'sub_id' => $this->input->post('sub_id'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('msg'),
            'date' => $date,
            'time' => $this->input->post('rtime')
            );
            
           $result = $this->lecture->send_remark($data);
           $d['success'] = "Your remark has been submitted successfully";   
            }
            elseif($this->input->post('send') == 'all'){
             $data = array(
            'id' => '',
            'lec_id' => $lecture['id'],
            'std_id' => 0,
            'cls_id' => $this->input->post('cls_id'),
            'sub_id' => $this->input->post('sub_id'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('msg'),
            'date' => $date,
            'time' => $this->input->post('rtime')
            );
           $result = $this->lecture->send_remark($data);
           $d['success'] = "Your remark has been submitted successfully"; 
            }
        
         }
        else{
            $d['error'] = "Please fill all fields";
        }
       }
       $this->load->view('lecture/students', $d); 
       
    }
    function subject(){
        if($id = $this->input->get('id')){
        $result = $this->lecture->getSubject($id);
            echo "<option value='' >--CHOOSE--</option>";
         foreach($result as $r){
             echo "<option value='".$r->id."' >".$r->title."</option>";
         }
       }
    }
    function all(){
        
       if($this->input->get('cid') && $this->input->get('sid')){
          $cid = $this->input->get('cid');
          $sid = $this->input->get('sid');
          $result = $this->lecture->getStudent($cid, $sid);
          foreach($result as $k=> $r){
              echo "<tr>";
              echo "<td>".($k+1)."</td>";
              echo "<td>".$r->index."</td>"; 
              echo "<td>".$r->title.$r->name."</td>";
              echo "<td>".$r->email."</td>";
              echo '<td> <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal"  onClick=sid('.$r->id.');>Remark</button> </td>';  //<button class='btn btn-primary btn-sm' onClick='show($r->id)' >Remark</button>
              echo "</tr>";
          }
       }
    }
  
}
