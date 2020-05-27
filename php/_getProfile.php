<?php
session_start();
header('Content-Type: application/json');
require("dbconnection.php");
require("_access.php");
access();
try{
  $query = "select * from staff where id = ?";
  $data = getData($con,$query,[$_SESSION['userid']]);
  $success="1";
} catch(PDOException $ex) {
   $data=["error"=>$ex];
   $success="0";
}
print_r(json_encode(array("success"=>$success,"data"=>$data)));
?>