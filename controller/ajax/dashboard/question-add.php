<?php
session_start();
include '../../conn.php';
include '../../security-ajax.php';

if (LoginDashboard() === true  && $_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['sectionID']) ) {
  $now = strtotime("now");
    $message = '';
    $code = 0;


if (!filter_var($_POST['NameQuestion'], FILTER_SANITIZE_STRING)) {
  $message = 'من فضلك إكتب أسم السؤال';
  $code = 1;
  $status = 1;
} else {
  $name = filter_var($_POST['NameQuestion'], FILTER_SANITIZE_STRING);
}

$sectionID = filter_var($_POST['sectionID'], FILTER_SANITIZE_STRING);

if (!filter_var($_POST['One'], FILTER_SANITIZE_STRING)) {
  $message = 'الإجابة الأولى فارغة !';
  $code = 2;
  $status = 1;
} else {
  $One = filter_var($_POST['One'], FILTER_SANITIZE_STRING);
}

// Two: 
// three: 
// four: 
// points: 
// correct: One


if (!filter_var($_POST['Two'], FILTER_SANITIZE_STRING)) {
  $message = 'الإجابة الثانية فارغة !';
  $code = 3;
  $status = 1;
} else {
  $Two = filter_var($_POST['Two'], FILTER_SANITIZE_STRING);
}


if (!filter_var($_POST['three'], FILTER_SANITIZE_STRING)) {
  $message = 'الإجابة الثالثة فارغة !';
  $code = 4;
  $status = 1;
} else {
  $three = filter_var($_POST['three'], FILTER_SANITIZE_STRING);
}


if (!filter_var($_POST['four'], FILTER_SANITIZE_STRING)) {
  $message = 'الإجابة الرابعة فارغة !';
  $code = 5;
  $status = 1;
} else {
  $four = filter_var($_POST['four'], FILTER_SANITIZE_STRING);
}


if (!filter_var($_POST['points'], FILTER_SANITIZE_STRING)) {
  $message = ' من فضلك ضع نقاط الأجابة الصحيحة';
  $code = 6;
  $status = 1;
} else {
  $points = filter_var($_POST['points'], FILTER_SANITIZE_STRING);
}


if (!filter_var($_POST['correct'], FILTER_SANITIZE_STRING)) {
  $message = 'إجتر رقم الإجابة الصحيحة';
  $code = 7;
  $status = 1;
} else {
  $correct = filter_var($_POST['correct'], FILTER_SANITIZE_STRING);
}




           

if (!isset($name) == '') {
    // chack sectionID 
    $sql = "SELECT id FROM `question` WHERE sectionID = '$sectionID' AND  name = '$name' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      
        $msg = 'مسجل سابقاّ بالفعل ';
        echo json_encode(['code' => 8, 'msg' => $msg]);
        exit;
    }

    $sql = "SELECT count FROM `question` WHERE sectionID = '$sectionID' order by id desc ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $count = $row['count']+1;
    }else {
      $count = 1 ;
    }
}

if ($code == 0) {

    $rand = rand_set() ;
    $sql = "INSERT INTO `question` (`sectionID`, `name`, `One`, `Two`, `three`, `four`, `correct`, `count`, `points`, `date`, `status`)
                      VALUES ('$sectionID', '$name', '$One', '$Two',  '$three' , '$four', '$correct', '$count', '$points', '$now', 0);";
      if ($conn->query($sql) === TRUE) {
      $message =  "تم إعتماد البيانات بنجاح ";
      $code = 200 ;
  } else {
      $code = 2 ; 
      $message =  "Error updating : #1"; 
  }
}
   echo json_encode(['code'=>$code, 'msg'=>$message]);
}else {

    $msg = 'You do not have permission to view the content';
    echo json_encode(['Status'=>'You do not have powers', 'Message'=>$msg]);
    exit; 
  }
