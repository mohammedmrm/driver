<?php
ob_start();
session_start();
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
require_once("_apiAccess.php");
access();
error_reporting(0);
require_once("../php/dbconnection.php");
require_once("_sendNoti.php");


use Violin\Violin;

require_once('../validator/autoload.php');
$v = new Violin;
$success = 0;
$error = [];
$id        = $userid;
$new_price = str_replace(',', '', $_REQUEST['price']);
//$new_price = str_replace('.', '', $new_price);
$note      = $_REQUEST['note'];
$items_no  = $_REQUEST['items_no'];
$order_id  = $_REQUEST['orderid'];

$v->addRuleMessage('isPrice', 'المبلغ غير صحيح');

$v->addRule('isPrice', function ($value, $input, $args) {
  $x = (bool) 0;
  if (preg_match("/^-?(0|\d*)(\.25|\.5|\.50|\.75)?$/", $value)) {
    $x = (bool) 1;
  }
  return   $x;
});
$v->addRuleMessages([
  'required' => 'الحقل مطلوب',
  'int'      => 'فقط الارقام مسموع بها',
  'regex'    => 'فقط الارقام مسموح بها',
  'min'      => 'قصير جداً',
  'max'      => 'مسموح ب {value} رمز كحد اعلى ',
  'email'    => 'البريد الالكتروني غيز صحيح',
]);

$v->validate([
  'id'         => [$id,       'required|int'],
  'new_price'  => [$new_price, 'isPrice'],
  'items_no'   => [$items_no, 'required|int'],
  'note'       => [$note,     'max(250)'],
  'order_id'   => [$order_id, "required|int"],
]);
function httpPost($url, $data)
{
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($curl);
  curl_close($curl);
  return $response;
}
if ($v->passes()) {
  try {
    $sql = 'update orders set order_status_id =?,new_price=? where id=? and driver_id=? and driver_invoice_id=0';
    $result = setData($con, $sql, ['6', $new_price, $order_id, $id]);
    if ($result > 0) {
      $success = 1;
      $sql = 'insert into tracking (order_status_id,note,order_id,items_no,staff_id) values(?,?,?,?,?)';
      $result = setData($con, $sql, ['6', $note, $order_id, $items_no, $userid]);
      $sql = "select staff.token as s_token, orders.id as id , clients.sync_dns as dns, clients.sync_token as token, orders.isfrom as isfrom, clients.token as c_token from orders inner join staff
            on
            staff.id = orders.manager_id
            or
            staff.id = orders.driver_id
            inner join clients on clients.id = orders.client_id
            where orders.id =  ?";
      $res = getData($con, $sql, [$order_id]);
      if ($res[0]['isfrom'] == 2) {
        $response = httpPost(
          $res[0]['dns'] . '/api/orderStatusSync.php',
          [
            'token' => $res[0]['token'],
            'status' => 6,
            'note' => 'راجع جزئي - ' . $note,
            'price' => $new_price,
            'id' => $order_id,
          ]
        );
      }
      sendNotification([$res[0]['s_token'], $res[0]['c_token']], [$order_id], 'طلب رقم ', "ارجاع الطلب - " . $note, "../orderDetails.php?o=" . $order_id);
    } else {
      $error['note'] = "لايمكن تحديث الحالة";
    }
  } catch (PDOException $ex) {
    $data = ["error" => $ex];
    $success = "0";
    $msg = "Query Error";
  }
} else {
  $error = [
    'id' => implode($v->errors()->get('id')),
    'note' => implode($v->errors()->get('note')),
    'price' => implode($v->errors()->get('new_price')),
    'items_no' => implode($v->errors()->get('items_no')),
    'orderid' => implode($v->errors()->get('order_id')),
  ];
  $msg = "Request Error";
}
ob_end_clean();
echo json_encode(['code' => 200, 'message' => $msg, json_decode(substr($response, 3)), 'success' => $success, 'error' => $error, $_POST]);
