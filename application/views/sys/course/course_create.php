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
                                <legend><span>Create Course</span>

                                    <div  class="site_nav" >
                                        <a href="<?= base_url() ?>">Dashboard</a>
                                        &raquo;<a href="<?= base_url() ?>sys/course"> course </a>
                                        &raquo; create
                                    </div>
                                </legend>

                            </fieldset>

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

                            <form data-parsley-validate method="post" enctype="multipart/form-data">

                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="reg_course_name">Course Code</label>
                                            <input type="text" id="reg_course_name" name="form[code]"
                                                   class="form-control"
                                                   data-parsley-required="true">
                                        </div>
                                        <div class="form-group">
                                            <label for="reg_course_name">Course Name</label>
                                            <input type="text" id="reg_course_name" name="form[title]"
                                                   class="form-control" data-parsley-required="true">
                                        </div>
                                        <div class="form-group">
                                            <label for="reg_course_name">Upload Image</label>
                                            <input type="file" id="reg_course_name" name="userfile"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="reg_course_name">Course Objectives</label>
                                            <textarea name="form[description]" id="msg_content" cols="30" rows="12" class="form-control"></textarea>
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
<!-- wysiwg editor -->
<script src="<?= base_url() ?>assets/lib/ckeditor/ckeditor.js"></script>
<!-- form validation functions -->
<script src="<?= base_url() ?>assets/js/apps/tisa_validation.js"></script>

<script type="text/javascript">
    $(function() {
        if ($('#msg_content').length) {
            CKEDITOR.replace( 'msg_content', {
                toolbarGroups: [
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ] },
                    { name: 'forms' },
                    { name: 'links' },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                    '/',
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'styles' },
                    { name: 'insert' },
                    { name: 'colors' },
                    { name: 'tools' },
                    { name: 'others' },
                ]
            });

            CKEDITOR.config.autoParagraph = false;
        }
    });
</script>

</body>

</html>
