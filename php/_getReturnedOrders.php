<?php
session_start();
error_reporting(0);
header('Content-Type: application/json');
require_once("_access.php");
access();
require_once("dbconnection.php");
$search = $_REQUEST['search-text'];
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
  $end = date('Y-m-d h:i:s', strtotime($end. ' + 1 day'));
}else{
   $end .=" 23:59:59";
}
$start .=" 00:00:00";
try{
  $count = "select count(*) as count from orders
           left join driver_invoice on  driver_invoice.id = orders.driver_invoice_id
           ";
  $query = "select orders.*,
            clients.name as client_name,clients.phone as client_phone,
            cites.name as city,towns.name as town,branches.name as branch_name
            from orders left join
            clients on clients.id = orders.client_id
            left join cites on  cites.id = orders.to_city
            left join towns on  towns.id = orders.to_town
            left join branches on  branches.id = orders.to_branch
            left join driver_invoice on  driver_invoice.id = orders.driver_invoice_id
            ";
  $where = "where ";
  $filter = "orders.driver_id =".$_SESSION['userid']." and (order_status_id=6 or order_status_id=9 or order_status_id=5)  and confirm=1 and (driver_invoice_id=0)";
  if(!empty($search)){
   $filter .= " and (order_no like '%".$search."%'
                    or customer_name like '%".$search."%'
                    or customer_phone like '%".$search."%')
                    ";
  }

  function validateDate($date, $format = 'Y-m-d H:i:s')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
  if(validateDate($start) && validateDate($end)){
      $filter .= " and orders.date between '".$start."' AND '".$end."'";
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
  $query .= " limit ".($page * $limit).",".$limit;
  $data = getData($con,$query);
  $ps = getData($con,$count);
  $pages= ceil($ps[0]['count']/$limit);
  $success="1";
} catch(PDOException $ex) {
   $data=["error"=>$ex];
   $success="0";
}
if($success == '1'){
  foreach($data as $k=>$v){
    if($v['with_dev'] == 1){
      $data[$k]['with_dev'] = "نعم";
    }else{
      $data[$k]['with_dev'] = "لا";
    }
    if($v['money_status'] == 1){
      $data[$k]['money_status'] = "مدفوع";
    }else{
      $data[$k]['money_status'] = "غير مدفوع";
    }
  }
}
echo (json_encode(array('orders'=>$ps[0]['count'],$_POST,"success"=>$success,"data"=>$data,'pages'=>$pages,'nextPage'=>$page+2)));
?>