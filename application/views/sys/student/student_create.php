<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('inc/head') ?>
    <!-- datepicker -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/bootstrap-datepicker/css/datepicker3.css">
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
                                <legend><span>Create Student</span>

                                    <div class="site_nav">
                                        <a href="<?= base_url() ?>">Dashboard</a>
                                        &raquo;<a href="<?= base_url() ?>sys/student"> Student </a>
                                        &raquo; create
                                    </div>
                                </legend>
                            </fieldset>
                        </div>
                    </div>
                    <?php
                    $error = isset($error) ? $error : $this->session->flashdata('error');
                    $valid = $this->session->flashdata('valid');
                    if (isset($valid)) $error = $valid;
                    if (isset($error)) {
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div
                                    class="alert <?= isset($valid) ? 'alert-success' : 'alert-danger' ?> alert-dismissable fade in ">
                                    <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                    <?= $error ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <?= form_open_multipart( current_url().($this->input->get('id') ? "?id=".$this->input->get('id'):"") , array('data-parsley-validate'=>'')); ?>
                    <?= empty($result->id)?"": form_hidden('id' , $result->id)  ;  ?>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <fieldset>
                                    <legend><span>PERSONAL INFORMATION</span>
                                    </legend>
                                </fieldset>
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="form-group">
                                            <label for="code">STUDENT CODE</label>
                                            <input type="text" id="code"  disabled value="<?= $result->index ?>"
                                                   class="form-control" >
                                        </div>
                                        <div class="form-group row sepH_b ">
                                            <label for="name"> &nbsp;&nbsp;&nbsp;&nbsp; NAME IN FULL</label>
                                            <div class="col-sm-2">
                                                <select class="form-control" name="form[title]">
                                                    <option value="Mr."  <?= $result->title == "Mr." ? "selected" : "" ?> >Mr.</option>
                                                    <option value="Mrs."  <?= $result->title == "Mrs." ? "selected" : "" ?> >Mrs.</option>
                                                    <option value="Ms."  <?= $result->title == "Ms." ? "selected" : "" ?> >Ms.</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" id="name" name="form[name]" value="<?= $result->name ?>"
                                                       class="form-control capslock " data-parsley-required="true">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="reg_permanent_address">IMAGE</label>
                                           <input type="file" name="userfile" >
                                            <?php
                                           if( file_exists( "uploads/students/$result->profile_image " ) ){
                                              ?>
                                               <img  src="<?= base_url() ?>uploads/students/profile/<?=$result->profile_image?>" class="img-thumbnail"  style="height: 150px;margin: 5px" >

                                               <?php
                                           }
                                            ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="reg_permanent_address">PERMANENT ADDRESS</label>
                                            <textarea name="form[permanent_address]" id="reg_permanent_address"
                                                      cols="10"
                                                      rows="3" class="form-control"><?= $result->permanent_address ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="nearest_police_station">NEAREST POLICE STATION</label>
                                            <input type="text" id="nearest_police_station" value="<?= $result->nearest_police_station ?>"
                                                   name="form[nearest_police_station]"
                                                   class="form-control  ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for=""> </label>

                                        <div class="col-lg-6 ">
                                            <label for="mobile_no">MOBILE NO</label>
                                            <input type="text" id="mobile_no" name="form[mobile_no]" value="<?= $result->mobile_no ?>"
                                                   class="form-control ">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="tel_no">HOME No</label>
                                            <input type="text" id="tel_no" name="form[tel_no]" value="<?= $result->tel_no ?>"
                                                   class="form-control ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for=""> &nbsp; </label>

                                        <div class="col-lg-4 ">
                                            <label for="nic_no">NIC</label>
                                            <input type="text" id="nic_no" name="form[nic_no]" value="<?= $result->nic_no ?>"
                                                   data-parsley-required="true"
                                                   class="form-control nic">
                                        </div>
                                        <div class="col-lg-8">
                                            <label for="email">EMAIL</label>
                                            <input type="email" id="email" name="form[email]"  data-parsley-trigger="change" data-parsley-type="email"
                                                   class="form-control "  value="<?= $result->email ?>" >
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <label for=""> &nbsp; </label>

                                        <div class="col-lg-3 ">
                                            <label for="dob">DATE OF BIRTH</label>

                                            <div class="input-group date ts_datepicker" data-date-format="dd-mm-yyyy"
                                                 data-date-autoclose="true">
                                                <input class="form-control" id="dob" name="form[dob]" type="text"  value="<?= $result->dob ?>"  >
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="religion">RELIGION</label>
                                            <select id="religion" class="form-control" name="form[religion]">
                                                <option value="Buddhists" <?= $result->religion == "Buddhists"  ? "selected" : "" ?>  >Buddhists</option>
                                                <option value="Hindus" <?= $result->religion == "Hindus"  ? "selected" : "" ?>  >Hindus</option>
                                                <option value="Muslims" <?= $result->religion == "Muslims"  ? "selected" : "" ?>  >Muslims </option>
                                                <option value="Christians" <?= $result->religion == "Christians"  ? "selected" : "" ?>  >Christians  </option>
                                                <option value="Other" <?= $result->religion == "Other"  ? "selected" : "" ?>  >Other  </option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 ">
                                            <label for="martial_status">MARITAL STATUS </label>
                                            <select id="martial_status" class="form-control"
                                                    name="form[martial_status]">
                                                <option value="Single" <?= $result->religion == "Single" ? "selected" : "" ?> >Single</option>
                                                <option value="Married" <?= $result->religion == "Married" ? "selected" : "" ?> >Married</option>
                                                <option value="Divorced" <?= $result->religion == "Divorced" ? "selected" : "" ?> >Divorced</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="sex">SEX</label>

                                            <div class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="form[sex]"  id="inline_optionsRadios1"  <?= $result->sex == "M" ? "checked" : "" ?>
                                                           value="M" <?= empty($result->sex) ? "checked" :"" ?> >
                                                    Male
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="form[sex]" id="inline_optionsRadios2" <?= $result->sex == "F" ? "checked" : "" ?>
                                                           value="F">
                                                    Female
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="form[sex]" id="inline_optionsRadios3" <?= $result->sex == "O" ? "checked" : "" ?>
                                                           value="O">
                                                    Other
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for=""> &nbsp; </label>
                                            <label for="school_attended">SCHOOL ATTENDED</label>
                                            <input type="text" id="school_attended" name="form[school_attended]" value="<?= $result->school_attended?>"
                                                   class="form-control  ">
                                        </div>
                                        <div class="form-group">
                                            <label for="education_backgroud"> EDUCATIONAL BACKGROUND </label>
                                            <textarea name="form[education_backgroud]" id="education_backgroud"
                                                      cols="10"
                                                      rows="3" class="form-control"><?= $result->education_backgroud?></textarea>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="panel panel-default ">
                            <div class="panel-body">
                                <fieldset>
                                    <legend><span>PRESENT EMPLOYMENT RECORDS </span>
                                    </legend>
                                </fieldset>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="company">COMPANY NAME</label>
                                            <input type="text" id="company" name="form[company]"  value="<?= $result->company?>"
                                                   class="form-control"
                                                   data-parsley-required="true">
                                        </div>
                                        <div class="form-group">
                                            <label for="company_period">PERIOD</label>
                                            <input type="text" id="company_period" name="form[company_period]"  value="<?= $result->company_period?>"
                                                   class="form-control"
                                                   data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="com_designation">DESIGNATION</label>
                                            <input type="text" id="com_designation" name="form[com_designation]"  value="<?= $result->com_designation?>"
                                                   class="form-control"
                                                   data-parsley-required="true">
                                        </div>
                                        <div class="form-group">
                                            <label for="com_number">CONTACT DETAILS</label>
                                            <input type="text" id="com_number" name="form[com_number]"  value="<?= $result->com_number?>"
                                                   class="form-control"
                                                   data-parsley-required="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default ">
                            <div class="panel-body">
                                <fieldset>
                                    <legend><span>IN CASE OF EMEGENCY </span>
                                    </legend>
                                </fieldset>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="f_m_g_name">FATHER/MOTHER OR GRADIENT NAME(S)</label>
                                            <input type="text" id="f_m_g_name" name="form[f_m_g_name]"
                                                   class="form-control"  value="<?= $result->f_m_g_name?>"
                                                >
                                        </div>
                                        <div class="form-group">
                                            <label for="occupation">OCCUPATION</label>
                                            <input type="text" id="occupation" name="form[occupation]"
                                                   class="form-control"  value="<?= $result->occupation?>"
                                                   data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="office_home">OFFICE/HOME</label>
                                            <input type="text" id="office_home" name="form[office_home]"
                                                   class="form-control"  value="<?= $result->office_home?>"
                                                   data-parsley-required="true">
                                        </div>
                                        <div class="form-group">
                                            <label for="con_number">CONTACT NUMBER</label>
                                            <input type="text" id="con_number" name="form[con_number]"
                                                   class="form-control"  value="<?= $result->con_number?>"
                                                   data-parsley-required="true">
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-group">
                                            <label for="education_backgroud"> Remark </label>
                                            <textarea name="form[remark]" id="remark"
                                                      cols="10"
                                                      rows="3" class="form-control"><?= $result->remark?></textarea>
                                        </div>
                                    </div>
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

<!--  datepicker -->
<script src="<?= base_url() ?>assets/lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- masked inputs -->
<script src="<?= base_url() ?>assets/lib/jquery.inputmask/dist/jquery.inputmask.bundle.min.js"></script>

<script>
    $(function () {
        // datepicker
        tisa_datepicker.init();
        tisa_maskedInputs.init();
    });
    // datepicker
    tisa_datepicker = {
        init: function () {
            if ($('.ts_datepicker').length) {
                $('.ts_datepicker').datepicker({
                    todayHighlight: true
                })
            }

        }
    };
    //* masked inputs
    tisa_maskedInputs = {
        init: function () {
            $(".nic").inputmask({
                "mask": "999999999X",
                definitions: {
                    "X": {
                        validator: "[xXvV]",
                        cardinality: 1,
                        casing: "upper"
                    }
                }
            });
        }
    }
</script>

</body>

</html>
