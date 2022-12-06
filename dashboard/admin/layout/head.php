<?php 
session_start();
 if (is_file('../../../controller/function.php')) {
     include_once '../../../controller/function.php';
 }else {
     include_once '../../controller/function.php';
 }

//  echo $_SESSION['status'] ; 
//  exit ;
 if ( LoginDashboard() !== true) {                
echo '<META HTTP-EQUIV="refresh" CONTENT="0.7;URL=' . URL . '/dashboard">';
echo error_page('إنتهت مهلة الجلسة') ;
}else {
   echo HeaderAdminTile ('تسجيل جديد', 0) ;
   
   $customerId = validateInput($_SESSION['customerId']);
   $sql_users = "SELECT *  FROM admin where id = '$customerId' ";
   $infoUsers = $conn->query($sql_users);
   $info = $infoUsers->fetch_assoc();

   $settingsSQL = "SELECT *  FROM settings where id = 1 ";
   $settingsRE = $conn->query($settingsSQL);
   $settings = $settingsRE->fetch_assoc();


   
   $adsSQL = "SELECT *  FROM `ads` where id = 1 ";
   $READS = $conn->query($adsSQL);
   $ads = $READS->fetch_assoc();
} 
?>
