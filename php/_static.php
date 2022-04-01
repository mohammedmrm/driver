<?php
session_start();
error_reporting(0);
header('Content-Type: application/json');
require_once("_access.php");
access();
require_once("dbconnection.php");
require_once("../config.php");

$start = date('Y-m-d', strtotime(' - 1 day'));
$start .= ' 12:00:00';
$end = date('Y-m-d', strtotime(' + 1 day'));
$sql = "SELECT
          SUM(IF (order_status_id = '3',1,0)) as  waiting,
          SUM(IF (order_status_id = '4' or order_status_id = '5' or order_status_id = '6',1,0)) as  recived,
          count(order_no) as  today,
          SUM(IF (order_status_id = '6' or order_status_id = '9',1,0)) as  returned,
          SUM(IF (order_status_id = '7',1,0)) as  posponded
          FROM orders
          where driver_invoice_id=0
          and driver_id='" . $_SESSION['userid'] . "' and confirm=1";
$result = getData($con, $sql);
$sql = "SELECT
          count(*) as  today
          FROM orders
          where date between '" . $start . "' and '" . $end . "'
          and driver_id='" . $_SESSION['userid'] . "' and confirm=1";
$res = getData($con, $sql);
$sql = "SELECT
          SUM(IF(order_status_id = '3' or order_status_id = '2' or order_status_id = '1',1,0)) as  waiting
          FROM orders
          where driver_id='" . $_SESSION['userid'] . "' and confirm=1";
$res3 = getData($con, $sql);
$sql = "SELECT driver_price/sum(if(order_status_id = 4 or order_status_id = 4 or order_status_id = 6,1,0)) as price
 FROM `driver_invoice` 
 INNER JOIN orders on driver_invoice.id = orders.driver_invoice_id 
 WHERE driver_price > 0 and driver_invoice.driver_id = ? 
 GROUP by driver_invoice.id
 ORDER by driver_invoice.date DESC 
 limit 1";
$res4 = getData($con, $sql, [$_SESSION['userid']]);
$res4[0]['price'] ? '' : $res4[0]['price'] = $config['driver_price'];
echo (json_encode(array($res4, "data" => $result, "price" => ($result[0]['recived'] * $res4[0]['price']), "today" => $res[0]['today'], 'waiting' => $res3[0]['waiting'])));
