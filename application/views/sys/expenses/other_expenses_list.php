<!DOCTYPE html>
<html>
<head>
    <title>Batch List <?= date("d-m-Y") ?> </title>
    <?php $this->load->view('inc/head') ?>
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/DataTables/extensions/TableTools/css/dataTables.tableTools.min.css">

    <!-- editable elements -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/x-editable/bootstrap3-editable/css/bootstrap-editable.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/x-editable/inputs-ext/address/address.css">

</head>
<body>
<!-- top bar -->
<?php $this->load->view('inc/header') ?>
<!-- main content -->
<div id="main_wrapper">
    <div class="page_bar clearfix">
        <div class="row">
            <div class="col-md-8">
                <h1 class="page_title">Expense Type List</h1>
            </div>
        </div>
    </div>
    <nav class="breadcrumbs">
        <ul>
            <li><a href="<?= base_url() ?>">Dashboard</a></li>
            <li class="sep">\</li>
            <li> Other Expenses</li>
        </ul>
    </nav>
    <div class="page_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <table id="dt_tableTools" class=" table table-striped table-bordered ">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Create Date</th>
                                    <th>Expenses Code</th>
                                    <th>Expenses Name</th>
                                    <th>Expenses Note </th>
                                    <th> Amount </th>
                                    <th>Create By</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($records as $k => $row): ?>
                                    <tr>
                                        <td><?= $k+1 ?></td>
                                        <td><?= date('d-m-Y',strtotime($row->current_date)) ?></td>
                                        <td> <?= $row->code ?> </td>
                                        <td  > <?= $row->title ?> </td>
                                        <td> <?= $row->note ?> </td>
                                        <td class="text-right"><?= number_format($row->amount,2) ?></td>
                                        <td><?= $row->user ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
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
<script src="<?= base_url() ?>assets/lib/DataTables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/lib/DataTables/media/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/lib/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="<?= base_url() ?>assets/lib/DataTables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<!-- datatables functions -->
<script src="<?= base_url() ?>assets/js/apps/tisa_datatables.js"></script>

</body>

</html>