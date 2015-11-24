<nav id="side_nav">
    <ul>
        <li>
            <a href="<?= base_url('students/home'); ?>"><span class="ion-speedometer"></span> <span
                    class="nav_title">Dashboard</span></a>
        </li>
        <?php if($this->session->userdata('user')): ?>
            <li>
                <a href="<?= base_url() ?>students/profile">
                    <span class=" ion-android-contact "></span>
                    <span class="nav_title">Profile</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>students/timetable">
                    <span class=" ion-calendar "></span>
                    <span class="nav_title">Timetable</span>
                </a>
            </li>
             <li>
                <a href="<?=base_url();?>students/assignment">
                    <span class="ion-android-folder"></span>
                    <span class="nav_title">Assignment</span>
                </a>
            </li>
        <?php endif; ?>
 </ul>
</nav>