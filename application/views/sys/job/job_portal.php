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
                                <legend><span>Create Job Portal</span>

                                    <div  class="site_nav" >
                                        <a href="<?= base_url() ?>">Dashboard</a>
                                        &raquo;<a href="<?= base_url() ?>sys/jobs"> Jobs </a>
                                        &raquo; create
                                    </div>
                                </legend>

                            </fieldset>

                            <?php if($success) : ?>
                                <div class="alert alert-success alert-dismissable fade in ">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?=$success?>
                                </div>
                             <?php elseif(isset($error)):?>
                                    <div class="alert alert-danger alert-dismissable fade in ">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <?=$error?>
                                    </div>


                            <?php endif; ?>

                            <form data-parsley-validate method="post">

                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="reg_course_name">Job Title</label>
                                            <input type="text" id="reg_course_name" name="form[title]"
                                                   class="form-control"
                                                   data-parsley-required="true" value="<?php echo isset($result) ? $result->title : ''; ?>">
                                          <?php if(isset($result)) :?>
                                            <input type="hidden" value="<?=$result->id?>" name="jid" />
                                          <?php endif;?>
                                        </div>
                                        <div class="form-group">
                                            <label for="reg_course_name">Job Description</label>
                                            <textarea name="form[description]" id="msg_content" cols="30" rows="12" class="form-control" >
                                                <?php echo isset($result) ? $result->description : ''; ?>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-sep">
                                    <input type="submit" class="btn btn-primary" value="Save" />
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
