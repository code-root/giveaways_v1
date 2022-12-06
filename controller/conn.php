<?php
$db = 1 ;
function db ($db) {
        if ($db == 1) {
          
            $servername = "localhost:3308";
            $username = "root";
            $password = "";
            $dbname = "asmaa";
        } else {
          $servername = "localhost";
          $username = "wintwoze_sofa_api";
          $password = 'sofa100200@@';
          $dbname = "wintwoze_sofadb";

        }
     @ $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            $eror_msg =  'Failed to connect to MySQL';
            $message =  'An unexpected error occurred .. Please contact the management of the Smart Agent  Development to fix the problem';
            $nu =  '+201001995914';
            echo json_encode(['error'=>$eror_msg,'msg'=>$message , 'number' => $nu ]);
            exit();
          }else{ 
            $conn->set_charset('utf8');
            return $conn; 
          }
  }

  $now =  strtotime(date('d-m-Y')) ; 
  define('IsConn', $db);
  define('now', $now);

  $conn = db (IsConn);
  if (IsConn == 1) {
  $URL_IS = 'http://localhost/asmaa/';
  }else {
  $URL_IS = 'https://win20.net/';
  }

  $EmailFrom = 'info@win20.net';

  define('URL', $URL_IS);
  
  function url_ajax() {
    return URL . "controller/ajax/";
  }
  
  function url_acc() {
    return URL . "account/";
  }

  function url_Admin() {
    return URL . "dashboard/";
  }
  function admin_assets() {
    return URL . "dashboard/assets/";
  }
  
  

  function url_assets() {
    return URL . "assets/";
  }
  
  function validateInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = filter_var($data, FILTER_SANITIZE_STRING);
    $data = htmlspecialchars($data);
    return $data;
  }

  function rand_set() {
    $chars = array(0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
    $sn = '';
    $max = count($chars)-1;
    for($i=0;$i<5;$i++){
         $sn .= (!($i % 5) && $i ? '' : '').$chars[rand(0, $max)];
         }
         return $sn ;
  } 


  function LoginDashboard() {
    if (empty($_SESSION['name']) && empty($_SESSION['AdminId']) && empty($_SESSION['status'] ) ) {
      @session_destroy();
      unset($_SESSION["AdminId"]);
      unset($_SESSION["name"]);
      return false;
      
    } else {
      if ($_SESSION['status'] != 'admin') { 
        @session_destroy();
        unset($_SESSION["AdminId"]);
        unset($_SESSION["name"]);
        return false;
      }else {
        if (isset($_SESSION['name'])) {
          validateInput($_SESSION['name']);
        }
        if (isset($_SESSION['AdminId'])) {
          validateInput($_SESSION['AdminId']);
        }
    
        if (isset($_SESSION['status'])) {
          validateInput($_SESSION['status']);
        }
      }
      return true;
    }
  }
  function isLoginUser() {
    if (empty($_SESSION['name']) && empty($_SESSION['customerId'])) {
      try {
        @session_destroy();
        unset($_SESSION["customerId"]);
        unset($_SESSION["name"]);
      } catch (Exception $e) {
        return 'The session has expired redirected ...';
      }
    } else {
      if (isset($_SESSION['name'])) {
        validateInput($_SESSION['name']);
      }
      if (isset($_SESSION['customerId'])) {
        validateInput($_SESSION['customerId']);
      }
      return true;
    }
  }

  function getUserIP() {
    $ip = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ip = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        $ip = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ip = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ip = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ip = $_SERVER['REMOTE_ADDR'];
    else
        $ip = 'UNKNOWN';
    return $ip;
}

$adsSQL = "SELECT *  FROM `ads` where id = 1 ";
$READS = $conn->query($adsSQL);
$ads = $READS->fetch_assoc();
// $count = $ids['count(id)'];

// for ($i=1; $i < 10 ; $i++) { 
//     $adsOnr[$i] =  $ads['ads_'.$i];
// }