<?php
ob_start();
session_start();
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
require_once("_apiAccess.php");
access();
error_reporting(0);
require_once("../php/dbconnection.php");
require_once("../config.php");
$msg="";
$start30 = date('Y-m-d 00:00:00',strtotime(' - 30 day'));
$end30 = date('Y-m-d 00:00:00',strtotime(' + 1 day'));
try{
$start = date('Y-m-d',strtotime(' - 1 day'));
$start .=' 12:00:00';
$end= date('Y-m-d',strtotime(' + 1 day'));
$sql = "SELECT
          SUM(IF (order_status_id = '4',1,0)) as  recived,
          SUM(IF (order_status_id = '6' or order_status_id = '9',1,0)) as  returned,
          SUM(IF (order_status_id = '7',1,0)) as  postponded
          FROM orders
          where update_date between '".$start."' and '".$end."'
          and driver_id='".$userid."' and confirm=1";
$result = getData($con,$sql);
$sql = "SELECT
          count(*) as  today
          FROM orders
          where date between '".$start."' and '".$end."'
          and driver_id='".$userid."' and confirm=1";
$res = getData($con,$sql);
$sql = "SELECT
          SUM(IF(order_status_id = '3' or order_status_id = '2' or order_status_id = '1',1,0)) as  waiting
          FROM orders
          where driver_id='".$userid."' and confirm=1";
$res3 = getData($con,$sql);
$result[0]['today']= $res[0]['today'];
$result[0]['waiting']= $res3[0]['waiting'];
    $sql = "SELECT
          SUM(IF (order_status_id = '1' or order_status_id = '2' or order_status_id = '3' or order_status_id = '13',1,0)) as  onway,
          SUM(IF (order_status_id = '9' and storage_id<>1 and orders.storage_id <> -1,1,0)) as  inprocess,
          SUM(IF (order_status_id = '6' and storage_id<>1 and orders.storage_id <> -1,1,0)) as  partiallyReturnd,
          SUM(IF (order_status_id = '5' and storage_id<>1 and orders.storage_id <> -1,1,0)) as  `replace`,
          SUM(IF ((order_status_id = '9') and storage_id=1,1,0)) as  instorageReturnd,
          SUM(IF ((order_status_id = '6') and storage_id=1,1,0)) as  instoragepartiallyReturnd,
          SUM(IF ((order_status_id = '5') and storage_id=1,1,0)) as  instoragereplace,
          SUM(IF (order_status_id = '4',1,0)) as  recieved,
          SUM(IF (order_status_id = '7',1,0)) as  posponded,
          sum(new_price -
              (
                 if(order_status_id = 6 or order_status_id = 5 or order_status_id = 4,
                     if(to_city = 1,
                           if(client_dev_price.price is null,(".$config['dev_b']." - discount),(client_dev_price.price - discount)),
                           if(client_dev_price.price is null,(".$config['dev_o']." - discount),(client_dev_price.price - discount))
                      ),
                      0
                  )
              )
          ) as client_price
          FROM orders
          left JOIN client_dev_price on client_dev_price.client_id = orders.client_id AND client_dev_price.city_id = orders.to_city
          where orders.driver_id=".$userid." and driver_invoice_id=0 and confirm=1";
          $static =  getData($con,$sql);
} catch(PDOException $ex) {
   $data=["error"=>$ex];
   $success="0";
   $msg ="Query Error";
}
ob_end_clean();
echo(json_encode(array('code'=>200,'message'=>$msg,"data"=>$result,"today"=>$res[0]['today'],'waiting'=>$res3[0]['waiting'],'static'=>$static),JSON_PRETTY_PRINT));
?>