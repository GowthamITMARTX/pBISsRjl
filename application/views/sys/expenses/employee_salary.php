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
            <li><a href="<?= base_url() ?>sys/expenses/employee_salary_report"> Expenses </a></li>
            <li class="sep">\</li>
            <li>Employee Expenses</li>
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
                                                   class="form-control" value="<?= date('Y-m-d h:m:s') ?>"
                                                   data-parsley-required="true">
                                        </div>
                                        <div class="form-group">
                                            <label for="reg_batch_code">Employee</label>
                                            <select name="form[emp_id]" class="form-control" onchange="location.href='<?=current_url()?>?emp_id='+$(this).val()" data-parsley-required="true"
                                                    data-parsley-trigger="change">
                                                <option value=""> -------select Employee--------</option>
                                                <?php foreach ($employee as $l): ?>
                                                    <option value="<?= $l->id ?>"  <?= $l->id == $this->input->get('emp_id')?  'selected' : ''  ?> ><?= $l->title ?><?= $l->name ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <?php if($emp): ?>
                                            <table class="table table-responsive table-bordered" >
                                                <tr>
                                                    <td>Name</td>
                                                    <td><?= $emp->title ?><?= ucfirst($emp->name) ?></td>
                                                </tr>
                                                <tr>
                                                    <td>EMP ID </td>
                                                    <td><?= $emp->index ?> <br/></td>
                                                </tr>
                                                <tr>
                                                    <td>EMP NIC </td>
                                                    <td><?= $emp->nic_no ?> <br/></td>
                                                </tr>
                                            </table>
                                        <?php endif; ?>


                                        <div class="form-group">
                                            <label for="reg_batch_name">Voucher No </label>
                                            <input type="text" id="reg_batch_name" name="form[voucher]"
                                                   class="form-control" data-parsley-required="true">
                                        </div>
                                        <div class="form-group">
                                            <label for="reg_batch_name">Salary</label>
                                            <input type="text" id="reg_batch_name" name="form[amount]" value=" <?=($emp)? number_format($emp->salary,2) : "" ?>"
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
    $(function () {
        tisa_maskedInputs.init();
    });

    //* masked inputs
    tisa_maskedInputs = {
        init: function () {
            $(".price").inputmask("decimal", {
                radixPoint: ".",
                groupSeparator: ",",
                digits: 2,
                autoGroup: true
            });
        }
    }
</script>
</body>

</html>
