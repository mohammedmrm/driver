<?php
if(!isset($_SESSION)){
session_start();
}
require_once("dbconnection.php");
function access(){
  if(!empty($_COOKIE['username']) && !empty($_COOKIE['password'])){
    $sql = "select staff.*,role.home as home from staff inner join role on role.id = staff.role_id where phone = ? and password =? and status=1";
    $result = getData($GLOBALS['con'],$sql,[$_COOKIE['username'],$_COOKIE['password']]);
  }
  if(count($result)> 0){
    $_SESSION['login']=1;
    $_SESSION['username']=$result[0]['phone'];
    $_SESSION['userid']=$result[0]['id'];
    $_SESSION['role']=$result[0]['role_id'];
    $_SESSION['user_details']=$result[0];
  }
  if(!isset($_SESSION['userid'])){
    header("location:login.php");
    die("<h1>لاتمتلك صلاحيات الوصول لهذه الصفحة  (<a href='login.php'>سجل الدخول</a>)</h1>");
  }
}
?>