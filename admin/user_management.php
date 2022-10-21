<?php
    include('../core/validate/user_management.php');

    $getAdmin = $stu->getStudentData($_SESSION['username']);
    $getSession = $stu->getStudentData($_SESSION['username']);
    $getAllUser = $admin->getAllAdmin($_SESSION['username']);

    if(isset($_SESSION['username']))
    {  
        if($_SESSION['session_id'] !== $getSession->session){
            header('location: ../index');
            $_SESSION['ErrorMessage'] = "You have been logged out from another device";
        }
    }else{
        header('location: ../index');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Manage User</title>
	
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="../assets/img/icon.png" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="./css/css/fonts.min.css">
    <link rel="stylesheet" href="./css/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/css/atlantis.css">
</head>
<body>
	<div class="wrapper">
		<?php require_once('./includes/header.php') ?>

		<?php require_once('./includes/sidebar.php') ?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Manage User</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="profile.php">Manage User</a>
							</li>
						</ul>
					</div>
					<div class="page-category">
                        <?php
                            echo ErrorMessage();
                            echo SuccessMessage();
                        ?>
						<div class="row">
                            <div class="col-md-12">
                                <div class="card card-with-nav">
                                    <div class="card-header">
                                        <div class="row row-nav-line">
                                            <ul class="nav nav-tabs nav-line nav-color-dark w-100 pl-3" role="tablist">
                                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Create User Account</a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="username">Username</label>
                                                        <input name="username" type="text" class="form-control" placeholder="Username">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Full Name</label>
                                                        <input type="text" class="form-control" placeholder="Full Name" name="fullname" >
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" placeholder="Email Address"  name="email">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label for="username">Gender</label>
                                                        <select name="gender" class="form-control">
                                                            <option selected="" disabled="">Select Gender</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="username">Usertype</label>
                                                        <select name="usertype" class="form-control">
                                                            <option selected="" disabled="">Select Usertype</option>
                                                            <option value="Admin">Admin</option>
                                                            <option value="User">User</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="username">Status</label>
                                                        <select name="status" class="form-control">
                                                            <option selected="" disabled="">Select Status</option>
                                                            <option value="Active">Active</option>
                                                            <option value="Not Active">Not Active</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input name="password" type="password" class="form-control" placeholder="Password">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="password">Retype Password</label>
                                                        <input name="password2" type="password" class="form-control" placeholder="Retype Password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right mt-3 mb-3">
                                                <input type="submit" name="btn_save" class="btn btn-success" value="Save">
                                                <a href="dashboard" class="btn btn-danger">Back</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
					    </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-with-nav">
                                    <div class="card-header">
                                        <div class="row row-nav-line">
                                            <ul class="nav nav-tabs nav-line nav-color-success w-100 pl-3" role="tablist">
                                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">List of User(s)</a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                       <!-- table striped -->
                                        <div class="table-responsive">
                                            <table id="basic-datatables" class="display table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>USERNAME</th>
                                                        <th>FULLNAME</th>
                                                        <th>EMAIL</th>
                                                        <th>GENDER</th>
                                                        <th>STATUS</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    <?php $i =1; foreach ($getAllUser as $users){ ?>
                                                    <tr>
                                                        <td class="text-bold-500"><?php echo $i++;?></td>
                                                        <td><?php echo $users->matricno; ?></td>
                                                        <td class="text-bold-500"><?php echo $users->fullname; ?></td>
                                                        <td class="text-bold-500"><?php echo $users->email; ?></td>
                                                        <td><?php echo $users->gender; ?></td>
                                                        <!-- Not Active Starts Here -->
                                                        <?php if($users->status == 'In-Active'): ?>
                                                        <td><span class="badge bg-danger"><?php echo $users->status; ?></span>
                                                        </td>
                                                        <td>
                                                            <form method="POST">
                                                                <input type="hidden" name="user_id" value="<?php echo $users->id; ?>">
                                                                <input type="submit" onchange="this.form.submit();" onclick="return confirm('Enable this account?');" class="mt-2 btn btn-sm btn-success" value="Enable" name="btn_enable">
                                                                <input type="submit" onclick="return confirm('Delete this account?');" class="mt-2 btn btn-sm btn-danger" onchange="this.form.submit();" value="Delete" name="btn_delete">
                                                            </form>
                                                        </td>
                                                        <!-- Not Active Ends Here -->

                                                        <!-- Active Starts Here -->
                                                        <?php elseif($users->status == 'Active'): ?>
                                                        <td><span class="badge bg-success"><?php echo $users->status; ?></span>
                                                        </td>
                                                        <td>
                                                            <form method="POST">
                                                                <input type="hidden" name="user_id" value="<?php echo $users->id; ?>">
                                                                <input type="submit" onchange="this.form.submit();" onclick="return confirm('Disable this account?');" class="mt-2 btn btn-sm btn-warning" value="Disable" name="btn_disable">
                                                                <input type="submit" onclick="return confirm('Delete this account?');" class="mt-2 btn btn-sm btn-danger" onchange="this.form.submit();" value="Delete" name="btn_delete">
                                                            </form>
                                                        </td>
                                                        <?php endif; ?>
                                                        <!-- Active Ends Here -->
                                                        <?php } ?>
                                                    </tr>  
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>

            <?php include_once('./includes/footer.php'); ?>
            <?php include_once('./includes/js.php'); ?>
		</div>
		
	</div>
  
</body>
</html>