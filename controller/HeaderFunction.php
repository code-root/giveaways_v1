<?php 
  function error_page($msg) {
    $style = '<style>
    html, body {
    height: 100%;
  }
  body {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-align-items: center;
        -ms-flex-align: center;
            align-items: center;
    -webkit-justify-content: center;
        -ms-flex-pack: center;
            justify-content: center;
  }
  
  .spinner {
    -webkit-animation: rotator 1.4s linear infinite;
            animation: rotator 1.4s linear infinite;
  }
  
  @-webkit-keyframes rotator {
    0% {
      -webkit-transform: rotate(0deg);
              transform: rotate(0deg);
    }
    100% {
      -webkit-transform: rotate(270deg);
              transform: rotate(270deg);
    }
  }
  
  @keyframes rotator {
    0% {
      -webkit-transform: rotate(0deg);
              transform: rotate(0deg);
    }
    100% {
      -webkit-transform: rotate(270deg);
              transform: rotate(270deg);
    }
  }
  .path {
    stroke-dasharray: 187;
    stroke-dashoffset: 0;
    -webkit-transform-origin: center;
        -ms-transform-origin: center;
            transform-origin: center;
    -webkit-animation: dash 1.4s ease-in-out infinite, colors 5.6s ease-in-out infinite;
            animation: dash 1.4s ease-in-out infinite, colors 5.6s ease-in-out infinite;
  }
  
  @-webkit-keyframes colors {
    0% {
      stroke: #4285F4;
    }
    25% {
      stroke: #DE3E35;
    }
    50% {
      stroke: #F7C223;
    }
    75% {
      stroke: #1B9A59;
    }
    100% {
      stroke: #4285F4;
    }
  }
  
  @keyframes colors {
    0% {
      stroke: #4285F4;
    }
    25% {
      stroke: #DE3E35;
    }
    50% {
      stroke: #F7C223;
    }
    75% {
      stroke: #1B9A59;
    }
    100% {
      stroke: #4285F4;
    }
  }
  @-webkit-keyframes dash {
    0% {
      stroke-dashoffset: 187;
    }
    50% {
      stroke-dashoffset: 46.75;
      -webkit-transform: rotate(135deg);
              transform: rotate(135deg);
    }
    100% {
      stroke-dashoffset: 187;
      -webkit-transform: rotate(450deg);
              transform: rotate(450deg);
    }
  }
  @keyframes dash {
    0% {
      stroke-dashoffset: 187;
    }
    50% {
      stroke-dashoffset: 46.75;
      -webkit-transform: rotate(135deg);
              transform: rotate(135deg);
    }
    100% {
      stroke-dashoffset: 187;
      -webkit-transform: rotate(450deg);
              transform: rotate(450deg);
    }
  }
    </style>
    <svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
     <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
  </svg>';
  
    echo $style . $msg;
    echo '<script> goBack() </script>';
  
    exit;
  }

function HeaderTile ($title) {
return '
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>'.NameSite.' | '.$title.'</title>
        <!-- favicon -->
        <link rel="shortcut icon" href="'. url_assets().'pngegg.png">
        <!-- Bootstrap -->
        <link href="'. url_assets().'css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="'. url_assets().'css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
        <!-- Slider -->               
        <link rel="stylesheet" href="'. url_assets().'css/tiny-slider.css"/> 
        <!-- Main Css -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
        <link href="'. url_assets().'css/style.css" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="'. url_assets().'css/colors/default.css" rel="stylesheet" id="color-opt">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/sweetalert2@7.22.2/dist/sweetalert2.all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<link href="'. url_assets().'css/sofa.css" rel="stylesheet" type="text/css" />

    </head>';
}


function HeaderAdminTile ($title , $case) {
  $re = null;
  $one =  '
  <!DOCTYPE html>
  <html lang="ar" dir="rtl">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="'. admin_assets().'img/apple-icon.png">
    <link rel="icon" type="image/png" href='. admin_assets().'img/favicon.png">
    <title>'.NameSite.' | '.$title.'</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="'. admin_assets().'css/nucleo-icons.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="'. admin_assets().'css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link id="pagestyle" href="'. admin_assets().'css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
    <script type="text/javascript" src="https://unpkg.com/sweetalert2@7.22.2/dist/sweetalert2.all.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  
  </head>
  <style>
    * {
    font-family: "Tajawal", sans-serif; }
  </style> ';
  
  $two = '<body class="g-sidenav-show  bg-gray-100">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent mt-4">
      <div class="container">
        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="../index.php">'.NameSite.' | '.$title.'</a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon mt-2">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
          </span>
        </button>
        <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">
    
        </div>
      </div>
    </nav>';

    if ($case == 1) {
      $re = $one . $two ; 
    }else {
      $re = $one ;
    }
    return $re;
}


