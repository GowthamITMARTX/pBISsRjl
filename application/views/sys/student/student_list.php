<!DOCTYPE html>
<html>
<head>
    <title>Student List <?= date("d-m-Y") ?> </title>
    <?php $this->load->view('inc/head') ?>
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/DataTables/extensions/TableTools/css/dataTables.tableTools.min.css">
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
                        <div class="panel-heading">Student List
                            <div  class="site_nav" >
                                <a href="<?= base_url() ?>">Dashboard</a>
                                &raquo; Student
                            </div>
                        </div>
                        <div class="notification clearfix ">

                        </div>
                        <div class="panel-body">
                            <table id="dt_tableTools" class=" table table-striped table-bordered ">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Index No</th>
                                    <th>Full Name</th>
                                    <th>NIC</th>
                                    <th>Create Date</th>
                                    <th>Create By</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($records as $k => $row): ?>
                                    <tr>
                                        <td><?= $k+1 ?></td>
                                        <td> <?= $row->index ?> </td>
                                        <td> <?= $row->name ?> </td>
                                        <td><?= $row->nic_no  ?></td>
                                        <td><?= $row->create_date ?></td>
                                        <td><?= $row->user ?></td>
                                        <td> <a href="<?= current_url() ?>/edit/?id=<?= $row->id ?>" > <span class="ion-edit "></span>
                                                <span class="nav_title">Edit</span> </a>
                                             <a onclick="student.delete($(this))" data-id="<?=$row->id?>" style="float:right"><span class="fa fa-times"></span> <span class="nav_title">Delete</span> </a>
                                         </td>
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

<script type="text/javascript">
    student = {
        delete: function(self){
          var id = self.data('id');
            var conf = confirm('Are You Sure Do You Want to Delete this Student ?');
            if(conf == true){
                $.ajax({
                    url: URL.current+'/delete',
                    type: "post",
                    dataType: "json",
                    data: 'id='+id,
                    success: function (data){
                        if(data.success){
                            $('.notification').html('<div style="margin: 5px" class="alert alert-success"></i> ' + data['success'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                            self.parents('tr').remove();
                        }
                        if(data.error){
                            $('.notification').html('<div style="margin: 5px" class="alert alert-danger"></i> ' + data['error'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                        }

                    }

                });
            }

        }
    }
</script>

</body>

</html>