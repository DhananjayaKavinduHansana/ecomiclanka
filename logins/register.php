<?php
if(isset($_POST['register'])) {
  $name = $_POST['name'];
  $username =$_POST['username'];
  $email = $_POST['email'];
  $user_type = $_POST['user_type'];
  $phone = $_POST['phone'];
  $user_center =$_POST['user_center'];
  $userpwd =$_POST['password'];
  $userpwdRepeat =$_POST['passwordRepeat']; 
     
  require_once 'dblogreg.php';
  require_once '../includes/logregfunctions.php';

$emptyInput = emptyInputSignup($name, $username, $email, $address, $user_type, $city, $phone, $userpwd, $userpwdRepeat );
        $invalidUid = invalidUid($username);
        $invalidEmail = invalidEmail($email);
        $pwdMatch = pwdMatch($userpwd, $userpwdRepeat);
        $uidExists = uidExists($conn, $username, $email);


        if ($emptyInput !== false) {
          header('location:../errors/loging.html?error=emptyInput');
            exit();
        }
        if ($invalidUid !== false) {
          header('location:../errors/invaliduid.html?error=invalidUid');
            exit();
        }
        if ($uidExists !== false) {
          header('location:../errors/usernametaken.html?error=usernameTaken');
            exit();
        }

        if ($invalidEmail !== false) {
          header('location:../errors/invalidemail.html?error=invalidEmail');
            exit();
        }
        if ($pwdMatch !== false) {
          header('location:../errors/passworddontmatch.html?error=passwordsDontMatch');
            exit();
        }

        createUser($conn, $name, $username, $email, $address, $user_type, $city, $phone, $userpwd);
        echo "done";
    }

    else {
        header('location:../loging.html');
    }
     
?>