<?php
    include('../core/validate/timetable.php');

    $getAdmin = $stu->getStudentData($_SESSION['username']);
    $getSession = $stu->getStudentData($_SESSION['username']);
    $gettimetable = $admin->getTimeTable();

    $dateadded = date('Y-m-d');

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
	<title>Timetable</title>
	
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
						<h4 class="page-title">Time Table</h4>
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
								<a href="time_table">Time Table</a>
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
                                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Add Time Table</a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="username">Title</label>
                                                        <input name="title" type="text" class="form-control" placeholder="Title">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Select File</label>
                                                        <div class="input-group">                   
                                                            <input type="file" name="file_name" class="form-control" accept=".pdf, .doc, .docx, .jpg, .png">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right mt-3 mb-3">
                                                <input type="submit" name="btn_save_timetable" class="btn btn-success" onchange="this.form.submit();" value="Save">
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
                                            <ul class="nav nav-tabs nav-line nav-color-dark w-100 pl-3" role="tablist">
                                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">List of Time Table(s)</a> </li>
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
                                                        <th>TITLE</th>
                                                        <th>NAME</th>
                                                        <th>STATUS</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    <?php $i =1; foreach ($gettimetable as $timetable){ ?>
                                                    <tr>
                                                        <td class="text-bold-500"><?php echo $i++;?></td>
                                                        <td><?php echo $timetable->title; ?></td>
                                                        <td class="text-bold-500"><?php echo $timetable->name; ?></td>
                                                        <?php if($timetable->status == 'In-Active'): ?>
                                                        <td><span class="badge bg-danger"><?php echo $timetable->status; ?></span>
                                                        </td>
                                                        <td>
                                                            <form method="POST">
                                                                <input type="hidden" name="material_id" value="<?php echo $timetable->id; ?>">
                                                                <input type="submit" onclick="return confirm('Activate this File?');" class="mt-2 btn btn-sm btn-success" value="Enable" name="btn_enable">
                                                                <input type="submit" onclick="return confirm('Delete this File?');" class="mt-2 btn btn-sm btn-danger" onchange="this.form.submit();" value="Delete" name="btn_delete">
                                                            </form>
                                                        </td>
                                                        <!-- Not Active Ends Here -->

                                                        <!-- Active Starts Here -->
                                                        <?php elseif($timetable->status == 'Active'): ?>
                                                        <td><span class="badge bg-success"><?php echo $timetable->status; ?></span>
                                                        </td>
                                                        <td>
                                                            <form method="POST">
                                                                <input type="hidden" name="material_id" value="<?php echo $timetable->id; ?>">
                                                                <input type="submit" onclick="return confirm('De-Activate this File?');" class="mt-2 btn btn-sm btn-warning" value="Disable" name="btn_disable">
                                                                <input type="submit" onclick="return confirm('Delete this File?');" class="mt-2 btn btn-sm btn-danger" onchange="this.form.submit();" value="Delete" name="btn_delete">
                                                            </form>
                                                        </td>
                                                        <?php endif; ?>
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