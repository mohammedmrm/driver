<?php
session_start();
error_reporting(0);
header('Content-Type: application/json');
require("_access.php");
access();
require("dbconnection.php");
require_once("../config.php");
$start = trim($_REQUEST['start']);
$end = trim($_REQUEST['end']);
$limit = trim($_REQUEST['limit']);
$page = trim($_REQUEST['currentPage']);

if(empty($limit)){
 $limit = 10;
}
if(empty($page)){
 $page = 1;
}


if(empty($end)) {
  $end = date('Y-m-d 00:00:00', strtotime($end. ' + 1 day'));
}else{
   $end =date('Y-m-d', strtotime($end. ' + 1 day'));
   $end .=" 00:00:00";
}
if(empty($start)) {
  $start = date('Y-m-d 00:00:00',strtotime($start. ' - 7 day'));
}else{
   $start .=" 00:00:00";
}

  $sql = 'select
            sum(
                if(to_city = 1,
                 if(client_dev_price.price is null,('.$config['dev_b'].' - discount),(client_dev_price.price - discount)),
                 if(client_dev_price.price is null,('.$config['dev_o'].' - discount),(client_dev_price.price - discount))
                )
             ) as dev_price,
             sum(
                 new_price -
                 (
                     if(to_city = 1,
                       if(client_dev_price.price is null,('.$config['dev_b'].' - discount),(client_dev_price.price - discount)),
                       if(client_dev_price.price is null,('.$config['dev_o'].' - discount),(client_dev_price.price - discount))
                 )
                )
             ) as client_price,
             sum(new_price) as new_price,
             sum(discount) as discount,
             count(orders.id) as orders,
             max(DATE_FORMAT(date,"%Y-%m-%d")) as date
            from orders
            left join clients on clients.id = orders.client_id
            left join branches on  branches.id = clients.branch_id
            left JOIN client_dev_price
            on client_dev_price.client_id = orders.client_id AND client_dev_price.city_id = orders.to_city
            where date between "'.$start.'" and "'.$end.'"
            and orders.driver_id ="'.$_SESSION['userid'].'"';


$sql1 = $sql."  GROUP BY DATE_FORMAT(date,'%Y-%m-%d')";
$sql1 = $sql1." limit ".(($page-1 ) * $limit) .",".$limit;
$data =  getData($con,$sql1);
$total=getData($con,$sql);

$total[0]['start'] = date('Y-m-d', strtotime($start));
$total[0]['end'] = date('Y-m-d', strtotime($end." -1 day"));

echo json_encode([$_POST,'data'=>$data,"total"=>$total]);
?>