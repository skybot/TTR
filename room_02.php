

<?php
		$page_name = basename($_SERVER['PHP_SELF']);
		include "./php/mysql_connect.php";
  		include('./php/language.php');
  		$sql = "SELECT * FROM displays WHERE display_address ='$page_name' ";
		$result = mysql_query($sql) or die(mysql_error());
		while($row = mysql_fetch_assoc($result)){

		$room 		= $row["display_room"];
		$hardware	= $row["display_hardware"];
		$displ_name	= $row["display_name"];
												}
		$sql = "SELECT iface FROM room WHERE room_name = '$room'";
		$result = mysql_query($sql) or die(mysql_error());
		while($row = mysql_fetch_assoc($result))
		$eth = $row["iface"];
?>








<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title> <?php echo _("Restore image");?> </title>
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Use the correct meta names below for your web application
			 Ref: http://davidbcalhoun.com/2010/viewport-metatag

		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">-->

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css">

		<!-- SmartAdmin Styles : Please note (smartadmin-production.css) was created using LESS variables -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-production.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-skins.css">
		<!-- Jquery Multiselect -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/multi-select.css">

		<!-- SmartAdmin RTL Support is under construction
			<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-rtl.css"> -->

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

	</head>
	<body id="login" class="animated fadeInDown">
		<!-- possible classes: minified, no-right-panel, fixed-ribbon, fixed-header, fixed-width-->
		<!-- HEADER -->
		<header id="header">
			<div id="logo-group">

				<!-- PLACE YOUR LOGO HERE -->
				<h1 class="txt-color-white">
					<?php echo _("TAC RECOVERY");?></h1>

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

<!-- NEW WIDGET START -->
<span id="left-panel"></span>
		<article class="col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false" data-widget-deletebutton="false">
				<!-- widget options:
				usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

				data-widget-colorbutton="false"
				data-widget-editbutton="false"
				data-widget-togglebutton="false"
				data-widget-deletebutton="false"
				data-widget-fullscreenbutton="false"
				data-widget-custombutton="false"
				data-widget-collapsed="true"
				data-widget-sortable="false"

				-->
				<header>
					<h2><?php echo "Room:  $room";?></h2>


				</header>

				<!-- widget div-->
				<div>

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div style="height:600px;" class="widget-body fuelux">

						<div class="wizard">
							<ul class="steps">
								<li data-target="#step1" class="active">
									<span class="badge badge-info">1</span><?php echo _("Choose image");?><span class="chevron"></span>
								</li>
								<li data-target="#step2">
									<span class="badge">2</span><?php echo _("Choose computer");?><span class="chevron"></span>
								</li>
								<li data-target="#step3">
									<span class="badge">3</span><?php echo _("Message");?><span class="chevron"></span>
								</li>
								<li data-target="#step4">
									<span class="badge">4</span><?php echo _("Start");?><span class="chevron"></span>
								</li>
							</ul>
							<div class="actions">
								<button type="button" class="btn btn-sm btn-primary btn-prev">
									<i class="fa fa-arrow-left"></i>Prev
								</button>
								<button type="button" class="btn btn-sm btn-success btn-next" data-last="Finish">
									Next<i class="fa fa-arrow-right"></i>
								</button>
							</div>
						</div>
						<div class="step-content">
								<div class="step-pane active" id="step1">
									<h3><strong>Step 1 </strong> - <?php echo _("Please choose the image you want to restore!");?></h3>

									<!-- wizard form starts here -->
									<fieldset>
									<div class="text-center">
										<div class="alert alert-info">
										<strong>
											<i class="fa fa-warning fa-3x"></i>
											<h2><?php echo _("Please choose the image you want to restore!");?></h2>
										</strong>
											<br>
										</div>
									</div>
									<div class="text-center">
										<div class="row">
											<section class="col col-6">
												<label class="select">
												<form class="form-horizontal" id="sample-form" method="post" action="./php/controller.php?what=restore_room_control">
													<select class="input-lg" name="restore_name" id="restore_name">
														<?php
														$sql = "SELECT image_name FROM images WHERE hw_type = '$hardware'";
														$result = mysql_query($sql) or die(mysql_error());
														while($row = mysql_fetch_assoc($result))
														echo "<option value='".$row["image_name"]."'>".$row["image_name"]."</option>\r\n";
														?>
													</select> <i></i> </label>
											</section>
										</div>
									</div>
									<div id="table" class="table-responsive">
										<table id="image_table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th><?php echo _('Hardware');?></th>
													<th><?php echo _('Hardware Picture');?></th>
													<th><?php echo _('Operating system');?></th>
													<th><?php echo _('Image size');?></th>

												</tr>
												<tr>
													<td id="table_hardware"></td>
													<td id="table_hardware_img"><img src="" alt="hardware_pic" width="80" height="80" /></td>
													<td id="table_os"></td>
													<td id="table_image_size"></td>

												</tr>
											</thead>
										</table>
									</div>

									</fieldset>

								</div>

								<div class="step-pane" id="step2">
									<h3><strong>Step 2 </strong> - <?php echo _("Choose computer");?></h3>

									<div class="container">
										<div class="center1">
								 			<select id='public-methods' multiple='multiple' name='ip[]'>
													<?php
													$sql = "SELECT * FROM  computer WHERE computer_room = '$room'";
													$result = mysql_query($sql) or die(mysql_error());
													while($row = mysql_fetch_assoc($result))
													echo "<option value='".$row["computer_ip"]."'>".$row["computer_name"]."</option>\r\n";
												?>
											</select>
											<input type='hidden' name='eth' value='<?php echo $eth; ?>'>
											<input type='hidden' name='room_name' value='<?php echo $room; ?>'>
											<input type='hidden' name='room_device' value='<?php echo $displ_name; ?>'>
										</form>
										</div>
										<div class="col-xs-6.col-sm-10">
											<div class="text-center">
												<div style="height:100px;">
													<button class="btn btn-lg btn-labeled btn-success" type="button" id="select-all"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span><?php echo _("Select all");?></button>
												</div>
												<div style="height:100px;">
													<button class="btn btn-lg btn-labeled btn-danger" type="button" id="deselect-all"><span class="btn-label"><i class="glyphicon glyphicon-chevron-left"></i></span><?php echo _("Deselect all");?></button>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="step-pane" id="step3">
									<h3><strong>Step 3 </strong> - <?php echo _("Message");?></h3>
									<div class="text-center">
										<div class="alert alert-danger">
											<strong>
												<i class="fa fa-warning fa-3x"></i>
												<h2><?php echo _("Please power off all computer you want to recover!");?></h2>
											</strong>
										</div>
									</div>

								</div>
								<div class="step-pane" id="step4">
									<h3><strong>Step 4 </strong> - <?php echo _("Start");?></h3>
									<div class="text-center">
										<br>
											<h1 class="text-center text-success"><strong><i class="fa fa-check fa-lg"></i> Complete</strong></h1>
											<h4 class="text-center"><?php echo _("In the next step the recovering will start!");?></h4>
										<br>
									</div>

								</div>
					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->

		</article>
		<!-- WIDGET END -->

	</div>

	<!-- end row -->

