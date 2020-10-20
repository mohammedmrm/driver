<?php
ob_start(); 
session_start();
header('Content-Type: application/json');
require_once("_apiAccess.php");
access();
error_reporting(0);
require_once("../php/dbconnection.php");
$id = $userid;
$msg = "";
try{
   $query = "select stores.*, clients.name as client_name , clients.phone as client_phone
   from stores inner join clients on clients.id = stores.client_id where stores.client_id=?";
   $data = getData($con,$query,[$id]);
   $success="1";
   $code = 200;
} catch(PDOException $ex) {
   $data=["error"=>$ex];
   $success="0";
   $msg = "Query Error";
   $code = 200;
}
ob_end_clean();
echo (json_encode(['code'=>$code,'message'=>$msg,"success"=>$success,"data"=>$data],JSON_PRETTY_PRINT));
?>