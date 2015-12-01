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
                                                <label>YEAR</label>
                                                <select class="form-control" id="year" disabled="disabled" >

                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label>MONTH</label>
                                                <select class="form-control" id="month" disabled="disabled" >

                                                    <option value="1" id="1">January</option>
                                                    <option value="2" id="2">February</option>
                                                    <option value="3" id="3">March</option>
                                                    <option value="4" id="4">April</option>
                                                    <option value="5" id="5">May</option>
                                                    <option value="6" id="6">June</option>
                                                    <option value="7" id="7">July</option>
                                                    <option value="8" id="8">August</option>
                                                    <option value="9" id="9">September</option>
                                                    <option value="10" id="10">October</option>
                                                    <option value="11" id="11">November</option>
                                                    <option value="12" id="12">December</option>
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



<script type="text/javascript">

    report = {
        class: function(self){
            var bid = self.value;

            if(bid != ""){
                $('#filter').removeAttr('disabled');
            }
            else{
                $('#filter').attr('disabled', 'disabled');
                $('#year').attr('disabled', 'disabled');
                $('#month').attr('disabled', 'disabled');
                $('#start').attr('disabled', 'disabled');

            }
        },

        filter: function(self){
            var filter = self.value;
            var d = new Date();
            var m = d.getMonth()+1;

            $('#month').find('#'+m).attr('selected', 'selected');

            if(filter != ""){
                if(filter == "month"){
                    $('#month').removeAttr('disabled');
                    $('#year').removeAttr('disabled');

                }
                else if(filter == "year"){
                    $('#year').removeAttr('disabled');
                    $('#month').attr('disabled', 'disabled');
                }

                $.ajax({
                    url: URL.current,
                    type: "POST",
                    data: "filter="+filter,
                    success: function(data){
                        $('#year').html(data);
                        $('#start').removeAttr('disabled');
                    }

                });
            }else{
                $('#month').attr('disabled', 'disabled');
                $('#year').attr('disabled', 'disabled');
                $('#start').attr('disabled', 'disabled');
            }
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
<!-- datatables -->
<script src="<?= base_url() ?>assets/lib/DataTables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/lib/DataTables/media/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/lib/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<!-- datatables functions -->
<script src="<?= base_url() ?>assets/js/apps/tisa_datatables.js"></script>

</body>

</html>
