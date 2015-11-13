<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('inc/head') ?>
    <!-- 2col multiselect -->
    <link href="<?=base_url()?>assets/lib/multi-select/css/multi-select.css" rel="stylesheet">
    <!-- main stylesheet -->
    <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet" media="screen">
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
                                <legend><span>Create Batch</span>

                                    <div class="site_nav">
                                        <a href="<?= base_url() ?>">Dashboard</a>
                                        &raquo;<a href="<?= base_url() ?>sys/batch"> Batch </a>
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

                            <form data-parsley-validate method="post">

                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="reg_batch_code">Lecture</label>
                                            <select name="form[lec_id]" class="form-control" onchange="location.href='<?=current_url()?>?lec_id='+$(this).val()" data-parsley-required="true"
                                                    data-parsley-trigger="change">
                                                <option value=""> -------select lecture--------</option>
                                                <?php foreach ($lecture as $l): ?>
                                                    <option value="<?= $l->id ?>"  <?= $l->id == $this->input->get('lec_id')?  'selected' : ''  ?> ><?= $l->title ?><?= $l->name ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="form[sub_id][]" multiple class=" multiselect " data-parsley-required="true" >
                                                <?php foreach ($subjects as $sub ): ?>
                                                    <option value="<?= $sub->id ?>"   <?= in_array($sub->id , $sub_list) ? "selected" :"" ?>  > <?= $sub->title ?> </option>
                                                <?php endforeach; ?>
                                            </select>
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
<!-- multiselect, tagging -->
<script src="<?= base_url() ?>assets/lib/multi-select/js/jquery.multi-select.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.quicksearch.js"></script>
<script>
    $(function () {
        // multiselect
        multiselect.init();
    });
    //* 2col multiselect
    multiselect = {
        init: function() {
            $('.multiselect').multiSelect({
                selectableFooter: "<div class='custom-footer'>Selectable footer</div>",
                selectionFooter: "<div class='custom-footer'>Selection footer</div>",
                selectableHeader: '<div class="custom-header-search"><input type="text" class="search-input input-sm form-control" autocomplete="off" placeholder="Selectable..."></div>',
                selectionHeader: '<div class="custom-header-search"><input type="text" class="search-input input-sm form-control" autocomplete="off" placeholder="Selection..."></div>',
                afterInit: function(ms){
                    var that = this,
                        $selectableSearch = that.$selectableUl.prev('div').children('input'),
                        $selectionSearch = that.$selectionUl.prev('div').children('input'),
                        selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
                        selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

                    that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                        .on('keydown', function(e){
                            if (e.which === 40){
                                that.$selectableUl.focus();
                                return false;
                            }
                        });

                    that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                        .on('keydown', function(e){
                            if (e.which == 40){
                                that.$selectionUl.focus();
                                return false;
                            }
                        });
                },
                afterSelect: function(){
                    this.qs1.cache();
                    this.qs2.cache();
                },
                afterDeselect: function(){
                    this.qs1.cache();
                    this.qs2.cache();
                }
            });
        }
    };
</script>
</body>

</html>
