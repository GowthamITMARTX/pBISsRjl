<?php 

class Assignment extends MY_Controller{
   function __construct(){
        parent::__construct();
        $this->load->model('student/Student_model','student');
      }
   
    function index(){
        
        if($this->input->post('form')){
         // $this->form_validation->set_rules('userfile','' ,'required');
          $this->form_validation->set_rules('agree', '', 'required');
           if($this->form_validation->run()){
            $user = $this->session->userdata('user');
            $id = $user['id'];
            $assi_id = $this->input->post('assi_id');
            $date = $this->input->post('s_date');
            $time = $this->input->post('s_time');
            $d = $this->do_upload($assi_id);
            if($d){
                $data = array(
                'std_id' => $id,
                'assi_id' => $assi_id,
                'name' => $d['file_name'],
                'date' => $date,
                'time' => $time
                );
                
              $result = $this->student->update_assignment($data);
              if($result){
                  $d['success'] = "Your assignment has been submitted successfully";
              }
            else{
                $d['error'] = "An error occurred in the upload. Please try again later";
            }
              
            }
            }
            else{
            $d['error'] = "To send your assignment you must agree our terms and conditions";
        }
        
        }
        
        $user = $this->session->userdata('user');
        $id = $user['id']; 
        $result = $this->student->getAssignment($id);
        $d['record'] = $result;
        $this->load->view('student/assignment', $d);  
        
        
        
       
      
    }

   public function do_upload($assi_id)
    {
        $user = $this->session->userdata('user');
        $id = $user['id'];
        $result = $this->student->getStById($id);
        $config['upload_path']          = './uploads/students';
        $config['allowed_types']        = 'pdf|doc|docx|csv|application/excel|zip';
        $config['file_name']            = $result['index'].'('.$assi_id.')';
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
    
  function download($file_name, $name){
      
    $this->load->helper('download');
    $data = file_get_contents(realpath(APPPATH.'../uploads/'.$file_name));
    $name_n = $name.'.pdf';
    force_download($name_n, $data);
  }
} 