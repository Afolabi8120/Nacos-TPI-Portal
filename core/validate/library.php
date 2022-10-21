<?php
    include('../core/init.php');

    if(isset($_POST['btn_save_library']) && !empty($_POST['btn_save_library'])){
        // passing data received from user into variable
        $booktitle = $_POST['booktitle'];
        $aname = $_POST['aname'];
        $category = $_POST['category'];

        // Form Validation 
        if(empty($booktitle) || empty($aname) || empty($category)){
            $_SESSION['ErrorMessage'] = "All fields are Required";
        }else{
            $booktitle = $stu->validateInput($booktitle);
            $aname = $stu->validateInput($aname);
            $category = $stu->validateInput($category);

            $book_name = $_FILES['book_name']['name'];

            //specifying the supported file extension
            $validextensions = ['pdf', 'doc', 'docx'];
            $ext = explode('.', basename($_FILES['book_name']['name']));

            //explode file name from dot(.)
            $file_extension = end($ext);
            $book_name = uniqid().".".$file_extension;
            $target = '../elibrary/' . $book_name;

            if(!in_array($file_extension, $validextensions)){ 
                $_SESSION['ErrorMessage'] = "Please select a valid book format";
                return;
            }else{
                if($admin->addLibraryMaterial($booktitle,$aname,$category,$book_name)){
                    move_uploaded_file($_FILES['book_name']['tmp_name'], $target); // move file to elibrary folder
                    $_SESSION['SuccessMessage'] = "Added Successfully";
                }else{
                    $_SESSION['SuccessMessage'] = "Failed To Save";
                }
            }
        }

    }elseif(isset($_POST['btn_delete_library']) && !empty($_POST['btn_delete_library'])){ // to delete library material
        $book_id = $_POST['book_id'];
        $book_name = $_POST['book_name'];

        if($admin->deleteLibraryMaterial($book_id)){
            if($book_path = '../elibrary/' . $book_name){
                unlink($book_path);
                $_SESSION['SuccessMessage'] = "Book has been removed successfully";
            }
        }else{
            $_SESSION['ErrorMessage'] = "Failed to remove book";
        }
    }


?>