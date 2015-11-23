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
                                <div class="panel-heading"><strong>STUDENT INFO</strong></div>
                                <div class="panel-body"  >
                                    <table class="table">
                                        <tr>
                                            <td><label>Index :</label>
                                                <?=$student->index; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>Name :</label>
                                                <?=$student->title.$student->name; ?>
                                            </td>
                                            </tr>
                                         <tr>
                                            <td><label>Email :</label>
                                                <?=$student->email; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                     </div>
                </div>
          </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                                <div class="panel-heading"><strong>REMARKS</strong></div>
                                <div class="panel-body" id="data_table" >
                    <table id="dt_basic" class=" table table-striped table-bordered ">
                                       <thead>
                                            <tr>
                                                <th width="10%">#</th>
                                                <th width="20%">Title</th>
                                                <th width="40%">Description</th>
                                                <th width="15%">Date</th>
                                                <th width="15%">Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach($record as $k=>$row): ?>
                                        <tr> 
                                        <td> <?=$k+1 ?></td> 
                                        <td><?=$row->title;  ?></td>    
                                        <td><?=$row->description;  ?></td>
                                        <td> <?=$row->date; ?></td>
                                        <td> <?=$row->time; ?></td>
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
<script type="text/javascript">
    $('#dt_basic').dataTable();
</script>
</body>
</html>