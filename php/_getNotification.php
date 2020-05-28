<?php
session_start();
//error_reporting(0);
header('Content-Type: application/json');
require("_access.php");
access();
require("dbconnection.php");
require("_crpt.php");

$success = 0;
$error = [];
$user_id = $_SESSION['userid'];


$sql = 'select count(*) as unseen from notification where for_client = 0 and staff_id = ? and driver_seen=0';
$res = getData($con,$sql,[$user_id]);
$unseen = $res[0]['unseen'];
$sql = 'select * from notification where for_client = 0 and staff_id = ? order by date DESC limit 50';
$result = getData($con,$sql,[$user_id]);
$success = 1;
echo json_encode(['success'=>$success,"data"=>$result,'unseen'=>$unseen]);
?>