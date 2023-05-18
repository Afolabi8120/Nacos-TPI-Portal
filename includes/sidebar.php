<!-- Sidebar -->
<div class="sidebar sidebar-style-2">           
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <!-- <div class="user">
                <div class="avatar-sm avatar avatar-online float-left mr-2">
                <span class="avatar-title rounded-circle border border-success text-white">
                    <div class="form-group">                   
                        <img class="img-profile rounded-circle" src="../student_img/<?php echo $getStudent->picture; ?>" width="40px" height="40px">
                    </div>
                </span>

                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <span class="user-level">
                                <?php echo $getStudent->fullname; ?>
                            </span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->
            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a href="dashboard" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>
                    
                <li class="nav-item">
                    <a href="profile">
                        <i class="fas fa-user-circle"></i>
                        <p>Profile</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="make_payment">
                        <i class="fas fa-money-check-alt"></i>
                        <p>Make Payment</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="timetable">
                        <i class="fas fa-file"></i>
                        <p>Time Table</p>
                    </a>
                </li>

                <?php if($checkDue == true AND $checkDue->payment_status == "1"): ?>

                <li class="nav-item">
                    <a href="receipt">
                        <i class="fas fa-receipt"></i>
                        <p>Receipt</p>
                    </a>
                </li>

                <?php endif; ?>

                <li class="nav-item">
                    <a href="course_material">
                        <i class="fas fa-book"></i>
                        <p>Course Material</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="result">
                        <i class="fas fa-id-badge"></i>
                        <p>Result</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="library">
                        <i class="fas fa-book"></i>
                        <p>E Library</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="certificate">
                        <i class="fas fa-book"></i>
                        <p>Certificate</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="change_password">
                        <i class="fas fa-cog"></i>
                        <p>Change Password</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="logout">
                        <i class="fas fa-power-off"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->