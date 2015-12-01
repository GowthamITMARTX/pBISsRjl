<?php

class Report extends MY_Controller
{

    function __construct(){
        parent::__construct();
        $this->_checkLogin();
        $this->load->model('sys/Report_model', 'report');
    }

    function daily_payment(){
        if($date = $this->input->post('date')){
            sscanf($date, '%d/%d/%d', $m, $d, $y);
          $income = $this->report->getIncome("$y-$m-$d");
          $exp = $this->report->getExpenses("$y-$m-$d");
          $this->load->view('sys/report/daily_payment',array('result'=>$income , 'date' => $date, 'exp' => $exp ));


        }
        else{
            $this->load->view('sys/report/daily_payment' , array("result" => array() , 'date' => date('m/d/Y'), 'exp' => "" ) );
        }

    }

    function student(){

        if($search = $this->input->post('search')){
           $search = htmlspecialchars($search , ENT_QUOTES);
            $this->load->model('student/Student_model', 'student');
            $student = $this->report->filterStudent($search);
            if(is_object($student)){
                $st_payment = $this->student->paymentDetails($student->id);
                $d['personal'] = $student;
                $d['payment'] = $st_payment;
            }
            else{
                $d['error'] = "Sorry no Result found";
            }


           $this->load->view('sys/report/student', $d);


        }
        else{
            $this->load->view('sys/report/student');
        }

    }

    function batch(){
        if($filter = $this->input->post('filter')){
              if($filter == "month" || $filter == 'year'){
              $years = $this->report->getYear();

                foreach($years as $y){
                    if($y->year == date('Y')){
                        echo '<option value='.$y->year.' selected>'.$y->year.'</option>';
                    }else{
                        echo '<option value='.$y->year.'>'.$y->year.'</option>';
                    }

                }

            }

        }
        elseif($this->input->post('bid') && $this->input->post('year')){
            $bid = $this->input->post('bid');
            $year = $this->input->post('year');

            if($this->input->post('month')){
                $month = $this->input->post('month');
                $result = $this->report->batchReportByMonth($bid, $month, $year);
             }
            else{
                $result = $this->report->batchReportByYear($bid, $year);
            }

            // print table
            echo '
            <table id="dt_tableTools" class=" table table-striped table-bordered ">
                                <thead>
                                <tr>
                                   <th width="5%">#</th>
                                    <th width="30%">Course</th>
                                    <th width="20%">Class</th>
                                    <th width="15%">Total Fee</th>
                                    <th width="15%"> Paid toal</th>
                                    <th width="15%"> Balance</th>
                                </tr>
                                </thead>
                                <tbody>
                ';
            if(is_array($result)){
                foreach($result as $k=> $r){
                    echo "<tr> ";
                    echo "<td> ".($k+1)."</td>";
                    echo "<td>". $r->course."</td>";
                    echo "<td>". $r->class."</td>";
                    echo "<td>". number_format($r->tot)."</td>";
                    echo "<td>". number_format($r->paid_tot)."</td>";
                    echo "<td>". number_format($r->tot - $r->paid_tot)."</td>";
                    echo "</tr>";
                }
            }

            echo '</tbody>

                            </table>
            ';
        }
        else{
            $d['batch'] = $this->report->getBatch();
            $this->load->view('sys/report/batch', $d);
        }

    }

    function course(){

        if($filter = $this->input->post('filter')){
            if($filter == "month" || $filter == 'year' ){
                $years = $this->report->getYear();
                foreach($years as $y){
                    if($y->year == date('Y')){
                        echo '<option value='.$y->year.' selected>'.$y->year.'</option>';
                    }else{
                        echo '<option value='.$y->year.'>'.$y->year.'</option>';
                    }
                }
            }
        }
        elseif($this->input->post('cid') && $this->input->post('year')){
            $cid = $this->input->post('cid');
            $year = $this->input->post('year');

            if($this->input->post('month')){
                $month = $this->input->post('month');
                $result = $this->report->courseReportByMonth($cid, $month, $year);
            }
            else{
                $result = $this->report->courseReportByYear($cid, $year);
            }

            // print table
            echo '
            <table id="dt_tableTools" class=" table table-striped table-bordered ">
                                <thead>
                                <tr>
                                   <th width="5%">#</th>
                                    <th width="30%">Batch</th>
                                    <th width="20%">Class</th>
                                    <th width="15%">Total Fee</th>
                                    <th width="15%"> Paid total</th>
                                    <th width="15%"> Balance</th>
                                </tr>
                                </thead>
                                <tbody>
                ';
            if(is_array($result)){
                foreach($result as $k=> $r){
                    echo "<tr> ";
                    echo "<td> ".($k+1)."</td>";
                    echo "<td>". $r->batch."</td>";
                    echo "<td>". $r->class."</td>";
                    echo "<td>". number_format($r->tot)."</td>";
                    echo "<td>". number_format($r->paid_tot)."</td>";
                    echo "<td>". number_format($r->tot - $r->paid_tot)."</td>";
                    echo "</tr>";
                }
            }

            echo '</tbody>

                            </table>
            ';
        }
        else{
            $d['course'] = $this->report->getCourse();
            $this->load->view('sys/report/course', $d);
        }

    }

    function subject(){
        $this->load->view('sys/report/subject');
    }

    function lecture(){
        $this->load->view('sys/report/lecture');
    }

    // this is a test function if you see this PLEASE DELETE THIS..
    function test(){
  $result = $this->report->filterStudent("asmal");
        p($result);
    }

}