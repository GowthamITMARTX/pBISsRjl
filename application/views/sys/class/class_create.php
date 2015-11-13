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
    <div class="page_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <fieldset>
                                <legend><span>Create Class</span>

                                    <div class="site_nav">
                                        <a href="<?= base_url() ?>">Dashboard</a>
                                        &raquo;<a href="<?= base_url() ?>sys/cls"> Class </a>
                                        &raquo; create
                                    </div>
                                </legend>
                            </fieldset>

                            <?php
                            $error = isset($error) ? $error : $this->session->flashdata('error');
                            $valid = $this->session->flashdata('valid');

                            if (isset($valid)) $error = $valid;

                            if (isset($error)) {
                                ?>
                                <div
                                    class="alert <?= isset($valid) ? 'alert-success' : 'alert-danger' ?> alert-dismissable fade in ">
                                    <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                    <?= $error ?>
                                </div>
                                <?php
                            }

                            ?>

                            <form data-parsley-validate method="post">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="reg_class_code">Batch</label>
                                            <select name="form[b_id]" class="form-control" data-parsley-required="true"
                                                    data-parsley-trigger="change">
                                                <option value=""> -------select batch--------</option>
                                                <?php foreach ($batches as $batch): ?>
                                                    <option value="<?= $batch->id ?>"  <?= $result->b_id ==  $batch->id ? "selected":""?> ><?= $batch->title ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="reg_class_code">Course</label>
                                            <select name="form[c_id]" class="form-control" data-parsley-required="true"
                                                    data-parsley-trigger="change">
                                                <option value=""> -------select batch--------</option>
                                                <?php foreach ($courses as $course): ?>
                                                    <option value="<?= $course->id ?>"  <?= $result->c_id ==  $course->id ? "selected":""?> ><?= $course->title ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="reg_class_code">Class Code</label>
                                            <input type="text" id="reg_class_code" name="form[code]"
                                                   class="form-control" value="<?= $result->code ?>" <?= $this->input->get('id') ? 'disabled' : '' ?>
                                                   data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="reg_class_name">Class Name</label>
                                            <input type="text" id="reg_class_name" name="form[title]" value="<?= $result->title ?>"
                                                   class="form-control" data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="class_fee">Class Total Fee</label>
                                            <input type="text" id="class_fee" name="form[fee]" value="<?= number_format($result->fee,2,".",",")  ?>"
                                                   class="form-control price"
                                                   data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="class_initial_fee">Class Initial Amount</label>
                                            <input type="text" id="class_initial_fee" name="form[initial_amount]"  value="<?= number_format($result->initial_amount,2,".",",")  ?>"
                                                   class="form-control price" data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="subjects">Subjects And Lecture Pool </label>
                                            <table class="table">
                                                <thead>
                                                <th>Subject</th>
                                                <th>Lecture</th>
                                                <th>Subject Fee</th>
                                                </thead>
                                                <?php foreach ($subjects as $subject):
                                                    if(isset($cls_pool) && !empty($cls_pool) ){
                                                        foreach($cls_pool as $k => $cls){
                                                            if($cls->sid == $subject->id){
                                                                $sid = $cls->sid ;
                                                                $lid = $cls->lid ;
                                                                $amount = $cls->amount ;
                                                                unset($cls_pool[$k]);
                                                                break;
                                                            }else{
                                                                $sid = 0 ;
                                                                $lid = 0 ;
                                                                $amount = 0 ;
                                                            }
                                                        }
                                                    }else{
                                                        $sid = 0 ;
                                                        $lid = 0 ;
                                                        $amount = 0 ;
                                                    }


                                                    ?>
                                                    <tr>
                                                        <th>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" class="sub_list" value="<?= $subject->id ?>"
                                                                           name="sub[<?= $subject->id ?>][sid]" <?= $subject->id == $sid ? "checked" : "" ?> >
                                                                    <?= $subject->title ?>
                                                                </label>
                                                            </div>
                                                        </th>
                                                        <th>
                                                            <select class="form-control" <?= $lid == 0 ? "disabled" : "" ?>
                                                                    name="sub[<?= $subject->id ?>][lid]">
                                                                <?php foreach ($subject->lec as $lec): ?>
                                                                    <option <?= $lec->id == $lid ?"selected":""?>
                                                                        value="<?= $lec->id ?>"> <?= $lec->title ?><?= $lec->name ?> </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </th>
                                                        <td>
                                                            <input type="text"  class="form-control price"  <?= $amount == 0 ? "disabled" : "" ?>
                                                                   name="sub[<?= $subject->id ?>][amount]" value="<?= $amount ?>" >
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </table>
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
<!-- masked inputs -->
<script src="<?= base_url() ?>assets/lib/jquery.inputmask/dist/jquery.inputmask.bundle.min.js"></script>
<script>
    $(function () {
        subject.init();
        maskedInputs.init();
    });
    subject = {
        init: function () {
            $('.sub_list').click(function () {
                $(this).closest('tr').find('input[type=text],select').prop('disabled', !$(this).is(':checked'));
            });
        }
    };
    //* masked inputs
    maskedInputs = {
        init: function () {
            if ($('.price').length) {
                $(".price").inputmask("decimal", {
                    radixPoint: ".",
                    groupSeparator: ",",
                    digits: 2,
                    autoGroup: true
                });
            }
        }
    }
</script>
</body>

</html>
