function checkServer()
{
//server status abrage
        $.getJSON('./php/sever_status.php',
        	function(data){

        	$("#server_status").empty();
			$("#server_status").removeClass();
			$("#start_server").removeClass();
			$("#stop_server").removeClass();
			$("#stop_server_room").removeClass();
			$("#start_server_room").removeClass();
			$("#reload_activitybox_content").empty();
			$("#1").empty();
			$("#2").empty();
			$("#3").empty();
			$("#4").empty();
			$("#start_server_room_icon").removeClass();




            if(data.ocsmgrd === 1 ){

            $("#server_status").append('<a><i class="icon-spinner icon-spin"></i><?php echo _("On");?></a>');
			$("#server_status").addClass("green");
			$("#start_server").addClass("btn btn-success disabled");
			$("#stop_server").addClass("btn btn-danger");
			$("#start_server_room").addClass("btn btn-app btn-success disabled");
			$("#stop_server_room").addClass("btn btn-app btn-danger");
			$("#start_reconfig").addClass("btn btn-danger disabled");
			$('#reload_activitybox_content').append(data.ocsmgrd_log);
			$("#1").append(data.log[0]);
			$("#2").append(data.log[1]);
			$("#3").append(data.log[2]);
			$('#reload_activitybox').show();
			$("#server_stop_button").show();
			$("#server_start_button").hide();
			$("#server_status_button").show();
			$("#start_server_room_icon").addClass("icon-spinner icon-spin");
			$("#restore_name").attr( "disabled", "disabled" );


            }
            if(data.ocsmgrd === 0){
            $("#server_status").append('<a><i class="icon-power-off"></i><?php echo _("Off");?></a>');
            $("#server_status").addClass("gray");
            $("#start_server").addClass("btn btn-success");
			$("#stop_server").addClass("btn btn-danger disabled");
			$("#start_server_room").addClass("btn btn-app btn-success");
			$("#stop_server_room").addClass("btn btn-app btn-danger disabled");
			$('#reload_activitybox').hide();
			$("#server_stop_button").hide();
			$("#server_start_button").show();
			$("#server_status_button").hide();
			$("#start_server_room_icon").addClass("icon-refresh");
			$("#restore_name").removeAttr( "disabled" )



			}
            if(data.drblpush === 1 ){
			$('#left-panel').spin("modal");
			$("#start_server").addClass("btn btn-success disabled");
			$("#stop_server").addClass("btn btn-danger disabled");
			$("#stop_server_room").addClass("btn btn-app btn-danger disabled");
			$("#start_server_room").addClass("btn btn-app btn-success disabled");


            }
            if(data.drblpush === 0 ){
            $('#left-panel').spin("modal","off");
            $("#loader").hide();



            }
        });
};
    			function restore_start()	{

				$("#server_start_button_action").addClass("fa fa-spinner fa-spin");

    			var restore_user = $("#restore_user").val();
    			var restore_name = $("#restore_name").val();
    			var count = $("#count").val();
    			var eth = $("#eth").val();
    			var	path_assets = './assets/img/';
    			var url = './php/controller.php?what=restore_start&restore_name='+restore_name+'&count='+count+'&eth='+eth+'&restore_user='+restore_user;

    			var tmp1 = $.ajax({
    				url:url,
    				async:false
    			});
    			$("#server_stop_button_action").addClass("fa fa-power-off");
				$("#server_start_button").hide();
				$("#server_stop_button").show();
				$("#server_start_button_action").removeClass("fa fa-spinner fa-spin");
				$("#server_start_button_action").addClass("fa fa-check");
    			};

    			function server_stop()	{

    				var url = './php/controller.php?what=server_stop';
        			var tmp1 = $.ajax({
    				url:url,
    				async:true
    			});
        			};

        		function save_start()	{

        			$("#server_start_button_action").addClass("fa fa-spinner fa-spin");
					var restore_user = $("#restore_user").val();
					var image_name = $("#image_name").val();
					var part = $("#part").val();
					var os = $("#os").val();
					var hw_type = $("#hw_type").val();
					var image_description = $("#image_description").val();
					var image_type = $("#image_type").val();
					var url = './php/controller.php?what=save_start&image_name='+image_name+'&part='+part+'&os='+os+'&hw_type='+hw_type+'&image_description='+image_description+'&image_type='+image_type+'&restore_user='+restore_user;

					var tmp1 =$.ajax({
						url:url,
						async:false
					});
					$("#server_stop_button_action").addClass("fa fa-power-off");
					$("#server_start_button").hide();
					$("#server_stop_button").show();
					$("#server_start_button_action").removeClass("fa fa-spinner fa-spin");
					$("#server_start_button_action").addClass("fa fa-check");
					};


$(document).ready(function(){
checkServer();

var auto_refresh = setInterval(checkServer,2000);

});
