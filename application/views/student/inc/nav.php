<nav id="side_nav">
    <ul>
        <li>
            <a href="<?= base_url('students/profile'); ?>"><span class="ion-speedometer"></span> <span
                    class="nav_title">Dashboard</span></a>
        </li>
        <?php if($this->session->userdata('user')): ?>
            <li>
                <a href="<?= base_url() ?>students/timetable">
                    <span class=" ion-calendar "></span>
                    <span class="nav_title">Timetable</span>
                </a>

            </li>
            <!-- STUDENT CODE ENDING -->
        <?php endif; ?>
 </ul>
</nav>