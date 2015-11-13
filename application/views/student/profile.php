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
	<?php $user = $this->session->userdata('user');  ?>	
		<!-- main content -->
		<div id="main_wrapper">
			<div class="page_content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-8">
						<div class="todo_section panel panel-default">
			  <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title" style="text-align: center;"><b>User Profile</b></h3>
            </div>
            <div class="panel-body">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="https://www.kiu.edu.pk/img/profile-default.gif" class="img-circle img-responsive"> </div>
               <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                    <h3 class="panel-title" style="text-align: left;"><b>PERSONAL INFORMATION</b></h3>
                      <tr>
                        <td>Index:</td>
                        <td><?=$user['index']; ?></td>
                      </tr>
                      <tr>
                        <td>User:</td>
                        <td><?=$user['title'].$user['name']; ?></td>
                      </tr>
                      <tr>
                        <td>Date of Birth</td>
                        <td><?=$user['dob']; ?></td>
                      </tr>
                       <tr>
                        <tr>
                        <td>Gender</td>
                        <td><?php if($user['sex'] == 'M'){echo 'Male';}elseif($user['sex'] == 'F'){echo 'Female';} ?></td>
                        </tr>
                    </tbody>
                  </table>
          </div> 
          <div class="col-lg-12" >
                  	<table class="table table-user-information" >
                  	    <tr>
                        <td>Address:</td>
                        <td><?=$user['permanent_address']; ?></td>
                       </tr>
                       <tr>
                        <td>Nearest Police Station:</td>
                        <td><?=$user['nearest_police_station'] ?></td>
                       </tr>
                      <tr>
                      	<tr>
                        <td>NIC:</td>
                        <td><?=$user['nic_no'] ?></td>
                       </tr>
                       <tr>
                        <td>Religion:</td>
                        <td><?=$user['religion'] ?></td>
                       </tr>
                       <tr>
                        <td>Marital Status:</td>
                        <td><?=$user['martial_status'] ?></td>
                       </tr>
                       <tr>
                        <td>School Attended:</td>
                        <td><?=$user['school_attended'] ?></td>
                       </tr>
                        <tr>
                        <td>Educational Background:</td>
                        <td><?=$user['education_backgroud']; ?></td>
                      </tr>
                       <tr>
                        <td>Email:</td>
                        <td><?=$user['email'] ?></td>
                      </tr>
                      <tr>
                        <td>Phone:</td>
                        <td><?=$user['tel_no'];?>(Landline)<br><br><?=$user['mobile_no'];?>(Mobile) </td>
                        </tr>
                       </tr>
                        <tr>
                       	<td><h3 class="panel-title" style="text-align: left;"><b>PRESENT EMPLOYMENT RECORDS</b></h3></td>
                       </tr>
                       <tr>
                        <td>Company Name:</td>
                        <td><?=$user['company'];?> </td>
                        </tr>
                         <tr>
                        <td>Designation:</td>
                        <td><?=$user['com_designation'];?> </td>
                        </tr>
                        <tr>
                        <td>Period:</td>
                        <td><?=$user['company_period'].' Year(s)';?> </td>
                        </tr>
                         <tr>
                        <td>Contact Details:</td>
                        <td><?=$user['com_number'];?> </td>
                        </tr>
                         <tr>
                       	<td><h3 class="panel-title" style="text-align: left;"><b>IN CASE OF EMEGENCY</b></h3></td>
                       </tr>
                       <tr>
                        <td>Father/Mother or Gardient Name(s):</td>
                        <td><?=$user['f_m_g_name'];?> </td>
                       </tr>
                       <tr>
                        <td>Occupation:</td>
                        <td><?=$user['occupation'];?> </td>
                       </tr>
                       <tr>
                        <td>Office/Home:</td>
                        <td><?=$user['office_home'];?> </td>
                       </tr>
                       <tr>
                        <td>Contact Number:</td>
                        <td><?=$user['con_number'];?> </td>
                       </tr>
                       <tr>
                        <td>Remark:</td>
                        <td><?php if($user['remark'] != null && $user['remark'] != ''){echo $user['remark'];}else{echo "No Remark available";}?> </td>
                       </tr>
                  	</table>
                  	
                  </div>  
			      </div>
			 </div>
		</div>
			   </div>
						<div class="col-lg-4">
							<div class="events_list">
								<div class="events_date clearfix">
									<span class="event_date_big ion-ios7-calendar-outline"><span><?=date('d') ?></span></span>
									<span class="event_date_day"><?=date('l', time()); ?></span>
									<span class="event_date_full"><?=date('M, d Y') ?> </span>
								</div>		
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
						</div>
							
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
				</div>
			</div>
		</div>
  <?php $this->load->view('inc/foot'); ?>
  <!-- clndr -->
  <script src="<?=base_url() ?>assets/lib/underscore-js/underscore-min.js"></script>
  <script src="<?=base_url() ?>assets/lib/CLNDR/src/clndr.js"></script>
  <script src="<?=base_url() ?>assets/js/apps/tisa_todo.js"></script>
  </body>

<!-- Mirrored from tisa-admin.tzdthemes.com/tasks_summary.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Aug 2015 05:23:39 GMT -->
</html>
