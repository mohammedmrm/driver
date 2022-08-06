<?php

use ExponentPhpSDK\Exceptions\ExpoException;

function sendNotification($token, $orders = [], $title = "Title", $body = "Body", $link = "", $icon = '../img/logos/logo.png', $data = [])
{
  global $con;
  global $userid;
  foreach ($orders as $order) {
    $sql = "select * from orders where orders.id =  ?";
    $result = getData($con, $sql, [$order]);
    if (count($result) > 0) {
      $sql = "insert into notification (title,body,for_client,staff_id,client_id,order_id)
              values(?,?,?,?,?,?)";
      $ids[] = $result[0]['manager_id'];
      $ids[] = $result[0]['driver_id'];
      $ids[] = $result[0]['client_id'];

      setData($con, $sql, [$title, $body, 0, $result[0]['manager_id'], 0, $order]);
      setData($con, $sql, [$title, $body, 0, $result[0]['driver_id'], 0, $order]);
      setData($con, $sql, [$title, $body, 1, 0, $result[0]['client_id'], $order]);
      $sql2 = "select * from callcenter_cities inner join staff on staff.id=callcenter_cities.callcenter_id where city_id=?";
      $re = getData($con, $sql2, [$result[0]["to_city"]]);
      foreach ($re as $callcenter) {
        setData($con, $sql, [$title, $body, 0, $callcenter['callcenter_id'], 0, $order]);
        $token[] =  $callcenter['token'];
        $ids[] = $callcenter['callcenter_id'];
      }
    }
  }
  $apikey = 'AAAAZoLfb4s:APA91bGtOQoFZEooXhO-dYIfpdACeUzM1gSBya7GVcIl99aXlpZBW0yhGWjEtkzgDqT3wvCJq_2LzmCCH3vnIOXBOkffngljEBjNjrD-kK9bc1z7R_uQMMnS9CAFrRnFLd54BVPovsNA';
  $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
  $notification = [
    'title' => $title,
    'body' =>
    $body . ".",
    'subtitle' => $body . ".",
    'icon' => $icon,
    '_displayInForeground' => true,
    'sound' => 'default',
    'click_action' => $link,
    "priority" => "high"
  ];
  $extraNotificationData = ["link" => $link, "moredata" => $data];

  $fcmNotification = [
    'registration_ids' => $token, //multple token array
    //'to'        => $token, //single token
    'notification' => $notification,
    "priority" => "high"
  ];

  $headers = [
    'Authorization: key=' . $apikey,
    'Content-Type: application/json'
  ];

  try {
    $notification = [
      'body'   =>
      $body . ".",
      'title'  => $title,
      'subtitle' => $body . ".",
      "sound" => 'default',
      "priority" => "high",
      '_displayInForeground' => true,
      'data' => ["id" => $order, "moredata" => '']
    ];

    // Subscribe the recipient to the server
    $i = 0;
    foreach ($token as $v) {
      if (substr($v, 0, 17) == 'ExponentPushToken') {
        //$channelName = 'alnahr_users_'.$ids[$i];
        $notification['to'] = $v;
        // You can quickly bootup an expo instance
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://exp.host/--/api/v2/push/send",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($notification),
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Accept-Encoding: gzip, deflate",
            "Content-Type: application/json",
            "cache-control: no-cache",
            "host: exp.host"
          ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
      }
      $i++;
    }
    // Notify an interest with a notification
  } catch (ExpoException $e) {
    $r = [$e, 'error'];
  }
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $fcmUrl);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
  $result = curl_exec($ch);
  curl_close($ch);

  $f = ["FCMResult" => $result, "expoSuccess" => $response, "expoError" => $err, "expoExcep" => $r, $token];
  return $f;
}
