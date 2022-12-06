<?php
session_start();
include '../../function.php';
include '../../security-ajax.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isLoginUser() === true) {

    $customerId = validateInput($_SESSION['customerId']);
    $Count =  3 ;
    $status =  0 ;
    $PointsUser =  PointsUser($customerId);

    $Points = validateInput($_POST['PointsUser']);

            if ($Points <  10000 ) {
                $msg = "من فضلك أكمل تجميع 10000 نقطة" ; 
                $code = 5 ;
                $status = 1 ;
            }

            if ($Points >  $PointsUser ) {
                $msg = "من فصلك أرسل النقاط المتوفرة عندك" ; 
                $status = 1 ;
                $code = 5 ;
            }

                $now = date("Y-m-d");
                  $sql_question = "SELECT `id` FROM `request` where UserId = '$customerId' AND  `date` = '$now' ";
            $result = $conn->query($sql_question);
            if ($result->num_rows > 0) {
                $msg = "لك محاولة سحب كل 24 ساعة حاول مرة أخرى لاحقا ..  " ; 
                $status = 1 ;
                $code = 5 ;
            }

            if ($status == 0) {
                $sql = "INSERT INTO `request` ( `UserId`, `points`, `date`, `status`) VALUES 
                ( '$customerId', '$Points', '$now', 0);";
                $conn->query($sql);
                $msg = "تم إرسال الطلب بنجاح برجاء إضافة حسابك في فيس بوك لتواصل معك من الإعدادات  " ; 
                $code = 200  ;
            }
        $conn->close();

    echo json_encode([
        'code' => $code,
         'msg' => $msg
         
    ]);

} else {

    $msg = 'You do not have permission to view the content';
    echo json_encode(['code' => 'You do not have powers', 'Message' => $msg]);
    exit;
}
