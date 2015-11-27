<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/bootstrap-datepicker/css/datepicker3.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <legend>
                            <span><strong> ASSIGNMENT </strong></span>
                        </legend>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php
                            $error = isset($error) ? $error : $this->session->flashdata('error');
                            $valid = $this->session->flashdata('valid');

                            if (isset($valid)) $error = $valid;

                            if (isset($error)) {
                                ?>
                                <div
                                    class="alert <?= isset($valid) ? 'alert-success' : 'alert-danger' ?> alert-dismissable fade in ">
                                    <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                    <?= $error ?>
                                </div>
                                <?php
                            }

                            ?>
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
                        <div class="panel-heading">ASSIGNMENTS <span id="btn_id"> </span></div>
                        <div class="panel-body" id="data_table">
                            <table id="dt_basic" class=" table table-striped table-bordered ">
                                <thead>
                                <tr>
                                    <th width="10%">#</th>
                                    <th width="20%">Title</th>
                                    <th width="30%">End Date</th>
                                    <th width="30%">End Time</th>
                                    <th width="10%"> Edit</th>
                                    <th width="10%"> Attachment</th>
                                </tr>
                                </thead>
                                <tbody id="xtbody">

                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">

                    <?php echo form_open_multipart(''); ?>
                    <h2 class="form-signin-heading">Create Assignment</h2>
                    <input type="hidden" name="id" value="" id="id" >


                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" id="title" class="form-control" placeholder="Title" required name="title"/>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control" id="description" placeholder="Message" name="msg"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Pdf
                            <small>( size less then 2 mb )</small>
                        </label>

                        <div class='input-group date'>
                            <input type='file' class="form-control" name="userfile"/>
                        </div>
                    </div>
                    <!-- DATE TIME PICKER-->
                    <div class="row">
                        <div class='col-sm-6'>
                            <div class="form-group">
                                End Date
                                <div class='input-group date'>
                                    <input type='text' class="form-control" name="rdate" id='date'/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                                </div>
                            </div>
                        </div>
                        <div class='col-sm-6'>
                            End Time

                            <div class="input-group bootstrap-timepicker">
                                <input id="time" type="text" class="form-control" name="rtime"/>
                                <span class="input-group-btn">
                                     <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="cls_id" value="" id="cls"/>
                    <input type="hidden" name="sub_id" value="" id="std"/>
                    <input type="hidden" name="send" value="" id="send"/>

                    <button class="btn btn-lg btn-primary btn-block" type="submit">Send</button>
                    <?= form_close(); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
<!-- datapicker -->
<script src="<?= base_url() ?>assets/lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?= base_url() ?>assets/lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script>

    // load subjects.
    $('#std_cls').change(function () {
        var cid = $(this).val();

        if (cid != null && cid != '') {
            $('#subject').removeAttr('disabled');
            $.get("<?=base_url() ?>lecture/students/subject", {cid: cid}, function (data) {
                $('#subject').html(data);
            });
        }
        else {
            $('#subject').attr('disabled', 'disabled');
        }
    });

    $('#subject').change(function () {
        var sid = $(this).val();
        var cid = $('#std_cls').val();
        $('#std').val(sid);
        $.get("<?=base_url() ?>lecture/assignment/all", {cid: cid, sid: sid}, function (data) {
                $('#data_table').html(data);
                $('body').find('#dt_basic').dataTable();
                $('#btn_id').html('<button class="btn btn-primary btn-sm" style="float: right" data-toggle="modal" data-target="#myModal" onClick="send_all()">Create New Assignment</button>');
                $('#cls').attr('value', cid);
            }
        );
    });

    function sid(id) {
        stid = id;
        $('#std').attr('value', stid);
        $('#send').attr('value', 'single');
    }
    function send_all() {
        $('#id').val("");
        $('#title').val("");
        $('#description').val("");
        $('#date').val("");
        $('#time').val("");
    }


    assaignment = {
        edit: function (self) {
            obj = self.data('object');
           $('#id').val(obj.id);
           $('#title').val(obj.title);
           $('#description').val(obj.description);
           $('#date').val(obj.date);
           $('#time').val(obj.time);
        },
        remove : function(self){
            if(confirm("Are You Sure ???")){
                obj = self.data('object');
                $.get("<?=base_url() ?>lecture/assignment/remove", { a_id: obj.id}, function (data) {
                        self.closest('tr').remove();
                    }
                );
            }

        }
    };


    $('#date').datepicker();
    $('#time').timepicker();
</script>

</body>

</html>
