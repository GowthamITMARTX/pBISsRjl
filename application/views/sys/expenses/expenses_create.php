<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('inc/head') ?>
</head>
<body>
<!-- top bar -->
<?php $this->load->view('inc/header') ?>
<!-- main content -->
<div id="main_wrapper">
    <div class="page_bar clearfix">
        <div class="row">
            <div class="col-md-8">
                <h1 class="page_title">Create Expenses Type</h1>
            </div>
        </div>
    </div>
    <nav class="breadcrumbs">
        <ul>
            <li><a href="<?= base_url() ?>">Dashboard</a></li>
            <li class="sep">\</li>
            <li><a href="<?= base_url() ?>sys/expenses/expenses_type_list"> Expenses </a></li>
            <li class="sep">\</li>
            <li>create</li>
        </ul>
    </nav>
    <div class="page_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">

                            <?php
                            $error= isset($error)? $error : $this->session->flashdata('error');
                            $valid= $this->session->flashdata('valid');

                            if(isset($valid)) $error = $valid;

                            if(isset($error)){
                                ?>
                                <div class="alert <?=isset($valid)?  'alert-success' : 'alert-danger'?> alert-dismissable fade in ">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?=$error?>
                                </div>
                                <?php
                            }

                            ?>

                            <form data-parsley-validate method="post">

                                <div class="row">

                                    <div class="col-lg-6">
<!--                                        <div class="form-group">-->
<!--                                            <label for="reg_batch_code">Expenses Code</label>-->
<!--                                            <input type="text" id="reg_batch_code" name="form[code]"-->
<!--                                                   class="form-control"-->
<!--                                                   data-parsley-required="true">-->
<!--                                        </div>-->
                                        <div class="form-group">
                                            <label for="reg_batch_name">Expenses Type</label>
                                            <input type="text" id="reg_batch_name" name="form[title]"
                                                   class="form-control" data-parsley-required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-sep">
                                    <button class="btn btn-primary">Save</button>
                                </div>
                            </form>
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
<!-- parsley.js validation -->
<script src="<?= base_url() ?>assets/lib/Parsley.js/dist/parsley.min.js"></script>
<!-- form validation functions -->
<script src="<?= base_url() ?>assets/js/apps/tisa_validation.js"></script>
</body>

</html>
