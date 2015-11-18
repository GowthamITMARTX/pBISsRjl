<!DOCTYPE html>
<html>
<head>
   <?php $this->load->view('inc/head');  ?>
    </head>
    <body>
   <?php $this->load->view('inc/header');   ?>
       <!-- main content -->
        <div id="main_wrapper">
            <div class="page_content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <div class="panel panel-default">
                                        <div class="stat_box stat_up">
                                            <div class="stat_ico color_f"><i class="ion-ios7-chatboxes-outline"></i></div>
                                            <div class="stat_content">
                                                <span class="stat_count">321</span>
                                                <span class="stat_name">Comments</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="panel panel-default">
                                        <div class="stat_box stat_up">
                                            <div class="stat_ico color_g"><i class="ion-ios7-cart-outline"></i></div>
                                            <div class="stat_content">
                                                <span class="stat_count">$81 483.00</span>
                                                <span class="stat_name">Sale (last month)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="panel panel-default">
                                        <div class="stat_box stat_down">
                                            <div class="stat_ico color_a"><i class="ion-clipboard"></i></div>
                                            <div class="stat_content">
                                                <span class="stat_count">637</span>
                                                <span class="stat_name">Tasks</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="panel panel-default">
                                        <div class="stat_box stat_up">
                                            <div class="stat_ico color_d"><i class="ion-ios7-email-outline"></i></div>
                                            <div class="stat_content">
                                                <span class="stat_count">2483</span>
                                                <span class="stat_name">Messages</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="easy_chart easy_chart_pages pull-left" data-percent="81"><i class="ion-document-text"></i></div>
                                    <div class="easy_chart_desc">
                                        <h4>132 New Pages</h4>
                                        <p>Lorem ipsum dolor sit&hellip;</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="easy_chart easy_chart_user pull-left" data-percent="56"><i class="ion-ios7-contact-outline"></i></div>
                                    <div class="easy_chart_desc">
                                        <h4>4 662 Unique Users</h4>
                                        <p>Lorem ipsum dolor sit&hellip;</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="easy_chart easy_chart_images pull-left" data-percent="56"><i class="ion-images"></i></div>
                                    <div class="easy_chart_desc">
                                        <h4>731 Images Uploaded</h4>
                                        <p>Lorem ipsum dolor sit&hellip;</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div id="mini-clndr">
                                <script>
                                    // todo calendar events 
                                    var currentMonth = moment().format('YYYY-MM'),
                                        nextMonth    = moment().add('month', 1).format('YYYY-MM');
                                    
                                    todo_events = [
                                        { date: currentMonth + '-' + '07', title: 'Non excepturi quae voluptas qui.', url: 'javascript:void(0)' },
                                        { date: currentMonth + '-' + '08', title: 'Temporibus blanditiis expedita.', url: 'javascript:void(0)' },
                                        { date: currentMonth + '-' + '08', title: 'Consequuntur qui exercitationem voluptatem.', url: 'javascript:void(0)' },
                                        { date: currentMonth + '-' + '12', title: 'Sit saepe unde vel velit.', url: 'javascript:void(0)' },
                                        { date: currentMonth + '-' + '19', title: 'Quo rem sed reiciendis.', url: 'javascript:void(0)' },
                                        { date: currentMonth + '-' + '19', title: 'Dolorem incidunt doloribus.', url: 'javascript:void(0)' },
                                        { date: currentMonth + '-' + '22', title: 'Vel omnis nihil excepturi.', url: 'javascript:void(0)' },
                                        { date: currentMonth + '-' + '25', title: 'Occaecati consequatur aliquam.', url: 'javascript:void(0)' },
                                        { date: currentMonth + '-' + '25', title: 'Non voluptatem numquam eum.', url: 'javascript:void(0)' },
                                        { date: currentMonth + '-' + '25', title: 'Placeat perferendis quia soluta.', url: 'javascript:void(0)' },
                                        { date: currentMonth + '-' + '28', title: 'Dolores doloribus qui voluptatem.', url: 'javascript:void(0)' },
                                        { date: currentMonth + '-' + '28', title: 'Nobis reprehenderit labore.', url: 'javascript:void(0)' },
                                        { date: nextMonth + '-' + '04',    title: 'Non odit.', url: 'javascript:void(0)' },
                                        { date: nextMonth + '-' + '18',    title: 'A in veniam repellat.', url: 'javascript:void(0)' }
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
                        <div class="col-md-4">
                            <div class="events_list">
                                <div class="events_date clearfix">
                                    <span class="event_date_big ion-ios7-calendar-outline"><span>24</span></span>
                                    <span class="event_date_day">Monday</span>
                                    <span class="event_date_full">May, 24 2014 </span>
                                </div>
                                                                
                                <div class="event_item">
                                    <div class="event_hour">11:00</div>
                                    <ul class="event_content">
                                        <li>
                                            <p>Architecto veritatis molestias.</p>
                                            <span>envato</span>                                     
                                        </li>
                                        <li>
                                            <p>Quam perspiciatis.</p>
                                            <span>family</span>                                     
                                        </li>
                                        <li>
                                            <p>Non exercitationem.</p>
                                            <span>family</span>                                     
                                        </li>
                                    </ul>
                                </div>
                                                            
                                <div class="event_item">
                                    <div class="event_hour">16:00</div>
                                    <ul class="event_content">
                                        <li>
                                            <p>Voluptas ad quas.</p>
                                            <span>work</span>                                       
                                        </li>
                                        <li>
                                            <p>Illum incidunt eum.</p>
                                            <span>work</span>                                       
                                        </li>
                                        <li>
                                            <p>Ullam voluptas quaerat aut repellat.</p>
                                            <span>work</span>                                       
                                        </li>
                                        <li>
                                            <p>Consequatur facere in harum sint.</p>
                                            <span>business</span>                                       
                                        </li>
                                    </ul>
                                </div>
                                                            
                                <div class="event_item">
                                    <div class="event_hour">18:00</div>
                                    <ul class="event_content">
                                        <li>
                                            <p>Dolorem aperiam aliquid odit.</p>
                                            <span>envato</span>                                     
                                        </li>
                                        <li>
                                            <p>Unde a quo.</p>
                                                                                    
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>      
        </div>

        <!-- side navigation -->
        <?php $this->load->view('inc/nav');   ?>
    <!-- right slidebar -->
        <div id="slidebar">
            <div id="slidebar_content">
                <div class="input-group">
                    <input type="text" class="form-control input-sm" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default btn-sm" type="button"><i class="fa fa-search"></i></button>
                    </span>
                    </div>
                <hr>
                    
                <div class="sepH_a">
                    <div class="progress">
                        <div style="width: 60%;" role="progressbar" class="progress-bar">
                            60%
                        </div>
                    </div>
                    <span class="help-block">CPU Usage</span>
                </div>
                <div class="sepH_a">
                    <div class="progress">
                        <div style="width: 28%;" class="progress-bar progress-bar-success">
                            28%
                        </div>
                    </div>
                    <span class="help-block">Disk Usage</span>
                </div>
                <div class="progress">
                    <div style="width: 82%;" class="progress-bar progress-bar-danger">
                        0.2GB/20GB
                    </div>
                </div>
                <span class="help-block">Monthly Transfer</span>
                <hr>
                    
                <div class="heading_a">New Users</div>
                <div class="user_img_grid clearfix">
                    <a class="user_img_item" href="#"><img src="assets/img/avatars/avatar_3.jpg" alt="" class="img-thumbnail"></a>
                    <a class="user_img_item" href="#"><img src="assets/img/avatars/avatar_5.jpg" alt="" class="img-thumbnail"></a>
                    <a class="user_img_item" href="#"><img src="assets/img/avatars/avatar_8.jpg" alt="" class="img-thumbnail"></a>
                    <a class="user_img_item" href="#"><img src="assets/img/avatars/avatar_6.jpg" alt="" class="img-thumbnail"></a>
                </div>
                <hr>
                    
                <form>
                    <div class="form-group">
                        <input type="text" class="input-sm form-control" placeholder="Tilte...">
                    </div>
                    <div class="form-group">
                        <textarea cols="30" rows="3" class="form-control input-sm" placeholder="Message..."></textarea>
                    </div>
                    <button type="button" class="btn btn-default btn-sm">Send message</button>
                </form>
                <hr>
                <div class="sepH_a">
                    <span class="label label-info">Reminder</span>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat fuga omnis ipsa odit sint aut molestiae enim. Quia cupiditate distinctio ad dicta qui ducimus aspernatur debitis incidunt minima laboriosam atque.</p>
            </div>
        </div>

        <!-- jQuery -->
        <script src="assets/js/jquery.min.js"></script>
        <!-- easing -->
        <script src="assets/js/jquery.easing.1.3.min.js"></script>
        <!-- bootstrap js plugins -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- top dropdown navigation -->
        <script src="assets/js/tinynav.js"></script>
        <!-- perfect scrollbar -->
        <script src="assets/lib/perfect-scrollbar/min/perfect-scrollbar-0.4.8.with-mousewheel.min.js"></script>
        
        <!-- common functions -->
        <script src="assets/js/tisa_common.js"></script>
        
        <!-- style switcher -->
        <script src="assets/js/tisa_style_switcher.js"></script>
        
    <!-- page specific plugins -->

        <!-- nvd3 charts -->
        <script src="assets/lib/d3/d3.min.js"></script>
        <script src="assets/lib/novus-nvd3/nv.d3.min.js"></script>
        <!-- flot charts-->
        <script src="assets/lib/flot/jquery.flot.min.js"></script>
        <script src="assets/lib/flot/jquery.flot.pie.min.js"></script>
        <script src="assets/lib/flot/jquery.flot.resize.min.js"></script>
        <script src="assets/lib/flot/jquery.flot.tooltip.min.js"></script>
        <!-- clndr -->
        <script src="assets/lib/underscore-js/underscore-min.js"></script>
        <script src="assets/lib/CLNDR/src/clndr.js"></script>
        <!-- easy pie chart -->
        <script src="assets/lib/easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        <!-- owl carousel -->
        <script src="assets/lib/owl-carousel/owl.carousel.min.js"></script>
        
        <!-- dashboard functions -->
        <script src="assets/js/apps/tisa_dashboard.js"></script>
        
    </body>

</html>
