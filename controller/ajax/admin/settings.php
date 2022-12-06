<?php
session_start();
include '../../function.php';
include '../../security-ajax.php'; 
if ( LoginDashboard() !== true  &&  $_SERVER['REQUEST_METHOD'] != 'POST') {  
    echo error_page('انتهت مهلة الجلسة') ;
}else {

    // username: sofa
    // timer: 30
    // MaximumShare: 3
    // email: admin@gmail.com
    // instagram: 0100grsvdcvsfdbt
    // facebook: vrf
    // snapchat: lkjhgfgh
    // wa: wqedewg4qtgevsf23
    // passwordOLD: sofa100200
    // password: 
    // RePassword: 

    $wa = filter_var($_POST['wa'], FILTER_SANITIZE_STRING);
    $snapchat = filter_var($_POST['snapchat'], FILTER_SANITIZE_STRING);
    $facebook = filter_var($_POST['facebook'], FILTER_SANITIZE_STRING);
    $instagram = filter_var($_POST['instagram'], FILTER_SANITIZE_STRING);


   
   if (!filter_var($_POST['Referrals'], FILTER_SANITIZE_STRING)) {
    $message = 'Referrals  null';
    $code = 9;
    $status = 1;
  } else {
    $Referrals = filter_var($_POST['Referrals'], FILTER_SANITIZE_STRING);
  }
  

    
    $message = '';
    $code = 0;
    $status =0 ;
    $SetPassword =0 ;
    
    
    if (!filter_var($_POST['username'], FILTER_SANITIZE_STRING)) {
      $message = 'username null';
      $code = 1;
      $status = 1;
    } else {
      $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    }
    
    if (!filter_var($_POST['email'], FILTER_SANITIZE_STRING)) {
        $message = 'email null';
        $code = 2;
        $status = 1;
      } else {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
      }

      if (!filter_var($_POST['timer'], FILTER_SANITIZE_STRING)) {
        $message = 'timer null';
        $code = 3;
        $status = 1;
      } else {
        $timer = filter_var($_POST['timer'], FILTER_SANITIZE_STRING);
      }

      if (!filter_var($_POST['MaximumShare'], FILTER_SANITIZE_STRING)) {
        $message = 'MaximumShare null';
        $code = 4;
        $status = 1;
      } else {
        $MaximumShare = filter_var($_POST['MaximumShare'], FILTER_SANITIZE_STRING);
      }

      if (!filter_var($_POST['FullName'], FILTER_SANITIZE_STRING)) {
        $message = 'Full Name  null';
        $code = 5;
        $status = 1;
      } else {
        $FullName = filter_var($_POST['FullName'], FILTER_SANITIZE_STRING);
      }
      
          

    
    if ($status == 0) {
        $RePassword = filter_var($_POST['RePassword'], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $passwordOLD = filter_var($_POST['passwordOLD'], FILTER_SANITIZE_STRING);

        $RePassword = sha1($RePassword) ;
        $password = sha1($password);
        $passwordOLD = sha1($passwordOLD);
        if (!isset($RePassword) == '' && !isset($password) == '' && !isset($passwordOLD) == ''  ) {
            $sql = "SELECT password FROM `admin` WHERE id = 1 and password = '$password' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $SetPassword = ", password = '$RePassword' ";
            }else {
                $message = 'الباسورد القديم خطأ ';
            }
        }
        $sql = "UPDATE admin SET username='$username' , email= '$email' ,   FullName='$FullName' $SetPassword  WHERE id=1";
        $conn->query($sql);

        $sql = "UPDATE settings SET instagram='$instagram' , facebook= '$facebook' ,   snapchat='$snapchat'
        ,   wa='$wa'  ,   timer='$timer'   ,   MaximumShare='$MaximumShare' , Referrals = '$Referrals' 
           WHERE id=1";
        $conn->query($sql);

        $message =  "تم إعتماد البيانات بنجاح ";
       $code = 200 ;
   



    }
       echo json_encode(['code'=>$code, 'msg'=>$message]);

}  ?>

