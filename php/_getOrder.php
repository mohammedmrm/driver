<?php
session_start();
header('Content-Type: application/json');
require("_access.php");
access();
require("dbconnection.php");
require("../config.php");
$id = $_REQUEST['id'];
try{
  $query = "select orders.*,
           if(order_status_id = 9,
               0,
               if(to_city = 1,
                     if(client_dev_price.price is null,(".$config['dev_b']." - discount),(client_dev_price.price - discount)),
                     if(client_dev_price.price is null,(".$config['dev_o']." - discount),(client_dev_price.price - discount))
                )
            )as dev_price,
            new_price -
              (
                 if(order_status_id = 9,
                     0,
                     if(to_city = 1,
                           if(client_dev_price.price is null,(".$config['dev_b']." - discount),(client_dev_price.price - discount)),
                           if(client_dev_price.price is null,(".$config['dev_o']." - discount),(client_dev_price.price - discount))
                      )
                  )
               ) as client_price,
            clients.name as client_name,clients.phone as client_phone,
            cites.name as city,towns.name as town,branches.name as branch_name,
            order_status.status as order_status,
            if(staff.name is null,'غير معروف',staff.name) as driver_name,
            if(staff.phone is null,'غير معروف',staff.phone) as driver_phone
            from orders left join
            clients on clients.id = orders.client_id
            left join cites on  cites.id = orders.to_city
            left join towns on  towns.id = orders.to_town
            left join branches on  branches.id = orders.to_branch
            left join order_status on  order_status.id = orders.order_status_id
            left JOIN client_dev_price on client_dev_price.client_id = orders.client_id AND client_dev_price.city_id = orders.to_city
            left JOIN staff on staff.id = orders.driver_id
            where orders.id = ? and orders.driver_id =?";


  $data = getData($con,$query,[$id,$_SESSION['userid']]);
  $success="1";
} catch(PDOException $ex) {
   $data=["error"=>$ex];
   $success="0";
}
echo json_encode(array("success"=>$success,"data"=>$data));
?>