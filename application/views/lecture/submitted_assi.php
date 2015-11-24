<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('inc/head') ?>
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/DataTables/extensions/TableTools/css/dataTables.tableTools.min.css">

</head>
<body>
<!-- top bar -->
<?php $this->load->view('lecture/inc/header') ?>
<!-- main content -->
<div id="main_wrapper">
    <div class="page_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">

                        <legend><span><strong> SUBMITTED ASSIGNMENTS</strong></span>
                        </legend>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row sepH_b ">
                                        <div class="col-sm-4">
                                            <select class="form-control" id="std_cls">
                                                <option value=''>*CLASS</option>
                                                <?php foreach($class as $c): ?>
                                                    <option value="<?=$c->id ?>"><?=$c->title; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="subject" disabled="disabled">
                                                <option value="">SUBJECTS</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" >ASSIGNMENTS <span id="all_rmk"><span id="btn_id"></span> </span></div>
                        <div class="panel-body" id="data_table" >
                            <table id="dt_basic" class=" table table-striped table-bordered ">
                                <thead>
                                <tr>
                                    <th width="10%">#</th>
                                    <th width="20%">Index No</th>
                                    <th width="25%">Name</th>
                                    <th width="30%">Email</th>
                                    <th width="15%" >Remark</th>
                                </tr>
                                </thead>
                                <tbody id="tbl_data">

                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- side navigation -->
    <?php $this->load->view('lecture/inc/nav') ?>
</div>
<?php $this->load->view('inc/foot') ?>
<!-- datatables -->
<script src="<?= base_url() ?>assets/lib/DataTables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/lib/DataTables/media/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/lib/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="<?= base_url() ?>assets/lib/DataTables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<!-- datatables functions -->
<script src="<?= base_url() ?>assets/js/apps/tisa_datatables.js"></script>
<script>

    // load subjects.
    $('#std_cls').change(function() {
        var cid = $(this).val();

        if(cid != null && cid != ''){
            $('#subject').removeAttr('disabled');
            $.get("<?=base_url() ?>lecture/students/subject", {id : cid}, function(data){
                $('#subject').html(data);
                $('#subject').change(function() {
                    var sid = $(this).val();
                    //get student table information
                    $.get("<?=base_url() ?>lecture/assignment/show", {cid : cid, sid: sid}, function(data){
                        $('#data_table').html(data);
                        $('body').find('#dt_basic').dataTable();
                   });

                });
            });
        }else{
            $('#subject').attr('disabled', 'disabled');
        }
    });
</script>

</body>

</html>
