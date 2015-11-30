<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 11/27/2015
 * Time: 3:38 PM
 */
class Report extends MY_Controller
{

    function __construct(){
        parent::__construct();
        $this->load->model('sys/Report_model', 'report');
    }

    function daily_payment(){
        $this->load->view('sys/report/daily_payment');
    }

    function student(){
        $this->load->view('sys/report/student');
    }

    function batch(){
        if($filter = $this->input->post('filter')){
              if($filter == "month"){
//                $month = date('m');
//                $year = date('Y');
//                $result = $this->report->batchReportByMonth($bid, $month, $year);
              $years = $this->report->getYear();
                  echo '<option value="" >YEAR</option>';
                foreach($years as $y){
                    if($y->year == date('Y')){
                        echo '<option value='.$y->year.' selected>'.$y->year.'</option>';
                    }else{
                        echo '<option value='.$y->year.'>'.$y->year.'</option>';
                    }

                }

            }
            elseif($filter == 'year'){
                $years = $this->report->getYear();
                echo '<option value="" >YEAR</option>';
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
        $this->load->view('sys/report/course');
    }

    function subject(){
        $this->load->view('sys/report/subject');
    }

    function lecture(){
        $this->load->view('sys/report/lecture');
    }

    // this is a test function if you see this PLEASE DELETE THIS..
    function test(){
  echo date('m');
    }

}