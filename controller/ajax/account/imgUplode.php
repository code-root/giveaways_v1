<?php
session_start();
include '../../function.php';
include '../../security-ajax.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isLoginUser() === true) {
   $customerId = validateInput($_SESSION['customerId']);

   
$TimeCheck = strtotime("now");
$files_arr = '';
$randSQL = '';

$upload_location = "../../../assets/profile/";



// Loop all files
    $index = 0;
   if(isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != ''){
      // File name
      $filename = $_FILES['files']['name'][$index];
      
      // Get extension

      $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
      $new_file_name =  strtotime(date('Y-m-d')) .  'profile'  . rand(1, 100) .'.'. $ext;

      // Valid image extension
      $valid_ext = array("png","jpeg","jpg","pdf");

      // Check extension
      if(in_array($ext, $valid_ext)){

         // File path
         $path = $upload_location.$new_file_name;
         // Upload file
         if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
            $sql = "UPDATE users SET img='$new_file_name' WHERE id='$customerId'";
            $conn->query($sql);
            $files_arr = $new_file_name;
          

         }
      }
    }
   

echo json_encode(['files_arr' => $new_file_name]);
} else {
    echo error_page('جاري تحويلك .. ');
}
