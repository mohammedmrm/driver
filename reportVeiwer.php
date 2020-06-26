<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>اضافة طلب</title>
<link href="https://fonts.googleapis.com/css?family=Cairo:300,300i,400,400i,500,500i,700,700i,900,900i|Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" type="text/css" href="styles/framework.css">
<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">


</head>

<body class="theme-light" data-background="none" data-highlight="red2">
<style type="text/css">

</style>
<div id="page">

     <?php include_once("pre.php");?>
     <?php include_once("top-menu.php");?>
     <?php include_once("bottom-menu.php");?>
     <div class="page-content header-clear-medium">
     <div data-height="50" class="caption shadow-large caption-margins top-10 round-medium shadow-huge">
      <h1 class="text-center">الكشف</h1>

     </div>
     <div id="content-box"
       style="padding-bottom:56.25%; position:relative; display:block; width: 95%; margin:auto;min-height: 500px;">
       <iframe id="ViostreamIframe"
        width="100%" height="100%"
         src="php/downloadOrdersReport.php?<?php echo  http_build_query($_REQUEST);?>#zoom=FitW"
        frameborder="0" allowfullscreen=""
        style="position:absolute; top:0; left: 0"></iframe>
      </div>
    </div>
</div>
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/plugins.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>

</body>
</html>
