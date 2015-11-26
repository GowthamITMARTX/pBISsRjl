<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/bootstrap-datepicker/css/datepicker3.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
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

                        <legend><span><strong> STUDENTS INFORMATION</strong></span>
                        </legend>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php if(isset($success)):  ?>
                                <div class="alert alert-success" role="alert"><strong> <?=$success; ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                </div>
                            <?php elseif(isset($error)): ?>
                                <div class="alert alert-danger" role="alert"><strong> *<?=$error; ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                </div>
                            <?php endif; ?>
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
                        <div class="panel-heading" >STUDENTS <span id="all_rmk"><span id="btn_id"></span> </span></div>
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

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" >ALL REMARKS</div>
                        <div class="panel-body" id="rmk_data">
                            <table id='rmk_tbl' class=" table table-striped table-bordered ">
                                <thead>
                                <tr>
                                    <th width="10%">#</th>
                                    <th width="20%">Title</th>
                                    <th width="40%" >Description</th>
                                    <th width="15%"> Date </th>
                                    <th width="15%"> Time </th>
                                </tr>
                                </thead>
                                <tbody id='rmk_bdy'>

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


                    <?=form_open('', 'class= "form-signin"') ?>
                    <h2 class="form-signin-heading">Send Your Remark</h2>
                    <input type="text" id="inputEmail" class="form-control" placeholder="Title" required name="title" /><br />
                    <textarea class="form-control" placeholder="Message" name="msg"></textarea><br />
                    <!-- DATE TIME PICKER-->
                    <div class="row">
                        <div class='col-sm-6'>
                            <div class="form-group">
                                <div class='input-group date' >
                                    <input type='text' class="form-control" name="rdate" id='datetimepicker1'/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                                </div>
                            </div>
                        </div>
                        <div class='col-sm-6'>
                            <div class="input-group bootstrap-timepicker">
                                <input id="tp-default" type="text" class="form-control" name="rtime" />
                <span class="input-group-btn">
                     <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                </span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="cls_id" value="" id="cls" />
                    <input type="hidden" name="sub_id" value="" id="sub_id" />
                    <input type="hidden" name="stid" value="" id="std" />
                    <input type="hidden" name="send" value="" id="send" />

                    <button class="btn btn-lg btn-primary btn-block" type="submit">Send</button>
                    <?=form_close();  ?>
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
    $('#std_cls').change(function() {
        var cid = $(this).val();

        if(cid != null && cid != ''){
            $('#subject').removeAttr('disabled');
            $.get("<?=base_url() ?>lecture/students/subject", {cid : cid}, function(data){
                $('#subject').html(data);

            });
        }else{
            $('#subject').attr('disabled', 'disabled');
        }
    });
    $('#subject').change(function() {
        var sid = $(this).val();
        var cid = $('#std_cls').val();
        //get student table information
        $.get("<?=base_url() ?>lecture/students/all", {cid : cid, sid: sid}, function(data){
            $('#data_table').html(data);
            $('body').find('#dt_basic').dataTable();
            // remove send remark to all student button while table haven't any student details
            $('#btn_id').html('<button class="btn btn-primary btn-sm" style="float: right" data-toggle="modal" data-target="#myModal" onClick="send_all()">Send Remark to All Students</button>');
            if($('#v_rmk').length == false){
                $('#btn_id').remove();
                $('#all_rmk').html('<span id="btn_id"></span>');
            }

            $('#cls').attr('value', cid);
            $('#sub_id').attr('value', sid);

        });

        $.get("<?=base_url() ?>lecture/students/cls_remarks", {cls_id : cid, sub_id: sid}, function(data){
            $('#rmk_data').html(data);
            $('body').find('#rmk_tbl').dataTable();

        });

    });

    function sid(id){
        stid = id;
        $('#std').attr('value', stid);
        $('#send').attr('value', 'single');
    }
    function send_all(){
        $('#send').attr('value', 'all');
    }

    function v_rmk(std_id){
        var cls_id = $('#std_cls').val();
        var sub_id = $('#subject').val();

        window.location = "<?=base_url().'lecture/students/remarks' ?>?std_id="+std_id+"&cls_id="+cls_id+"&sub_id="+sub_id;
    };

    $('#datetimepicker1').datepicker();
    $('#tp-default').timepicker();
    $('#rmk_tbl').dataTable();
</script>

</body>

</html>
