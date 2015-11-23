<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('inc/head') ?>
</head>
<body>
<!-- top bar -->
<?php $this->load->view('inc/header') ?>
<!-- main content -->
<div id="main_wrapper">
    <div class="page_bar clearfix">
        <div class="row">
            <div class="col-md-8">
                <h1 class="page_title">Transaction</h1>
                <p class="text-muted"></p>
            </div>
        </div>
    </div>
    <nav class="breadcrumbs">
        <ul>
            <li><a href="#">Casher</a></li>
            <li class="sep">\</li>
            <li>Payment Confirm</li>
        </ul>
    </nav>

    <div class="page_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <?php
                    $error = isset($error) ? $error : $this->session->flashdata('error');
                    $valid = $this->session->flashdata('valid');
                    if (isset($valid)) $error = $valid;
                    if (isset($error)) {
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div
                                    class="alert <?= isset($valid) ? 'alert-success' : 'alert-danger' ?> alert-dismissable fade in ">
                                    <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                    <?= $error ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <div class="panel panel-default">

                        <div class="row" >
                            <div class="col-lg-6" >
                                <div class="form-group">
                                    <label for="reg_input"> Transaction Id </label>
                                    <input type="text" id="load Class" value="<?=$this->input->get('code')?>" class="form-control model-link " data-url="<?= base_url() ?>transaction/newStudentPayment" data-type="table" data-for="id" data-id="tran_id" >
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if($this->input->get('code')): ?>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6  ">
                                        <h1 class="page_title">Student Invoice</h1>
                                        <p class="text-muted">No: <?= $record->code ?> </p>
                                        <p class="text-muted">Date: <?= date('d-m-Y') ?> </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 ">
                                        <h3 class="heading_a"></h3>
                                        <address>
                                            <p class="addres_name"><?= $record->student->title ?><?= $record->student->name ?></p>
                                            <p><?= $record->student->nic_no ?></p>
                                            <p><?php $address = explode(',', $record->student->permanent_address);
                                                echo implode(',<br/>', $address); ?></p>
                                        </address>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped invoice_table">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Description</th>
                                                <th>Amount</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td> 1 </td>
                                                <td><?= $record->class->code ?> - <?= $record->class->title ?>
                                                    <?= $record->student_cls_pool->status ==0 ? "<br/>( new admission Enrollment Fee - " . number_format($record->class->initial_amount,2) .")": '' ?>  </td>
                                                <td class="text-right" ><?= number_format($record->amount,2) ?></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td></td>
                                                <td></td>
                                            </tr>


                                            </tbody>
                                            <tfoot>
                                            <tr class="">
                                                <td></td>
                                                <td class="col_total text-right">Grand Total</td>
                                                <td class="col_total text-right"><strong><?= number_format($record->amount,2) ?></strong></td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="col-lg-12" >
                                        <form method="post" >
                                            <input type="hidden" name="t_id" value="<?= $record->id ?>" >
                                            <button  class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

    <!-- side navigation -->
    <?php $this->load->view('inc/nav') ?>

    <!-- right slidebar -->
    <div id="slidebar">
        <div id="slidebar_content">

        </div>
    </div>
</div>
<?php $this->load->view('inc/foot') ?>
<!-- datatables -->
<script src="<?= base_url() ?>assets/lib/DataTables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/lib/DataTables/media/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/lib/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="<?= base_url() ?>assets/lib/DataTables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<!-- datatables functions -->
</body>

</html>
