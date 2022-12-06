<?php
session_start();
include '../controller/function.php';
if (LoginDashboard() === true) {

      echo '<META HTTP-EQUIV="refresh" CONTENT="0.7;URL=' . URL . 'dashboard/admin/index.php">';
      echo error_page('School Welcome');
} else {
   echo '<META HTTP-EQUIV="refresh" CONTENT="0.7;URL=' . URL . 'dashboard/login.php">';
   echo error_page('Refresh Login');
}
