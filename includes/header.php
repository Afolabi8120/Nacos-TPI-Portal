<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark">
        <a href="dashboard" class="logo">
			<img src="../assets/img/icon.png" height="50px" width="50px" alt="navbar brand" class="navbar-brand">
		</a>

        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">
        
        <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                
                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                            <div class="avatar-sm avatar avatar-online">
                                <img src="../student_img/<?php echo $getStudent->picture; ?>" alt="image profile" class="avatar-img rounded-circle">
                            </div>
                        </a>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg avatar avatar-online">
                                        <img src="../student_img/<?php echo $getStudent->picture; ?>" alt="image profile" class="avatar-img rounded">
                                    </div>

                                    <div class="u-text">
                                        <h4><?php echo $getStudent->fullname; ?></h4>
                                        <p class="text-muted"><?php echo $getStudent->email; ?></p>
                                        <a href="profile" class="btn btn-xs btn-dark btn-sm">
                                            View Profile
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li>    
                                <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="change_password">Change Password</a>
                                <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout">Logout</a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>