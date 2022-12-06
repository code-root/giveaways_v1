<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title> تنشيط الحساب | win20 </title>
    </head>
</html>
<?php
session_start();
if (is_file('../controller/HeaderFunction.php')) {
     include '../controller/function.php';
}else {
    include 'controller/function.php';
}
if (!isset($_GET['code'])) {
    echo '<META HTTP-EQUIV="refresh" CONTENT="0.5;URL=login.php">';
    echo error_page('404 الصفحة غير موجودة');
} else {
    $code = filter_var($_GET['code'], FILTER_SANITIZE_STRING);
    if (GetUserIDUUID($code) != false) {
        $UserId = GetUserIDUUID($code);
        UpdateCompleteUsers($UserId);
        echo '<META HTTP-EQUIV="refresh" CONTENT="7;URL=login.php">';
        echo error_page('  تم التنشيط بنجاح .. جاري تحويلك لتسجيل الدخول ');
    }else {
        echo '<META HTTP-EQUIV="refresh" CONTENT="0.5;URL=login.php">';
        echo error_page('404 الصفحة غير موجودة');
    }
}
?>