<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/css/login.css"/>
    <link rel="icon" type="image/ico" href="<?=base_url(); ?>/uploadedfiles/school_logo/favicon.ico"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="<?=base_url(); ?>assets/js/capslock.js"></script>
    <script src="<?=base_url(); ?>assets/js/showpassword/jquery.showPassword.js"></script>
    <script type="text/javascript">
        function clearText(field) {
            if (field.defaultValue == field.value) field.value = '';
            else if (field.value == '') field.value = field.defaultValue;
        }
    </script>
    <script>
        $(document).ready(function () {
            $(':password').showPassword({
                linkRightOffset: 5,
                linkTopOffset: 8,
                linkText: '',
                showPasswordLinkText: '',
            });
        });
    </script>
    <style>
        .show-password-link {
            display: block;
            position: absolute;
            z-index: 11;
            background: url(http://localhost/rica/trunk/assets/img/psswrd_shwhide_icon.png) no-repeat;
            width: 18px;
            height: 12px;
            left: 212px !important;
        }
        .password-showing {
            position: absolute;
            z-index: 10;
        }
    </style>
    <title>Remarko Institute</title>
</head>
<body>
<!--<div class="loginimg"></div>-->
<div class="loginboxWrapper" style="position:relative;">
    <div class="lw_left">
        <div class="lw_logo"><img src="<?=base_url(); ?>assets/img/logo-1.png" width="171" height="161"/></div>
    </div>
    <div class="lw_right">
        <h1>Student's Login</h1>
        <p>Please fill out the following form with your login credentials:</p>
        <div class="form">
            <?= form_open() ?>
            <?php if($error): ?>
                <span class="errorSummary">The username or password you entered is incorrect.</span>
            <?php endif; ?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <input onblur="clearText(this)" onfocus="clearText(this)" value="Email "
                               name="Student[email]" id="UserLogin_username" type="text"/></td>
                </tr>
                <tr>
                    <td><input onblur="clearText(this)" onfocus="clearText(this)" value="Password"
                               name="Student[password]" id="UserLogin_password" type="password"/></td>
                </tr>
                <tr>
                    <td id="pid"
                        style="color:#C60;background:url(<?=base_url(); ?>assets/img/warning.png) no-repeat;display:none;padding-left:25px;"></td>
                </tr>
                <tr>
                    <td style="padding:0px;">
                        <table width="60%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="padding:0px;"><input id="ytUserLogin_rememberMe" type="hidden" value="0"
                                                                name="UserLogin[rememberMe]"/><input
                                        name="UserLogin[rememberMe]" id="UserLogin_rememberMe" value="1"
                                        type="checkbox"/></td>
                                <td align="left" style="padding:0px;"><label for="UserLogin_rememberMe">Remember me next
                                        time</label></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="60%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><input class="loginbut" type="submit" name="yt0" value="Login"/></td>
                                <td><a href="<?=base_url(); ?>/index.php?r=user/recovery">Lost Password?</a>
                                    <div class="student_reg">
                                        <a href="<?=base_url(); ?>/index.php?r=onlineadmission/registration/index">Student
                                            Registration</a> 
                                     </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
            </table>
            <?= form_close() ?>
        </div>
    </div>
    <div class="clear"></div>
</div>
<!--login credentials-->
</body>
</html>

<script type="text/javascript">
    $(document).ready(function () {
        var options = {
            caps_lock_on: function () {
                $('#pid').css({"display": "block"});
                $('#pid').html("Caps lock is on");
            },
            caps_lock_off: function () {
                $('#pid').css({"display": "none"});
            },
        };
        $("input[type='password']").capslock(options);

    });
</script>

