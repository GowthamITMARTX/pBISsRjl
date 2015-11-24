<nav id="side_nav">
    <ul>
        <li>
            <a href="<?= base_url('lecture/profile'); ?>"><span class="ion-speedometer"></span> <span
                    class="nav_title">Dashboard</span></a>
        </li>
        <?php if($this->session->userdata('lecture')): ?>
            <li>
                <a href="<?= base_url() ?>lecture/timetable">
                    <span class=" ion-calendar "></span>
                    <span class="nav_title">Timetable</span>
                </a>
           </li>
           <li>
               <a href="<?=base_url();?>lecture/students">
                    <span class="ion-android-contact"></span>
                    <span class="nav_title">Student</span>
                </a>
           </li>
            <li>
                <a href="<?=base_url();?>lecture/assignment">
                    <span class="ion-android-folder"></span>
                    <span class="nav_title">Assignment</span>
                </a>
                <div class="sub_panel">
                    <div class="side_inner">
                        <h4 class="panel_heading panel_heading_first">Manage Assignment</h4>
                        <ul>
                            <li>
                                <a href="<?= base_url() ?>lecture/assignment">
                                    <span class="side_icon ion-ios7-folder-outline "></span>
                                    <span class="badge badge-primary"></span> View Assignment
                                </a>
                            </li>
                            <li><a href="<?= base_url() ?>lecture/assignment/submitted"><span class="side_icon  ion-android-friends "></span>
                                    Submitted Students </a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <!-- STUDENT CODE ENDING -->
        <?php endif; ?>
 </ul>
</nav>