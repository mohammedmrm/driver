<?php
session_start();
//error_reporting(0);
header('Content-Type: application/json');
require("_access.php");
access();
require("dbconnection.php");
require_once("../config.php");

$start = date('Y-m-d 23:59:59',strtotime(' - 1 day'));
$end= date('Y-m-d 00:00:01',strtotime(' + 1 day'));
$sql = "SELECT
          SUM(IF (order_status_id = '3',1,0)) as  waiting,
          SUM(IF (order_status_id = '4',1,0)) as  recived,
          count(order_no) as  today,
          SUM(IF (order_status_id = '6',1,0)) as  returned,
          SUM(IF (order_status_id = '7',1,0)) as  posponded
          FROM orders
          where date between '".$start."' and '".$end."'
          and driver_id='".$_SESSION['userid']."'";
$result = getData($con,$sql);
echo (json_encode(array("data"=>$result)));
?>