function SendEmailREG ($username , $rand ) {
echo '<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Landrick - Saas & Software Landing Page Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
    <meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern" />
    <meta name="author" content="Shreethemes" />
    <meta name="email" content="support@shreethemes.in" />
    <meta name="website" content="https://shreethemes.in" />
    <meta name="Version" content="v3.5.0" />
    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap" rel="stylesheet">
    <!-- Main Css -->
    <!-- <link href="css/style.css" rel="stylesheet" type="text/css" /> -->
</head>
<body>
    <!-- Hero Start -->
    <div style="margin-top: 50px;">
        <table cellpadding="0" cellspacing="0" style="font-family: Nunito, sans-serif; font-size: 15px; font-weight: 400; max-width: 600px; border: none; margin: 0 auto; border-radius: 6px; overflow: hidden; background-color: #fff; box-shadow: 0 0 3px rgba(60, 72, 88, 0.15);">
            <thead>
                <tr style="background-color: #2f55d4; padding: 3px 0; border: none; line-height: 68px; text-align: center; color: #fff; font-size: 24px; letter-spacing: 1px;">
                    <th scope="col"><img src="images/logo-light.png" height="24" alt=""></th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td style="padding: 48px 24px 0; color: #161c2d; font-size: 18px; font-weight: 600;">
                      مرحبا '.$username.'
                    </td>
                </tr>
                <tr>
                    <td style="padding: 15px 24px 15px; color: #8492a6;">
                    شكرا لإنشاء حساب win20. للمتابعة ، يرجى تأكيد عنوان بريدك الإلكتروني بالنقر فوق الزر أدناه:
                                        </td>
                </tr>

                <tr>
                    <td style="padding: 15px 24px;">
                        <a href="'.url_acc().'ConfirmEmail.php?code='.$rand.'" style="padding: 8px 20px; outline: none; text-decoration: none; font-size: 16px; letter-spacing: 0.5px; transition: all 0.3s; font-weight: 600; border-radius: 6px; background-color: #2f55d4; border: 1px solid #2f55d4; color: #ffffff;">Confirm Email Address</a>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 15px 24px 0; color: #8492a6;">
                    سيكون هذا الرابط نشطًا لمدة 30 دقيقة من وقت إرسال هذا البريد الإلكتروني.
                        </td>
                </tr>

                <tr>
                    <td style="padding: 15px 24px 15px; color: #8492a6;">
                        Win20 <br> Support Team
                    </td>
                </tr>

                <tr>
                    <td style="padding: 16px 8px; color: #8492a6; background-color: #f8f9fc; text-align: center;">
                        © <script>document.write(new Date().getFullYear())</script> Win20.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Hero End -->
</body>
</html>';
}

function UniqueMachineID($salt = "") {
  if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
      $temp = sys_get_temp_dir().DIRECTORY_SEPARATOR."diskpartscript.txt";
      if(!file_exists($temp) && !is_file($temp)) file_put_contents($temp, "select disk 0\ndetail disk");
      $output = shell_exec("diskpart /s ".$temp);
      $lines = explode("\n",$output);
      $result = array_filter($lines,function($line) {
          return stripos($line,"ID:")!==false;
      });
      if(count($result)>0) {
      @    $result = array_shift(array_values($result));
          $result = explode(":",$result);
          $result = trim(end($result));       
      } else $result = $output;       
  } else {
      $result = shell_exec("blkid -o value -s UUID");  
      if(stripos($result,"blkid")!==false) {
          $result = $_SERVER['HTTP_HOST'];
      }
  }   
  return md5($salt.md5($result));
}


// echo UniqueMachineID();

function GetAtarUsers($id) {
    $conn = db (IsConn);
    $img = 'https://cdn.iconscout.com/icon/free/png-256/profile-417-1163876.png' ;
    $usersSQL = "SELECT img  FROM `users` WHERE id = $id ";
    $usersRE = $conn->query($usersSQL);
    if ($usersRE->num_rows > 0) {
     $users = $usersRE->fetch_assoc();
     if ($users['img'] !== '' ) {
      $img = url_assets() .'profile/'. $users['img'];
     }
    }
    return $img;
  } 

  
          
  function timerDB() {
    $conn = db (IsConn);
    $usersSQL = "SELECT timer  FROM `settings` WHERE id = 1 ";
    $usersRE = $conn->query($usersSQL);
    if ($usersRE->num_rows > 0) {
     $users = $usersRE->fetch_assoc();
      return $users['timer'];
    }
    return 30;
  } 

 $timerDB =  timerDB() ;

 function MaximumShareBD() {
  $conn = db (IsConn);
  $usersSQL = "SELECT MaximumShare  FROM `settings` WHERE id = 1 ";
  $usersRE = $conn->query($usersSQL);
  if ($usersRE->num_rows > 0) {
   $users = $usersRE->fetch_assoc();
    return $users['MaximumShare'];
  }
  return 30;
} 

