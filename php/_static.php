<?php
session_start();
error_reporting(0);
header('Content-Type: application/json');
require_once("_access.php");
access();
require_once("dbconnection.php");
require_once("../config.php");

$start = date('Y-m-d',strtotime(' - 1 day'));
$start .=' 12:00:00';
$end= date('Y-m-d',strtotime(' + 1 day'));
$sql = "SELECT
          SUM(IF (order_status_id = '3',1,0)) as  waiting,
          SUM(IF (order_status_id = '4',1,0)) as  recived,
          count(order_no) as  today,
          SUM(IF (order_status_id = '6' or order_status_id = '9',1,0)) as  returned,
          SUM(IF (order_status_id = '7',1,0)) as  posponded
          FROM orders
          where update_date between '".$start."' and '".$end."'
          and driver_id='".$_SESSION['userid']."' and confirm=1";
$result = getData($con,$sql);
$sql = "SELECT
          count(*) as  today
          FROM orders
          where date between '".$start."' and '".$end."'
          and driver_id='".$_SESSION['userid']."' and confirm=1";
$res = getData($con,$sql);
$sql = "SELECT
          SUM(IF(order_status_id = '3' or order_status_id = '2' or order_status_id = '1',1,0)) as  waiting
          FROM orders
          where driver_id='".$_SESSION['userid']."' and confirm=1";
$res3 = getData($con,$sql);
echo (json_encode(array("data"=>$result,"today"=>$res[0]['today'],'waiting'=>$res3[0]['waiting'])));
?>