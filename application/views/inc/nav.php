    <nav id="side_nav">
    <ul>
      <!--  <li>
            <a href="<?/*= base_url() */?>"><span class="ion-speedometer"></span> <span
                    class="nav_title">Dashboard</span></a>
        </li>-->
        <?php $user = $this->session->userdata('role'); ?>
        <?php if( $user == 1  ): ?>
            <li>
                <a href="#">
                    <span class="ion-folder"></span>
                    <span class="nav_title">System</span>
                </a>

                <div class="sub_panel">
                    <div class="side_inner">
                        <h4 class="panel_heading panel_heading_first">Subject</h4>
                        <ul>
                            <li>
                                <a href="<?= base_url() ?>sys/subject">
                                    <span class="side_icon ion-ios7-folder-outline"></span>
                                    <span class="badge badge-primary"></span> Subject Summary
                                </a>
                            </li>
                            <li><a href="<?= base_url() ?>sys/subject/create"><span
                                        class="side_icon ion-android-add"></span> Create Subject </a></li>
                        </ul>
                        <h4 class="panel_heading panel_heading_first">Course</h4>
                        <ul>
                            <li>
                                <a href="<?= base_url() ?>sys/course">
                                    <span class="side_icon ion-ios7-folder-outline"></span>
                                    <span class="badge badge-primary"></span> Course Summary
                                </a>
                            </li>
                            <li><a href="<?= base_url() ?>sys/course/create"><span class="side_icon ion-android-add"></span>
                                    Create Course </a></li>
                        </ul>
                        <h4 class="panel_heading panel_heading_first">Batch</h4>
                        <ul>
                            <li>
                                <a href="<?= base_url() ?>sys/batch">
                                    <span class="side_icon ion-ios7-folder-outline"></span>
                                    <span class="badge badge-primary"></span> Batch Summary
                                </a>
                            </li>
                            <li><a href="<?= base_url() ?>sys/batch/create"><span class="side_icon ion-android-add"></span>
                                    Create Batch </a></li>
                        </ul>

                        <h4 class="panel_heading panel_heading_first">Class</h4>
                        <ul>
                            <li>
                                <a href="<?= base_url() ?>sys/cls">
                                    <span class="side_icon ion-ios7-folder-outline"></span>
                                    <span class="badge badge-primary"></span> Class Summary
                                </a>
                            </li>
                            <li><a href="<?= base_url() ?>sys/cls/create"><span
                                        class="side_icon ion-android-add"></span> Create Class </a></li>

                        </ul>
                    </div>
                </div>
            </li>
        <?php endif; ?>

        <?php if( $user == 1  ): ?>
            <li>
                <a href="#">
                    <span class="ion-android-contact"></span>
                    <span class="nav_title">Student</span>
                </a>

                <div class="sub_panel">
                    <div class="side_inner">
                        <h4 class="panel_heading panel_heading_first">Manage Student</h4>
                        <ul>
                            <li>
                                <a href="<?= base_url() ?>sys/student">
                                    <span class="side_icon  ion-android-friends "></span>
                                    <span class="badge badge-primary"></span> Student List
                                </a>
                            </li>
                            <li><a href="<?= base_url() ?>sys/student/create"><span class="side_icon ion-android-add-contact "></span>
                                    Create Student </a></li>
                        </ul>
                        <h4 class="panel_heading "> Class pool </h4>
                        <ul>
                            <li>
                                <a href="<?= base_url() ?>sys/student/enrollment">
                                    <span class="side_icon  ion-android-friends "></span>
                                    <span class="badge badge-primary"></span> Student Enrollment
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>sys/student/balance_payment">
                                    <span class="side_icon  ion-card "></span>
                                    <span class="badge badge-primary"></span> Balance Payment
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        <?php endif; ?>

        <?php if( $user == 1  ): ?>
            <li>
                <a href="#">
                    <span class="ion-person"></span>
                    <span class="nav_title">Lecturer</span>
                </a>
                <div class="sub_panel">
                    <div class="side_inner">
                        <h4 class="panel_heading panel_heading_first">Manage Lecturer</h4>
                        <ul>
                            <li>
                                <a href="<?= base_url() ?>sys/lecture">
                                    <span class="side_icon  ion-person-stalker "></span>
                                    <span class="badge badge-primary"></span> Lecturer List
                                </a>
                            </li>
                            <li><a href="<?= base_url() ?>sys/lecture/create"><span class="side_icon ion-person-add "></span>
                                    Create Lecture </a></li>
                            <li><a href="<?= base_url() ?>sys/lecture/subject"><span
                                        class="side_icon ion-usb "></span> Lecturer Subject Pool </a></li>
                        </ul>
                    </div>
                </div>
            </li>

            <li>
                <a href="#">
                    <span class="ion-android-social-user"></span>
                    <span class="nav_title">Employee</span>
                </a>
                <div class="sub_panel">
                    <div class="side_inner">
                        <h4 class="panel_heading panel_heading_first">Manage Employee</h4>
                        <ul>
                            <li>
                                <a href="<?= base_url() ?>sys/employee">
                                    <span class="side_icon  ion-person-stalker "></span>
                                    <span class="badge badge-primary"></span> Employee List
                                </a>
                            </li>
                            <li><a href="<?= base_url() ?>sys/employee/create"><span class="side_icon ion-person-add "></span>
                                    Create Employee </a></li>
                        </ul>
                    </div>
                </div>
            </li>
        <?php endif; ?>



        <?php if( $user == 1 ||  $user == 2 ): ?>
            <li>
                <a href="#">
                    <span class="ion-ios7-briefcase"></span>
                    <span class="nav_title">Transaction</span>
                </a>
                <div class="sub_panel">
                    <div class="side_inner">
                        <h4 class="panel_heading panel_heading_first">Payment</h4>
                        <ul>
                            <li>
                                <a href="<?= base_url() ?>cashier/payment/confirm">
                                    <span class="badge badge-primary"></span> Confirm payment
                                </a>
                            </li>
                            <li><a href="<?= base_url() ?>cashier/payment/view"> Payment History </a></li>
                        </ul>
                    </div>
                </div>
            </li>
        <?php endif; ?>


        <?php if( $user == 1   ): ?>
            <li>
                <a href="<?= base_url() ?>sys/expenses/other_income">
                    <span class="ion-ios7-briefcase"></span>
                    <span class="nav_title">Other Income</span>
                </a>
            </li>
        <?php endif; ?>

        <?php if( $user == 1  ): ?>
            <li>
                <a href="<?= base_url() ?>sys/timetable">
                    <span class=" ion-calendar "></span>
                    <span class="nav_title">Timetable</span>
                </a>

            </li>

            <li>
                <a href="#">
                    <span class=" ion-card "></span>
                    <span class="nav_title">Expenses</span>
                </a>
                <div class="sub_panel">
                    <div class="side_inner">
                        <h4 class="panel_heading panel_heading_first">Lecture</h4>
                        <ul>
                            <li><a href="<?= base_url() ?>sys/expenses/lecture_salary"> Lecture Salary </a></li>
                            <li><a href="<?= base_url() ?>sys/expenses/lecture_salary_report"> Lecture Salary Report </a></li>
                        </ul>
                        <h4 class="panel_heading panel_heading_first">Employee</h4>
                        <ul>
                            <li><a href="<?= base_url() ?>sys/expenses/employee_salary"> Employee Salary </a></li>
                            <li><a href="<?= base_url() ?>sys/expenses/employee_salary_report"> Employee Salary Report </a></li>
                        </ul>
                        <h4 class="panel_heading panel_heading_first">Other</h4>
                        <ul>
                            <li>  <a href="<?= base_url() ?>sys/expenses/expenses_type"> Create Expenses Type </a> </li>
                            <li> <a href="<?= base_url() ?>sys/expenses/expenses_type_list"> Expenses Type List   </a> </li>
                            <li><a href="<?= base_url() ?>sys/expenses/other_expenses"> Other Expenses </a></li>
                            <li><a href="<?= base_url() ?>sys/expenses/other_expenses_report"> Other Expenses Report </a></li>
                        </ul>
                    </div>
                </div>
            </li>
        <?php endif; ?>

















        <!--<li>
            <a href="#">
                <span class="label label-danger">32</span>
                <span class="ion-clipboard"></span>
                <span class="nav_title">Todo</span>
            </a>
            <div class="sub_panel">
                <div class="side_inner">
                    <h4 class="panel_heading panel_heading_first">Folders</h4>
                    <ul>
                        <li><a href="tasks_summary.html"><span class="side_icon ion-ios7-folder-outline"></span><span class="badge badge-primary">7</span> Summary</a></li>
                        <li><a href="tasks_starred.html"><span class="side_icon ion-ios7-star-outline"></span> Starred</a></li>
                        <li><a href="tasks_today.html"><span class="side_icon ion-ios7-calendar-outline"></span> Today</a></li>
                    </ul>
                    <h4 class="panel_heading">Labels</h4>
                    <ul>
                        <li class="add_label">
                            <a href="tasks_label.html">Work</a>
                            <div class="ts_label">
                                <span class="color_a"></span>
                            </div>
                        </li>
                        <li class="add_label">
                            <a href="tasks_label.html">Family</a>
                            <div class="ts_label">
                                <span class="color_b"></span>
                            </div>
                        </li>
                        <li class="add_label">
                            <a href="tasks_label.html">Business</a>
                            <div class="ts_label">
                                <span class="color_c"></span>
                            </div>
                        </li>
                        <li class="add_label">
                            <a href="tasks_label.html">Envato</a>
                            <div class="ts_label">
                                <span class="color_d"></span>
                            </div>
                        </li>
                    </ul>
                    <div class="panel_section">
                        <button class="btn btn-primary">Add task</button>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <a href="#">
                <span class="ion-paper-airplane"></span>
                <span class="nav_title">Newsletter</span>
            </a>
            <div class="sub_panel">
                <div class="side_inner">
                    <h4 class="panel_heading">Pages</h4>
                    <ul>
                        <li><a href="newsletter_campaigns.html">Campaigns</a></li>
                        <li><a href="newsletter_report.html">Reports</a></li>
                        <li><a href="newsletter_templates.html">Templates</a></li>
                    </ul>
                    <h4 class="panel_heading">Latest Campaigns</h4>
                    <ul>
                        <li><a href="newsletter_report.html">Stanton LLC</a></li>
                        <li><a href="newsletter_report.html">Veum Group</a></li>
                        <li><a href="newsletter_report.html">Langosh Inc</a></li>
                    </ul>
                    <div class="panel_section">
                        <button class="btn btn-success btn-sm">New Campaign</button>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <a href="#">
                <span class="ion-bag"></span>
                <span class="nav_title">Ecommerce</span>
            </a>
            <div class="sub_panel">
                <div class="side_inner">
                    <h4 class="panel_heading">Pages</h4>
                    <ul>
                        <li><a href="ecommerce_sales_report.html">Sales Report</a></li>
                        <li><a href="ecommerce_products_list.html">Products List</a></li>
                        <li><a href="ecommerce_product_edit.html">Product Edit</a></li>
                    </ul>
                    <h4 class="panel_heading">Top Products</h4>
                    <ul>
                        <li><a href="ecommerce_product_edit.html"><span class="badge badge-success">$2 344.00</span> Product A</a></li>
                        <li><a href="ecommerce_product_edit.html"><span class="badge badge-default">$1 217.53</span> Product B</a></li>
                        <li><a href="ecommerce_product_edit.html"><span class="badge badge-default">$684.62</span> Product C</a></li>
                    </ul>
                    <h4 class="panel_heading">Top Categories</h4>
                    <ul>
                        <li><a href="#"><span class="badge badge-success">18</span> Category 1</a></li>
                        <li><a href="#"><span class="badge badge-default">9</span> Category 2</a></li>
                    </ul>
                </div>
            </div>
        </li>
        <li>
            <a href="#">
                <span class="label label-success">14</span>
                <span class="ion-ios7-email-outline"></span>
                <span class="nav_title">Mailbox</span>
            </a>
            <div class="sub_panel">
                <div class="side_inner">
                    <form class="panel_section form-search">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control input-sm" placeholder="Search...">
									<span class="input-group-btn">
										<button class="btn btn-default btn-sm" type="submit"><span class="glyphicon glyphicon-search"></span></button>
									</span>
                        </div>
                    </form>
                    <div class="panel_section">
                        <a href="mail_compose.html" class="btn btn-sm btn-danger">New message</a>
                    </div>
                    <h4 class="panel_heading">Folders</h4>
                    <ul>
                        <li><a href="mail_inbox.html"><span class="side_icon ion-ios7-filing-outline"></span> Inbox <small class="text-muted pull-right">(142)</small></a></li>
                        <li><a href="mail_outbox.html"><span class="side_icon ion-ios7-paperplane-outline"></span> Sent Mail</a></li>
                        <li><a href="mail_spam.html"><span class="side_icon ion-ios7-close-outline"></span> Spam <small class="text-danger pull-right">(23)</small></a></li>
                        <li><a href="#"><span class="side_icon ion-ios7-compose-outline"></span> Drafts</a></li>
                        <li><a href="#"><span class="side_icon ion-ios7-trash-outline"></span> Deleted</a></li>
                    </ul>
                    <h4 class="panel_heading">Labels</h4>
                    <ul>
                        <li class="add_label">
                            <a href="#">Work</a>
                            <div class="ts_label">
                                <span class="color_a"></span>
                            </div>
                        </li>
                        <li class="add_label">
                            <a href="#">Family</a>
                            <div class="ts_label">
                                <span class="color_b"></span>
                            </div>
                        </li>
                        <li class="add_label">
                            <a href="#">Business</a>
                            <div class="ts_label">
                                <span class="color_c"></span>
                            </div>
                        </li>
                        <li class="add_label">
                            <a href="#">Envato</a>
                            <div class="ts_label">
                                <span class="color_d"></span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
        <li>
            <a href="#">
                <span class="ion-beaker"></span>
                <span class="nav_title">Components</span>
            </a>
            <div class="sub_panel">
                <div class="side_inner">
                    <h4 class="panel_heading panel_heading_first">Form Elements</h4>
                    <ul>
                        <li><a href="form_elements.html">Regular Elements</a></li>
                        <li><a href="form_extended_elements.html">Extended Elements</a></li>
                        <li><a href="form_validation.html">Form Validation</a></li>
                        <li><a href="multiupload.html">Multiupload</a></li>
                        <li><a href="form_wizard.html">Wizard</a></li>
                        <li><a href="form_wysiwg.html">WYSIWG Editor</a></li>
                    </ul>
                    <h4 class="panel_heading">Tables</h4>
                    <ul>
                        <li><a href="tables_regular.html">Regular</a></li>
                        <li><a href="tables_datatables.html">Datatables</a></li>
                    </ul>
                    <h4 class="panel_heading">Other Components</h4>
                    <ul>
                        <li><a href="calendar.html">Calendar</a></li>
                        <li><a href="charts.html">Charts</a></li>
                        <li><a href="easy_tree.html">Easy Tree</a></li>
                        <li><a href="editable_elements.html">Editable Elements</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="image_zoom.html">Image Zoom</a></li>
                        <li><a href="notifications.html">Notifications</a></li>
                        <li><a href="modals_lightbox.html">Modals, Lightbox</a></li>
                        <li><a href="tabs_accordions.html">Tabs, Accordions</a></li>
                        <li><a href="tooltips_popovers.html">Tooltips, Popovers</a></li>
                    </ul>
                </div>
            </div>
        </li>
        <li>
            <a href="#">
                <span class="ion-ios7-albums-outline"></span>
                <span class="nav_title">Others</span>
            </a>
            <div class="sub_panel">
                <div class="side_inner">
                    <h4 class="panel_heading panel_heading_first">UI Elements</h4>
                    <ul>
                        <li><a href="alerts_buttons.html">Alerts, Buttons</a></li>
                        <li><a href="grid.html">Grid</a></li>
                        <li><a href="icons.html">Icons</a></li>
                        <li><a href="sidebar_accordion.html">Sidebar Accordion</a></li>
                        <li><a href="typography.html">Typography</a></li>
                    </ul>
                    <h4 class="panel_heading">Pages</h4>
                    <ul>
                        <li><a href="blank.html">Blank</a></li>
                        <li><a href="chat.html">Chat</a></li>
                        <li><a href="error_404.html">Error 404</a></li>
                        <li><a href="invoice.html">Invoice</a></li>
                        <li><a href="login_page.html">Login Page</a></li>
                        <li><a href="user_list.html">User List</a></li>
                        <li><a href="user_profile.html">User Profile</a></li>
                    </ul>
                </div>
            </div>
        </li>-->
    </ul>
</nav>