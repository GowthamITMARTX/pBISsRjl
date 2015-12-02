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
                            <span><strong> STUDENT REPORT </strong></span>
                        </legend>

                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                    <div class="form-group">
                                        <?= form_open(); ?>
                                        <div class="col-sm-4" >
                                            <input type="text" name="search" class="form-control" placeholder="Enter Your Filter Text (Name/Index/NIC/Email)" required autofocus>
                                            </div>
                                        <div class="col-sm-4">
                                            <input type="submit" value="Filter" class="btn btn-primary" />
                                            </div> <?=form_close(); ?>
                                </div>
                            </div>
                            <?php if(isset($error)){ echo "<span style='color:red' >".$error."</span>";} ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(isset($personal)) : ?>
            <div class="row">
                <div class="col-sm-8">
                    <div class="todo_section panel panel-default">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title" style="text-align: center;"><b>Student Information</b></h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-sm-3 col-sm-3 " align="center"> <img alt="User Pic" src="<?=base_url('uploads/students/profile').'/'.$personal->profile_image; ?>" class="img-circle img-responsive"></div>
                                <div class=" col-sm-9 col-lg-9 ">
                                    <table class="table table-user-information">
                                        <tbody>
                                        <tr>
                                            <td> Index No</td>
                                            <td> <?=$personal->index; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Student Name</td>
                                            <td> <?=$personal->title.$personal->name; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Address</td>
                                            <td> <?=$personal->permanent_address; ?></td>
                                        </tr>
                                        <tr>
                                            <td> NIC</td>
                                            <td> <?=$personal->nic_no; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Mobile No</td>
                                            <td> <?=$personal->mobile_no; ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            <div class="row" >
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">PAYMENT</div>
                        <div class="panel-body">
                            <table class=" table table-striped table-bordered" id="dt_basic">
                                    <thead>
                                    <tr>
                                        <th width="10%">#</th>
                                        <th width="20%">Class</th>
                                        <th width="25%">Total Payment</th>
                                        <th width="25%">Paid Total</th>
                                        <th width="20%">Balance</th>
                                    </tr>
                                    </thead>
                                <tbody>
                                <?php foreach($payment as $k=> $p) : ?>
                                    <tr>
                                        <td><?=$k+1; ?></td>
                                        <td><?=$p->title; ?></td>
                                        <td><?=number_format($p->tot); ?></td>
                                        <td><?=number_format($p->paid); ?></td>
                                        <td><?=number_format($p->tot - $p->paid); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
            <?php endif; ?>

           </div>
                </div>


        <!-- side navigation -->
        <?php $this->load->view('inc/nav') ?>
    </div>
    <?php $this->load->view('inc/foot') ?>

    <!-- datatables -->
    <script src="<?= base_url() ?>assets/lib/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/lib/DataTables/media/js/dataTables.bootstrap.js"></script>
    <!-- datatables functions -->
    <script src="<?= base_url() ?>assets/js/apps/tisa_datatables.js"></script>
    <!--datepicker-->
    <script src="<?= base_url() ?>assets/lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

</body>

</html>
