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
                <h1 class="page_title"> Expenses </h1>
            </div>
        </div>
    </div>
    <nav class="breadcrumbs">
        <ul>
            <li><a href="<?= base_url() ?>">Dashboard</a></li>
            <li class="sep">\</li>
            <li><a href="<?= base_url() ?>sys/expenses/income_list"> Income </a></li>
            <li class="sep">\</li>
            <li>Other Expenses</li>
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
                                        <div class="form-group">
                                            <label for="reg_batch_code">Current Date</label>
                                            <input type="text" id="reg_batch_code" name="form[current_date]" readonly
                                                   class="form-control" value="<?= $result->current_date == ""? date('Y-m-d h:m:s') : $result->current_date ?>"
                                                   data-parsley-required="true">
                                        </div>
                                        <div class="form-group">
                                            <label for="reg_batch_name">Note</label>
                                            <textarea class="form-control" name="form[note]" ><?= $result->note ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="reg_batch_name">Amount</label>
                                            <input type="text" id="reg_batch_name" name="form[amount]" value="<?= $result->amount ?>"
                                                   class="form-control price " data-parsley-required="true">
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
<!-- masked inputs -->
<script src="<?= base_url() ?>assets/lib/jquery.inputmask/dist/jquery.inputmask.bundle.min.js"></script>
<script>
    //* masked inputs
    maskedInputs = {
        val:null,
        init: function () {
            $(".price").inputmask("decimal", {
                radixPoint: ".",
                groupSeparator: ",",
                digits: 2,
                autoGroup: true
            }).on('keydown',function(e){
                this.val =$(this).val();
            }).on('keyup',function(){
                v = $(this).val().replace(",", "");
                if($(this).data('max-value') < v  )
                    $(this).val($(this).data('max-value'));
            });
        }
    }
    maskedInputs.init();
</script>

</body>

</html>
