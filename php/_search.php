<?php
session_start();
error_reporting(0);
header('Content-Type: application/json');
require_once("_access.php");
access();
require_once("dbconnection.php");
$search = $_REQUEST['search'];
$start = trim($_REQUEST['start']);
$end = trim($_REQUEST['end']);
$city = trim($_REQUEST['city']);
$type = trim($_REQUEST['type']);
$limit = trim($_REQUEST['limit']);
$page = trim($_REQUEST['currentPage']);
$orders = 0;
if(empty($limit)){
 $limit = 3;
}
if($type != 1 && $type != 2){
  $type = 1;
}
if(empty($page)){
 $page = 1;
}
if(empty($end)) {
  $end = date('Y-m-d h:i:s', strtotime($end. ' + 1 day'));
}else{
   $end .=" 23:59:59";
}
$start .=" 00:00:00";
try{
  $count = "select count(*) as count from orders
            left join (
              select max(id) as last_id,order_id from tracking group by order_id
            ) a on a.order_id = orders.id
            left join tracking on a.last_id = tracking.id";
  $query = "select orders.*,
            clients.name as client_name,clients.phone as client_phone,
            cites.name as city,towns.name as town,branches.name as branch_name,
            if(staff.phone is null,'07721397505',staff.phone) as driver_phone,
            staff.name as driver_name,
            stores.name as store_name,tracking.note as t_note
            from orders left join
            clients on clients.id = orders.client_id
            left join cites on  cites.id = orders.to_city
            left join towns on  towns.id = orders.to_town
            left join staff on  orders.driver_id = staff.id
            left join stores on  stores.id = orders.store_id
            left join branches on  branches.id = orders.to_branch
            left join (
              select max(id) as last_id,order_id from tracking group by order_id
            ) a on a.order_id = orders.id
            left join tracking on a.last_id = tracking.id
            ";
  $where = "where";
  if($type == 1){
    $filter = "orders.driver_id =".$_SESSION['userid']." and (orders.confirm=1)";
  }else{
    $filter = "orders.date >= (NOW() - INTERVAL 1 MONTH) and (orders.confirm=1)";
  }

  if(!empty($search)){
   $filter .= " and (order_no like '%".$search."%'
                     or customer_name like  '%".$search."%'
                     or customer_phone like '".$search."%'
                     or tracking.note like  '%".$search."%'
                     )
                    ";
  }
  $filter .= " and driver_invoice_id=0";
  function validateDate($date, $format = 'Y-m-d H:i:s')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
  if(validateDate($start) && validateDate($end)){
      $filter .= " and date between '".$start."' AND '".$end."'";
     }
  if($city > 0){
   $filter .= " and to_city =".$city;
  }
  if($store > 0){
   $filter .= " and store_id =".$store;
  }
  if($filter != ""){
    $filter = preg_replace('/^ and/', '', $filter);
    $filter = $where." ".$filter;
    $count .= " ".$filter;
    $query .= " ".$filter;
  }
  if($page != 0){
    $page = $page - 1;
  }
  $query .= " order by orders.date DESC limit ".($page * $limit).",".$limit;
  $data = getData($con,$query);
  $ps = getData($con,$count);
  $orders = $ps[0]['count'];
  $pages= ceil($ps[0]['count']/$limit);
  $success="1";
} catch(PDOException $ex) {
   $data=["error"=>$ex];
   $success="0";
}

echo (json_encode(array($query,'orders'=>$orders,"success"=>$success,"data"=>$data,'pages'=>$pages,'nextPage'=>$page+2)));
?>