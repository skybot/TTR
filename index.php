<?php
  		include "./php/mysql_connect.php";
  		include	"./php/language.php";
  		include "./php/auth.php";
  		header('Cache-control: private');
?>
<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title> TAC-RECOVERY </title>
		<meta name="description" content="">
		<meta name="author" content="">
		<meta http-equiv='cache-control' content='no-cache'>
		<meta http-equiv='expires' content='0'>
		<meta http-equiv='pragma' content='no-cache'>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">


		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css">

		<!-- SmartAdmin Styles : Please note (smartadmin-production.css) was created using LESS variables -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-production.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-skins.css">

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

		<link rel="stylesheet" type="text/css" media="screen" href="css/jquery.circliful.css">

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<!-- Specifying a Webpage Icon for Web Clip
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="img/splash/touch-icon-ipad-retina.png">

		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="screen and (max-device-width: 320px)">

	</head>
	<body class="smart-style-4 fixed-header">
		<!-- POSSIBLE CLASSES: minified, fixed-ribbon, fixed-header, fixed-width
			 You can also add different skin classes such as "smart-skin-1", "smart-skin-2" etc...-->

		<!-- HEADER -->
		<header id="header">
				<div id="logo-group">

				<!-- PLACE YOUR LOGO HERE -->
				<span id="logo"> <img src="img/logo.png" alt="SmartAdmin"> </span>
				<!-- END LOGO PLACEHOLDER -->

				<!-- Note: The activity badge color changes when clicked and resets the number to 0
				Suggestion: You may want to set a flag when this happens to tick off all checked messages / notifications
				<span id="activity" class="activity-dropdown"> <i class="fa fa-user"></i> <b class="badge"> 21 </b> </span>-->
			</div>

			<!-- pulled right: nav area -->
			<div class="pull-right">

				<!-- Stop Server button -->
				<div id="server_status_button" class="btn-header pull-right" style="display: none;">
					<span> <a href="javascript:server_stop()" title="Server Status" style="background-color: #A90329; background-image: -moz-linear-gradient(top, #a90329 0%, #6d031b 100%); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#a90329), to(#6d031b)); background-image: -webkit-linear-gradient(top, #a90329, #6d031b); background-image: -o-linear-gradient(top, #a90329, #6d031b); background-image: linear-gradient(to bottom, #a90329, #6d031b); color: #fff !important; border: 1px solid #eb2755; text-shadow: #985813 0 -1px;"><i class="fa fa-power-off"></i></a> </span>
				</div>
				<!-- Stop Server button -->

				<!-- collapse menu button -->
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="javascript:void(0);" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
				</div>
				<!-- end collapse menu -->

				<!-- logout button -->
				<div id="logout" class="btn-header transparent pull-right">
					<span> <a href="./php/logout.php" title="Sign Out" data-logout-msg="You can improve your security further after logging out by closing this opened browser"><i class="fa fa-sign-out"></i></a> </span>
				</div>
				<!-- end logout button -->

				<!-- fullscreen button -->
				<div id="fullscreen" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0);" onclick="launchFullscreen(document.documentElement);" title="Full Screen"><i class="fa fa-fullscreen"></i></a> </span>
				</div>
				<!-- end fullscreen button -->

				<!-- multiple lang dropdown : find all flags in the image folder -->
				<ul class="header-dropdown-list hidden-xs">
					<li>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img alt="" src="img/flags/<?php echo $_COOKIE['lang']; ?>.png"> <span></span> <i class="fa fa-angle-down"></i> </a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="#" class="language" data-lang="de_DE"> <img alt="" src="img/flags/de_DE.png"> German</a>
							</li>
							<li>
								<a href="#" class="language" data-lang="en_EN"> <img alt="" src="img/flags/en_EN.png"> English</a>
							</li>
							<li>
								<a href="#" class="language" data-lang="zh_CN"><img alt="" src="img/flags/zh_CN.png"> Chinese</a>
							</li>
							<li>
								<a href="#" class="language" data-lang="it_IT"><img alt="" src="img/flags/it_IT.png"> Italian</a>
							</li>
						</ul>
					</li>
				</ul>
				<!-- end multiple lang -->

			</div>
			<!-- end pulled right: nav area -->

		</header>
		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel">

			<!-- User info -->
			<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it -->

					<a href="javascript:void(0);" id="show-shortcut">
						<img src="img/avatars/male.png" alt="me" class="online" />
						<span>
							<?php echo $_SESSION['user']; ?>
						</span>
					</a>

				</span>
			</div>
			<!-- end user info -->

			<!-- NAVIGATION : This navigation is also responsive

			To make this navigation dynamic please make sure to link the node
			(the reference to the nav > ul) after page load. Or the navigation
			will not initialize.
			-->
			<nav>
				<!-- NOTE: Notice the gaps after each icon usage <i></i>..
				Please note that these links work a bit different than
				traditional href="" links. See documentation for details.
				-->

				<ul>
					<li class="">
						<a href="ajax/home.php" title=<?php echo _('Home');?>><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent"><?php echo _('Home');?></span></a>
					</li>
					<li>
						<a href="ajax/save_image.php" ><i class="fa fa-lg fa-fw fa-download"></i> <span class="menu-item-parent"><?php echo _("Safe image");?></span></a>
					</li>
					<li>
						<a href="ajax/restore_image.php"><i class="fa fa-lg fa-fw fa-upload"></i> <span class="menu-item-parent"><?php echo _("Restore image");?></span></a>
					</li>
					<li>
						<a href="#"><i class="fa fa-lg fa-fw fa-cogs"></i> <span class="menu-item-parent"><?php echo _("Setup");?></span></a>
						<ul>
							<li>
								<a href="ajax/setup/user.php"><?php echo _("User");?></a>
							</li>
							<li>
								<a href="ajax/setup/room.php"><?php echo _("Rooms");?></a>
							</li>
							<li>
								<a href="ajax/setup/displays.php"><?php echo _("Displays");?></a>
							</li>
							<li>
								<a href="ajax/setup/hardware.php"><?php echo _("Hardware");?></a>
							</li>
							<li>
								<a href="ajax/setup/images.php"><?php echo _("Images");?></a>
							</li>
							<li>
								<a href="ajax/setup/computer.php"><?php echo _("Computer");?></a>
							</li>
							<li>
								<a href="ajax/setup/power.php"><?php echo _("Power Control");?></a>
							</li>
						</ul>
					</li>
					<li>
						<a href="ajax/help_faq.php"><i class="fa fa-lg fa-fw fa-question-circle"></i> <span class="menu-item-parent"><?php echo _("Help & FAQ");?></span></a>
					</li>
					<li>
						<a href="ajax/server_vnc.php"><i class="fa fa-lg fa-fw fa-eye"></i> <span class="menu-item-parent"><?php echo _("VNC Control");?></span></a>
					</li>
					<li>
						<a href="ajax/server_log.php"><i class="fa fa-lg fa-fw fa-edit"></i> <span class="menu-item-parent"><?php echo _("Restore Log");?></span></a>
					</li>
				</ul>
			</nav>
			<span class="minifyme"> <i class="fa fa-arrow-circle-left hit"></i> </span>

		</aside>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<span class="ribbon-button-alignment"> <span id="refresh" class="btn btn-ribbon" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true" data-reset-msg="Would you like to RESET all your saved widgets and clear LocalStorage?"><i class="fa fa-refresh"></i></span> </span>

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<!-- This is auto generated -->
				</ol>
				<!-- end breadcrumb -->

				<!-- You can also add more buttons to the
				ribbon for further usability

				Example below:

				<span class="ribbon-button-alignment pull-right">
				<span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
				<span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
				<span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
				</span>-->

			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">

			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->


		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>-->

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script>
			if (!window.jQuery) {
				document.write('<script src="js/libs/jquery-2.0.2.min.js"><\/script>');
			}
		</script>

		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');
			}
		</script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events -->
		<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script>

		<!-- BOOTSTRAP JS -->
		<script src="js/bootstrap/bootstrap.min.js"></script>

		<!-- TAC TRAINING RECOVERY JS -->
		<script src="js/plugin/TAC_TRAINING_RECOVERY/check_server.js"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="js/notification/SmartNotification.min.js"></script>

		<!-- JARVIS WIDGETS -->
		<script src="js/smartwidgets/jarvis.widget.min.js"></script>

		<!-- EASY PIE CHARTS -->
		<!-- <script src="js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>-->

		<!-- SPARKLINES -->
		<script src="js/plugin/sparkline/jquery.sparkline.min.js"></script>

		<!-- JQUERY VALIDATE -->
		<script src="js/plugin/jquery-validate/jquery.validate.min.js"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="js/plugin/masked-input/jquery.maskedinput.min.js"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<script src="js/plugin/select2/select2.min.js"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

		<!-- browser msie issue fix -->
		<script src="js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

		<!-- FastClick: For mobile devices: you can disable this in app.js -->
		<script src="js/plugin/fastclick/fastclick.js"></script>

		<!-- JQUERY COOKIE -->
		<script src="js/plugin/jquery-cookie/jquery.cookie.js"></script>

		<!-- JQUERY circliful -->
		<!-- <script src="js/plugin/jquery-circliful/jquery.circliful.min.js"></script>-->

		<!-- JQUERY knob -->
		<script src="js/plugin/jquery-knob/jquery.knob.js"></script>

		<!-- JQUERY spin -->
		<script src="js/notification/spin.min.js"></script>

		<!--[if IE 7]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- MAIN APP JS FILE -->
		<script src="js/app.js"></script>

		<!-- Your GOOGLE ANALYTICS CODE Below -->
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>

	</body>

</html>