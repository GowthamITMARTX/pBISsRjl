<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('inc/head') ?>
    <link rel="stylesheet"
          href="<?= base_url() ?>assets/lib/DataTables/extensions/TableTools/css/dataTables.tableTools.min.css">

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
                                <div class="col-lg-12">
                                    <div class="form-group row sepH_b ">
                                        <div class="col-sm-4">
                                            <select class="form-control" onchange="report.class(this)" id="batch">
                                                <option value=''>*BATCH</option>
                                                <?php foreach ($batch as $b): ?>
                                                    <option value="<?= $b->id ?>"><?= $b->title; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="filter" disabled="disabled" onchange="report.filter(this)">
                                                <option value="">FILTER BY</option>
                                                <option value="month">MONTH</option>
                                                <option value="year">YEAR</option>
                                            </select>
                                        </div>

                                    </div>


                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group row sepH_b ">
                                        <div class="clearfix">
                                            <div class="col-sm-4">
                                                <select class="form-control" id="year" disabled="disabled" >
                                                    <option value="">YEAR</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <select class="form-control" id="month" disabled="disabled" >
                                                    <option value="">MONTH</option>
                                                    <option value="1" <?php if(date('m') == 1){echo "selected";}?> >January</option>
                                                    <option value="2" <?php if(date('m') == 2){echo "selected";}?>>February</option>
                                                    <option value="3" <?php if(date('m') == 3){echo "selected";}?>>March</option>
                                                    <option value="4" <?php if(date('m') == 4){echo "selected";}?>>April</option>
                                                    <option value="5" <?php if(date('m') == 5){echo "selected";}?>>May</option>
                                                    <option value="6" <?php if(date('m') == 6){echo "selected";}?>>June</option>
                                                    <option value="7" <?php if(date('m') == 7){echo "selected";}?>>July</option>
                                                    <option value="8" <?php if(date('m') == 8){echo "selected";}?>>August</option>
                                                    <option value="9" <?php if(date('m') == 9){echo "selected";}?>>September</option>
                                                    <option value="10" <?php if(date('m') == 10){echo "selected";}?>>October</option>
                                                    <option value="11" <?php if(date('m') == 11){echo "selected";}?>>November</option>
                                                    <option value="12" <?php if(date('m') == 12){echo "selected";}?>>December</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <button id="start"class="btn btn-success " disabled="disabled" onclick="report.print()">FILTER</button>
                                            </div>
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
                        <div class="panel-heading">BATCH REPORT</div>
                        <div class="panel-body" id="data_table">
                            <table id="dt_tableTools" class=" table table-striped table-bordered ">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="30%">Course</th>
                                    <th width="20%">Class</th>
                                    <th width="15%">Total Fee</th>
                                    <th width="15%"> Paid toal</th>
                                    <th width="15%"> Balance</th>
                                </tr>
                                </thead>
                                <tbody>

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
</div>
<?php $this->load->view('inc/foot') ?>
<!-- datatables -->
<script src="<?= base_url() ?>assets/lib/DataTables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/lib/DataTables/media/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/lib/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="<?= base_url() ?>assets/lib/DataTables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<!-- datatables functions -->
<script src="<?= base_url() ?>assets/js/apps/tisa_datatables.js"></script>

<script type="text/javascript">

    report = {
        class: function(self){
          var cid = self.value;
            $('#filter').removeAttr('disabled');
        },

        filter: function(self){
            var filter = self.value;

            $.ajax({
                url: URL.current,
                type: "POST",
                data: "filter="+filter,
                success: function(data){
                    $('#year').removeAttr('disabled');
                    if(filter == "month"){
                        $('#month').removeAttr('disabled');
                    }
                    else{
                        $('#month').attr('disabled', 'disabled');
                    }
                    $('#year').html(data);
                    $('#start').removeAttr('disabled');
                }

            });
        },

        print: function(){
            var bid = $('#batch').val();
            var filter = $('#filter').val();
            var year = $('#year').val();

            if(filter == 'month'){
            var month = $('#month').val();
                $.ajax({
                    url: URL.current,
                    type: "POST",
                    data: "bid="+bid+"&month="+month+"&year="+year,
                    success: function(data){
                        $('#data_table').html(data);
                        $('body').find('#dt_tableTools').dataTable();

                    }

                });
            }
            else if(filter == 'year'){
                $.ajax({
                    url: URL.current,
                    type: "POST",
                    data: "bid="+bid+"&year="+year,
                    success: function(data){
                        $('#data_table').html(data);
                        $('body').find('#dt_tableTools').dataTable();

                    }

                });
            }


        }
    }

</script>

</body>

</html>
