<!doctype html>
<html lang="en">

<!-- Mirrored from demos.creative-tim.com/bs3/material-dashboard-pro/examples/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Jul 2018 04:44:36 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    





        <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/icon/hacker-mask.png" />
    <link rel="icon" type="image/png" href="/assets/img/icon/hacker-mask.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>TRASI | Forget Password</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Canonical SEO -->
    <link rel="canonical" href="http://www.creative-tim.com/product/material-dashboard-pro"/>

    <!--  Social tags      -->
    <meta name="keywords" content="material dashboard, bootstrap material admin, bootstrap material dashboard, material design admin, material design, creative tim, html dashboard, html css dashboard, web dashboard, freebie, free bootstrap dashboard, css3 dashboard, bootstrap admin, bootstrap dashboard, frontend, responsive bootstrap dashboard, premiu material design admin">

    <meta name="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
    <meta itemprop="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <meta itemprop="image" conte"s3.assets/amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
    <meta name="twitter:description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="/assets/s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg">

    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://www.creative-tim.com/product/material-dashboard-pro" />
    <meta property="og:image" content="/assets/s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg"/>
    <meta property="og:description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design." />
    <meta property="og:site_name" content="Creative Tim" />

    <!-- Bootstrap core CSS     -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    


    <!--  Material Dashboard CSS    -->
    <link href="/assets/css/material-dashboard98f3.css?v=1.3.0" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="/assets/css/demo.css" rel="stylesheet" />

    
    <!--     Fonts and icons     -->
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

    <!-- Google Tag Manager -->
    <!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '../../../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NKDMSK6');</script> -->
    <!-- End Google Tag Manager -->
</head>

<body class="off-canvas-sidebar">
  <!-- Google Tag Manager (noscript) -->
  <!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
  <!-- End Google Tag Manager (noscript) -->
    <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="javascript:void(0)">TRASI | POLINDRA</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class= "">
                    <a href="/register">
                        <i class="material-icons">person_add</i>
                        Register
                    </a>
                </li>
                <li class= "  ">
                    <a href="/login">
                        <i class="material-icons">fingerprint</i>
                        Login
                    </a>
                </li>
                <li class= "active">
                    <a href="/forget_password">
                        <i class="material-icons">lock_open</i>
                        Forget Password
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


    <div class="wrapper wrapper-full-page">
            <div class="full-page login-page" filter-color="black" data-image="/assets/img/login.jpg">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form method="post" id="resetPassForm2" action="javascript:void(0)">
                            <div class="card card-login card-hidden">
                                <div class="card-header text-center" data-background-color="rose">
                                    <h4 class="card-title">TRASI | Form Forget Password</h4>
                                    <div class="social-line">
                                         <a href="javascript:void(0)" class="btn btn-just-icon btn-simple">
                                            <i class="fa fa-lock"></i>
                                        </a>
                                        <!--<a href="#pablo" class="btn btn-just-icon btn-simple">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#eugen" class="btn btn-just-icon btn-simple">
                                            <i class="fa fa-google-plus"></i>
                                        </a> -->
                                    </div>
                                </div>
                                <p class="category text-center">
                                    Just enter new password
                                </p>
                                <div class="card-content">
                                    <!-- <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">face</i>
                                        </span>

                                        <div class="form-group label-floating">
                                            <label class="control-label">First Name</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div> -->
                                    <input type="hidden" name="via" id="via" value="Website">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">lock</i>
                                        </span>

                                        <div class="form-group label-floating">
                                            <label class="control-label">Password</label>
                                            <input type="password" name="password" id="password" class="form-control" />
                                            <input type="hidden" name="user_id" value="{{ $_GET['id'] }}">
                                            <input type="hidden" name="via" id="via" class="form-control" value="web">
                                            <span class="help-box-password"></span>
                                        </div>
                                    </div>

                                    <div class="input-group">
                                        <div class="checkbox form-horizontal-checkbox">
                                            <label>
                                                <input type="checkbox" name="optionsCheckboxes" onclick="myFunction()">
                                                <b>Show Password</b>
                                            </label>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="footer text-center">
                                    <button type="submit" onclick="resetPassword()" class="btn btn-rose btn-simple btn-wd btn-lg">Reset Password</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com/"> TRASI Polindra </a>,  made with love for a better web app
                </p>
            </div>
        </footer>

    </div>

    </div>
</body>



</body>
<!-- js -->
    <!--   Core JS Files   -->
    <script src="/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/js/material.min.js" type="text/javascript"></script>
    <script src="/assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>

    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="/assets/cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

    <!-- Library for adding dinamically elements -->
    <script src="/assets/js/arrive.min.js" type="text/javascript"></script>

    <!-- Forms Validations Plugin -->
    <script src="/assets/js/jquery.validate.min.js"></script>

    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    <script src="/assets/js/moment.min.js"></script>

    <!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
    <script src="/assets/js/chartist.min.js"></script>

    <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="/assets/js/jquery.bootstrap-wizard.js"></script>

    <!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
    <script src="/assets/js/bootstrap-notify.js"></script>

    <!--   Sharrre Library    -->
    <script src="/assets/js/jquery.sharrre.js"></script>

    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="/assets/js/bootstrap-datetimepicker.js"></script>

    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="/assets/js/jquery-jvectormap.js"></script>

    <!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
    <script src="/assets/js/nouislider.min.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1_8C5Xz9RpEeJSaJ3E_DeBv8i7j_p6Aw"></script>

    <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="/assets/js/jquery.select-bootstrap.js"></script>

    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
    <script src="/assets/js/jquery.datatables.js"></script>

    <!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
    <script src="/assets/js/sweetalert2.js"></script>

    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="/assets/js/jasny-bootstrap.min.js"></script>

    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="/assets/js/fullcalendar.min.js"></script>

    <!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="/assets/js/jquery.tagsinput.js"></script>

    <!-- Material Dashboard javascript methods -->
    <script src="/assets/js/material-dashboard98f3.js?v=1.3.0"></script>

    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="/assets/js/demo.js"></script>

<!-- end js -->

    <script type="text/javascript">
        var base_url = window.location.origin;
        if (localStorage.length == 0) {
            localStorage.clear();
            // self.location = base_url+'/';
        }else{
            self.location = base_url+'/dashboard';
        }

        $().ready(function(){
            demo.checkFullPageBackgroundImage()

            setTimeout(function(){
                // after 1000 ms we add the class animated to the resetPassword/register card
                $('.card').removeClass('card-hidden')
            }, 700)
        })

    function resetPassword() {

        $.ajax({
            url : base_url+'/email/forget_password',
            type: 'POST',
            data: $('#resetPassForm2').serialize(),
            dataType: 'JSON',
            success: function(data)
            {
                console.log(data);
                if(data.status == true){
                    alert('Success Sent Reset Email Password');
                    self.location = base_url;
                }else{
                    alert('Failed Sent Reset Email Password');
                    self.location = base_url;
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                console.log(jqXHR.responseJSON.email);
                var email = jqXHR.responseJSON.email=="undefined"?jqXHR.responseJSON.email[0]:" ";
                // $(".help-box-email").html("<small>"+email+"</small>").css('color','red');
                console.log(jqXHR.responseJSON);
            }
        });
    }

    </script>
<script>
function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>

</html>
