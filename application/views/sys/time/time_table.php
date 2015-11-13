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
<?php $this->load->view('inc/header') ?>
<!-- main content -->
<div id="main_wrapper">
    <div class="page_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="panel panel-default">
                        <div id='external-events'>
                            <h4>Subject List </h4>
                            <?php foreach($subject as $sub): ?>
                                <div class='fc-event'><?= $sub->subject ?> - <?= $sub->lecture ?> </div>
                            <?php endforeach ?>
                        </div>

                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="panel panel-default">

                        <div id="calendar"></div>
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
<!-- jQueryUI -->
<script src="<?= base_url() ?>assets/lib/jQuery-UI/jquery-ui.custom.min.js"></script>
<!-- full calendar -->
<script src="<?= base_url() ?>assets/lib/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
<script src="<?= base_url() ?>assets/lib/fullcalendar/fullcalendar/lang/all.js"></script>

<!-- calendar functions -->


<script type="text/javascript">

    $(document).ready(function () {

        $('#external-events .fc-event').each(function() {

            // store data so the calendar knows to render an event upon drop
            $(this).data('event', {
                title: $.trim($(this).text()), // use the element's text as the event title
                stick: true // maintain when user navigates (see docs on the renderEvent method)
            });

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });

        });


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
            aspectRatio: 2.2,
            editable: true,
            events: URL.base +"sys/timetable/table_data/<?= $this->input->get('id') ?>",
            eventColor: '#c0392b',
            selectable: true,
            selectHelper: true,
            eventDrop: function(event) {
                console.log(event);
                start = moment(event.start).format('YYYY-MM-DD HH:mm:ss');
                end = moment(event.end).format('YYYY-MM-DD HH:mm:ss');
                console.log(start);
                console.log(end);
                $.ajax({
                    url : URL.base +"sys/timetable/updatetimetable",
                    data : { title :event.title , start : moment(event.start).format('YYYY-MM-DD HH:mm:ss') , end : moment(event.end).format('YYYY-MM-DD HH:mm:ss') , id : event.id  },
                    type : 'post',
                    success : function(){
                        console.log('eventDrop is trigger');
                    }
                });
            },
            eventResize: function(event ) {
                $.ajax({
                    url : URL.base +"sys/timetable/updatetimetable",
                    data : { start : moment(event.start).format('YYYY-MM-DD HH:mm:ss') , end : moment(event.end).format('YYYY-MM-DD HH:mm:ss') , id : event.id  },
                    type : 'post',
                    success : function(){
                        console.log('eventResize is trigger');
                    }
                });
            },
            loading: function(bool) {
                console.log('loading');
                $('#loading').toggle(bool);
            },
            select: function(start, end, allDay) {

            },
            droppable: true,
            drop: function(event) {
                self = $(this);

                $.ajax({
                    url : URL.base +"sys/timetable/addtimetable",
                    data : { title : self.text() , start : moment(event._d).format('YYYY-MM-DD HH:mm:ss') , end : moment(event._d).format('YYYY-MM-DD HH:mm:ss') , cls_id : <?= $this->input->get('id') ?> },
                    type : 'post',
                    success : function(){
                        console.log('drop is trigger');
                    }
                });

            },
            eventClick: function(event ) {
                if(confirm('Are You Sure Do You want To Delete this Time ')){
                    $(this).remove();
                    $.ajax({
                        url : URL.base +"sys/timetable/deleteTimeTable",
                        data : {  id : event.id  },
                        type : 'post',
                        success : function(){
                            console.log('eventResize is trigger');
                        }
                    });
                }
            }


        });



    });

 </script >

</body >

</html >
