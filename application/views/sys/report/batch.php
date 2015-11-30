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
                                            <select class="form-control" id="batch">
                                                <option value=''>*BATCH</option>
                                                <?php foreach ($batch as $b): ?>
                                                    <option value="<?= $b->id ?>"><?= $b->title; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="filter" disabled="disabled" onchange="report.print(this)">
                                                <option value="">FILTER BY</option>
                                                <option value="month">MONTH</option>
                                                <option value="year">YEAR</option>
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
                        <div class="panel-heading">BATCH REPORT</div>
                        <div class="panel-body" id="data_table">
                            <table id="dt_tableTools" class=" table table-striped table-bordered ">
                                <thead>
                                <tr>
                                    <th width="10%">#</th>
                                    <th width="20%">Course</th>
                                    <th width="30%">Class</th>
                                    <th width="30%">Total Fee</th>
                                    <th width="10%"> Paid toal</th>
                                    <th width="10%"> Balance</th>
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

    $('#batch').change(function() {
        var id = $(this).val();
        $('#filter').removeAttr('disabled');
    });


    report = {
        print: function(self){
            var bid = $('#batch').val();
            var filter = self.value;

            $.ajax({
                url: URL.current,
                type: "POST",
                data: "bid="+bid+"&filter="+filter,
                success: function(data){
                   $('#data_table').html(data);
                   $('body').find('#dt_tableTools').dataTable();

                }

            });
        }
    }

</script>

</body>

</html>
