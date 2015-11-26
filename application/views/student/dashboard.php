<!DOCTYPE html>
<html>

<!-- Mirrored from tisa-admin.tzdthemes.com/tasks_summary.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Aug 2015 05:23:37 GMT -->
<head>
    <?php $this->load->view('inc/head'); ?>
</head>
<body>
<!-- top bar -->
<?php $this->load->view('student/inc/header'); ?>
<?php $this->load->view('student/inc/nav') ?>
<!-- main content -->
<div id="main_wrapper">
    <div class="page_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="events_list">
                        <div class="events_date clearfix">
                            <span class="event_date_big ion-ios7-calendar-outline"><span><?=date('d') ?></span></span>
                            <span class="event_date_day"><?=date('l', time()); ?></span>
                            <span class="event_date_full"><?=date('M, d Y') ?> </span>
                        </div>
                        <?php
                        if(!empty($remark)): ?>
                        <?php foreach($remark as $r): ?>
                            <div class="event_item">
                                <div class="event_hour"><?=$r->time; ?></div>
                                <ul class="event_content">
                                    <li>
                                        <p><?=$r->title; ?></p>
                                        <span><?=$r->description; ?></span><br />
                                        <span>CLASS: <?=$r->cls_t; ?></span><br />
                                        <span>BY: <?=$r->lec_t.$r->lec_n; ?></span>
                                    </li>
                                </ul>
                            </div>

                        <?php endforeach; ?>
                        <?php else: ?>
                        <div class="event_item">
                            <div class="event_hour">  </div>
                            <ul class="event_content">
                                <li>
                                    No Records Found
                                </li>
                            </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                    </div>
                <div class="col-lg-4">
                    <div id="mini-clndr">
                        <script>

                            todo_events = [
                                <?php foreach($tot_remark as $r): ?>
                                { date: '<?= $r->date;  ?>', title: '<?=$r->title; ?>', url: '<?=current_url().'/';?>',  },
                                <?php endforeach; ?>
                            ]
                        </script>
                        <script id="mini-clndr-template" type="text/template">
                            <div class="controls">
                                <div class="clndr-previous-button"><span class="glyphicon glyphicon-chevron-left"></span></div><div class="month"><%= month+' '+year %></div><div class="clndr-next-button"><span class="glyphicon glyphicon-chevron-right"></span></div>
                            </div>

                            <div class="days-container">
                                <div class="days">
                                    <div class="headers">
                                        <% _.each(daysOfTheWeek, function(day) { %><div class="day-header"><%= day %></div><% }); %>
                                    </div>
                                    <% _.each(days, function(day) { %><div class="<%= day.classes %>" id="<%= day.id %>"><%= day.day %></div><% }); %>
                                </div>
                                <div class="events">
                                    <div class="headers">
                                        <div class="x-button"><span class="glyphicon glyphicon-remove"></span></div>
                                        <div class="event-header">EVENTS</div>
                                    </div>
                                    <div class="events-list-wrapper">
                                        <div class="events-list">
                                            <% _.each(eventsThisMonth, function(event) { %>
                                            <div class="event">
                                                <a href="<%= event.url %>"><%= moment(event.date).format('MMM Do') %>: <%= event.title %></a>
                                            </div>
                                            <% }); %>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </script>
                    </div>
                </div>
            </div>
            <div class="clearfix">
                <div class="col-lg-12">
                <?php foreach($payments as $p): ?>
                    <div class="alert alert-warning alert-dismissable fade in">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4> Class : <?=$p->title.br(1); ?></h4>
                    <h5> Total Fees: <?=number_format($p->tot).br(1); ?></h5>
                    <h5> Paid : <?php echo (($p->paid != null && $p->paid != 0) ? number_format($p->paid) : 0.00); ?></h5>
                    <h5> Balance : <?=number_format(($p->tot - $p->paid)).br(1); ?></h5>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('inc/foot'); ?>
<!-- clndr -->
<script src="<?=base_url() ?>assets/lib/underscore-js/underscore-min.js"></script>
<script src="<?=base_url() ?>assets/lib/CLNDR/src/clndr.js"></script>
<script type="text/javascript">

    // todo calendar

    $(function() {
        tisa_calendar.miniCal();
    })

    tisa_calendar = {
        miniCal: function() {
            if ($('#mini-clndr').length) {
                var tisa_daysOfTheWeek = [];
                for(var i = 0; i < 7; i++) {
                    tisa_daysOfTheWeek.push( moment().weekday(i).format('ddd') );
                }

                $('#mini-clndr').clndr({
                    template: $('#mini-clndr-template').html(),
                    events: todo_events,
                    clickEvents: {
                        click: function(target) {
                            if(target.events.length) {
                                var daysContainer = $('#mini-clndr').find('.days-container');
                                daysContainer.toggleClass('show-events', true);
                                $('#mini-clndr').find('.x-button').click( function() {
                                    daysContainer.toggleClass('show-events', false);
                                });
                            }
                        }
                    },
                    adjacentDaysChangeMonth: true,
                    weekOffset: 1,
                    daysOfTheWeek: tisa_daysOfTheWeek
                });
            }
        }
    }
</script>
</body>

<!-- Mirrored from tisa-admin.tzdthemes.com/tasks_summary.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Aug 2015 05:23:39 GMT -->
</html>
