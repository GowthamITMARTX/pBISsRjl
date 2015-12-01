<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/bootstrap-datepicker/css/datepicker3.css">
    <link rel="stylesheet"
          href="<?= base_url() ?>assets/lib/DataTables/extensions/TableTools/css/dataTables.tableTools.min.css">
    <?php $this->load->view('inc/head') ?>


</head>
<body>
<!-- top bar -->
<?php $this->load->view('inc/header') ?>
<!-- main content -->
<div id="main_wrapper">
    <div class="page_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <legend>
                            <span><strong> DAILY PAYMENT REPORT </strong></span>
                        </legend>

                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <?= form_open() ?>
                                <div class='col-sm-4'>
                                    <div class="form-group">
                                        <div class='input-group date' >
                                            <input type='text' class="form-control" value="<?= $date     ?>" name="date" id='datetimepicker1'/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <button class="btn btn-success" id = "filter">FILTER</button>
                                </div>

                                <?= form_close() ?>
                        </div>
                <?php  $tot_income = 0; $tot_exp = 0; ?>
                        <?php if($result) : ?>
                            <div class="row" >
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">INCOME</div>
                                        <div class="panel-body">
                                    <table id="dt_tableTools" class=" table table-striped table-bordered ">
                                        <thead>
                                        <tr>
                                            <th width="10%">#</th>
                                            <th width="50%">Description</th>
                                            <th width="40%">Total Income</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                            <?php if(!empty($result->other)) :?>
                                <?php foreach($result->other as $k => $other) : ?>
                                            <tr>
                                                <td><?=$k+1; ?></td>
                                                <td><?=$other->note; ?></td>
                                                <td><?=number_format($other->amount); ?></td>
                                                <?php $tot_income += $other->amount;  ?>
                                            </tr>
                                 <?php endforeach; ?>
                                <?php endif; ?>
                            <?php if(!empty($result->std)) :?>
                                <?php foreach($result->std as $k => $std) : ?>
                                    <tr>
                                        <td><?=$k+1; ?></td>
                                        <td><?="Student Payment - ".$std->index.' - '.$std->title.$std->name.' ('.$std->cls.')'; ?></td>
                                        <td><?=number_format($std->amount); ?></td>
                                        <?php $tot_income += $std->amount;  ?>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                                        </tbody>

                                     </table>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($exp) : ?>
                            <div class="row" >
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">EXPENSES</div>
                                        <div class="panel-body">
                                            <table class=" table table-striped table-bordered" id="expenses">
                                                <thead>
                                                <tr>
                                                    <th width="10%">#</th>
                                                    <th width="50%">Description</th>
                                                    <th width="40%">Amount</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                 <?php if(!empty($exp->emp)) : ?>
                                     <?php foreach($exp->emp as $k => $emp) : ?>
                                            <tr>
                                                <td><?=$k+1; ?></td>
                                                <td><?="Employee Expenses - ".$emp->index.' - '.$emp->title.$emp->name; ?></td>
                                                <td><?=number_format($emp->amount); ?></td>
                                                <?php $tot_exp += $emp->amount; ?>
                                            </tr>
                                     <?php endforeach; ?>
                                <?php endif; ?>
                                                <?php if(!empty($exp->lec)) : ?>
                                                    <?php foreach($exp->lec as $k => $lec) : ?>
                                                        <tr>
                                                            <td><?=$k+1; ?></td>
                                                            <td><?="Lecture Expenses - ".$lec->emp_id.' - '.$lec->title.$lec->name; ?></td>
                                                           <td><?=number_format($lec->amount); ?></td>
                                                            <?php $tot_exp += $lec->amount; ?>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                                </tbody>
                                             </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php endif; ?>
                            <div class="row" >
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">PROFIT</div>
                                        <div class="panel-body">
                                            <table class=" table table-striped table-bordered" id="profit">
                                                <tbody>
                                                <tr>
                                                    <td>Total Income</td>
                                                    <td><?=number_format($tot_income);  ?></td>
                                                </tr>
                                                <tr>
                                                    <td> Total Expenses</td>
                                                    <td><?=number_format($tot_exp); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Your Balance</td>
                                                    <td><?php
                                                        $tot = $tot_income - $tot_exp;
                                                        if($tot < 0){
                                                            echo "<span style='color:red'>".number_format($tot)."</span>";
                                                        }
                                                        else{
                                                            echo "<span style='color: green' >".number_format($tot)."</span>";
                                                        }
                                                        ?></td>
                                                </tr>
                                                </tbody>
                                                </table>
                                        </div>
                                        </div>
                                    </div>
                    </div>
                </div>
            </div>

        </div>

        </div>
</div>
<!-- side navigation -->
    <?php $this->load->view('inc/nav') ?>
</div>
<?php $this->load->view('inc/foot') ?>




<!-- datatables -->
<script src="<?= base_url() ?>assets/lib/DataTables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/lib/DataTables/media/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/lib/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<!-- datatables functions -->
<script src="<?= base_url() ?>assets/js/apps/tisa_datatables.js"></script>
<!--datepicker-->
<script src="<?= base_url() ?>assets/lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">

  report = {

        filter: function(self){
            var date = $('#datetimepicker1').val();
            $.ajax({
                url: URL.current,
                type: "POST",
                dataType: "json",
                data: "date="+date,
                success: function(data){
                  console.log(data);
                }

            });

        }
    }
    $('#datetimepicker1').datepicker();
</script>
</body>

</html>
