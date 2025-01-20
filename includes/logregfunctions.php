<?php
session_start();
//check empty inputs start
function emptyInputSignup($name, $username, $email, $address, $city, $phone, $userpwd, $userpwdRepeat)
{
    $result = false;
    if (empty($name) || empty($username) || empty($email) || empty($address) || empty($city) || empty($phone) || empty($userpwd) || empty($userpwdRepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($username)
{
    $result = false;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    $result = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($userpwd, $userpwdRepeat)
{
    $result = false;
    if ($userpwd !== $userpwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
//check empty inputs end
//check user alredy excits start
function uidExists($conn, $username, $email)
{
    $sql = "SELECT * FROM Users WHERE UserName = ? OR U_Email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location:../loging.html?error=1stmtFailed');
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email); #ss means tow strings i means integer
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        $_SESSION["userid"] = $row["UserId"];
        $_SESSION["useruid"] = $row["Username"];
        $_SESSION["username"] = $row["UsersName"];
        mysqli_stmt_close($stmt); 
        return $row;

    } else {
        $result = false;
        mysqli_stmt_close($stmt); 
        return $result;
    }
    
}
//check user alredy excits end
//register new user start
function createUser($conn, $name, $username, $email, $address, $user_type, $city, $phone, $userpwd)
{
    $sql = "INSERT INTO Users (U_Name, UserName, U_Type, U_Email, U_Mobile, U_Password, U_Center) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<script>window.alert('Error In Registration')</script>";
        header('location:../login&registration/login.html?error=2stmtFailed');
        exit();
    }
    $hashedPwd = password_hash($userpwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssssis", $name, $username, $email, $address, $user_type, $city, $phone, $hashedPwd); #ssss means four strings if you want use interger i means integer
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    echo "<script>alert('You are registered Successfully')</script>";
    //$_SESSION["useruid"] = $username;
    //$_SESSION["username"] = $name;
    header('location:../login&registration/userlogin.php?error=none');
    exit();
}
//register new user end
//user login empty input check start
function emptyInputLogin($username, $userpwd)
{
    $result = false;
    if (empty($username) || empty($userpwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
//user login empty input check end
//login users and redirecting start
function LoginUser($conn, $username, $userpwd)
{
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false) {
        header('location:../errors/wrong1.html?error=wronglogin');
        exit();
    }

    $pwdHashed = $uidExists["U_Password"];
    $checkPwd = password_verify($userpwd, $pwdHashed);

    if ($checkPwd === false) {
        header('location:../errors/wrong2.html?error=wronglogin');
        exit();
    } else if ($checkPwd === true) {
        
        // $_SESSION["userid"] = $uidExists["UserId"];
        // $_SESSION["useruid"] = $uidExists["Username"];
        // $_SESSION["username"] = $uidExists["UsersName"];
        
if ($uidExists["UserName"] == "Testrun1" ) {
            header('location:../users/superadmin.php?error=none&login=success');
            exit();
    } else if ($uidExists ["UserName"] == "STF001"){
            header('location:../users/onshopstaff.php?error=none&login=success');
            exit();
    } else if ($uidExists ["UserName"] == "STF002"){
            header('location:../users/onshopstaff.php?error=none&login=success');
            exit();
    } else if ($uidExists ["UserName"] == "STF003"){
            header('location:../users/onshopstaff.php?error=none&login=success');
            exit();
} else if ($uidExists ["UserName"] == "DLB001"){ 
            header('location:../users/deliveryboy.php?error=none&login=success');
            exit();
} else if ($uidExists ["UserName"] == "DLB002"){ 
            header('location:../users/deliveryboy.php?error=none&login=success');
            exit();
} else if ($uidExists ["UserName"] == "DLB003"){ 
            header('location:../users/deliveryboy.php?error=none&login=success');
            exit();
} else if ($uidExists ["UserName"] == "DLB004"){ 
            header('location:../users/deliveryboy.php?error=none&login=success');
            exit();
    }
    else {
        header('location:../index.php?error=none&login=success');
        //header('location:../users/users.php?error=none&login=success');
        exit();
    }
//login users and redirecting end
}

}

?>