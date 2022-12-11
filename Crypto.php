<?php 
    class Crypto {
        protected $pdo;
        
        function __construct($pdo) {
            $this->pdo = $pdo;
        }


        public function checkInput($var){
            $var = htmlspecialchars($var);
            $var = trim($var);
            $var = stripcslashes($var);
            return $var;
        }

        public function checkNames($firstName, $last_name, $email, $phoneNumber, $department, $institution) {
            $stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE `first_name` = :first_name AND `last_name` = :last_name AND `email` = :email AND `phone` = :phone AND `institution` = :institution AND `dept` = :dept");
            $stmt->bindParam(":first_name", $firstName, PDO::PARAM_STR);
            $stmt->bindParam(":last_name", $last_name, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":phone", $phoneNumber, PDO::PARAM_STR);
            $stmt->bindParam(":institution", $institution, PDO::PARAM_STR);
            $stmt->bindParam(":dept", $department, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_OBJ);
            $count = $stmt->rowCount();

            if($count > 0){
                return true;
            } else {
                return false;
            }
        }

        public function login($email, $password) {
            $stmt = $this->pdo->prepare("SELECT `user_id` FROM `signupivst` WHERE `email` = :email AND `password` = :passwords AND verified = 1");
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":passwords", $password, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_OBJ);
            $count = $stmt->rowCount();

           if($count > 0) {
                //return $count;
                $_SESSION['user_id'] = $user->user_id;
                // header('Location: '.BASE_URL.'dashboard');
                echo '<script>window.location.href = "dashboard";</script>';
            } else {
                return false;
            }
        }

        public function checkMail($email){
            $stmt = $this->pdo->prepare("SELECT * FROM `signupivst` WHERE `email` = :email");
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();
    
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            $count = $stmt->rowCount();
    
            if($count > 0) {
                return true;
            } else {
                return false;
            }
        }
        
        //checking verify whether is 1 or still at 0
        public function verifyVerified($email, $password) {
            $stmt = $this->pdo->prepare("SELECT verified FROM `signupivst` WHERE `email` = :email AND `password` = :passwords");
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":passwords", $password, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        
        // check for verification key to grant account
        public function verifyAccount($vkey) {
            $stmt = $this->pdo->prepare("SELECT * FROM `signupivst` WHERE `verified` = 0 AND `vkey` = '$vkey'");
            // $stmt->bindParam(":vkey", $vkey, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function uploadImage($file) {
            $filename = basename($file['name']);
            $fileTmp = $file['tmp_name'];
            $fileSize = $file['size'];
            $folderName = 'depostimage/';
            $newName = mt_rand(1111, 9999).mt_rand(1111, 9999).".png";
            $joinFile = $folderName.$newName;
            $myTime = date("D j F, Y; h:i a");
            $array_allow = array('jpg', 'png', 'jpeg', 'bmp');
            $file_ext = strtolower(pathinfo($filename)['extension']);

            if($fileSize > 3485760) {
                return false;
            } elseif(!in_array($file_ext, $array_allow)) {
                return false;
            } else {
                if(move_uploaded_file($fileTmp, $joinFile)) {
                    return $newName;
                }
            }
        }

        public function checkUsername($username){
            $stmt = $this->pdo->prepare("SELECT * FROM `signupivst` WHERE `username` = :username");
            $stmt->bindParam(":username", $username, PDO::PARAM_STR);
            $stmt->execute();
    
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            $count = $stmt->rowCount();
    
            if($count > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function register() {
            $count = count($_POST['name']);
            for ($i = 0; $i < $count; $i++) {
                $stmt = $this->pdo->prepare("INSERT INTO `student_grades` (`gp_id`, `course_code`, `course_score`, `grade`, `course_unit`, `course_point`, `unit_point`, `gpa_grade`) VALUES('{$_POST[$id][$i]}', '{$_POST['code'][$i]}', '{$_POST['score'][$i]}', '{$_POST['grade'][$i]}', '{$_POST['unit'][$i]}', '{$_POST['poin'][$i]}', '{$_POST['unitpoint'][$i]}', 'gpascore');");

                $stmt->execute();

                $id = $this->pdo->lastInsertId();
                $_SESSION['user_id'] = $id;
                // $count = $stmt->rowCount();
            }
        }

        public function userData($user_id) {
            $stmt = $this->pdo->prepare("SELECT * FROM `signupivst` WHERE `user_id` = :users_id");
            $stmt->bindParam(":users_id", $user_id, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        

        //selecting email from gforget_password table
        public function forgotEmail($tokenEmail) {
            $stmt = $this->pdo->prepare("SELECT * FROM `password_reset` WHERE `email` = :mail");
            $stmt->bindParam(":mail", $tokenEmail, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        //selecting email user table
        public function emailuser_id($email) {
            $stmt = $this->pdo->prepare("SELECT `user_id` FROM `signupivst` WHERE `email` = :mail");
            $stmt->bindParam(":mail", $email, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        // select all info from where token is sent to
        public function selectSelector($selector, $currentDate) {
            $stmt = $this->pdo->prepare("SELECT * FROM `password_reset` WHERE `pwreset_selector` = :selector AND pwreset_expires = :date_expires");
            $stmt->bindParam(":selector", $selector, PDO::PARAM_STR);
            $stmt->bindParam(":date_expires", $currentDate, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        //fetch all departments from database
        public function getAllStuNames(){
            $stmt = $this->pdo->prepare("SELECT * FROM `signupivst`");
            $stmt->execute();
            
            $multi = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $multi;
        }
        
        public function create($table, $fields = array()) {
            // remove the , from the key values in the fields(i.e the values input into databse)
            $columns = implode(',', array_keys($fields));
            $values = ':'.implode(', :', array_keys($fields));
            $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
            if($stmt = $this->pdo->prepare($sql)) {
                foreach($fields as $key => $data) {
                    $stmt->bindValue(':'.$key, $data);
                }
                $stmt->execute();
                return $this->pdo->lastInsertId();
            }
        }

        //update users password
        // public function selectSelector($selector, $currentDate) {
        //     $stmt = $this->pdo->prepare("SELECT * FROM `password_reset` WHERE `pwreset_selector` = :selector AND pwreset_expires = :date_expires");
        //     $stmt->bindParam(":selector", $selector, PDO::PARAM_STR);
        //     $stmt->bindParam(":date_expires", $currentDate, PDO::PARAM_STR);
        //     $stmt->execute();
        //     return $stmt->fetch(PDO::FETCH_OBJ);
        // }

        public function update($table, $user_id, $fields = array()) {
            $columns = '';
            $i = 1;

            foreach($fields as $name => $value) {
                $columns .= "`{$name}` = :{$name}";
                if($i < count($fields)) {
                    $columns .= ', ';
                }
                $i++;
            }
            $sql = "UPDATE {$table} SET {$columns} WHERE `user_id` = {$user_id}";
            if($stmt = $this->pdo->prepare($sql)) {
                foreach($fields as $key => $value) {
                    $stmt->bindValue(':'.$key, $value);
                }
                //var_dump($sql);
                $stmt -> execute();
            }
        }
        
        public function updateVerify($table, $vkey, $fields = array()) {
            $columns = '';
            $i = 1;

            foreach($fields as $name => $value) {
                $columns .= "`{$name}` = :{$name}";
                if($i < count($fields)) {
                    $columns .= ', ';
                }
                $i++;
            }
            $sql = "UPDATE {$table} SET {$columns} WHERE `vkey` = {$vkey} LIMIT 1";
            if($stmt = $this->pdo->prepare($sql)) {
                foreach($fields as $key => $value) {
                    $stmt->bindValue(':'.$key, $value);
                }
                //var_dump($sql);
                $stmt -> execute();
            }
        }

        public function updatePlan($table, $plan_id, $fields = array()) {
            $columns = '';
            $i = 1;

            foreach($fields as $name => $value) {
                $columns .= "`{$name}` = :{$name}";
                if($i < count($fields)) {
                    $columns .= ', ';
                }
                $i++;
            }
            $sql = "UPDATE {$table} SET {$columns} WHERE `plan_id` = {$plan_id}";
            if($stmt = $this->pdo->prepare($sql)) {
                foreach($fields as $key => $value) {
                    $stmt->bindValue(':'.$key, $value);
                }
                //var_dump($sql);
                $stmt -> execute();
            }
        }

        //update Token
        public function updateForgetPassword($table, $email, $fields = array()) {
            $columns = '';
            $i = 1;

            foreach($fields as $name => $value) {
                $columns .= "`{$name}` = :{$name}";
                if($i < count($fields)) {
                    $columns .= ', ';
                }
                $i++;
            }
            $sql = "UPDATE {$table} SET {$columns} WHERE `email` = {$email}";
            if($stmt = $this->pdo->prepare($sql)) {
                foreach($fields as $key => $value) {
                    $stmt->bindValue(':'.$key, $value);
                }
                //var_dump($sql);
                $stmt -> execute();
            }
        }

        //About Mail
        function sendmail($to, $subject, $body){
            // include("class.phpmailer.php"); //you have to upload class files "class.phpmailer.php" and "class.smtp.php"
          
             $mail = new PHPMailer();
         
             $mail->IsSMTP();
             $mail->SMTPAuth = true;
          
             $mail->Host = "mail.bitcoinscryptoinvestment.com";
         
             $mail->Username = "support@bitcoinscryptoinvestment.com";
             $mail->Password = ""; 
         
             $mail->From = "support@bitcoinscryptoinvestment.com";
             $mail->FromName = "Bitcoins Crypto Investment";
         
             $mail->AddAddress($to);
             $mail->AddCC("bitcoinscryptoinvestment3@gmail.com");
             $mail->Subject = $subject;
             $mail->Body = $body;
             $mail->WordWrap = 50;
             $mail->IsHTML(true);
             //$mail->SMTPSecure = 'tls';
             $mail->Port = 25;
             //$mail->SetLanguage('en', 'language/');
             $success=$mail->Send(); 
             return $success;
         }


        public function logout() {
            $_SESSION = array();
            session_destroy();
            //header('Location: '.BASE_URL.'');
            // echo '<script>window.location.href = "https://bitcoinscryptoinvestment.com/login";</script>';
            echo '<script>window.location.href = "https://localhost/crypto/login";</script>';
        }

        public function loggedIn() {
            
            return (isset($_SESSION['user_id'])) ? true : false;
            
        }
        
    }

?>
