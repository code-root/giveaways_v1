<?php
session_start();
include '../../function.php';
include '../../security-ajax.php'; 
if ( LoginDashboard() !== true  or $_SERVER['REQUEST_METHOD'] != 'POST') {  
    echo error_page('انتهت مهلة الجلسة') ;
}else {
    $message = '';
    $code = 0;

    if (!filter_var($_POST['name'], FILTER_SANITIZE_STRING)) {
      $message = 'من فضلك إكتب السلايدر';
      $code = 1;
      $status = 1;
    } else {
      $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }
    
    
      if (!filter_var($_POST['fileID'], FILTER_SANITIZE_STRING)) {
        $message =  'من فضلك أرفق الصورة' ;
        $code = 1;
        $status = 1;
      } else {
        $fileID = filter_var($_POST['fileID'], FILTER_SANITIZE_STRING);
      }

      if (!filter_var($_POST['title'], FILTER_SANITIZE_STRING)) {
        $message = 'من فضلك إكتب title';
        $code = 1;
        $status = 1;
      } else {
        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
      }
          

    
    if (!isset($name) == '') {
        // chack Username 
        $sql = "SELECT id FROM `slider` WHERE name like '%$name%' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $msg = 'مسجل سابقاّ بالفعل ';
            echo json_encode(['code' => 7, 'msg' => $msg]);
            exit;
        }
    }
    
    if ($code == 0) {
        $sql = "INSERT INTO `slider` ( `name`, `title`, `img`, `date`) VALUES ( '$name', '$title', '$fileID', '$now');";
          if ($conn->query($sql) === TRUE) {
          $message =  "تم إعتماد البيانات بنجاح ";
          $code = 200 ;
          // echo   UpdateAdmin($_SESSION['name'] , $now , 'add category') ;
      } else {
          $code = 2 ; 
          $message =  "Error updating : #1"; 
      }
    }
       echo json_encode(['code'=>$code, 'msg'=>$message]);

}  ?>