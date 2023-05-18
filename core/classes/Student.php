<?php

	class Student {

		protected $pdo;

		function __construct($pdo){
			$this->pdo = $pdo;
		}

		public function validateInput($var){
			$var = htmlspecialchars($var);
			$var = trim($var);
			$var = stripcslashes($var);
			return $var;
		}

		public function passwordMatch($password,$cpassword){
			if($password === $cpassword){
				return true;
			}else{
				return false;
			}
		}

		// this will generate the image name for the student based on its gender
		public function setImageName($name){
            if($name == "Male"){
                $stu_img = "male.jpg";
            }elseif($name == "Female"){
                $stu_img = "female.jpg";
            }

            return $stu_img;
        }

        public function getLastID(){
        	$stmt = $this->pdo->prepare("SELECT COUNT(usertype) FROM tblstudent WHERE usertype = 'Student' ");
        	$stmt->execute();

        	$count = $stmt->fetchColumn();

        	return $count + 1;
        }

        public function checkMatricNo($matricno){
        	$stmt = $this->pdo->prepare("SELECT matricno FROM tblstudent WHERE matricno = :matricno");
			$stmt->bindParam(":matricno", $matricno, PDO::PARAM_STR);
			$stmt->execute();
			
			$count = $stmt->rowCount();

			if($count > 0){
				return true;
			}else{
				return false;
			}
        }

        public function checkEmail($email){
        	$stmt = $this->pdo->prepare("SELECT email FROM tblstudent WHERE email = :email");
        	$stmt->bindParam(":email", $email, PDO::PARAM_STR);
        	$stmt->execute();

        	$count = $stmt->rowCount();

        	if($count > 0){
				return true;
			}else{
				return false;
			}
        }

        public function checkPhone($phone){
        	$stmt = $this->pdo->prepare("SELECT phone FROM tblstudent WHERE phone = :phone");
        	$stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
        	$stmt->execute();

        	$count = $stmt->rowCount();

        	if($count > 0){
				return true;
			}else{
				return false;
			}
        }

        public function saveToken($email, $token){
        	$stmt = $this->pdo->prepare("INSERT INTO tblreset (email,token) VALUES(:email, :token)");
        	$stmt->bindParam(":email", $email, PDO::PARAM_STR);
        	$stmt->bindParam(":token", $token, PDO::PARAM_STR);
        	$stmt->execute();
        	return true;
        }

		public function register($matricno,$fullname,$email,$phone,$gender,$program,$level,$password,$picture,$nacos_id,$usertype,$section){
			$stmt = $this->pdo->prepare("INSERT INTO tblstudent (matricno,fullname,email,phone,gender,program,level,password,status,picture,nacos_id,usertype,section) VALUES(:matricno,:fullname,:email,:phone,:gender,:program,:level,:password,'Active',:picture,:nacos_id,:usertype,:section)");
			$stmt->bindParam(":matricno", $matricno, PDO::PARAM_STR);
			$stmt->bindParam(":fullname", $fullname, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
			$stmt->bindParam(":gender", $gender, PDO::PARAM_STR);
			$stmt->bindParam(":program", $program, PDO::PARAM_STR);
			$stmt->bindParam(":level", $level, PDO::PARAM_STR);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			$stmt->bindParam(":picture", $picture, PDO::PARAM_STR);
			$stmt->bindParam(":nacos_id", $nacos_id, PDO::PARAM_STR);
			$stmt->bindParam(":usertype", $usertype, PDO::PARAM_STR);
			$stmt->bindParam(":section", $section, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function manualPayment($email,$receipt_no,$amount_paid,$payment_status,$section){
			$stmt = $this->pdo->prepare("INSERT INTO tblpayment (email,receipt_no,amount_paid,payment_status,section) VALUES(:email,:receipt_no,:amount_paid,:payment_status,:section)");
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":receipt_no", $receipt_no, PDO::PARAM_STR);
			$stmt->bindParam(":amount_paid", $amount_paid, PDO::PARAM_STR);
			$stmt->bindParam(":payment_status", $payment_status, PDO::PARAM_STR);
			$stmt->bindParam(":section", $section, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function login($email){
			$stmt = $this->pdo->prepare("SELECT * FROM tblstudent WHERE email = :email");
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->execute();

			$count = $stmt->rowCount();

        	if($count > 0){
				return true;
			}else{
				return false;
			}
		}

		public function updateProfile($matricno,$fullname,$email,$phone,$gender,$program,$level){
			$stmt = $this->pdo->prepare("UPDATE tblstudent SET fullname=:fullname,email=:email,phone=:phone,gender=:gender,program=:program,level=:level WHERE matricno=:matricno");
			$stmt->bindParam(":matricno", $matricno, PDO::PARAM_STR);
			$stmt->bindParam(":fullname", $fullname, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
			$stmt->bindParam(":gender", $gender, PDO::PARAM_STR);
			$stmt->bindParam(":program", $program, PDO::PARAM_STR);
			$stmt->bindParam(":level", $level, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function updateStudentEditProfile($id,$matricno,$fullname,$email,$phone,$gender,$program,$level){
			$stmt = $this->pdo->prepare("UPDATE tblstudent SET matricno=:matricno,fullname=:fullname,email=:email,phone=:phone,gender=:gender,program=:program,level=:level WHERE id=:id");
			$stmt->bindParam(":id", $id, PDO::PARAM_STR);
			$stmt->bindParam(":matricno", $matricno, PDO::PARAM_STR);
			$stmt->bindParam(":fullname", $fullname, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
			$stmt->bindParam(":gender", $gender, PDO::PARAM_STR);
			$stmt->bindParam(":program", $program, PDO::PARAM_STR);
			$stmt->bindParam(":level", $level, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function updatePassword($id,$password){
			$stmt = $this->pdo->prepare("UPDATE tblstudent SET password=:password WHERE id=:id");
			$stmt->bindParam(":id", $id, PDO::PARAM_STR);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function updateResetPassword($email,$password){
			$stmt = $this->pdo->prepare("UPDATE tblstudent SET password=:password WHERE email=:email");
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function updateResetPasswordStatus($email){
			$stmt = $this->pdo->prepare("UPDATE tblreset SET status='1' WHERE email=:email");
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function deleteToken($email,$token){
			$stmt = $this->pdo->prepare("DELETE FROM tblreset WHERE token=:token AND email=:email");
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":token", $token, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function uploadImage($file){
			$filename = basename($file['name']);
			$fileTmp = $file['tmp_name'];
			$fileSize = $file['size'];

			$ext = explode('.', $filename);
			$ext = strtolower(end($ext));
			$allowed_ext = array('jpg', 'png', 'jpeg');

			if(in_array($ext, $allowed_ext) === true){
				if($fileSize <= 209272152){
					$fileRoot = '../student_img/' . $filename;
					move_uploaded_file($fileTmp, $fileRoot);
					return $filename;
				}
			}else{
				return false;
			}
		}

		public function updateImage($id,$picture){
			$stmt = $this->pdo->prepare("UPDATE tblstudent SET picture=:picture WHERE id=:id");
			$stmt->bindParam(":id", $id, PDO::PARAM_STR);
			$stmt->bindParam(":picture", $picture, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function getStudentData($email){
			$stmt = $this->pdo->prepare("SELECT * FROM tblstudent WHERE email = :email");
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);
		}

		public function getStudentPasswordByEmail($email){
			$stmt = $this->pdo->prepare("SELECT * FROM tblstudent WHERE email = :email");
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);
		}

		public function getResetEmail($token){
			$stmt = $this->pdo->prepare("SELECT * FROM tblreset WHERE token = :token");
			$stmt->bindParam(":token", $token, PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);
		}

		public function isFound($id){
			$stmt = $this->pdo->prepare("SELECT * FROM tblstudent WHERE id = :id AND usertype='Student' ");
			$stmt->bindParam(":id", $id, PDO::PARAM_STR);
			$stmt->execute();

			$count = $stmt->rowCount();

			if($count > 0){
				return true;
			}else{
				return false;
			}
		}

		// edit student details
		public function editStudentInfo($sid){
			$stmt = $this->pdo->prepare("SELECT * FROM tblstudent WHERE id = :sid AND usertype='Student' ");
			$stmt->bindParam(":sid", $sid, PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);
		}

		public function getCourseMaterial($level){
			$stmt = $this->pdo->prepare("SELECT * FROM tblpastquestion WHERE level = :level AND status = 'Active' ORDER BY course_code ASC");
			$stmt->bindParam(":level", $level, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		public function updateSession($email,$session){
			$stmt = $this->pdo->prepare("UPDATE tblstudent SET session=:session WHERE email = :email ");
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":session", $session, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function getSession($email){
			$stmt = $this->pdo->prepare("SELECT session FROM tblstudent WHERE email = :email");
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);
		}

		public function checkIfTokenExist($token){
			$stmt = $this->pdo->prepare("SELECT * FROM tblreset WHERE token=:token ");
			$stmt->bindParam(":token", $token, PDO::PARAM_STR);
			$stmt->execute();

			$count = $stmt->rowCount();

        	if($count > 0){
				return true;
			}else{
				return false;
			}
		}

		public function checkStudentDue($email){
			$stmt = $this->pdo->prepare("SELECT * FROM tblpayment WHERE email = :email ");
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);


		}

		public function checkPaid($email){
			$stmt = $this->pdo->prepare("SELECT * FROM tblpayment WHERE email = :email ");
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->execute();

			$count = $stmt->rowCount();

        	if($count > 0){
				return true;
			}else{
				return false;
			}

			
		}


	}

?>