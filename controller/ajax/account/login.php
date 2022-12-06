<?php
session_start();
include '../../conn.php';
$conn = db($db);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $status = 0;
    $message = null;
    $code = 0;
    $status = 0;
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $message = 'لم تقم بإضافة  البريد الأكتروني ';
        $code = 3;
        $status = 1;
    } else {
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    }


    if (empty($_POST['password'])) {
        $message = 'لم تقم بإضافة  كلمة المرور ';
        $code = 4;
        $status = 1;
    } else {
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    }

    $password =  sha1($password);

    if ($status == 0) {

        $sql = "SELECT * FROM users where email = '$email' AND password = '$password' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)  {
        $get = $result->fetch_assoc();
        $_SESSION['name']     = $get['NameOne'] .   $get['NameTwo'];   // RegisterUsername   

        if ($get['status'] == 1) {
            $message = "" . $_SESSION['name'] . " حسابك غير نشط تواصل مع الإدارة .. شكرا لتفهمك ";
            $code =300 ;
        }else {
            $_SESSION['customerId']   = $get['id']; // Register User ID in Session               
            $_SESSION['img']     = $get['img'];   // RegisterUsername   
            $_SESSION['status'] =  $get['status'];
            setcookie("customerId", $get['id']);
            setcookie("name", $get['NameOne'].$get['NameTwo'], time()+3600000);  /* expire in 1 hour */                                                        
            $message = "مرحبا   " . $_SESSION['name'] . " تم تسجيل الدخول .. ";
           $code =200 ;
        }
    } else {
        $message = "من فضلك تحقق من صحة البيانات ";
        $code =5 ;
    }

}

    echo json_encode(['code' => $code, 'msg' => $message]);

} else {

    $msg = 'You do not have permission to view the content';
    echo json_encode(['code' => 'You do not have powers', 'Message' => $msg]);
    exit;
}
