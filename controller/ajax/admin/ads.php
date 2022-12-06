<?php
session_start();
include '../../function.php';
include '../../security-ajax.php'; 
if ( LoginDashboard() !== true  &&  $_SERVER['REQUEST_METHOD'] != 'POST') {  
    echo error_page('انتهت مهلة الجلسة') ;
}else {



    $ads_1 = $_POST['ads_1'];
    $ads_2 = $_POST['ads_2'];
    $ads_3 = $_POST['ads_3'];
    $ads_4 = $_POST['ads_4'];
    $ads_5 = $_POST['ads_5'];
    $ads_6 = $_POST['ads_6'];
    $ads_7 = $_POST['ads_7'];
    $ads_8 = $_POST['ads_8'];
    $ads_9 = $_POST['ads_9'];

   
        $sql = "UPDATE ads SET 
        ads_1='$ads_1' ,ads_2='$ads_2' ,
        ads_3='$ads_3' ,ads_4='$ads_4' ,
        ads_5='$ads_5' ,  ads_6='$ads_6' ,
        ads_7='$ads_7' , ads_8='$ads_8',
        ads_9='$ads_9'  
         WHERE id=1";
        $conn->query($sql);

        $message =  "تم إعتماد البيانات بنجاح ";
        $code = 200 ;

       echo json_encode(['code'=>$code, 'msg'=>$message]);

}  ?>

