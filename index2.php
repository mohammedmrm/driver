<?php
    if(!isset($_SESSION)){
        session_start();
    }
    $access_roles = [1];
    if(! in_array($_SESSION['login'],$access_roles)){
        header("location: login.php");
        die();
    }
    require_once("config.php");
    ?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=2, viewport-fit=cover" />
    <meta name="description" content="تطبيق يساعد المندوب في توصيل طلبياته">
    <title>تطبيق المندوب</title>
    <link href="https://fonts.googleapis.com/css?family=Cairo:300,300i,400,400i,500,500i,700,700i,900,900i|Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/framework.css">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
    <link rel="manifest" href="pwa/site.webmanifest">

</head>
<!--#4285F4;-->
<body class="theme-light" data-background="none" data-highlight="blue2">
    <style type="text/css">
        .bg-div1 {
            background-color: #006BE0;
        }

        .bg-div2 {
            background-color: #F26157;
        }

        .bg-div3 {
            background-color: #10e7dc;
        }

        .bg-home {
            background-color: black;
        }

        .bg-div5 {
            background-color: #90ccf4;
        }

        .bg-div8 {
            background-color: #9ACD32;
        }

        .bg-div9 {
            background-color: #FF6347;
        }

        .bg-div10 {
            background-color: #FFD700;
        }
    </style>
    <div id="page" style="dir:rtl">

        <div id="page-preloader">
            <div class="loader-main">
                <div class="preload-spinner border-highlight"></div>
            </div>
        </div>

        <div class="header header-fixed header-logo-center">
            <a href="index.php" class="header-title"> شركة النهر</a>
            <a href="logout.php" data-toggle-theme-switch class="header-icon header-icon-4">خروج</a>
        </div>

        <div id="footer-menu" class="footer-menu-3-icons footer-menu-style-2">
            <a href="index.php" class="active-nav"><i class="fa fa-home"></i><span class="color-black" >الرئسية</span></a>
            <a href="notfcation.php"><i class="fa fa-bell"></i><span class="color-black">الاشعارات</span></a>
            <a href="profile.php"><i class="fa fa-user"></i><span class="color-black">الصفحة الشخصية</span></a>
            <div class="clear"></div>
        </div>

        <div class="page-content header-clear-medium">
            <div class="content-boxed">
                <div class="one-half">
                    <a href="#" class="color-black footer-title bottom-5"><span class=" text-center">طلبيات اليوم<font class=" text-center font-30 bold color-black" color="red">34</font></span></a>
                </div>
                <div class="one-half last-column">
                    <a href="#" class="footer-title bottom-5 color-black"><span class=" text-center"> قيد الانتظار<font class=" text-center font-30 bold" color="black">34</font></span></a>

                </div>
                <div class="clear"></div>
                <div class="one-third">
                    <a href="#">
                        <div data-height="80" class="bg-div9 caption  shadow-tiny bottom-20 ">
                            <div class="caption-center center-text">
                                <h1 class="center-text color-black bold font-30">11 </h1>
                            </div>
                            <div class="caption-bottom">
                                <p class="center-text color-black ">رواجع </p>
                            </div>
                            <div class="caption-overlay "></div>

                        </div>
                    </a>
                </div>

                <div class="one-third ">
                    <a href="#">
                        <div data-height="80" class="bg-div10 shadow-tiny caption  bottom-20 ">
                            <div class="caption-center">
                                <h1 class="center-text color-black bolder font-30">12 </h1>
                            </div>
                            <div class="caption-bottom">
                                <p class="center-text color-black ">مؤجلات</p>
                            </div>
                            <div class="caption-overlay "></div>
                        </div>
                    </a>
                </div>

                <div class="one-third last-column">
                    <a href="#">
                        <div data-height="80" class="bg-div8 caption  shadow-tiny  bottom-20 ">
                            <div class="caption-center">
                                <h1 class="center-text color-black bolder font-30">15 </h1>
                            </div>
                            <div class="caption-bottom">
                                <p class="center-text color-black ">الواصل</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="clear">

                    <!--       End of this section       -->

                    <a href="#" aria-label="more details" class="footer-title bottom-15 color-black "><span class=" text-center ">لمزيد من التفاصيل. أختر</span></a>

                    <a href="orders.php">
                        <div data-instant-id="instant-1" data-height="120" class="bg-div1 caption caption-margins round-medium shadow-huge bottom-10">
                            <div class="caption-center">
                                <h1 class="center-text color-white bolder font-18"><i class="fas fa-list-alt fa-1x color-white top-0 bottom-0   "></i> الطلبيات</h1>
                                <p class="center-text color-white under-heading">البحث و عرض الطلبيات</p>
                            </div>
                            <div class="caption-bottom">
                                <p class="center-text color-white ">انقر للعرض</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="one-half">
                    <a href="returned.php">
                        <div data-instant-id="instant-2" data-height="120" class="bg-div1 caption caption-margins round-medium shadow-huge bottom-10">
                            <div class="caption-center">
                                <h1 class="center-text color-white bolder font-18"><i class="fas fa-times-circle  fa-1x color-white top-0 bottom-0   "></i> الرواجع</h1>
                                <p class="center-text color-white under-heading">تقرير بجميع الرواجع</p>
                            </div>
                            <div class="caption-bottom">
                                <p class="center-text color-white ">انقر للعرض</p>
                                <p class="center-text color-white "></p>
                            </div>

                            <div class="caption-overlay "></div>
                        </div>
                    </a>
                </div>

                <div class="one-half last-column">
                    <a href="posponded.php">
                        <div data-instant-id="instant-3" data-height="120" class="bg-div1 caption caption-margins round-medium shadow-huge bottom-10">
                            <div class="caption-center">
                                <h1 class="center-text color-white bolder font-18"><i class="fas fa-pause-circle fa-1x color-white top-0 bottom-0   "></i> المؤجلات</h1>
                                <p class="center-text color-white under-heading">تقرير بجميع المؤجلات</p>

                            </div>
                            <div class="caption-bottom">
                                <p class="center-text color-white ">انقر للعرض</p>
                                <p class="center-text color-white "></p>
                            </div>
                            <div class="caption-overlay "></div>
                        </div>
                    </a>
                </div>


                <div class="clear">
                    <a href="earnings.php">
                        <div data-instant-id="instant-4" data-height="120" class="bg-div1 caption caption-margins round-medium shadow-huge bottom-10">
                            <div class="caption-center">
                                <h1 class="center-text color-white bolder font-18"><i class="fas fa-coins  fa-1x color-white top-0 bottom-0   "></i> الارباح</h1>
                                <p class="center-text color-white under-heading">تقرير بالارباح ضمن فترات زمنية محددة</p>

                            </div>
                            <div class="caption-bottom">
                                <p class="center-text color-white ">انقر للعرض</p>
                                <p class="center-text color-white "></p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="clear last-column">
                    <a href="charts.php">
                        <div data-instant-id="instant-5" data-height="120" class="bg-div1 caption caption-margins round-medium shadow-huge bottom-10">
                            <div class="caption-center">
                                <h1 class="center-text color-white bolder font-18"><i class="fas fa-chart-pie  fa-1x color-white top-0 bottom-0   "></i> احصائيات</h1>
                                <p class="center-text color-white under-heading">تقرير احصائي بالطلبيات المؤجلة والراجعة والمستلمة</p>

                            </div>
                            <div class="caption-bottom">
                                <p class="center-text color-white ">انقر للعرض</p>
                                <p class="center-text color-white "></p>
                            </div>
                            <div class="caption-overlay  "></div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>



    <script type="text/javascript" src="scripts/jquery.js"></script>
    <script type="text/javascript" src="scripts/plugins.js"></script>
    <script type="text/javascript" src="scripts/custom.js"></script>
    <script type="text/javascript" src="sw_reg.js"></script>

</body>

</html>