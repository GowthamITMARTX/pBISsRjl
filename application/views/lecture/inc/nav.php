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
            <!-- STUDENT CODE ENDING -->
        <?php endif; ?>
 </ul>
</nav>