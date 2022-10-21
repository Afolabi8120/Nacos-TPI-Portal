<?php
    include('../core/init.php');

    if(isset($_POST['btn_save_post'])){
        // passing data received from user into variable
        $post_title = $_POST['post_title'];
        $post_body = $_POST['post_body'];
        $date_added = date('d M, Y g:i A');

        $post_id = date('d-m-Y').'/'.$post_title;

        // Form Validation 
        if(empty($post_title) || empty($post_body)){
            $_SESSION['ErrorMessage'] = "All fields are Required";
        }else{
            $post_title = $admin->validateInput($post_title);
            $post_body = $admin->validateInput($post_body);

            if($admin->addPost($post_id,$post_title,$post_body,$date_added) === true){
                $_SESSION['SuccessMessage'] = "Post Added Successfully";
            }else{
                $_SESSION['ErrorMessage'] = "Failed To Post";
            }
        }       
    }elseif(isset($_POST['btn_delete_post'])){
        $post_id = $_POST['post_id'];

        if ($admin->removePost($post_id)) {
                $_SESSION['SuccessMessage'] = "Post Have Been Deleted Successfully";
        }else{
               	$_SESSION['ErrorMessage'] = "Failed to Delete Post";
        }
    }


?>