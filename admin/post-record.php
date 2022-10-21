<?php
    include('../core/validate/post.php');

    $getAdmin = $stu->getStudentData($_SESSION['username']);
    $getSession = $stu->getStudentData($_SESSION['username']);
    $getPost = $admin->getAllPost();

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
	<title>Add Post</title>
	
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
						<h4 class="page-title">Post Record</h4>
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
								Post Record
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
                                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Post Record(s)</a> </li>
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
                                                        <th>BODY</th>
                                                        <th>ADDED BY</th>
                                                        <th>DATE ADDED</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    <?php $i =1; foreach ($getPost as $post){ ?>
                                                    <tr>
                                                        <td class="text-bold-500"><?php echo $i++;?></td>
                                                        <td><?php echo $post->title; ?></td>
                                                        <td class="text-bold-500"><?php echo substr($post->body, 0, 30) .'...'; ?></td>
                                                        <td class="text-bold-500">Admin</td>
                                                        <td><?php echo $post->date_added; ?></td>
                                                        <td>
                                                            <form action="" method="POST">
                                                                <input type="hidden" name="post_id" value="<?php echo $post->id; ?>">
                                                                <input type="submit" onclick="return confirm('Delete this Post?');" class="mt-2 btn btn-sm btn-danger" value="Delete" name="btn_delete_post">
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