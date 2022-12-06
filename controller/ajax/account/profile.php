<?php
session_start();
include '../../conn.php';
include '../../security-ajax.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isLoginUser() === true) {

    $customerId = validateInput($_SESSION['customerId']);
    $username = validateInput($_POST['username']);
    $code = 0;
    $msg = '';

    if (is_numeric($_POST['number'])) {
        $number = filter_var($_POST['number'], FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $message = 'يرجى إضافك رقم الهاتف';
        $code = 1;
        $status = 1;
    }

    if (!filter_var($_POST['last'], FILTER_SANITIZE_STRING)) {
        $message = 'الإسم الأول فارغ';
        $code = 2;
        $status = 1;
      } else {
        $last = filter_var($_POST['last'], FILTER_SANITIZE_STRING);
      }

      if (!filter_var($_POST['first'], FILTER_SANITIZE_STRING)) {
        $message = 'الإسم الأخير فارغ';
        $code = 3;
        $status = 1;
      } else {
        $first = filter_var($_POST['first'], FILTER_SANITIZE_STRING);
      }

      if (!filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)) {
        $message = 'برجاء اضافة البريد الإكتروني';
        $code = 4;
        $status = 1;
      } else {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        $sql = "SELECT email FROM users WHERE email LIKE '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            $sql = "UPDATE email SET email='$email' WHERE id=$customerId";
            $conn->query($sql);
        }
      }


    if (empty($_POST['username']) && strlen($_POST['username'])  < 3 && empty($_POST['username']) == ' ') {
        $message = 'من فضلك أكمل username';
        $code = 5;
        $status = 1;
    } else {
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $sql = "SELECT username FROM users WHERE username LIKE '$username'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            $sql = "UPDATE users SET username='$username' WHERE id=$customerId";
            $conn->query($sql);
        }
    }

    if ($code == 0) {
    
      $sql = "UPDATE users SET NameOne='$last' , NameOne='$last' , NameTwo='$first' , number = '$number'  WHERE id=$customerId ";
        if ($conn->query($sql) === TRUE) {
        $message =  "تم إعتماد البيانات بنجاح ";
        $code = 200 ;
    } else {
        $code = 2 ; 
        $message =  "Error updating : #1"; 
    }
  }



    echo json_encode(['code' => $code, 'msg' => $message]);

} else {

    $msg = 'You do not have permission to view the content';
    echo json_encode(['code' => 'You do not have powers', 'Message' => $msg]);
    exit;
}