function ReferralsDB() {
  $conn = db (IsConn);
  $usersSQL = "SELECT Referrals  FROM `settings` WHERE id = 1 ";
  $usersRE = $conn->query($usersSQL);
  if ($usersRE->num_rows > 0) {
   $users = $usersRE->fetch_assoc();
    return $users['Referrals'];
  }
  return 30;
} 

function GETUniqueMachine($UserID) {
  $conn = db (IsConn);
  $usersSQL = "SELECT UniqueMachineID  FROM `ddos` WHERE UserId = '$UserID' ";
  $usersRE = $conn->query($usersSQL);
  if ($usersRE->num_rows > 0) {
   $users = $usersRE->fetch_assoc();
    return $users['UniqueMachineID'];
  }
  return false;
} 

function GetUserIDUUID($UniqueMachineID) {
  $conn = db (IsConn);
  $usersSQL = "SELECT UserId  FROM `ddos` WHERE UniqueMachineID = '$UniqueMachineID' ";
  $usersRE = $conn->query($usersSQL);
  if ($usersRE->num_rows > 0) {
   $users = $usersRE->fetch_assoc();
    return $users['UserId'];
  }
  return false;
} 

function UpdateCompleteUsers($UserId) {
  $conn = db (IsConn);
  $usersSQL = "UPDATE `users` SET `complete` = 1 WHERE `id` = '$UserId'";
  $conn->query($usersSQL);
  return true;
} 





$ReferralsDB =  ReferralsDB() ;
$MaximumShare =  MaximumShareBD() ;

 function InsertRecord ($customerId , $code) {
  $conn = db (IsConn);
  $now = now;
  $sql = "INSERT INTO `record` ( `UserId`,  `sectionID`, `status`, `date`) VALUES  ( '$customerId', '$code',0 , '$now'); ";
  $conn->query($sql);
  return $conn->insert_id;
 }

function CountQuestion($customerId , $code) {
  $conn = db (IsConn);
  $now = now;
  $usersSQL = "SELECT count(id) FROM record where UserId = '$customerId ' AND  sectionID = '$code' AND  date = '$now'";
  $usersRE = $conn->query($usersSQL);
  if ($usersRE->num_rows > 0) {
   $users = $usersRE->fetch_assoc();
    return $users['count(id)'];
  }
  return 0;
} 


function GetNameSection($code) {
  $conn = db (IsConn);
  $usersSQL = "SELECT name  FROM `section` WHERE rand = '$code' ";
  $usersRE = $conn->query($usersSQL);
  if ($usersRE->num_rows > 0) {
   $users = $usersRE->fetch_assoc();
    return $users['name'];
  }
  return false;
} 

  function GeUsernameUsers($id) {
    $conn = db (IsConn);
    $usersSQL = "SELECT username  FROM `users` WHERE id = $id ";
    $usersRE = $conn->query($usersSQL);
    if ($usersRE->num_rows > 0) {
     $users = $usersRE->fetch_assoc();
      return $users['username'];
    }
    return false;
  } 

  function GetIdOnUsername($username) {
    $conn = db (IsConn);
    $usersSQL = "SELECT id FROM `users` WHERE `username` = '$username'";
    $usersRE = $conn->query($usersSQL);
    if ($usersRE->num_rows > 0) {
     $users = $usersRE->fetch_assoc();
      return $users['id'];
    }
    return false;
  } 
  
  

function NameUser($UserId) {
  $conn = db (IsConn);
  $sql = "SELECT NameOne ,NameTwo   FROM users where id ='$UserId'";
  $result_img = $conn->query($sql);
  if ($result_img->num_rows == 1) {
    $row_img = $result_img->fetch_assoc();
    $name = $row_img['NameOne'] . ' '  .  $row_img['NameTwo'] ;
  }else {
    $name = '' ;
  }

  return  $name;
}


function NameTwo($UserId) {
  $conn = db (IsConn);
  $sql = "SELECT NameTwo  FROM users where id ='$UserId'";
  $result_img = $conn->query($sql);
  if ($result_img->num_rows == 1) {
    $row_img = $result_img->fetch_assoc();
    $name = $row_img['NameTwo'];
  }else {
    $name = '';
  }
  return  $name;
}


