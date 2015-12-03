<!DOCTYPE html>
<html>
<head>
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
                            <span><strong> BATCH REPORT </strong></span>
                        </legend>

                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <?= form_open('',array('id'=>'filter_form')) ?>
                                <div class="col-lg-12">
                                    <div class="form-group row sepH_b ">
                                        <div class="col-sm-3">
                                            <label>COURSE</label>
                                            <select class="form-control" name="course"  onchange="report.course($(this))" id="course">
                                                <option value='0'>*COURSE</option>
                                                <?php foreach ($course as $c): ?>
                                                    <option value="<?= $c->id ?>"><?= $c->title; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>BATCH</label>
                                            <select class="form-control" name="batch" onchange="report.batch($(this))" id="batch">
                                                <option value='0'>*BATCH</option>
                                                <?php foreach ($batch as $b): ?>
                                                    <option value="<?= $b->id ?>"><?= $b->title; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>LECTURE</label>
                                            <select class="form-control" name="lecture" onchange="report.lecture($(this))" id="lecture">
                                                <option value='0'>*LECTURE</option>
                                                <?php foreach ($lecture as $b): ?>
                                                    <option value="<?= $b->id ?>"><?= $b->title; ?><?= $b->name ; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>SUBJECT <i class="fa fa-refresh fa-spin hidden " ></i> </label>
                                            <select class="form-control" name="subject" onchange="report.subject($(this))" id="subject">
                                                <option value='0'>*SUBJECT</option>
                                                <?php foreach ($subject as $b): ?>
                                                    <option value="<?= $b->id ?>"><?= $b->title; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group row sepH_b ">
                                        <div class="clearfix">
                                            <div class="col-sm-4">
                                                <label>YEAR</label>
                                                <select class="form-control" id="year" name="year"   >
                                                    <option value='0'>* Year</option>
                                                    <?php
                                                    foreach($years as $y){
                                                        if($y->year == date('Y')){
                                                            echo '<option value='.$y->year.' selected>'.$y->year.'</option>';
                                                        }else{
                                                            echo '<option value='.$y->year.'>'.$y->year.'</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label>MONTH </label>
                                                <select class="form-control" id="month"  name="month"  >
                                                    <option value="0"  >*MONTH</option>
                                                    <option value="01" <?= date('m') == 1 ? 'selected' :'' ?>   >January</option>
                                                    <option value="02" <?= date('m') == 2 ? 'selected' :'' ?>    >February</option>
                                                    <option value="03"  <?= date('m') == 3 ? 'selected' :'' ?>  >March</option>
                                                    <option value="04" <?= date('m') == 4 ? 'selected' :'' ?>   >April</option>
                                                    <option value="05" <?= date('m') == 5 ? 'selected' :'' ?>   >May</option>
                                                    <option value="06" <?= date('m') == 6 ? 'selected' :'' ?>   >June</option>
                                                    <option value="07" <?= date('m') == 7 ? 'selected' :'' ?>   >July</option>
                                                    <option value="08"  <?= date('m') == 8 ? 'selected' :'' ?>  >August</option>
                                                    <option value="09" <?= date('m') == 9 ? 'selected' :'' ?>   >September</option>
                                                    <option value="10" <?= date('m') == 10 ? 'selected' :'' ?>   >October</option>
                                                    <option value="11" <?= date('m') == 11 ? 'selected' :'' ?>    >November</option>
                                                    <option value="12" <?= date('m') == 12 ? 'selected' :'' ?>   >December</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label> &nbsp; </label>
                                                <button type="button" class="btn btn-success " onclick="report.filter('#filter_form')" >FILTER</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?= form_close() ?>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">BATCH REPORT</div>
                        <div class="panel-body" id="data_table">

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



<script type="text/javascript">

    report = {
        obj :{
            cid : 0,
            bid : 0,
            sid : 0,
            lid : 0
        },
        course: function(self){
           this.obj.cid = self.val();
            this.setSubject();
        },
        batch: function(self){
            this.obj.bid = self.val();
            this.setSubject();
        },
        lecture: function(self){
            this.obj.lid = self.val();
            this.setSubject();
        },
        subject: function(self){
            this.obj.sid = self.val();
        },
        setSubject: function(){
            $(".fa-refresh").removeClass('hidden');
            $.ajax({
                url : URL.base+"sys/subject/filter",
                data : this.obj,
                success : function(data){
                    $(".fa-refresh").addClass('hidden');
                    $('#subject').html(data);
                }
            });
        },


        log : function(){
            console.log( " course : " + this.obj.cid);
            console.log(" batch : " +this.obj.bid);
            console.log(" subject : " +this.obj.sid);
            console.log(" lecture : " +this.obj.lid);
        }
        ,
        filter : function(frm){
            $.ajax({
                url : URL.base+"sys/report/filterData",
                data : $(frm).serializeArray() ,
                success : function(data){
                    $("#data_table").html(data);
                }
            });

        }



    }

</script>
<!-- datatables -->
<script src="<?= base_url() ?>assets/lib/DataTables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/lib/DataTables/media/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/lib/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<!-- datatables functions -->
<script src="<?= base_url() ?>assets/js/apps/tisa_datatables.js"></script>

</body>

</html>
