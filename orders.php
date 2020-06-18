<?php
require_once("config.php");
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=2, viewport-fit=cover" />
    <meta name="description" content="في هذه الصفحة الرئيسية <?php echo $config['Company_name'];?> تستطيع ان تتعرف على الطلبيات الخاصة بك الواصة والراجعة والكثير من المعلومات">
    <meta name="<?php echo $config['Company_name'];?>" property="og:title" content="معلومات متكاملة للعميل في هذه الصفحة خاصة بعملاء  <?php echo $config['Company_name'];?>">

    <title><?php echo $config['Company_name'];?></title>
<link href="https://fonts.googleapis.com/css?family=Cairo:300,300i,400,400i,500,500i,700,700i,900,900i|Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" type="text/css" href="styles/framework.css">
<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
<link rel="stylesheet" type="text/css" href="styles/datapicker.css">
<link rel="manifest" href="pwa/site.webmanifest">

<!-- load header -->
<style type="text/css">
 #search{
   width: 30%;
   min-width:10px;
   margin-left: 0%;
   margin-right: 0%;
 }
 #start {
  width: 30%;
  margin-left: 1.3333%;
  margin-right: 0%;
  min-width:10px;
  border-bottom: #777777 solid 1px;
 }
 #end{
   width: 30%;
   margin-left:1.3333%;
   margin-right: 0%;
   min-width:10px;
   border-bottom: #777777 solid 1px;
 }
 #qrlink button{
   width:100%;
   background-color: #00008B;
   color:#F8F8FF;
 }
 a:hover {
   text-underline: none;
 }
 .call {
   border-left: 2px  #CC0000;
   background-color: #FFFFFF;
   border-radius: 100px;
 }

</style>
<script type="text/javascript" src="scripts/jquery.js"></script>
</head>

<body class="theme-light" data-background="none" data-highlight="red2">

<div id="page">

    <!-- load main header and footer -->
   <?php include_once("pre.php");  ?>
   <?php include_once("top-menu.php");  ?>
   <?php include_once("bottom-menu.php");  ?>


    <div class="page-content header-clear-medium">

         <div class="content">
         <form id="searchForm">
            <div class="search-box search-color bg-dark1-dark shadow-tiny round-tiny bottom-10">
                <i class="fa fa-search"></i>
                <input type="text" aria-label="بحث" name="search-text" placeholder="رقم الوصل، رقم او اسم الزبون">
            </div>
            <input type="text" aria-label="تاريخ من"  name="start" id="start" class="datepicker" placeholder="من">
            <input type="text" aria-label="تاريخ الى" name="end" id="end" class="datepicker"  placeholder="الى">
            <button id="search" onclick="getorders('reload')" aria-label="search" class="btn btn-danger shadow-huge" type="button" value="">
                 بحث
            </button>
            <div class="top-5 bottom-5">
              <a href="#" data-menu="sacnModal" id="qrlink">
                <button id="searchbyQR" onclick="scanQR()" aria-label="search" class="btn" type="button" value="">
                     بحث من خلال QR
                </button>
              </a>
            </div>
            <input type="hidden" name="currentPage" id="currentPage" value="1">
         </form>
        </div>


        <div class="content-boxed">
            <div class="content bottom-0">
                <h3 class="bolder text-right">الطلبيات</h3>
            </div>

            <script type="text/javascript" src="scripts/instascan.min.js"></script>


            <script type="text/javascript">
            var selectedCam;
            var scanner;
            function scanQR(){
              scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
              scanner.addListener('scan', function (content) {
                window.location.href = "orderDetails.php?o="+content
                console.log(content);
              });
              Instascan.Camera.getCameras().then(function (cameras) {
                if (cameras.length > 0) {
                    selectedCam = cameras[0];
                    $.each(cameras, (i, c) => {
                      if (c.name.indexOf('back') != -1) {
                          selectedCam = c;
                          return false;
                      }
                    });

                    scanner.start(selectedCam);
                } else {
                    console.error('No cameras found.');
                }

                console.log(cameras);
              }).catch(function (e) {
                console.error(e);
              });
              }
            </script>
            <div id="orders"></div>

         </div>

         <!-- load footer -->
         <div id="footer-loader"></div>
    </div>
    <div id="sacnModal"
     class="menu  menu-box-bottom menu-box-detached round-medium"
     data-menu-height="500"
     data-menu-effect="menu-over">
     <div class="content">
            <h2 class="uppercase ultrabold text-center top-20">QR code Scaner</h2>
            <p class="font-11 under-heading text-center bottom-20">ضع QR code مقابل الكامره</p>
            <p class="font-16 under-heading text-center bottom-20 text-danger" id="err_msg"></p>
            <video id="preview" style="width: 100%;height: 300px;"></video>
            <button onclick="close_qr()" class="button bg-brown1-dark button-full button-l shadow-large button-round-small bg-highlight top-20">اغلاق</button>
     </div>
    </div>
</div>


<script type="text/javascript" src="scripts/plugins.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
<script type="text/javascript" src="sw_reg.js"></script>

<script>
function close_qr(){
 $("#sacnModal").removeClass('menu-active');
 scanner.stop(selectedCam);
}
function getorders(action){
if(action == "reload"){
    $("#currentPage").val(1);
}


$.ajax({
  url:"php/_getOrders.php",
  type:"POST",
  data:$("#searchForm").serialize(),
  success:function(res){
    if(action == "reload"){
     $("#orders").html('');
    }
   $("#loader").remove();
   $("#loading-items").remove();
   $("#currentPage").val(res.nextPage);

   console.log(res);
   $.each(res.data,function(){
     if(this.order_status_id == 9){
       color = 'bg-red1-dark';
     }if(this.order_status_id == 6){
       color = 'bg-brown1-dark';
     }else if(this.order_status_id == 4){
        color = 'bg-green1-dark';
     }else if(this.order_status_id == 13){
        color = 'bg-yellow1-dark';
     }else if(this.order_status_id ==7){
        color = 'bg-orange-light';
     }else if(this.order_status_id ==1){
        color = 'bg-dark1-dark';
     }else{
       color = 'bg-magenta1-light';
     }
     $("#orders").append(
         '<div class="content-boxed '+color+'">'+
            '<div class="content  list-columns-right">'+
                '<div>'+
                    '<a style="z-index:100;" class="call" href="tel:'+this.customer_phone+'"><i class="fa fa-phone color-green1-light call fa-2x"></i></a>'+
                    '<a href="orderDetails.php?o='+this.id+'">'+
                      '<h1 class="bolder text-center text-white">'+this.order_no+'</h1>'+
                      '<p class=" text-center text-white">'+this.customer_phone+'<br />'+
                      ''+this.city+' | '+this.town+' | '+this.address+'</p>'+
                    '</a>'+
                '</div>'+
            '</div>'+
        '</div>'
       );
     });
     if(res.pages > res.nextPage){
      $("#orders").append('<div id="loader" onclick="getorders(\'append\')" class="btn btn-link form-control aria-label="orders" center-text top-10">تحميل المزيد</div>');
      $("#orders").append('<div id="loading-items"></div>');
     }
    },
   error:function(e){
    console.log(e);
  }
});
}
$(document).ready(function(){
$('#start').datepicker({ format: 'yyyy-mm-dd'});
$('#end').datepicker({ format: 'yyyy-mm-dd'});
getorders('reload');
});
</script>
<script type="text/javascript" src="scripts/custom.js"></script>
<script type="text/javascript" src="scripts/datapicker.js"></script>

</body>
</html>
