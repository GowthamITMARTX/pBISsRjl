<!DOCTYPE html>
<html>
<head>
    <title>EMPLOYEE SALARY LIST <?= date("d-m-Y") ?> </title>
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
                <h1 class="page_title">Employee Salary List</h1>
            </div>
        </div>
    </div>
    <nav class="breadcrumbs">
        <ul>
            <li><a href="<?= base_url() ?>">Dashboard</a></li>
            <li class="sep">\</li>
            <li>Employee Salary List</li>
        </ul>
    </nav>
    <div class="page_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="notification clearfix ">

                    </div>

                    <div class="panel panel-default">

                        <div class="panel-body">
                            <table id="dt_tableTools" class=" table table-striped table-bordered table-responsive ">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>EMP ID</th>
                                    <th>VOUCHER NO </th>
                                    <th>NAME</th>
                                    <th>AMOUNT</th>
                                    <th>Create Date</th>
                                    <th>Create By</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($records as $k => $row): ?>
                                    <tr>
                                        <td><?= $k+1 ?></td>
                                        <td> <?= $row->emp_id ?> </td>
                                        <td> <?= $row->voucher ?> </td>
                                        <td> <?= $row->name ?> </td>
                                        <td> <?= number_format($row->amount,2) ?>  </td>
                                        <td><?= $row->current_date ?></td>
                                        <td><?= $row->user ?></td>
                                        <td> <a class="btn btn-danger" onclick="emp.delete(<?= $row->id ?>,$(this))"  > <i class="fa fa-times" ></i></a> </td>
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

<!-- mock ajax -->
<script src="<?= base_url() ?>assets/js/jquery.mockjax.js"></script>
<!-- editable elements -->
<script src="<?= base_url() ?>assets/lib/x-editable/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src="<?= base_url() ?>assets/lib/x-editable/inputs-ext/address/address.js"></script>
<script src="<?= base_url() ?>assets/lib/x-editable/inputs-ext/typeaheadjs/lib/typeahead.js"></script>
<script src="<?= base_url() ?>assets/lib/x-editable/inputs-ext/typeaheadjs/typeaheadjs.js"></script>
<!-- multiselect, tagging -->
<!-- editable elements functions -->
<script src="<?= base_url() ?>assets/js/apps/tisa_editable_elements.js"></script>
<script>
    emp = {
        delete : function(id,self){
            if(confirm("Are You sure Do your want to delete Employee Salary Record ??? ")){
                $.get(URL.current , {id:id},function(data){
                    data = $.parseJSON(data);
                    $(self).closest('tr').remove();
                    if (data.success) {
                        $('.notification').html('<div style="margin: 5px" class="alert alert-success"></i> ' + data['success'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                    }
                    if (data.error) {
                        $('.notification').html('<div style="margin: 5px" class="alert alert-danger"></i> ' + data['error'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                    }
                } )
            }
        }
    }
</script>

</body>

</html>