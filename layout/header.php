<?php 
session_start();
 if (is_file('../../controller/HeaderFunction.php')) {
      include '../../controller/function.php';
 }else {
     include 'controller/function.php';
 }
?>
