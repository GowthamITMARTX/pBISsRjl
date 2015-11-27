<!DOCTYPE html>
<html>
<head>

    <!-- full calendar -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/fullcalendar/fullcalendar/fullcalendar.css">
    <?php $this->load->view('inc/head') ?>
    <style>

        #external-events .fc-event {
            padding: 5px;
            margin: 10px 0;
            cursor: pointer;
        }

    </style>
</head>
<body>
<!-- top bar -->
<?php $this->load->view('lecture/inc/header') ?>
<!-- main content -->
<div id="main_wrapper">
    <div class="page_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- side navigation -->
    <?php $this->load->view('lecture/inc/nav') ?>

    <!-- right slidebar -->
    <div id="slidebar">
        <div id="slidebar_content">

        </div>
    </div>
</div>
<?php $this->load->view('inc/foot') ?>
<!-- jQueryUI -->
<!-- full calendar -->
<script src="<?= base_url() ?>assets/lib/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
<script src="<?= base_url() ?>assets/lib/fullcalendar/fullcalendar/lang/all.js"></script>

<!-- calendar functions -->
<script type="text/javascript">

    $(document).ready(function () {
         $('#calendar').fullCalendar({

            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            buttonIcons: {
                prev: 'left-single-arrow',
                next: 'right-single-arrow',
                prevYear: 'left-double-arrow',
                nextYear: 'right-double-arrow'
            },
            events:  URL.base +"lecture/timetable/data",
            
        });



    });

 </script >

</body >

</html >
