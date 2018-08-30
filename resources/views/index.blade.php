<!doctype html>
<html lang="en">

<!-- Mirrored from demos.creative-tim.com/bs3/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Jul 2018 04:43:51 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>

	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="/assets/img/icon/hacker-mask.png" />
	<link rel="icon" type="image/png" href="/assets/img/icon/hacker-mask.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>TRASI</title>

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
    <meta itemprop="image" content="/assets/s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg">

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
	<style type="text/css">
		/*.modal-body{
		    max-height: calc(100vh - 200px);
		    overflow-y: auto;
		}*/
		/* width */
		/*::-webkit-scrollbar {
		    width: 10px;
		}*/

		/* Track */
		/*::-webkit-scrollbar-track {
		    background: #f1f1f1; 
		}*/

		/* Handle */
		/*::-webkit-scrollbar-thumb {
		    background: #888; 
		}*/

		/* Handle on hover */
		/*::-webkit-scrollbar-thumb:hover {
		    background: #555; 
		}*/
	</style>
	
	<!--     Fonts and icons     -->
	<link href="/assets/css/font-awesome.min.css" rel="stylesheet">
	<!-- <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" /> -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
	integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
	crossorigin=""/>

	<script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script>
	<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
	integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
	crossorigin=""></script>
	<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
	<!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" /> -->
	<style>
	  #map {
	      position: absolute;
	      top: 0;
	      left: 0;
	      bottom: 0;
	      right: 0;
	  }
	</style>

  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('0ed9d481e4c6b4057ba0', {
      cluster: 'ap1',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channelt');
    channel.bind('my-eventt', function(data) {
      // alert(JSON.stringify(data));
      	var audio = new Audio('alert.mp3');
		audio.play();

		swal({
		  title: 'Alert!!',
		  text: data.message,
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, show it on map!'
		}).then((result) => {
			window.open(
			  'https://maps.google.fr/maps?daddr=' + data.latitude + ',' + data.longitude,
			  '_blank' // <- This is what makes it open in a new window.
			);
		});
      // alert(data.message);
      console.log('debug ', data);
    });

    channel.bind('my-eventt2', function(data) {
      // alert(JSON.stringify(data));
      	var audio = new Audio('alert.mp3');
		audio.play();

		swal({
		  title: 'Alert!',
		  text: data.message,
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Ok!'
		}).then((result) => {
			window.open(
			  'https://trasi-polindra.herokuapp.com/complaint'
			);
		});
      // alert(data.message);
      console.log('debug ', data);
    });

  </script>

<!-- Google Tag Manager -->
<!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'/assets/www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NKDMSK6');</script> -->
<!-- End Google Tag Manager -->

</head>


<body >
  <!-- Google Tag Manager (noscript) -->
  <!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
  <!-- End Google Tag Manager (noscript) -->

	<div class="wrapper">

	    <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="/assets/img/sidebar-1.jpg">
	    <!--
	        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
	        Tip 2: you can also add an image using data-image tag
	        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
	    -->

		    <div class="logo">
		        <a href="javascript:void(0)" class="simple-text logo-mini">
		             T 
		        </a>

		        <a href="javascript:void(0)" class="simple-text logo-normal">
		             TRASI 
		        </a>
		    </div>

			@include('template.sidebar')
		</div>


	    <div class="main-panel">

			<nav class="navbar navbar-transparent navbar-absolute">
				@include('template.navbar')
			</nav>


			

				<div class="content">
					@yield('content')
				</div>

			 

			
			<footer class="footer">
			    <div class="container-fluid">
			        <nav class="pull-left">
			           <!--  <ul>
			                <li>
			                    <a href="#">
			                         Home 
			                    </a>
			                </li>
			                <li>
			                    <a href="#">
			                         Company 
			                    </a>
			                </li>
			                <li>
			                    <a href="#">
			                          Portofolio 
			                    </a>
			                </li>
			                <li>
			                    <a href="#">
			                        Blog 
			                    </a>
			                </li>
			            </ul> -->
			        </nav>
			        <p class="copyright pull-right">
			            &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com/"> Creative Tim </a>,  made with love for a better web 
			        </p>
			    </div>
			</footer>

			
		</div>
	</div>
	<div class="fixed-plugin">
		@include('template.setting-theme')
	</div>

</body>
  
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

<script src="/assets/js/bootstrap-datetimepicker.js"></script>

<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="/assets/js/nouislider.min.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1_8C5Xz9RpEeJSaJ3E_DeBv8i7j_p6Aw"></script>
<!-- AIzaSyD1_8C5Xz9RpEeJSaJ3E_DeBv8i7j_p6Aw -->
<!-- AIzaSyDSZ7wnNFe2AHyzv_9xtgAwBw0tlFUAX7U asca -->
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

<!--  LEAFLET REATIME   -->
<script src="/assets/js/leaflet-realtime.js"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script type="text/javascript">
	var session = JSON.parse(localStorage.getItem('session'));
</script>
<script src="/assets/js/demo.js"></script>

<!-- modules js -->
<script src="/modules/{{$modules}}.js"></script>

<script>
	var session = JSON.parse(localStorage.getItem('session'));
	String.prototype.capitalize = function() {
	    return this.charAt(0).toUpperCase() + this.slice(1);
	}

	var base_url = window.location.origin;
    if (localStorage.length == 0) {
        localStorage.clear();
        window.location.replace(base_url+'/');
    }else{
        // window.location.replace(base_url+'/dashboard');
    }
	var isPathName = window.location.pathname;
	var activeLink = isPathName.replace("/","");
	var activeClass = '.'+isPathName.replace("/","");
	if (isPathName) {
		$(activeClass).addClass('active');
		$('.navbar-brand').text(activeLink.capitalize());
	}
// Facebook Pixel Code Don't Delete
// !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
// n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
// n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
// t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
// document,'script','/assets/connect.facebook.net/en_US/fbevents.js');

// try{
//   fbq('init', '111649226022273');
//   fbq('track', "PageView");

// }catch(err) {
//   console.log('Facebook Track Error:', err);
// }

</script>
<!-- <noscript>
  <img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1"
  />
</noscript> -->





<script type="text/javascript">
	var session;
    $(document).ready(function(){

		// Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

		demo.initVectorMap();
		demo.initFormExtendedDatetimepickers();

		// session = JSON.parse(localStorage.session);
		$(".userName").text(session.data.username +" "+ session.data.longname);

    });

    function logout(){
    	localStorage.clear();
		self.location = base_url+'/';
    }
</script>


<!-- Mirrored from demos.creative-tim.com/bs3/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Jul 2018 04:44:33 GMT -->
</html>
