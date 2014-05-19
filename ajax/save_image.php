<?php
  		include "../php/mysql_connect.php";
  		include	"../php/language.php";
  		include "../php/auth.php";
?>
<!DOCTYPE html>
<section id="widget-grid" class="">
	<div class="row">
		<!-- NEW COL START -->
		<article class="col-sm-12 col-md-12 col-lg-12">

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
					<h2><?php echo _('Image Information');?> </h2>

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

						<form action="" id="safe_image_form" class="smart-form">
							<fieldset>
								<section class="col col-6">
									<label class="label"><?php echo _('Image name');?></label>
									<label class="input">
										<input type="text" id="image_name" name="image_name" placeholder="<?php echo _('Name of the Image');?>"> <i></i> </label>
								</section>
								<section class="col col-6">
									<label class="label"><?php echo _('Hardware type');?></label>
									<label class="select">
										<select id="hw_type">
											<?php
												$sql = "SELECT hardware_name FROM hardware;";
												$result = mysql_query($sql) or die(mysql_error());
												while($row = mysql_fetch_assoc($result))
												echo "<option >".$row["hardware_name"]."</option>\r\n";
											?>
										</select> <i></i> </label>
								</section>
								<section class="col col-6">
									<label class="label"><?php echo _('Harddrive');?></label>
									<label class="select">
										<select id="part">
											<option value="sda"><?php echo _('1st Harddrive');?></option>
											<option value="sdb"><?php echo _('2nd Harddrive');?></option>
										</select> <i></i> </label>
								</section>
								<section class="col col-6">
									<label class="label"><?php echo _('Image type');?></label>
									<label class="select">
										<select id="image_type">
											<option value="normal"><?php echo _('Normal');?></option>
											<option value="privat"><?php echo _('Privat Image');?></option>
											<option value="clean"><?php echo _('Clean OS');?></option>
										</select> <i></i> </label>
								</section>
								<section class="col col-6">
									<label class="label"><?php echo _('Operating system');?></label>
									<label class="select">
										<select id="os">
											<option value="WINDOWS_XP">Windows XP</option>
											<option value="WINDOWS_7">Windows 7</option>
											<option value="LINUX">Linux</option>
										</select> <i></i> </label>
								</section>
								<section class="col col-6">
									<label class="textarea"><?php echo _('Image description');?></lable>
										<textarea rows="2" id="image_description" placeholder="<?php echo _('Describe the image with a few words ...');?>"></textarea>
									</label>
								</section>


							</fieldset>
							<footer>
							<button class="btn btn-danger" id="server_stop_button" style="display: none;" onclick="server_stop()"><i id="server_stop_button_action" class="fa fa-power-off"></i> <?php echo _('Stop Server');?> </button>
							<button class="btn btn-success" id="server_start_button" style="display: none;" onclick="runFormValidation()"><i id="server_start_button_action" class="fa fa-check"></i> <?php echo _('Start Server');?> </button>

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
<!-- SCRIPTS ON PAGE EVENT -->
<script type="text/javascript">

	// DO NOT REMOVE : GLOBAL FUNCTIONS!
	pageSetUp();


	// PAGE RELATED SCRIPTS

	// Load form valisation dependency
	loadScript("js/plugin/jquery-form/jquery-form.min.js", runFormValidation);


	// Registration validation script
	function runFormValidation() {


		var $checkoutForm = $('#safe_image_form').validate({
		submitHandler: function(form) {
			save_start();
			},
		// Rules for form validation
			rules : {
				image_name : {
					required : true
				}
			},

			// Messages for form validation
			messages : {
				image_name : {
					required : '<?php echo _("Please enter a Image Name");?>'
				}
			},

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			}
		});

		};
</script>

	</body>
</html>




