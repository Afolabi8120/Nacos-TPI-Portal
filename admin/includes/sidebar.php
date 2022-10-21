<!-- Sidebar -->
<?php if($getAdmin->usertype == 'Super Admin'): ?>
<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
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
                    <a href="add-post">
                        <i class="fas fa-book"></i>
                        <p>Add Post</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="post-record">
                        <i class="fas fa-folder-open"></i>
                        <p>Post Record</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="add-exco">
                        <i class="fas fa-users"></i>
                        <p>Add Exco</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="add_material">
                        <i class="fas fa-book"></i>
                        <p>Add Course Material</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="time_table">
                        <i class="fas fa-file"></i>
                        <p>Add Time Table</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="library">
                        <i class="fas fa-book"></i>
                        <p>E Library</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="user_management">
                        <i class="fas fa-users"></i>
                        <p>User Management</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="result">
                        <i class="fas fa-folder"></i>
                        <p>Add Result</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="all_user">
                        <i class="fas fa-user-circle"></i>
                        <p>All Student</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="payment-list">
                        <i class="fas fa-folder-open"></i>
                        <p>Paid Payment</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="pending-payment">
                        <i class="fas fa-folder"></i>
                        <p>Pending Payment</p>
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
<?php elseif($getAdmin->usertype == 'Admin'): ?>
<div class="sidebar sidebar-style-2">           
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
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
                    <a href="add_material">
                        <i class="fas fa-book"></i>
                        <p>Add Course Material</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="result">
                        <i class="fas fa-folder"></i>
                        <p>Add Result</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="all-student">
                        <i class="fas fa-user-circle"></i>
                        <p>All Student</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="payments">
                        <i class="fas fa-folder-open"></i>
                        <p>Paid Payment</p>
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

<?php elseif($getAdmin->usertype == 'User'): ?>
<div class="sidebar sidebar-style-2">           
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
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
                    <a href="add-post">
                        <i class="fas fa-book"></i>
                        <p>Add Post</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="post-record">
                        <i class="fas fa-folder-open"></i>
                        <p>Post Record</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="library">
                        <i class="fas fa-book"></i>
                        <p>E Library</p>
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
<?php endif; ?>