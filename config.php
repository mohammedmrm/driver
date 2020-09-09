<?php
$config = [
   "Company_name"=>"شركه الزعيم",
   "Company_phone"=>"0782222222",
   "wellcome_message"=>"",
   "Company_email"=>"nahar@nahar.com",
   "Company_address"=>"بغداد - حي الجامعه",
   "Company_logo"=>"img/logos/logo.png",
   "theme-config"=> 'data-header="light" data-footer="dark" data-header_align="app" data-menu_type="center" data-menu="light" data-menu_icons="on" data-footer_type="left" data-site_mode="light" data-footer_menu="show" data-footer_menu_style="dark"',
   "dev_b"=>5000,               //??? ??????? ?????
   "dev_o"=>10000                //??? ??????? ????? ?????????
];
require_once("php/dbconnection.php");
$sql = "select * from setting";
$setting = getData($con,$sql);
foreach($setting as $val){
  $config[$val['control']] =  $val['value'];
}
?>
