<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=2, viewport-fit=cover" />
    <meta http-equiv="Cache-Control: max-age=31557600" content="public">
    <meta name="description" content="تطبيق المندوب يساعد المندوب على تحديث الطلبيات">
    <title>شركة النهر للحلول البرمجية</title>
    <link href="https://fonts.googleapis.com/css?family=Cairo:300,300i,400,400i,500,500i,700,700i,900,900i|Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/framework.css">
    <!--<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">-->
    <link rel="manifest" href="pwa/site.webmanifest">

    <!-- load header -->
</head>

<body class="theme-light" data-background="none" data-highlight="blue2">

    <div id="page">

        <!-- load main header and footer -->
        <div id="page-preloader">
            <div class="loader-main">
                <div class="preload-spinner border-highlight"></div>
            </div>
        </div>

        <div class="header header-fixed header-logo-center">
            <a href="index.php" class="header-title"> شركة النهر</a>
        </div>



        <div class="page-content header-clear-medium">
            <div class="content-boxed left-40 right-40">
                <div class="content top-10 bottom-30">
                    <h1 class="center-text bottom-30 ultrabold fa-1x">تسجيل الدخول</h1>
                    <label id="msg" class="text-danger text-right"></label>
                    <div class="input-style has-icon input-style-1 input-required bottom-30">
                        <input type="name" aria-label="username" style="padding-right: 10px;" id="username" placeholder="رقم الهاتف">

                    </div>
                    <div class="input-style has-icon input-style-1 input-required">
                        <input type="password" aria-label="password" style="padding-right: 10px;" id="password" placeholder="كلمة المرور">
                    </div>

                    <div class="clear"></div>
                    <button onclick="login()" class="button button-full button-xl shadow-huge button-round-small bg-linkedin top-30 bottom-10" style="width: 100%;">تسجيل الدخول</button>
                    <div class="clear">
                        <a href="#" class="text-center font-12 color-theme ">نسيت كلمة المرور؟ اتصل بشركة مباشرتا</a>
                    </div>
                    <div class="clear"></div>


                </div>
            </div>
            <!-- load footer -->
            <div id="footer-loader"></div>
        </div>
        <script>
            function login() {
                $.ajax({
                    url: "php/_login.php",
                    type: "POST",
                    data: {
                        username: $("#username").val(),
                        password: $("#password").val()
                    },
                    beforeSend: function() {

                    },
                    success: function(res) {
                        console.log(res);
                        if (res.msg == 1) {
                            window.location.href = "index.php";
                        } else {
                            $("#msg").text(res.msg);
                        }
                    },
                    error: function(e) {
                        console.log(e.responseText);
                    }
                });
            }
        </script>
   
    </div>

    <script type="text/javascript" src="scripts/jquery.js"></script>
    <script type="text/javascript" src="scripts/plugins.js"></script>
    <script type="text/javascript" src="scripts/custom.js"></script>

    <script type="text/javascript" src="sw_reg.js"></script>
</body>

</html>