<?php
ob_start();
session_start();
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
require_once("_apiAccess.php");
access();
error_reporting(0);
require_once("../php/dbconnection.php");
require_once("../php/_crpt.php");
require_once("../config.php");
$start = trim($_REQUEST['start']);
$end = trim($_REQUEST['end']);
$limit = trim($_REQUEST['limit']);
$page = trim($_REQUEST['currentPage']);
$store = trim($_REQUEST['store']);
$msg = "";
if (empty($limit)) {
  $limit = 10;
}
if (empty($page)) {
  $page = 1;
}
$success = 0;

if (empty($end)) {
  $end = date('Y-m-d 00:00:00', strtotime($end . ' + 1 day'));
} else {
  $end = date('Y-m-d', strtotime($end . ' + 1 day'));
  $end .= " 00:00:00";
}
if (empty($start)) {
  $start = date('Y-m-d 00:00:00', strtotime($start . ' - 92 day'));
} else {
  $start .= " 00:00:00";
}
try {
  $sql2 = "select driver_invoice.*,count(orders.id) as orders,date_format(driver_invoice.date,'%Y-%m-%d') as in_date
           from driver_invoice
           inner join orders on orders.driver_invoice_id = driver_invoice.id
           where driver_invoice.driver_id=?";
  if (!empty($end) && !empty($start)) {
    $sql2 .= ' and driver_invoice.date between "' . $start . '" and "' . $end . '" ';
  }

  $sql2 .= " group by driver_invoice.id order by driver_invoice.date DESC";

  $data = getData($con, $sql2, [$userid]);

  $sqlDP = "SELECT driver_price/sum(if(order_status_id = 4 or order_status_id = 4 or order_status_id = 6,1,0)) as price
  FROM `driver_invoice` 
  INNER JOIN orders on driver_invoice.id = orders.driver_invoice_id 
  WHERE driver_price > 0 and driver_invoice.driver_id = ? 
  GROUP by driver_invoice.id
  ORDER by driver_invoice.date DESC 
  limit 1";
  $dp = getData($con, $sql, [$$userid]);
  $dp[0]['price'] ? '' : $dp[0]['price'] = $config['driver_price'];

  $sql = "select
          sum(new_price) as income,
          sum(
              new_price -
              (if(to_city = 1,
                  if(orders.order_status_id=9,0,
                      if(towns.center = 1,
                        if(client_dev_price.price is null,(" . $config['dev_b'] . " - discount),(client_dev_price.price - discount)),
                        if(client_dev_price.town_price is null,(" . ($config['dev_b'] + $config['countrysidePrice']) . " - discount),(client_dev_price.town_price - discount))
                      )
                  ),
                  if(orders.order_status_id=9,0,
                      if(towns.center = 1,
                        if(client_dev_price.price is null,(" . $config['dev_o'] . " - discount),(client_dev_price.price - discount)),
                        if(client_dev_price.town_price is null,(" . ($config['dev_o'] + $config['countrysidePrice']) . " - discount),(client_dev_price.town_price - discount))
                      )
                  )
                 )
                 + if(new_price > 500000 ,( (ceil(new_price/500000)-1) * " . $config['addOnOver500'] . " ),0)
                 + if(weight > 1 ,( (weight-1) * " . $config['weightPrice'] . " ),0)
             )) as client_price,
          sum(discount) as discount,
          SUM(IF (order_status_id = '4' or order_status_id = '5' or order_status_id = '6',1,0)) as  recived,
          count(orders.id) as orders
          from orders
          left join towns on towns.id = orders.to_town
          left JOIN client_dev_price on client_dev_price.client_id = orders.client_id AND client_dev_price.city_id = orders.to_city
          where orders.driver_id = ?  and driver_invoice_id = 0 and (order_status_id = 4 or order_status_id = 5 or order_status_id = 6)  and orders.confirm=1
          ";
  if (!empty($end) && !empty($start)) {
    $sql .= ' and orders.date between "' . $start . '" and "' . $end . '" ';
  }
  if ($store > 0) {
    $sql .= ' and orders.store_id="' . $store . '"';
  }
  $res4 = getData($con, $sql, [$userid]);;

  $total = $res4[0];
  $success = 1;
} catch (PDOException $ex) {
  $data = ["error" => $ex];
  $success = "0";
  $msg = "Query Error";
}
$total['start'] = date('Y-m-d', strtotime($start));
$total['end'] = date('Y-m-d', strtotime($end . " -1 day"));
$total['orders'] = $total['orders'] . " ( " . $total['recived'] * $db[0]['price'] . " ) ";
ob_end_clean();
echo json_encode([$userid, $sql, 'code' => $code, 'message' => $msg, 'success' => $success, 'data' => $data, "total" => $total]);
