<?php
		header('Cache-control: private');
  		include "../php/mysql_connect.php";
  		include	"../php/language.php";
  		include "../php/auth.php";

?>
<!DOCTYPE html>
<section id="widget-grid" class="">
	<div class="row">
		<!-- NEW COL START -->
		<article class="col-sm-12 col-md-12 col-lg-6">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-blue" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-fullscreenbutton="false"data-widget-deletebutton="false">
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
					<span class="widget-icon"> <i class="fa fa-upload"></i> </span>
					<h2><?php echo _('Choose Image');?> </h2>

				</header>

				<!-- widget div-->
				<div>

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body no-padding">

						<form action="" class="smart-form">
							<fieldset>
								<section>
									<label class="label"><?php echo _('Image name');?></label>
									<label class="select">
										<select id="restore_name">
											<?php
											$sql = "SELECT image_name FROM images;";
											$result = mysql_query($sql) or die(mysql_error());
											while($row = mysql_fetch_assoc($result))
											echo "<option value='".$row["image_name"]."'>".$row["image_name"]."</option>\r\n";
											?>
										</select> <i></i> </label>
								</section>
								<section>
									<label class="label"><?php echo _('Room');?></label>
									<label class="select">
										<select id="eth">
											<?php
											$sql = "SELECT * FROM room;";
											$result = mysql_query($sql) or die(mysql_error());
											while($row = mysql_fetch_assoc($result))
											echo "<option value='".$row["iface"]."'>".$row["room_name"]."</option>\r\n";
											?>
										</select> <i></i> </label>
								</section>
								<section>
									<label class="label"><?php echo _('How many computers');?></label>
									<label class="select">
										<select id="count">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
										</select> <i></i> </label>
								</section>

							</fieldset>
							<footer>
							<button class="btn btn-danger" id="server_stop_button" style="display: none;" onclick="server_stop()"><i id="server_stop_button_action" class="fa fa-power-off"></i> <?php echo _('Stop Server');?> </button>
							<button class="btn btn-success" id="server_start_button" style="display: none;" onclick="restore_start()"><i id="server_start_button_action" class="fa fa-check"></i> <?php echo _('Start Server');?> </button>

							</footer>
						</form>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->

		</article>
		<!-- END COL -->

		<article class="col-sm-12 col-md-12 col-lg-6 sortable-grid ui-sortable">

			<!-- Widget ID (each widget will need unique ID)-->

			<!-- end widget -->

		<div class="jarviswidget jarviswidget-color-blue" id="wid-id-2" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-fullscreenbutton="false"data-widget-deletebutton="false">
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
					<span class="widget-icon"> <i class="fa fa-save"></i> </span>
					<h2><?php echo _('Image Information');?> </h2>

				</header>

				<!-- widget div-->
				<div role="content">

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body no-padding">
						<div class="table-responsive">

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
									<td id="table_hardware_img"></td>
									<td id="table_os"></td>
									<td id="table_image_size"></td>

								</tr>
							</thead>
						</table>

						</div>
					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div></article>
	</div>
	<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-red" style="display: none;" id="reload_activitybox" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-fullscreenbutton="false"data-widget-deletebutton="false">

				<header>
					<h2><strong><?php echo _('Status');?></strong> <i><?php echo _('Recovery');?></i></h2>

				</header>

				<!-- widget div-->
				<div>

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body">

						<!-- widget body text-->

							<div id="reload_activitybox_content"></div>

						<!-- end widget body text-->

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->

</section>
<script type="text/javascript">

	// DO NOT REMOVE : GLOBAL FUNCTIONS!
	pageSetUp();

	// PAGE RELATED SCRIPTS


			$(document).ready(function(){
					//$("#image_table").css("visibility", "hidden");
					$("#restore_name").change(function(){
					var image = ($(this).find('option:selected').text());

					$.getJSON( "./php/controller.php?what=get_image_info&image="+image, function( data ) {

					//$("#image_table").css("visibility", "visible");
					$("#table_hardware").empty();
					$("#table_hardware").append(data.hw_type);
					$("#table_os").empty();
					$("#table_os").append('<img src="img/pics/os/'+data.os+'.png" width="80" height="80" />');
					$("#table_hardware_img").empty();
					$("#table_hardware_img").append('<img src="'+data.hardware_pic+'" width="80" height="80" />');
					$("#table_image_size").empty();
					$("#table_image_size").append('<div class="progress progress-lg"><div class="progress-bar bg-color-blue" role="progressbar" style="width: '+data.image_size_gb+'%"></div><p class="text-center">'+data.image_size_gb+'GB</p></div>');
					});
					});
					});



</script>

			<!-- inline scripts related to this page -->
				<!-- End 	of main content -->
	</body>
</html>




