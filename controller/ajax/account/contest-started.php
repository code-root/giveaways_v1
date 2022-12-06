<?php
session_start();
    include '../../function.php';
    include '../../security-ajax.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isLoginUser() === true) {

    $customerId = validateInput($_SESSION['customerId']);
    $Count =  3 ;
    $questionID  =  null; 
    $radioID  =  null; 
    $NameOne  =  null;
    $NameTwo  =  null;
    $NameThree  =  null;
    $NameFour  =  null;
    $msg  =  null;
    $code  =  null;
    $NameQuestion   =  null;
    $correct   =  null;
    $sectionID   =  null;
    $case   =  null;
    $msgEND   =  null;
    

    if (empty($_POST['radioID'])) {
        $msg = 'من فضلك إختر الإجاية  ';
        $code = 1;
        $status = 1;
    } else {
        $radioID = filter_var($_POST['radioID'], FILTER_SANITIZE_STRING);
    }

    if (empty($_POST['questionID'])) {
        $msg = 'من فضلك إختر الإجاية  ';
        $code = 2;
        $status = 1;
    } else {
        $questionID = filter_var($_POST['questionID'], FILTER_SANITIZE_STRING);
        $sectionID = filter_var($_POST['code'], FILTER_SANITIZE_STRING);
    }
     $GetCorrect = GetCorrect($questionID);
     if ($GetCorrect !== 0 ) {
         if ($GetCorrect == $radioID  ) {
            $msg = "الإجاية صحيحة" ; 
            $code = 200 ;
            $case = 1 ;
    }else {
           $msg = "الإجاية خطأ" ; 
           $code = 4 ;    
           $case = 2 ;
    }
        $recordID = $_SESSION['recordID'];
        $sql = "INSERT INTO `record_answers` (questionID,  `recordID`, `UserId`, `sectionID`, `answer`, `date`) 
        VALUES ( '$questionID' ,'$recordID', '$customerId', '$sectionID', '$radioID', '$now');";
        $conn->query($sql);
        $PointsUser = PointsUser($customerId);
        $PointWrong = PointWrong($customerId);
        $PointCorrect =  PointCorrect($customerId) ;
        $PointQuestion =PointQuestion ($questionID); 
    if ($case == 1 ) {
        $PointCorrect += 1 ;
        $PointsUser += $PointQuestion ;
    
    }else {
    
            $PointWrong += 1 ;
       
    }

        $sql = "UPDATE points SET correct= $PointCorrect , Wrong=$PointWrong ,
        points=$PointsUser WHERE UserId =$customerId ";
        $conn->query($sql);
        $NotQuestion =  NotQuestion ($customerId , $sectionID) ;
        $sql_question = "SELECT * FROM question where sectionID = '$sectionID' AND  status = 0   $NotQuestion ORDER BY id DESC LIMIT 1 ";
        $result = $conn->query($sql_question);
        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           $code = 6;
           $Count= $row['count'];
           $questionID= $row['id'];
           $NameOne= $row['One'];
           $NameTwo= $row['Two'];
           $NameThree= $row['three'];
           $NameFour= $row['four'];
           $NameQuestion= $row['name'];
           $sectionID= $row['sectionID'];
        //    $msg= '';
    
          }
        } else {
            $sql = "UPDATE record SET status= 1 WHERE id=$recordID";
            $conn->query($sql);
            $msgEND = "تم إجتياز هذة المسابقة بنجاح جاري تحويلك لمعرفة النتائج " ; 
            $code = 5 ;  
        }
        $conn->close();
    
} else {
    $msg = 'من فضلك حاول مرة أخرى لاحقاَ   ';
    $code =9 ;
}


    echo json_encode([
        'code' => $code,
        'case' => $case,
        'correct' => $GetCorrect,
        'Count' => $Count,
        'radioID' => $radioID,
        'questionID' => $questionID,
        'NameQuestion' => $NameQuestion,
        'NameOne' => $NameOne,
        // 'sql_question' => $sql_question,
        'NameTwo' => $NameTwo,
        'NameThree' => $NameThree,
        'NameFour' => $NameFour,
        'NameQuestion' => $NameQuestion,
        'sectionID' => $sectionID,
        'msgEND' => $msgEND,
         'msg' => $msg
         
    ]);

} else {

    $msg = 'You do not have permission to view the content';
    echo json_encode(['code' => 'You do not have powers', 'Message' => $msg]);
    exit;
}
