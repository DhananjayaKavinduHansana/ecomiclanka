<?php
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $userpwd =$_POST['userpassword'];  

    require_once 'dblogreg.php';
    require_once '../includes/logregfunctions.php';

    if (emptyInputLogin($username, $userpwd) !== false) {
        exit();
    }

    LoginUser($conn, $username, $userpwd);


}
 else {
    header('location:userlogin.php');
    //echo "Login Error";
 }
?>