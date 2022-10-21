<?php
    include('../core/validate/course_material.php');

    $getAdmin = $stu->getStudentData($_SESSION['username']);
    $getSession = $stu->getStudentData($_SESSION['username']);
    $getMaterial = $admin->getAllCourseMaterial();

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
	<title>Course Material</title>
	
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
						<h4 class="page-title">Course Material</h4>
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
								Course Material
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
                                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Add Course Material</a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="title">Title</label>
                                                        <input name="title" type="text" class="form-control" placeholder="Title">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="level">Level</label>
                                                        <select name="level" class="form-control">
                                                            <option value="ND I">ND I</option>
                                                            <option value="ND II">ND II</option>
                                                            <option value="ND III">ND III</option>
                                                            <option value="HND I">HND I</option>
                                                            <option value="HND II">HND II</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="semester">Semester</label>
                                                        <select name="semester" class="form-control">
                                                            <option value="First Semester">First Semester</option>
                                                            <option value="Second Semester">Second Semester</option>
                                                            <option value="Third Semester">Third Semester</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="course_code">Course Code</label>
                                                        <input name="course_code" type="text" class="form-control" placeholder="Course Code">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Select File</label>
                                                        <div class="input-group">                   
                                                            <input type="file" name="material" class="form-control" accept=".pdf, .doc, .docx, .xlsx, .xls">
                                                        </div>
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
                                            <ul class="nav nav-tabs nav-line nav-color-dark w-100 pl-3" role="tablist">
                                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">List of Course Material(s)</a> </li>
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
                                                        <th>LEVEL</th>
                                                        <th>COURSE CODE</th>
                                                        <th>DATE ADDED</th>
                                                        <th>STATUS</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    <?php $i =1; foreach ($getMaterial as $materials){ ?>
                                                    <tr>
                                                        <td class="text-bold-500"><?php echo $i++;?></td>
                                                        <td><?php echo $materials->title; ?></td>
                                                        <td class="text-bold-500"><?php echo $materials->level; ?></td>
                                                        <td class="text-bold-500"><?php echo $materials->course_code; ?></td>
                                                        <td><?php echo $materials->date; ?></td>
                                                        <!-- Not Active Starts Here -->
                                                        <?php if($materials->status == 'In-Active'): ?>
                                                        <td><span class="badge bg-danger"><?php echo $materials->status; ?></span>
                                                        </td>
                                                        <td>
                                                            <form action="" method="POST">
                                                                <input type="hidden" name="material_id" value="<?php echo $materials->id; ?>">
                                                                <input type="submit" onclick="return confirm('Enable this material?');" class="mt-2 btn btn-sm btn-success" value="Enable" name="btn_enable_material">
                                                                <input type="submit" onclick="return confirm('Delete this material?');" class="mt-2 btn btn-sm btn-danger" value="Delete" name="btn_delete_material">
                                                            </form>
                                                        </td>
                                                        <!-- Not Active Ends Here -->

                                                        <!-- Active Starts Here -->
                                                        <?php elseif($materials->status == 'Active'): ?>
                                                        <td><span class="badge bg-success"><?php echo $materials->status; ?></span>
                                                        </td>
                                                        <td>
                                                            <form action="" method="POST">
                                                                <input type="hidden" name="material_id" value="<?php echo $materials->id; ?>">
                                                                <input type="submit" onclick="return confirm('Disable this material?');" class="mt-2 btn btn-sm btn-warning" value="Disable" name="btn_disable_material">
                                                                <input type="submit" onclick="return confirm('Delete this material?');" class="mt-2 btn btn-sm btn-danger" value="Delete" name="btn_disable_material">
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