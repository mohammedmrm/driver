<?php
ob_start(); 
session_start();
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
require_once("_apiAccess.php");
access();
error_reporting(0);
require_once("../php/dbconnection.php");

$success = 0;
$error = [];
$user_id = $userid;
$msg = "";
try {
    $sql = 'select count(*) as unseen from notification where for_client = 1 and client_id = ? and client_seen=0';
    $res = getData($con,$sql,[$user_id]);
    $unseen = $res[0]['unseen'];
    $sql = 'select notification.*,orders.order_no from notification inner join orders on orders.id = notification.order_id where for_client = 1 and notification.client_id = ? order by date DESC limit 50';
    $result = getData($con,$sql,[$user_id]);
    $success = 1;
}catch(PDOException $ex) {
    $data=["error"=>$ex];
    $success="0";
    $msg ="Query Error";
}
ob_end_clean();
echo json_encode(['code'=>200,'message'=>$msg,'success'=>$success,"data"=>$result,'unseen'=>$unseen]);
?>