<?php
header('Content-type:application/json;charset=windows-1256');
require_once('dbconnection.php');
require_once('_access.php');
access();
error_reporting(0);

$start = trim($_REQUEST['start']);
$end = trim($_REQUEST['end']);
if(empty($end)) {
  $end = date('Y-m-d h:i:s', strtotime($end. ' + 1 day'));
}else{
   $end =date('Y-m-d', strtotime($end. ' + 1 day'));
   $end .=" 00:00:00";
}
if(empty($start)) {
  $start = date('Y-m-d h:i:s',strtotime($start. ' - 7 day'));
}else{
   $start .=" 00:00:00";
}

$sql = "SELECT
          SUM(IF (order_status = '1',1,0)) as  regiserd,
          SUM(IF (order_status = '2',1,0)) as  redy,
          SUM(IF (order_status = '3',1,0)) as  ontheway,
          SUM(IF (order_status = '4',1,0)) as  recieved,
          SUM(IF (order_status = '5',1,0)) as  chan,
          SUM(IF (order_status = '6',1,0)) as  returnd,
          SUM(IF (order_status = '7',1,0)) as  posponded
          FROM orders
          where date between '".$start."' and '".$end."' and driver_id=?";

$result = getData($con,$sql,[$_SESSION['userid']]);
echo json_encode(['data'=>$result]);
?>