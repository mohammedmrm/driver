<?php
session_start();
error_reporting(0);
header('Content-Type: application/json');
require_once("_access.php");
access();
require_once("dbconnection.php");
require_once("_crpt.php");

$success = 0;
$error = [];
$user_id = $_SESSION['userid'];
$seen = $_REQUEST['seen'];

if($seen == 1){
$sql2 = 'select notification.*,orders.order_no from notification inner join orders on orders.id=notification.order_id where for_client = 0 and driver_seen= 1 and staff_id = ? order by date DESC limit 100';
}else if($seen == 2){

$sql2 = 'select notification.*,orders.order_no from notification inner join orders on orders.id=notification.order_id where for_client = 0 and driver_seen= 0 and staff_id = ? order by date DESC limit 100';

}else{
$sql2 = 'select notification.*,orders.order_no from notification inner join orders on orders.id=notification.order_id where for_client = 0 and staff_id = ? order by date DESC limit 100';
}
$sql1 = 'select count(*) as unseen from notification where for_client = 0 and staff_id = ? and driver_seen=0 limit 150';

$res = getData($con,$sql1,[$user_id]);
$unseen = $res[0]['unseen'];
$result = getData($con,$sql2,[$user_id]);
$success = 1;
echo json_encode(['success'=>$success,"data"=>$result,'unseen'=>$unseen]);
?>