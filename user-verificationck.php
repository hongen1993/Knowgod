<?php 
include "./languages/configuration.php"; 
include "config.php";
//If user click verification code submit button

if(isset($_POST['check'])){
    $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
    $check_code = "SELECT * FROM users WHERE code = $otp_code";
    $code_res = mysqli_query($conn, $check_code);
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $fetch_code = $fetch_data['code'];
        $email = $fetch_data['email'];
        $code = 0;
        $status = 'verified';
        $update_otp = "UPDATE users SET code = $code, status = '$status' WHERE code = $fetch_code";
        $update_res = mysqli_query($conn, $update_otp);
        if($update_res){
            header("location: login.php?success=".$lang['Success7']);
            exit();
        }else{
    header("Location:user-verification.php?error=". $lang['Error19']);
    exit();
        }
    }else{
  header("Location:user-verification.php?error=". $lang['Error21']);
  exit();
    }
}


?>
