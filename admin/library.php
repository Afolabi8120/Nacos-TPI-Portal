<?php
    include('../core/validate/library.php');

    $getAdmin = $stu->getStudentData($_SESSION['username']);
    $getSession = $stu->getStudentData($_SESSION['username']);
    $getAllMaterial = $admin->getAllLibraryMaterial();

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
	<title>Manage Library</title>
	
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
						<h4 class="page-title">Manage Library</h4>
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
								<a href="profile.php">Manage Library</a>
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
                                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Add Library Material</a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="booktitle">Book Title</label>
                                                        <input name="booktitle" type="text" class="form-control" placeholder="Book Title">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="aname">Author's Name</label>
                                                        <input name="aname" type="text" class="form-control" placeholder="Author's Name">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="category">Category</label>
                                                        <select name="category" class="form-control">
                                                            <option selected="" disabled="">Select Category</option>
                                                            <option value="Accounting">Accounting</option>
                                                            <option value="Comedy">Comedy</option>
                                                            <option value="Cars">Cars</option>
                                                            <option value="Engineering">Engineering</option>
                                                            <option value="Mathematics">Mathematics</option>
                                                            <option value="Science">Science</option>
                                                            <option value="Statistics">Statistics</option>
                                                            <option value="Motivation">Motivation</option>
                                                            <option value="Mystery">Mystery</option>
                                                            <option value="Nature">Nature</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Select Book</label>
                                                        <div class="input-group">                              
                                                            <input type="file" name="book_name" accept=".pdf, .doc, .docx" class="form-control" id="book_name" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right mt-3 mb-3">
                                                <input type="submit" name="btn_save_library" class="btn btn-success" value="Save">
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
                                            <ul class="nav nav-tabs nav-line nav-color-primary w-100 pl-3" role="tablist">
                                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="" role="tab" aria-selected="true">List of Library Materials</a> </li>
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
                                                        <th>AUTHOR'S NAME</th>
                                                        <th>CATEGORY</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    <?php $i =1; foreach ($getAllMaterial as $book){ ?>
                                                    <tr>
                                                        <td class="text-bold-500"><?php echo $i++;?></td>
                                                        <td class="text-bold-500"><?php echo $book->title; ?></td>
                                                        <td class="text-bold-500"><?php echo $book->name; ?></td>
                                                        <td class="text-bold-500"><?php echo $book->category; ?></td>
                                                        <td>
                                                            <form method="POST">
                                                                <input type="hidden" name="book_id" value="<?php echo $book->id; ?>">
                                                                <input type="hidden" name="book_name" value="<?php echo $book->book_name; ?>">
                                                                <input type="submit" onclick="return confirm('Remove this book?');" class="mt-2 btn btn-sm btn-danger" value="Delete" name="btn_delete_library">
                                                            </form>
                                                        </td>
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