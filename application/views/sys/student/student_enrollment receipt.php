<!DOCTYPE html>
<html>
<head>
    <title>Student List <?= date("d-m-Y") ?> </title>
    <?php $this->load->view('inc/head') ?>
    <style>
        .table-striped > tbody > tr > th, .table-striped > tbody > tr > td {
            border-bottom: none;
            border-top: none;
            border-right: 1px solid #ddd;
        }
        .table-striped > thead > tr ,.table-striped > tbody,.table-striped > thead > tr > th,.table-striped > tfoot > tr > th, .table-striped > tfoot > tr > td {
            border: 1px solid #ddd;
        }
        .col_total{
            font-weight : bolder ;
        }
    </style>
</head>
<body>
<!-- top bar -->
<?php $this->load->view('inc/header') ?>
<!-- main content -->
<div id="main_wrapper">
    <div class="page_bar clearfix">
        <div class="row">
            <div class="col-md-8">
                <h1 class="page_title">Invoice</h1>

                <p class="text-muted">Date: <?= date('d-m-Y') ?> </p>
            </div>
            <div class="col-md-4 text-right">
                <div class="btn-group btn-group-sm">
                    <button class="btn btn-default print "><i class="fa fa-print fa-lg  "></i> Print</button>
                </div>
            </div>
        </div>
    </div>
    <div class="page_content">
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="<?= base_url() ?>assets/img/logo-1.png" >
                        </div>
                        <div class="col-sm-6 text-right ">
                            <h1 class="page_title">Student Invoice</h1>
                            <p class="text-muted">No: <?= $record->code ?> </p>
                            <p class="text-muted">Date: <?= date('d-m-Y') ?> </p>
                        </div>
                    </div>
                        <div class="row">
                        <div class="col-sm-12 text-right ">
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
                    </div>
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
<script>

    print_view = {
        init: function () {
            $('body').on('click', '.print', function () {
                w = window.open(null, 'Invoice', 'scrollbars=yes');
                var myStyle = '<link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css" />';
                myStyle += '<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css" />';
                w.document.write(myStyle + jQuery('.page_content').html());
                w.document.close();
                w.print();

            });

        }
    }
    print_view.init();
</script>


</body>

</html>