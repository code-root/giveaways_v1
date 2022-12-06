<?php
// date_default_timezone_set('GMT');
//if (!isset($view_head) ) {  echo 'You do not have permission to view the content';  exit ; } 
include_once 'conn.php';
include_once 'HeaderFunction.php';


define('NameSite','win20');


function get_img($rand) {
  $conn = db (IsConn);
  $sql = "SELECT file  FROM uploadedfile where rand ='$rand'";
  $result_img = $conn->query($sql);
  if ($result_img->num_rows == 1) {
    $row_img = $result_img->fetch_assoc();
    $img = $row_img['file'];
  }

  if ($result_img->num_rows == 0 or isset($img) == '') {
    $img = 'root.png';
  }
  return  $img;
}

function GetSection($id) {
  $conn = db (IsConn);
  $sql = "SELECT name  FROM section where id ='$id'";
  $result_img = $conn->query($sql);
  if ($result_img->num_rows == 1) {
    $row_img = $result_img->fetch_assoc();
    $name = $row_img['name'];
  }else {
    $name = false ;
  }

  return  $name;
}

function GetPointsSection($id) {
  $conn = db (IsConn);
  $sql = "SELECT points  FROM section where id ='$id'";
  $result_img = $conn->query($sql);
  if ($result_img->num_rows == 1) {
    $row_img = $result_img->fetch_assoc();
    $name = $row_img['points'];
  }else {
    $name = false ;
  }

  return  $name;
}

function GetCount($sectionID) {
  $conn = db (IsConn);
  $sql = "SELECT count(id)  FROM question where sectionID ='$sectionID'";
  $result_img = $conn->query($sql);
  if ($result_img->num_rows == 1) {
    $row_img = $result_img->fetch_assoc();
    $name = $row_img['count(id)'];
  }else {
    $name = 0 ;
  }

  return  $name;
}

function PointCorrect($id) {
  $conn = db (IsConn);
  $sql = "SELECT correct  FROM points where UserID ='$id'";
  $result_img = $conn->query($sql);
  if ($result_img->num_rows == 1) {
    $row_img = $result_img->fetch_assoc();
    $correct = $row_img['correct'];
  }else {
    $correct = 0 ;
  }
    if ($correct == null) {
      $correct = 0;
  }
  return  $correct;
}


function  PointQuestion ($id) {
  $conn = db (IsConn);
  $points = null;
  $sql = "SELECT points  FROM question where id ='$id'";
  $result_img = $conn->query($sql);
  if ($result_img->num_rows == 1) {
    $row_img = $result_img->fetch_assoc();
    $points = $row_img['points'];
  }else {
    $points = 0 ;
  }
  return  $points;
}

function PointWrong($id) {
  $conn = db (IsConn);
  $sql = "SELECT Wrong  FROM points where UserID ='$id'";
  $result_img = $conn->query($sql);
  if ($result_img->num_rows == 1) {
    $row_img = $result_img->fetch_assoc();
    $Wrong = $row_img['Wrong'];
  }else {
    $Wrong = 0 ;
  }
  if ($Wrong == null) {
    $Wrong = 0;
    }
  return  $Wrong;
}


function PointsUser($id) {
  $conn = db (IsConn);
  $sql = "SELECT points  FROM points where UserID ='$id'";
  $result_img = $conn->query($sql);
  if ($result_img->num_rows == 1) {
    $row_img = $result_img->fetch_assoc();
    $points = $row_img['points'];
  }else {
    $points = 0 ;
  }
  if ($points == null) {
    $points = 0;
    }
  return  $points;
}

function NotQuestion ($UserId , $recordID) {
  $conn = db (IsConn);
  $msg = null;
  $now =  strtotime(date('d-m-Y')) ; 
  $sql = "SELECT * FROM record_answers where recordID = '$recordID' AND  UserId = '$UserId'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      $msg .= ' AND NOT id = ' . $row['questionID'];

  } 
}
return $msg ;

}

function GetCorrect($id) {
  $conn = db (IsConn);
  $sql = "SELECT correct  FROM question where id ='$id' ";
  $result_img = $conn->query($sql);
  if ($result_img->num_rows >= 1) {
    $row_img = $result_img->fetch_assoc();
    $correct = $row_img['correct'];
  }else {
    $correct = 0 ;
  }
  return  $correct;
}

function GetNameQuestion($an ,$id) {
  $conn = db (IsConn);
  if (!empty($an) ) {
    $sql = "SELECT $an  FROM question where id ='$id' ";
    $result_img = $conn->query($sql);
    if ($result_img->num_rows >= 1) {
      $row_img = $result_img->fetch_assoc();
      $correct = $row_img[$an];
    }else {
      $correct = 0 ;
    }
  }else {
    $correct = 'فارغ' ;
  }

  return  $correct;
}



function GetRandSection($id) {
  $conn = db (IsConn);
  $sql = "SELECT rand  FROM section where id ='$id'";
  $result_img = $conn->query($sql);
  if ($result_img->num_rows == 1) {
    $row_img = $result_img->fetch_assoc();
    $rand = $row_img['rand'];
  }else {
    $rand = false ;
  }

  return  $rand;
}


function NameSection($SectionID) {
  $conn = db (IsConn);
  $sql = "SELECT name  FROM section where rand ='$SectionID'";
  $result_img = $conn->query($sql);
  if ($result_img->num_rows == 1) {
    $row_img = $result_img->fetch_assoc();
    $name = $row_img['name'];
  }else {
    $name = '' ;
  }

  return  $name;
}



 
function NameQuestion($questionID) {
  $conn = db (IsConn);
  $sql = "SELECT name  FROM question where id ='$questionID'";
  $result_img = $conn->query($sql);
  if ($result_img->num_rows == 1) {
    $row_img = $result_img->fetch_assoc();
    $name = $row_img['name'];
  }else {
    $name = '' ;
  }

  return  $name;
}



      function timeout() {
      $conn = db (IsConn);
       if (isLoginUser() == true ){ 
      $customerId = $_SESSION['customerId'];
      $timeNow = strtotime("now");
      $timeout_SQL = "SELECT id ,time  FROM timeout where userID = '$customerId' ";
      $result_SQL = $conn->query($timeout_SQL);
      if ($result_SQL->num_rows == 0) {
          $sql = "INSERT INTO timeout (userID, time, detaTime) VALUES ('$customerId', '$timeNow', now() )";
          $conn->query($sql);
      } else {
          $row_time = $result_SQL->fetch_assoc();
          $timeout_time = $row_time['time'];
          if ($timeNow > $timeout_time) {
              $time_dataBase = strtotime("+2 minutes");
              $sql_timeOut = "UPDATE timeout SET time='$time_dataBase' WHERE userID = '$customerId' ";
              $conn->query($sql_timeOut);
          }
      }
     }
    }

     echo timeout();

    function loginTime($userID) {
      $conn = db (IsConn);
      $TimeoutSQL = "SELECT time  FROM timeout where userID = '$userID' ";
      $timeoutRE = $conn->query($TimeoutSQL);
      if ($timeoutRE->num_rows ==  0) {
        $timeUser = '10';
      } else {
        $timeout = $timeoutRE->fetch_assoc();
        $timeUser = $timeout['time'];
      }
      $timeNow = strtotime("now");
      if ($timeNow >  $timeUser) {
        return 'offline';
      } else {
        return 'online';
      }
    }

  
    