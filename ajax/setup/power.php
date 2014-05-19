<?php
  		include('../../php/language.php');
  		include "../../php/mysql_connect.php";
?>



<body>
<body onload="room("Productivity")">
<section id="widget-grid" class="">
<article class="col-xs-12 col-sm-12 col-md-12 col-lg-6 sortable-grid ui-sortable">
<div data-widget-custombutton="false" data-widget-fullscreenbutton="false" data-widget-deletebutton="false" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-colorbutton="false" id="wid-id-11" class="jarviswidget jarviswidget-sortable" role="widget">
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
				<header role="heading">
					<span class="widget-icon"> <i class="fa fa-power-off"></i> </span>
					<h2><strong><?php echo _('Power');?></strong> <i><?php echo _('Control');?></i> </h2>

					<ul class="nav nav-tabs pull-right" id="widget-tab-1">
					<?php
                        $sql = "SELECT room_name FROM room;";
                        $result = mysql_query($sql) or die(mysql_error());
                        $i = 0;
                        while($row = mysql_fetch_assoc($result)){
                        $i++;
                        if ($i == 1)
                        {
                        echo "<li class='active'><a href='#".$row["room_name"]."'data-toggle='tab' oncload='room(&quot;".$row["room_name"]."&quot;)'> <i class='fa fa-lg fa-arrow-circle-o-down'></i> <span class='hidden-mobile'>".$row["room_name"]."</span> </a>";
                        }
                        else
                        {
                        echo "<li class=''>	<a href='#".$row["room_name"]."' data-toggle='tab' onclick='room(&quot;".$row["room_name"]."&quot;)'> <i class='fa fa-lg fa-arrow-circle-o-down'></i> <span class='hidden-mobile'>".$row["room_name"]."</span> </a>";
                        }
                        }
                     ?>
					</ul>








				<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

				<!-- widget div-->
				<div role="content">

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body no-padding">
					<p id="alert_load" class="alert alert-warning"> <strong><i class="fa fa-refresh fa-spin"></i> <?php echo _('Waiting!');?></strong> <?php echo _('PC status in this room will be checked this will take up to 10 sec.');?> </p>

						<!-- widget body text-->

						<div class="tab-content padding-5">
							<div id="Productivity" class="tab-pane fade active in"></div>
							<div id="Ideas" class="tab-pane fade"></div>
							<div id="Partners" class="tab-pane fade"></div>
						</div>

						<!-- end widget body text-->

						<!-- widget footer -->
						<div class="widget-footer text-right">

							<span class="onoffswitch-title">
								<i class="fa fa-check"></i> Show Tabs
							</span>
							<span class="onoffswitch">
								<input type="checkbox" checked="checked" id="show-tabs" class="onoffswitch-checkbox" name="onoffswitch">
								<label for="show-tabs" class="onoffswitch-label">
									<span data-swchoff-text="NO" data-swchon-text="True" class="onoffswitch-inner"></span>
									<span class="onoffswitch-switch"></span>
								</label>
							</span>

						</div>
						<!-- end widget footer -->

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
</article>
</section>




<script type="text/javascript">

	// DO NOT REMOVE : GLOBAL FUNCTIONS!
	pageSetUp();

	// PAGE RELATED SCRIPTS
$( document ).ready(function() {
$("#alert_load").show();
room("Productivity");
});




	function room(room){
	$("#alert_load").show();
	$('[id="button_on"]').addClass("disabled");
	$('[id="button_off"]').addClass("disabled");

	$.getJSON( "./php/controller.php?what=get_pc_room&room="+room, function( data ) {

	    var res = ""

	    $.each(data ,function(key, condition)  {

	    if (condition.ping==0)
		{
		res += '<a id="button_on" class="btn btn-sm btn-success" style="margin:3px;" onclick="wakeup_pc(&quot;'+ condition.computer_mac +'&quot,&quot;'+ condition.computer_name +'&quot;)">'+ condition.computer_name +'<br>Power ON</a>'
		}
		if (condition.ping==1)
		{
	    res += '<a id="button_off" class="btn btn-sm btn-danger" style="margin:3px;" onclick="poweroff(&quot;'+ condition.computer_ip +'&quot,&quot;'+ condition.computer_name +'&quot;)">'+ condition.computer_name +'<br>Power OFF</a>'
	    }
	     })

    $('#'+room).empty();
    $("#alert_load").hide();
    $(res).appendTo('#'+room);
});
};

function poweroff(ip,name){
var url = './php/controller.php?what=poweroff&ip='+ip+'&name='+name;

    			var tmp1 = $.ajax({
    				url:url,
    				async:false
    			});
    			if(tmp1.responseText.trim()[0] === "1"){
					$.smallBox({
					title 		: '<?php echo _('PC ');?> '+name,
					content 	: '<i class="fa fa-power-off"></i>&nbsp;<?php echo _('Will now shot down now!');?>',
					color 		: "#900323",
					iconSmall 	: "fa fa-thumbs-up bounce animated",
					timeout : 3000
								});
														}
							}
function wakeup_pc(mac,name){
var url = './php/controller.php?what=wakeup&mac='+mac+'&name='+name;

    			var tmp1 = $.ajax({
    				url:url,
    				async:false
    			});
    			if(tmp1.responseText.trim()[0] === "1"){
					$.smallBox({
					title 		: '<?php echo _('PC ');?> '+name,
					content 	: '<i class="fa fa-power-off"></i>&nbsp;<?php echo _('Will now powered on!');?>',
					color 		: "#659265",
					iconSmall 	: "fa fa-thumbs-up bounce animated",
					timeout : 3000
								});
														}



									}
</script>