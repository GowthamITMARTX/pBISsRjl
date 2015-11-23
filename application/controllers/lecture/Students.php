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
          echo '<table id="dt_basic" class=" table table-striped table-bordered ">
                                       <thead>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th width="20%">Index No</th>
                                                <th width="25%">Name</th>
                                                <th width="30%">Email</th>
                                                <th width="20%" >Remark</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbl_data">';
                                          
                                       
          foreach($result as $k=> $r){
              echo "<tr>";
              echo "<td>".($k+1)."</td>";
              echo "<td>".$r->index."</td>"; 
              echo "<td><a href='#!' onClick='v_rmk(".$r->id.");'>".$r->title.$r->name."</a></td>";
              echo "<td>".$r->email."</td>";
              echo '<td> <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal"  onClick=sid('.$r->id.');>Remark</button> 
              <button type="button" class="btn btn-info btn-sm" id="v_rmk" onClick="v_rmk('.$r->id.');" style="float :right"> View Remarks</button> </td>';
              echo "</tr>";
          }
       echo ' </tbody>
       </table>';
       }
    }
  
  function remarks($id){
      if($this->input->get('std_id') && $this->input->get('cls_id') && $this->input->get('sub_id')){
        $std_id = $this->input->get('std_id');
        $cls_id = $this->input->get('cls_id');
        $sub_id = $this->input->get('sub_id');
        $lecture = $this->session->userdata('lecture');
        $lec_id = $lecture['id'];
       
       $d['student'] = $this->lecture->getStById($std_id);
       $d['record'] = $this->lecture->getStudentRemarks($cls_id,$sub_id,$std_id, $lec_id);
       $this->load->view('lecture/remarks', $d);
      }
  }
  
  function cls_remarks(){
      if($this->input->get('cls_id') && $this->input->get('sub_id')){
          $cls_id = $this->input->get('cls_id');
          $sub_id = $this->input->get('sub_id');
          $lecture = $this->session->userdata('lecture');
          $lec_id = $lecture['id'];
          
          $result = $this->lecture->getClsRemarks($cls_id, $sub_id, $lec_id);
          
          echo '<table id="rmk_tbl" class=" table table-striped table-bordered ">
                                       <thead>
                                            <tr>
                                                <th width="10%">#</th>
                                                <th width="20%">Title</th>
                                                <th width="40%" >Description</th>
                                                <th width="15%"> Date </th>
                                                <th width="15%"> Time </th>
                                            </tr>
                                        </thead>
                                        <tbody id="rmk_bdy">';
                            foreach($result as $k=> $r){
                               echo "<tr>";
                                echo "<td>".($k+1)."</td>"; 
                                echo "<td>".$r->title."</td>";
                                echo "<td>".$r->description."</td>";
                                echo "<td>".$r->date."</td>";
                                echo "<td>".$r->time."</td>";
                               echo "</tr>";
                            }
                                          
                       echo '</tbody>
                                    </table>';
          
          
      }
  }
  
}


