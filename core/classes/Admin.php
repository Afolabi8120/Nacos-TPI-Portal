<?php

	class Admin {

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

		// this will generate the image name for the student based on its gender
		public function setImageName($name){
            if($name == "Male"){
                $stu_img = "male.jpg";
            }elseif($name == "Female"){
                $stu_img = "female.jpg";
            }

            return $stu_img;
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

        public function checkUsername($username){
        	$stmt = $this->pdo->prepare("SELECT username FROM tblstudent WHERE username = :username");
        	$stmt->bindParam(":username", $username, PDO::PARAM_STR);
        	$stmt->execute();

        	$count = $stmt->rowCount();

        	if($count > 0){
				return true;
			}else{
				return false;
			}
        }

		public function registerAdmin($username,$fullname,$email,$gender,$password,$usertype,$picture){
			$stmt = $this->pdo->prepare("INSERT INTO tblstudent (matricno,fullname,email,gender,password,usertype,status,picture) VALUES(:username,:fullname,:email,:gender,:password,:usertype,'Active',:picture)");
			$stmt->bindParam(":username", $username, PDO::PARAM_STR);
			$stmt->bindParam(":fullname", $fullname, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":gender", $gender, PDO::PARAM_STR);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			$stmt->bindParam(":usertype", $usertype, PDO::PARAM_STR);
			$stmt->bindParam(":picture", $picture, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function savePayment($email,$receipt_no,$amount_paid,$payment_status){
			$stmt = $this->pdo->prepare("INSERT INTO tblpayment (email,receipt_no,amount_paid,payment_status) VALUES(:email,:receipt_no,:amount_paid,:payment_status)");
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":receipt_no", $receipt_no, PDO::PARAM_STR);
			$stmt->bindParam(":amount_paid", $amount_paid, PDO::PARAM_STR);
			$stmt->bindParam(":payment_status", $payment_status, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		// public function login($username){
		// 	$stmt = $this->pdo->prepare("SELECT * FROM tbluser WHERE username = :username");
		// 	$stmt->bindParam(":username", $username, PDO::PARAM_STR);
		// 	$stmt->execute();

		// 	$user = $stmt->fetch(PDO::FETCH_OBJ);
		// 	$count = $stmt->rowCount();

		// 	if($count > 0){
        //         return $user;
		// 	}else{
		// 		return false;
		// 	}
		// }

		public function updateProfile($user_id,$fullname,$email,$gender){
			$stmt = $this->pdo->prepare("UPDATE tblstudent SET fullname=:fullname,email=:email,gender=:gender WHERE id=:id");
			$stmt->bindParam(":id", $user_id, PDO::PARAM_STR);
			$stmt->bindParam(":fullname", $fullname, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":gender", $gender, PDO::PARAM_STR);
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
					$fileRoot = '../admin/admin_img/' . $filename;
					move_uploaded_file($fileTmp, $fileRoot);
					return $filename;
				}
			}else{
				return false;
			}
		}

		public function updateImage($user_id,$picture){
			$stmt = $this->pdo->prepare("UPDATE tblstudent SET picture=:picture WHERE id=:id");
			$stmt->bindParam(":id", $user_id, PDO::PARAM_STR);
			$stmt->bindParam(":picture", $picture, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function updatePassword($user_id,$password){
			$stmt = $this->pdo->prepare("UPDATE tblstudent SET password=:password WHERE id=:id");
			$stmt->bindParam(":id", $user_id, PDO::PARAM_STR);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function uploadCourseMaterial($file){
			$filename = basename($file['name']);
			$fileTmp = $file['tmp_name'];

			$ext = explode('.', $filename);
			$ext = strtolower(end($ext));
			$allowed_ext = array('pdf', 'doc', 'docx', 'xlsx', 'xls');

			if(in_array($ext, $allowed_ext) === true){
				$fileRoot = 'course_material/' . $filename;
				move_uploaded_file($fileTmp, $fileRoot);
				return $filename;
			}else{
				return false;
			}
		}

		// Add library material
		public function addLibraryMaterial($title,$name,$category,$book_name){
			$stmt = $this->pdo->prepare("INSERT INTO tbllibrary (title,name,category,book_name) VALUES(:title,:name,:category,:book_name)");
			$stmt->bindParam(":title", $title, PDO::PARAM_STR);
			$stmt->bindParam(":name", $name, PDO::PARAM_STR);
			$stmt->bindParam(":category", $category, PDO::PARAM_STR);
			$stmt->bindParam(":book_name", $book_name, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		// Add excos
		public function registerExco($fullname,$post,$picture){
			$stmt = $this->pdo->prepare("INSERT INTO tblexco (fullname,post,picture) VALUES(:fullname,:post,:picture)");
			$stmt->bindParam(":fullname", $fullname, PDO::PARAM_STR);
			$stmt->bindParam(":post", $post, PDO::PARAM_STR);
			$stmt->bindParam(":picture", $picture, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		// get all library materials
		public function getAllLibraryMaterial(){
			$stmt = $this->pdo->prepare("SELECT * FROM tbllibrary ORDER BY id ASC");
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		// get all excos
		public function getAllExcos(){
			$stmt = $this->pdo->prepare("SELECT * FROM tblexco ORDER BY id ASC");
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		public function addCourseMaterial($title,$level,$semester,$course_code,$material){
			$stmt = $this->pdo->prepare("INSERT INTO tblpastquestion (title,level,semester,course_code,material,status) VALUES(:title,:level,:semester,:course_code,:material,'Active')");
			$stmt->bindParam(":title", $title, PDO::PARAM_STR);
			$stmt->bindParam(":level", $level, PDO::PARAM_STR);
			$stmt->bindParam(":semester", $semester, PDO::PARAM_STR);
			$stmt->bindParam(":course_code", $course_code, PDO::PARAM_STR);
			$stmt->bindParam(":material", $material, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function uploadTimeTable($file){
			$filename = basename($file['name']);
			$fileTmp = $file['tmp_name'];

			$ext = explode('.', $filename);
			$ext = strtolower(end($ext));
			$allowed_ext = array('pdf', 'doc', 'docx', 'xlsx', 'xls','jpg', 'png');

			if(in_array($ext, $allowed_ext) === true){
				$fileRoot = 'timetable/' . $filename;
				move_uploaded_file($fileTmp, $fileRoot);
				return $filename;
			}else{
				return false;
			}
		}

		public function addTimeTable($title,$name){
			$stmt = $this->pdo->prepare("INSERT INTO tbltimetable (title,name,status) VALUES(:title,:name,'Active')");
			$stmt->bindParam(":title", $title, PDO::PARAM_STR);
			$stmt->bindParam(":name", $name, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function getTimeTable(){
			$stmt = $this->pdo->prepare("SELECT * FROM tbltimetable ORDER BY id, name ASC");
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		public function getTimeTableByStatus(){
			$stmt = $this->pdo->prepare("SELECT * FROM tbltimetable WHERE status='Active'");
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		public function enableTimeTable($material_id){
			$stmt = $this->pdo->prepare("UPDATE tbltimetable SET status='Active' WHERE id = :material_id ");
			$stmt->bindParam(":material_id", $material_id, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function disableTimeTable($material_id){
			$stmt = $this->pdo->prepare("UPDATE tbltimetable SET status='In-Active' WHERE id = :material_id ");
			$stmt->bindParam(":material_id", $material_id, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function deleteTimeTable($material_id){
			$stmt = $this->pdo->prepare("DELETE FROM tbltimetable WHERE id = :material_id ");
			$stmt->bindParam(":material_id", $material_id, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function enableCourseMaterial($material_id){
			$stmt = $this->pdo->prepare("UPDATE tblpastquestion SET status='Active' WHERE id = :material_id ");
			$stmt->bindParam(":material_id", $material_id, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function disableCourseMaterial($material_id){
			$stmt = $this->pdo->prepare("UPDATE tblpastquestion SET status='In-Active' WHERE id = :material_id ");
			$stmt->bindParam(":material_id", $material_id, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function removeCourseMaterial($material_id){
			$stmt = $this->pdo->prepare("DELETE FROM tblpastquestion WHERE id = :material_id");
			$stmt->bindParam(":material_id", $material_id, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function removePost($post_id){
			$stmt = $this->pdo->prepare("DELETE FROM tblpost WHERE id = :post_id");
			$stmt->bindParam(":post_id", $post_id, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function getAdminData($username){
			$stmt = $this->pdo->prepare("SELECT * FROM tbluser WHERE username = :username");
			$stmt->bindParam(":username", $username, PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);
		}

		public function getStudentTotal(){
			$stmt = $this->pdo->prepare("SELECT * FROM tblstudent WHERE usertype = 'Student' ");
			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount();

			return $count;
		}

		public function exportStudentList(){
			$stmt = $this->pdo->prepare("SELECT * FROM tblstudent WHERE usertype = 'Student' ");
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		public function getStudentCount($table,$column,$value,$column2,$value2){
			$stmt = $this->pdo->prepare("SELECT COUNT(`$column`) FROM `$table` WHERE `$column` = '$value' AND `$column2` = '$value2'");
			$stmt->execute();

			$count = $stmt->fetchColumn();

			return $count;
		}

		public function getTotalAdmin(){
			$stmt = $this->pdo->prepare("SELECT * FROM tblstudent ");
			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount();

			return $count;
		}

		// counts the number of student that has paid
		public function getTotalPaidCount(){
			$stmt = $this->pdo->prepare("SELECT * FROM tblpayment ");
			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount();

			return $count;
		}

		public function getTotalMaterial(){
			$stmt = $this->pdo->prepare("SELECT * FROM tblpastquestion");
			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount();

			return $count;
		}

		public function getTotalExcos(){
			$stmt = $this->pdo->prepare("SELECT * FROM tblexco");
			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount();

			return $count;
		}

		public function check($table,$column,$value){
			$stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE `$column` = '$value'");
			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount();

			if($count > 0){
                return true;
			}else{
				return false;
			}
		}

		public function get($table,$column,$value){
			$stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE `$column` = '$value'");
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);
		}

		public function select($table,$column,$value,$email){
			$stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE `$column` = '$value' AND payment_status = '1' AND email = :email ");
			$stmt->bindParam(":email",$email, PDO::PARAM_STR);
			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount();

			if($count > 0){
                return true;
			}else{
				return false;
			}
		}

		public function getAllCourseMaterial(){
			$stmt = $this->pdo->prepare("SELECT * FROM tblpastquestion ORDER BY course_code ASC");
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		// get all post
		public function getAllPost(){
			$stmt = $this->pdo->prepare("SELECT * FROM tblpost ORDER BY id ASC");
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		// get all post by desc
		public function fetchPostDesc(){
			$stmt = $this->pdo->prepare("SELECT * FROM tblpost ORDER BY id DESC LIMIT 4");
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		// get all post by desc where not post id
		public function fetchPostWhereNotID($post_id){
			$stmt = $this->pdo->prepare("SELECT * FROM tblpost WHERE post_id != :post_id ORDER BY id DESC LIMIT 4");
			$stmt->bindParam(":post_id", $post_id, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		// fetch post by ID
		public function fetchPostByID($post_id){
			$stmt = $this->pdo->prepare("SELECT * FROM tblpost WHERE post_id = :post_id");
			$stmt->bindParam(":post_id", $post_id, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_OBJ);
		}

		// update post count
		public function updatePostCount($post_id){
			$stmt = $this->pdo->prepare("UPDATE tblpost SET post_count = post_count + 1 WHERE post_id = :post_id");
			$stmt->bindParam(":post_id", $post_id, PDO::PARAM_STR);
			$stmt->execute();
			return true;
		}

		public function getAllAdmin($username){
			$stmt = $this->pdo->prepare("SELECT * FROM tblstudent WHERE matricno !=:matricno AND usertype = 'Admin' OR usertype = 'User' ORDER BY id ASC");
			$stmt->bindParam(":matricno", $username, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		public function deleteAdmin($user_id){
			$stmt = $this->pdo->prepare("DELETE FROM tblstudent WHERE id = :user_id ");
			$stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		// delete library material
		public function deleteLibraryMaterial($book_id){
			$stmt = $this->pdo->prepare("DELETE FROM tbllibrary WHERE id = :book_id ");
			$stmt->bindParam(":book_id", $book_id, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		// delete exco details
		public function deleteExco($exco_id){
			$stmt = $this->pdo->prepare("DELETE FROM tblexco WHERE id = :exco_id ");
			$stmt->bindParam(":exco_id", $exco_id, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function enableAdmin($user_id){
			$stmt = $this->pdo->prepare("UPDATE tblstudent SET status='Active' WHERE id = :user_id ");
			$stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function disableAdmin($user_id){
			$stmt = $this->pdo->prepare("UPDATE tblstudent SET status='In-Active' WHERE id = :user_id ");
			$stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function getAllStudent(){
			$stmt = $this->pdo->prepare("SELECT * FROM tblstudent WHERE usertype = 'Student' ORDER BY matricno ASC");
			$stmt->bindParam(":username", $username, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		public function getAllStudentDESC(){
			$stmt = $this->pdo->prepare("SELECT * FROM tblstudent WHERE usertype = 'Student' ORDER BY id DESC LIMIT 10");
			$stmt->bindParam(":username", $username, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		public function enableStudent($matricno){
			$stmt = $this->pdo->prepare("UPDATE tblstudent SET status='Active' WHERE matricno = :matricno ");
			$stmt->bindParam(":matricno", $matricno, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function disableStudent($matricno){
			$stmt = $this->pdo->prepare("UPDATE tblstudent SET status='In-Active' WHERE matricno = :matricno ");
			$stmt->bindParam(":matricno", $matricno, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function deleteStudent($matricno){
			$stmt = $this->pdo->prepare("DELETE FROM tblstudent WHERE matricno = :matricno ");
			$stmt->bindParam(":matricno", $matricno, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function updateSession($username,$session){
			$stmt = $this->pdo->prepare("UPDATE tbluser SET session=:session WHERE username = :username ");
			$stmt->bindParam(":username", $username, PDO::PARAM_STR);
			$stmt->bindParam(":session", $session, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function getSession($username){
			$stmt = $this->pdo->prepare("SELECT session FROM tbluser WHERE username = :username");
			$stmt->bindParam(":username", $username, PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);
		}

		public function uploadResult($file){
			$filename = basename($file['name']);
			$fileTmp = $file['tmp_name'];

			$ext = explode('.', $filename);
			$ext = strtolower(end($ext));
			$allowed_ext = array('pdf', 'doc', 'docx', 'xlsx', 'xls');

			if(in_array($ext, $allowed_ext) === true){
				$fileRoot = 'student_result/' . $filename;
				move_uploaded_file($fileTmp, $fileRoot);
				return $filename;
			}else{
				return false;
			}
		}

		public function addResult($title,$level,$course_code,$file,$session){
			$stmt = $this->pdo->prepare("INSERT INTO tblresult (title,level,course_code,file,status,session) VALUES(:title,:level,:course_code,:file,'Active',:session)");
			$stmt->bindParam(":title", $title, PDO::PARAM_STR);
			$stmt->bindParam(":level", $level, PDO::PARAM_STR);
			$stmt->bindParam(":course_code", $course_code, PDO::PARAM_STR);
			$stmt->bindParam(":file", $file, PDO::PARAM_STR);
			$stmt->bindParam(":session", $session, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function getResult(){
			$stmt = $this->pdo->prepare("SELECT * FROM tblresult ORDER BY id ASC");
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		public function getResultWhere($level){
			$stmt = $this->pdo->prepare("SELECT * FROM tblresult WHERE level = :level AND status = 'Active' ORDER BY id ASC");
			$stmt->bindParam(":level", $level, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		public function enableResult($result_id){
			$stmt = $this->pdo->prepare("UPDATE tblresult SET status='Active' WHERE id = :result_id ");
			$stmt->bindParam(":result_id", $result_id, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function disableResult($result_id){
			$stmt = $this->pdo->prepare("UPDATE tblresult SET status='In-Active' WHERE id = :result_id ");
			$stmt->bindParam(":result_id", $result_id, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function deleteResult($result_id){
			$stmt = $this->pdo->prepare("DELETE FROM tblresult WHERE id = :result_id ");
			$stmt->bindParam(":result_id", $result_id, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		// this will get student details and join it with the payment details to get payment record of student who paid
		public function fetchPaymentRecord(){
			$stmt = $this->pdo->prepare("SELECT s.id, s.matricno, s.fullname, s.email, s.phone, s.gender, s.program, s.level, s.picture, s.nacos_id, p.email, p.receipt_no, p.date_paid, p.payment_status FROM `tblstudent` AS s INNER JOIN `tblpayment` AS p ON p.email = s.email WHERE p.payment_status = '1' ORDER BY p.id ASC");
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		// this will get student details and join it with the payment details to get payment record of student whose payment failed
		public function fetchPendingPayment(){
			$stmt = $this->pdo->prepare("SELECT s.id, s.matricno, s.fullname, s.email, s.phone, s.gender, s.program, s.level, s.picture, s.nacos_id, p.email, p.receipt_no, p.date_paid, p.payment_status FROM `tblstudent` AS s INNER JOIN `tblpayment` AS p ON p.email = s.email WHERE p.payment_status = '0' ");
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		// to check if the student has made payment
		public function checkIfPaid($email){
			$stmt = $this->pdo->prepare("SELECT s.id, s.matricno, s.fullname, s.email, s.phone, s.gender, s.program, s.level, s.picture, s.nacos_id, p.email, p.receipt_no, p.date_paid FROM `tblstudent` AS s INNER JOIN `tblpayment` AS p ON p.email = s.email WHERE p.payment_status = '1' AND s.email = :email ");
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		// to check and fetch the student payment details
		public function fetchStudentPaymentRecord($email){
			$stmt = $this->pdo->prepare("SELECT s.id, s.matricno, s.fullname, s.email, s.phone, s.gender, s.program, s.level, s.picture, s.nacos_id, p.email, p.receipt_no, p.date_paid FROM `tblstudent` AS s INNER JOIN `tblpayment` AS p ON p.email = s.email WHERE p.payment_status = '1' AND s.email = :email ");
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);;
		}

		// to check and fetch the student payment details for the receipt
		public function fetchStudentPaymentReceipt($receipt_no){
			$stmt = $this->pdo->prepare("SELECT s.id, s.matricno, s.fullname, s.email, s.phone, s.gender, s.program, s.level, s.picture, s.nacos_id, p.email, p.receipt_no, p.date_paid, p.payment_status FROM `tblstudent` AS s INNER JOIN `tblpayment` AS p ON p.email = s.email WHERE p.payment_status = '1' AND p.receipt_no = :receipt_no ");
			$stmt->bindParam(":receipt_no", $receipt_no, PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);;
		}

		// to add post/blog
		public function addPost($post_id,$title,$body,$date_added){
			$stmt = $this->pdo->prepare("INSERT INTO tblpost (post_id,title,body,date_added) VALUES(:post_id,:title,:body,:date_added)");
			$stmt->bindParam(":post_id", $post_id, PDO::PARAM_STR);
			$stmt->bindParam(":title", $title, PDO::PARAM_STR);
			$stmt->bindParam(":body", $body, PDO::PARAM_STR);
			$stmt->bindParam(":date_added", $date_added, PDO::PARAM_STR);
			$stmt->execute();

			return true;
		}

		public function isPaid($email){
			$stmt = $this->pdo->prepare("SELECT email,payment_status,receipt_no FROM tblpayment WHERE payment_status = '1' AND email = :email ");
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount();

			if($count > 0)
				return true;
			else{
				return false;
			}
		}

		function sendMail($to, $subject, $body){

			// $mail = new PHPMailer(true);

   //          $mail->isSMTP();
   //          $mail->SMTPAuth   = true;
   //          $mail->Host       = 'nacostpi.com';
   //          $mail->Username   = 'contact@nacostpi.com';
   //          $mail->Password   = '(nacostpilive###)'; 
   //          $mail->From = "contact@nacostpi.com";
   //          $mail->FromName = "NACOS, The Polytechnic Ibadan";

   //          $mail->AddAddress($to); 
   //          $mail->AddCC("noreply@nacostpi.com");
   //          $mail->Subject = $subject;
   //          $mail->Body    = $body;
   //          $mail->AltBody = 'You requested for a password reset';
   //          $mail->WordWrap = 100;
   //          $mail->isHTML(true); 
   //          //$mail->SMTPSecure = 'tls';
   //          $mail->Port = 587; //587 465

			$email = new \SendGrid\Mail\Mail(); 
            $email->setFrom("no-reply@nacostpi.com", "NACOS TPI");
            $email->setSubject("Student Password Reset On NACOS TPI Portal");
            $email->addTo($to);
                // $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
            $email->addContent(
                  "text/html", $body
                );
            $sendgrid = new \SendGrid('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');
            $sendgrid->send($subject);

            if($mail->send()){
            	return true;
            }else{
            	return false;
            }
        }

        // Generate QR Code
        public function generateQRCode($text){
        	$path = '../assets/qrcode_img/'; // image path to store the qrcode
        	$file = $path . uniqid() . ".png";

        	// $ecc stores error correction capability('L')
        	$ecc = 'L';
        	$pixel_Size = 3;
        	$frame_Size = 3;

        	// Generate QR Code and Stores it in a directory given
        	QRcode::png($text, $file, $ecc, $pixel_Size, $frame_Size);

        	return "<center><img src='".$file."'></center>";
        }
	}

?>