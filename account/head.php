<?php 
session_start();
// echo $_SESSION['name']  ;
// exit ;
if (is_file('../controller/HeaderFunction.php')) {
     include '../controller/function.php';
}else {
    include 'controller/function.php';
}
 if ( isLoginUser() === true) {
  echo '<META HTTP-EQUIV="refresh" CONTENT="0.7;URL=' . URL . 'account/user/index.php">';
  echo error_page('مسجل بالفعل جاري تحويلك ... ') ;
}else {
    echo HeaderTile ('حسابي') ;
} ?>   
 <body oncontextmenu="return false">
<!-- Loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
</div>
<!-- Loader -->
