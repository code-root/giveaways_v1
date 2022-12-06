<?php 
if ( isLoginUser() !== true ) {                
echo '<META HTTP-EQUIV="refresh" CONTENT="0.7;URL=' . URL . 'account/login.php">';
echo error_page('إنتهت مهلة الجلسة') ;
exit ;
}else {
   
   $customerId = validateInput($_SESSION['customerId']);
   $sql_users = "SELECT *  FROM users where id = '$customerId' ";
   $infoUsers = $conn->query($sql_users);
   $users = $infoUsers->fetch_assoc();
   echo HeaderTile ($users['NameOne'], 0) ;
    
   if (empty($users['NameOne'])) {
      echo '<META HTTP-EQUIV="refresh" CONTENT="0.7;URL=' . URL . 'account/logout.php">';
      echo error_page('إنتهت مهلة الجلسة') ;
      exit ;
     }
     $sqlInfoUser = "SELECT * FROM info where UserId = $customerId ";
       $result_info = $conn->query($sqlInfoUser);
       $info = $result_info->fetch_assoc();
        if ($users['img'] == '') {
               $img = 'https://cdn.iconscout.com/icon/free/png-256/profile-417-1163876.png' ;
        }else {
           $img = url_assets() .'profile/'. $users['img'];
        }
}  
$PointsUser = PointsUser ($users['id']);
if ($PointsUser > 10000 ) {
      $send_points = '<div class="col-9 text-center" style="margin-top: 7%; margin-right: 9%; ">
      <label class="text-center"> النقاط التي تريد سحبها </label>
      <input id="PointsUser" type="number" value="'.$PointsUser.'" class="form-control ps-5">
      <br>
      <button  onClick="send_points()" id="send_points" type="submit" class="btn btn-info">  طلب سحب النقاط </button>
      </div>' ;
      }else {
         $send_points = "" ;
         } 



?>