function NameOne($UserId) {
  $conn = db (IsConn);
  $sql = "SELECT NameOne  FROM users where id ='$UserId'";
  $result_img = $conn->query($sql);
  if ($result_img->num_rows == 1) {
    $row_img = $result_img->fetch_assoc();
    $name = $row_img['NameOne'];
  }else {
    $name = '';
  }
  return  $name;
}


function GetEmail($id) {
  $conn = db (IsConn);
  $sql = "SELECT email  FROM users where id ='$id'";
  $result_img = $conn->query($sql);
  if ($result_img->num_rows == 1) {
    $row_img = $result_img->fetch_assoc();
    $name = $row_img['email'];
  }else {
    $name = '';
  }
  return  $name;
}

function GetNumber($id) {
  $conn = db (IsConn);
  $sql = "SELECT number  FROM users where id ='$id'";
  $result_img = $conn->query($sql);
  if ($result_img->num_rows == 1) {
    $row_img = $result_img->fetch_assoc();
    $name = $row_img['number'];
  }else {
    $name = '';
  }
  return  $name;
}


function GetFacebook($id) {
  $conn = db (IsConn);
  $sql = "SELECT facebook  FROM info where UserId ='$id'";
  $result_img = $conn->query($sql);
  if ($result_img->num_rows == 1) {
    $row_img = $result_img->fetch_assoc();
    $name = $row_img['facebook'];
  }else {
    $name = '';
  }
  return  $name;
}

function GetWhatsapp($id) {
  $conn = db (IsConn);
  $sql = "SELECT whatsapp  FROM info where UserId ='$id'";
  $result_img = $conn->query($sql);
  if ($result_img->num_rows == 1) {
    $row_img = $result_img->fetch_assoc();
    $name = $row_img['whatsapp'];
  }else {
    $name = '';
  }
  return  $name;
}



  function lastSenOne($diff) {
    $lastSen = null ;
    if ($diff->y > 0) {
      $lastSen .= $diff->y.'سنة ';
    }
    if ($diff->m > 0) {
      $lastSen .= $diff->m.' شهر ';
    }
    if ($diff->d > 0) {
      $lastSen .=  $diff->d.' يوم ';
    }
    if ($diff->h > 0) {
      $lastSen .=  $diff->h.' ساعة ';
    }

    if ($diff->i > 0) {
      $lastSen .=  $diff->i.' دقيقة ';
    }

    if ($diff->s > 0) {
  //    $lastSen .=  $diff->s.' ثانية ';

    }
    return $lastSen;
  }  

  function lastSen($date, $oun) {
    $datetime1 = new DateTime(date('Y-m-d H:i:s', $date));
    $datetime2 = new DateTime(date('Y-m-d H:i:s'));
    $lastSen = '';
    $diff = $datetime1->diff($datetime2);
    if ($oun == 1) {
      if ($diff->i < 2) {
        return true;
      } else {
        return lastSenOne($diff);
      }
    } else {
      if ($diff->i < 2  &&  $diff->s <= 10) {
        return true;

      } else {
        return lastSenOne($diff);
      }
    }
  }

  

  function GetTimeOut ($customerId) {
    $conn = db (IsConn);
     $timeout_SQL = "SELECT time  FROM timeout where userID = '$customerId' ";
     $result_SQL = $conn->query($timeout_SQL);
     if ($result_SQL->num_rows > 0) { 
     $row_time = $result_SQL->fetch_assoc();
     return $row_time['time'];
     }else {
       return  null ;
     }
    
 }


function arabicDate($time) {
  $months = ["Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر"];
  $days = ["Sat" => "السبت", "Sun" => "الأحد", "Mon" => "الإثنين", "Tue" => "الثلاثاء", "Wed" => "الأربعاء", "Thu" => "الخميس", "Fri" => "الجمعة"];
  $am_pm = ['AM' => 'صباحاً', 'PM' => 'مساءً'];

  $day = $days[date('D', $time)];
  $month = $months[date('M', $time)];
  $am_pm = $am_pm[date('A', $time)];
  $date = $day . ' ' . date('d', $time) . ' - ' . $month . ' - ' . date('Y', $time) . '   ' . date('h:i', $time) . ' ' . $am_pm;
  $numbers_ar = ["٠", "١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩"];
  $numbers_en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

  return str_replace($numbers_en, $numbers_ar, $date);
}


function BlackListDelete($id ) {
  $conn = db (IsConn);
  $sql = "DELETE FROM wordfilter WHERE id=$id";
  $conn->query($sql);
}