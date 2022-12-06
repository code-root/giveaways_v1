<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
include '../../conn.php';
include '../../security-ajax.php';


$isUserLoggedIn = isset($_SESSION['name']  ) ? true : false;
$customerId = $isUserLoggedIn && is_numeric($_SESSION['customerId']) ? intval($_SESSION['customerId']) : 0;

if (!$isUserLoggedIn) {     
  $msg = 'You do not have permission to view the content';
  echo json_encode(['login'=>'no', 'Message'=>$msg]);
  exit;
}

 
// sectionID: 2
// NameQuestion: 
// One: 
// Two: 
// three: 
// four: 
// points: 
// correct: One

$message = '';
$code = 0;
$skills = '' ;

if (!filter_var($_POST['name'], FILTER_SANITIZE_STRING)) {
  $message = 'من فضلك إكتب أسم القسم';
  $code = 1;
  $status = 1;
} else {
  $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
}



if (!filter_var($_POST['points'], FILTER_SANITIZE_STRING)) {
  $message = 'points';
  $code = 2;
  $status = 1;
} else {
  $points = filter_var($_POST['points'], FILTER_SANITIZE_STRING);
}




  

if (!isset($name) == '') {
    // chack Username 
    $sql = "SELECT id FROM `section` WHERE name = '$name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $msg = 'مسجل سابقاّ بالفعل ';
        echo json_encode(['code' => 7, 'msg' => $msg]);
        exit;
    }
}

if ($code == 0) {
    $rand = rand_set() ;
    $sql = "INSERT INTO `section` (`name`, `rand`, `date`, points,  `status`) VALUES ('$name', '$rand', '$now', $points, 0);";
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
