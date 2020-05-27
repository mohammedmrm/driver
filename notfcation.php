<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=2, viewport-fit=cover" />
<meta name="description" content="notification for driver">
<title>شركة النهر للحلول البرمجية</title>
<link href="https://fonts.googleapis.com/css?family=Cairo:300,300i,400,400i,500,500i,700,700i,900,900i|Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" type="text/css" href="styles/framework.css">
<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
<link rel="manifest" href="pwa/site.webmanifest">


</head>

<body class="theme-light" data-background="none" data-highlight="red2">
<style type="text/css">
.bg-div1 {
 background-color: #CC0011;
}
.bg-div2 {
 background-color: #CC1122;
}
.bg-div3 {
 background-color: #CC2233;
}
.bg-div4 {
 background-color: #CC3344;
}
.bg-div5 {
 background-color: #CC4455;
}
.unseen{
  background-color: #F8F8FF;
}
.active-nav label {
    color: #FFFFFF!important;
}
</style>
<script type="text/javascript" src="scripts/jquery.js"></script>
<div id="page">

   <?php include_once("pre.php");  ?>
   <?php include_once("top-menu.php");  ?>
   <?php include_once("bottom-menu.php");  ?>


    <div class="page-content header-clear-medium">
        <div data-height="100" class="caption shadow-large caption-margins top-30 round-medium shadow-huge">
            <div class="caption-top top-10">
                <h2 class="center-text color-white bolder fa-4x" id="noti-count"></h2>
            </div>
            <div class="caption-overlay bg-black opacity-80"></div>
            <div class="caption-bg bg-14"></div>
        </div>
        <div id="noti_menu">

        </div>


</div>

</div>
<script type="text/javascript" src="scripts/plugins.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
<script type="text/javascript" src="sw_reg.js"></script>

<script>

function getNotification(){
    $.ajax({
    url:"php/_getNotification.php",
    beforeSend:function(){
    },
    success:function(res){
      console.log(res);
      if(res.success == 1){
        $("#noti-count").text(res.unseen + ' اشعار جديد');
        $.each(res.data,function(){
          if(this.driver_seen == 0){
            bg = 'unseen';
          }else{
            bg = "";
          }
         $("#noti_menu").append(
            '<div class="content-boxed content-boxed-full">'+
                '<a data-height="100" class="default-link default-link caption bottom-0" style="height: 100px;" href="orderDetails.php?o='+this.order_id+'&notification='+this.id+'" title="">'+
                    '<div class="caption-bottom right-20 bottom-5 text-right">'+
                        '<h3 class="bolder font-16">'+this.title+'</h3>'+
                        '<p class="under-heading font-14 opacity-90 bottom-0">'+
                               this.body+
                        '</p>'+
                        '<span class="font-14 opacity-90 bottom-0">'+this.date+'</span>'+
                    '</div>'+
                    '<div class="caption-overlay '+bg+' opacity-70"></div>'+
                    '<div class="caption-bg bg-25"></div>'+
                '</a>'+
            '</div>'
         );
        });
      }
    },
    error:function(e){
      console.log(e,'it for noti');
    }
  });
}
getNotification();

</script>
</body>
</html>
