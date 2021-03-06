<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('inc/head') ?>
    <link rel="stylesheet"
          href="<?= base_url() ?>assets/lib/DataTables/extensions/TableTools/css/dataTables.tableTools.min.css">

</head>
<body>
<!-- top bar -->
<?php $this->load->view('lecture/inc/header') ?>
<!-- main content -->
<div id="main_wrapper">
    <div class="page_content">
        <div class="container-fluid">
            <?= form_open('', array('id' => 'ass_form')) ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">

                        <legend><span><strong> SUBMITTED ASSIGNMENTS</strong></span>
                        </legend>
                    </div>

                    <div class="notification clearfix ">

                    </div>

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row sepH_b ">
                                        <div class="col-sm-4">
                                            <select class="form-control" id="std_cls">
                                                <option value=''>*CLASS</option>
                                                <?php foreach ($class as $c): ?>
                                                    <option value="<?= $c->id ?>"><?= $c->title; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="subject" disabled="disabled">
                                                <option value="">SUBJECTS</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="assignment" name="aid" disabled="disabled">
                                                <option value="">Assignment</option>
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
                        <div class="panel-heading clearfix ">ASSIGNMENTS
                            <div class="pull-right"><a class="btn btn-success  " onclick="form.submit($(this)) "
                                                       data-for="#ass_form"> Save</a></div>
                        </div>

                        <div class="panel-body" id="data_table">
                            <table id="dt_basic" class=" table table-striped table-bordered ">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="20%">Index No</th>
                                    <th width="25%">Name</th>
                                    <th width="15%">Final Date</th>
                                    <th width="5%">File</th>
                                    <th width="30%">Result</th>
                                </tr>
                                </thead>
                                <tbody id="tbl_data">

                                </tbody>

                            </table>

                        </div>
                    </div>

                </div>
            </div>
            <?= form_close() ?>
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
    $('#std_cls').change(function () {
        var cid = $(this).val();

        if (cid != null && cid != '') {
            $('#subject').removeAttr('disabled');
            $.get("<?=base_url() ?>lecture/students/subject", {cid: cid}, function (data) {
                $('#subject').html(data);
            });
        } else {
            $('#subject').attr('disabled', 'disabled');
        }
    });
    $('#subject').change(function () {
        var sid = $(this).val();
        //get assignment sort by class , subject and assignment
        if (sid != null && sid != '') {
            $.get("<?=base_url() ?>lecture/assignment/show", {sid: sid}, function (data) {
                $('#assignment').html(data).removeAttr('disabled');
            });
        } else {
            $('#assignment').attr('disabled', 'disabled');
        }

    });
    $('#assignment').change(function () {
        var aid = $(this).val();
        $.get("<?=base_url() ?>lecture/assignment/show_student", {aid: aid}, function (data) {
            $('#data_table').html(data);
            $('body').find('#dt_basic').dataTable();
        });

    });

    form = {
        submit: function (self) {
            $('<i>').attr({
                id: 'loader',
                class: 'ion-loading-a',
                style: 'margin:5px'
            }).appendTo(self);
            var form = $(self.data('for'));
            $.ajax({
                url: URL.current,
                type: "post",
                dataType: "json",
                data: form.serializeArray(),
                success: function (data) {
                    $("#loader").remove();
                    if (data.success) {
                        $('.notification').html('<div style="margin: 5px" class="alert alert-success"></i> ' + data['success'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                    }
                    if (data.error) {
                        $('.notification').html('<div style="margin: 5px" class="alert alert-danger"></i> ' + data['error'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                    }
                }
            })
            return false;
        }
    }

</script>

</body>

</html>
