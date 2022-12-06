<?php
session_start();
include '../../function.php';
include '../../security-ajax.php'; 
if ( LoginDashboard() !== true  &&  $_SERVER['REQUEST_METHOD'] != 'POST') {  
    echo error_page('انتهت مهلة الجلسة') ;
}else {


        $status = 0;
        $message = '';
        $scc = 0;

    if (!filter_var($_POST['UserID'], FILTER_SANITIZE_STRING)) {
        $message = 'UserID  null';
        $code = 1;
        $status = 1;
      } else {
        $UserID = filter_var($_POST['UserID'], FILTER_SANITIZE_STRING);
      }

    @$NameOne = filter_var($_POST['NameOne'], FILTER_SANITIZE_STRING);
    @$NameTwo = filter_var($_POST['NameTwo'], FILTER_SANITIZE_STRING);
    @$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    @$number = filter_var($_POST['number'], FILTER_SANITIZE_STRING);
    @$password = filter_var($_POST['passwordUser'], FILTER_SANITIZE_STRING);
    @$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    @$PointCorrect = filter_var($_POST['PointCorrect'], FILTER_SANITIZE_STRING);
    @$PointWrong = filter_var($_POST['PointWrong'], FILTER_SANITIZE_STRING);
    @$PointsUser = filter_var($_POST['PointsUser'], FILTER_SANITIZE_STRING);
    @$facebook = filter_var($_POST['facebook'], FILTER_SANITIZE_STRING);
    @$whatsapp = filter_var($_POST['whatsapp'], FILTER_SANITIZE_STRING);


if ($status == 0) {

    if (!empty($password)) {
        $password = sha1($password) ;
        $sql = "UPDATE admin SET password='$password'  WHERE id=$UserID";
        $conn->query($sql);
        $scc++;
    }

    if (!empty($facebook)) {
        $sql = "UPDATE info SET facebook='$facebook'  WHERE UserId=$UserID";
        $conn->query($sql);
        $scc++;

    }

    if (!empty($whatsapp)) {
        $sql = "UPDATE info SET whatsapp='$whatsapp'  WHERE UserId=$UserID";
        $conn->query($sql);
        $scc++;

    }

    
    if (!empty($PointCorrect)) {
        $sql = "UPDATE points SET correct='$PointCorrect'  WHERE UserId=$UserID";
        $conn->query($sql);
        $scc++;

    }

    if (!empty($PointCorrect)) {
        $sql = "UPDATE points SET Wrong='$PointWrong'  WHERE UserId=$UserID";
        $conn->query($sql);
        $scc++;

    }

    if (!empty($PointCorrect)) {
        $sql = "UPDATE points SET points='$PointsUser'  WHERE UserId=$UserID";
        $conn->query($sql);
        $scc++;

    }


    if ( !empty($email)) {
        $sql = "SELECT id FROM `users` WHERE email = '$email' AND NOT id = '$UserID'   ";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            $sql = "UPDATE users SET email='$email' WHERE id=$UserID";
            $conn->query($sql);
            $scc++;
        }else {
            $message .= ' الإيميل مسجل سابقاّ لمستخدم أخر ';
        }
    }
  
    if ( !empty($username)) {
        $sql = "SELECT id FROM `users` WHERE username = '$username' AND NOT id = '$UserID'   ";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            $sql = "UPDATE users SET username='$username' WHERE id=$UserID";
            $conn->query($sql);
            $scc++;
        }else {
            $message .= ' اليوزرنيم مسجل سابقاّ لمستخدم أخر ';
        }
    }

    if ( !empty($number)) {
        $sql = "SELECT id FROM `users` WHERE number = '$number' AND NOT id = '$UserID'   ";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            $sql = "UPDATE users SET number='$number' WHERE id=$UserID";
            $conn->query($sql);
            $scc++;
        }else {
            $message .= ' رقم الهاتف مسجل سابقاّ لمستخدم أخر ';
        }
    }


    $sql = "UPDATE users SET NameOne='$NameOne' , NameTwo = '$NameTwo'  WHERE id=$UserID";
    // $sql = "UPDATE users SET NameOne='$NameOne' , NameTwo = '$NameTwo' , number = '$number' , email= '$email' , username = '$username' WHERE id=$UserID";
    $conn->query($sql);
    $scc++;

    $message .=   "تم تعديل :  ".$scc. " بيانات ";
    $code = 200 ;

}else {
    $message =  "error #2 تم تعديل :  ".$scc;
    $code = 300 ;
}

echo json_encode(['code'=>$code, 'msg'=>$message]);


}  ?>