</section>
<!-- end widget grid -->

		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script src="js/plugin/pace/pace.min.js"></script>

	    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
	    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script> if (!window.jQuery) { document.write('<script src="js/libs/jquery-2.0.2.min.js"><\/script>');} </script>

	    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script> if (!window.jQuery.ui) { document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');} </script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events
		<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

		<!-- BOOTSTRAP JS -->
		<script src="js/bootstrap/bootstrap.min.js"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="js/notification/SmartNotification.min.js"></script>

		<!-- JARVIS WIDGETS -->
		<script src="js/smartwidgets/jarvis.widget.min.js"></script>

		<!-- EASY PIE CHARTS -->
		<script src="js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

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

		<!-- FastClick: For mobile devices -->
		<script src="js/plugin/fastclick/fastclick.js"></script>

		<!-- Jquery Multiselct -->
		<script src="js/plugin/jquery-multiselect/jquery.multi-select.js"></script>

		<!-- TAC TRAINING RECOVERY JS -->
		<script src="js/plugin/TAC_TRAINING_RECOVERY/check_server.js"></script>

		<!-- JQUERY spin -->
		<script src="js/notification/spin.min.js"></script>

		<!--[if IE 7]>

			<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- MAIN APP JS FILE -->
		<script src="js/app.js"></script>

<script type="text/javascript">
	// DO NOT REMOVE : GLOBAL FUNCTIONS!
	pageSetUp();

	// PAGE RELATED SCRIPTS
	$(document).ready(function(){
	$("#image_table").css("visibility", "hidden");
	$("#restore_name").change(function(){
		var image = ($(this).find('option:selected').val());

	$.getJSON( "./php/controller.php?what=get_image_info&image="+image, function( data ) {

	$("#image_table").css("visibility", "visible");
	$("#table_hardware").empty();
	$("#table_hardware").append(data.hw_type);
	$("#table_os").empty();
	$("#table_os").append('<img src="img/pics/os/'+data.os+'.png" width="80" height="80" />');
	$("#table_hardware_img").empty();
	$("#table_hardware_img").append('<img src="'+data.hardware_pic+'" alt="hardware_pic" width="80" height="80" />');
	$("#table_image_size").empty();
	$("#table_image_size").append('<div class="progress progress-lg"><div class="progress-bar bg-color-blue" role="progressbar" style="width: '+data.image_size_gb+'%"></div><p class="text-center">'+data.image_size_gb+'GB</p></div>');
	});
	});
	});

	/*
	 * Load fuelux wizard dependency
	 */
	loadScript("js/plugin/fuelux/wizard/wizard.js", fueluxWizard);
		function fueluxWizard() {

			var wizard = $('.wizard').wizard();
				wizard.on('finished', function (e, data) {

					$("#sample-form").submit(function(e) {
						var postData = $(this).serializeArray();
						var formURL = $(this).attr("action");
							$.ajax({
								url : formURL,
						        type: "POST",
						        data : postData,
						        success:function(data, textStatus, jqXHR)
						        {
						            location.reload();
						        },
						        error: function(jqXHR, textStatus, errorThrown)
						        {
						            //if fails
						        }
									});
						e.preventDefault(); //STOP default action
									});
					$("#sample-form").submit(); //Submit  the FORM
		});
}





		$('#public-methods').multiSelect();
		$('#select-all').click(function(){
  		$('#public-methods').multiSelect('select_all');
  			return false;
		});
		$('#deselect-all').click(function(){
  		$('#public-methods').multiSelect('deselect_all');
  			return false;
		});

</script>

	</body>
</html>