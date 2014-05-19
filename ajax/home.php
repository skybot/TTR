<?php
  		include('../php/language.php');
        $DMIDECODE = "/usr/sbin/dmidecode";
		$HWINFO    = "/usr/sbin/hwinfo";
?>



<body>

<section id="widget-grid" class="">

<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6 sortable-grid ui-sortable">
<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-fullscreenbutton="false"data-widget-deletebutton="false">
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
					<h2><strong>System</strong> <i>Load</i> </h2>
				</header>

				<!-- widget div-->
				<div role="content">

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body">
						<div class="col-xs-6 text-center">
							<span id="chart_mem"></span>
						</div>
						<div class="col-xs-6 text-center">
							<span id="chart_cpu"></span>
						</div>
					</div>
					<div class="widget-footer">
						<div class="col-xs-6">
							<p class="text-center">Memory Load</p>
						</div>
						<div class="col-xs-6">
							<p class="text-center">CPU Load</p>
						</div>
					</div>

					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
</article> <!-- system -->
<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6 sortable-grid ui-sortable">
<div class="jarviswidget jarviswidget-color-darken" id="wid-id-2" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-fullscreenbutton="false"data-widget-deletebutton="false">
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
					<h2><strong>HDD</strong> <i>Use</i> </h2>
				</header>
				<!-- widget div-->
				<div role="content">

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body">
						<div class="col-xs-6 text-center">
							<span id="chart_sda1"></span>
						</div>
						<div class="col-xs-6 text-center">
							<span id="chart_sda2"></span>
						</div>
					</div>
					<div class="widget-footer">
						<div class="col-xs-6">
							<p class="text-center">Hardisk 01</p>
						</div>
						<div class="col-xs-6">
							<p class="text-center">Hardisk 02</p>
						</div>
					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
</article> <!-- HDD -->
<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
<div class="jarviswidget jarviswidget-color-darken" id="wid-id-3" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-fullscreenbutton="false"data-widget-deletebutton="false">
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
					<h2><strong>Network</strong> <i>Load</i> </h2>
				</header>
				<!-- widget div-->
				<div role="content">

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body">
						<div class="col-xs-3 text-center">
							<span id="chart_eth0"></span><br>
						</div>
						<div class="col-xs-3 text-center">
							<span id="chart_eth1"></span>
						</div>
						<div class="col-xs-3 text-center">
							<span id="chart_eth2"></span>
						</div>
						<div class="col-xs-3 text-center">
							<span id="chart_eth3"></span>
						</div>
					</div>
					<div class="widget-footer">
						<div class="col-xs-3">
							<div id="eth0_in"></div>
						</div>
						<div class="col-xs-3">
							<div id="eth1_in"></div>
						</div>
						<div class="col-xs-3">
							<div id="eth2_in"></div>
						</div>
						<div class="col-xs-3">
							<div id="eth3_in"></div>
						</div>
					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
</article> <!-- NETWORK -->
</section>




</body>
</html>

<script type="text/javascript">

	// DO NOT REMOVE : GLOBAL FUNCTIONS!
	pageSetUp();

	// PAGE RELATED SCRIPTS

	/* remove previous elems */








$(document).ready(function()	{


function server_status(){
$.getJSON('./php/server_info.php',function(data){
 $("#chart_cpu").empty();
 $("#chart_cpu").val(data.cpu);
 $("#chart_cpu").trigger("change");
 $("#chart_cpu").append(''+data.cpu+'%');
 $("#chart_mem").empty();
 $("#chart_mem").val(data.mem);
 $("#chart_mem").trigger("change");
 $("#chart_mem").append(''+data.mem+'MB');


 $("#chart_sda1").empty();
 $("#chart_sda1").val(data.sda1_use);
 $("#chart_sda1").trigger("change");
 $("#chart_sda1").append(''+data.sda1_size+'b');

 $("#chart_sda2").empty();
 $("#chart_sda2").val(data.sda2_use);
 $("#chart_sda2").trigger("change");
 $("#chart_sda2").append(''+data.sda2_size+'b');
 })};


function eth0_status(){
$.getJSON('./php/results_eth0.json',function(data){

 $("#chart_eth0").empty();
 $("#eth0_in").empty();
 var compl_eth0 = parseInt(data.eth0_in)+parseInt(data.eth0_out);
 var caluc_eth0_in 	= (data.eth0_in/10000).toFixed(2);
 var caluc_eth0_out = (data.eth0_out/10000).toFixed(2);
 $("#chart_eth0").val((compl_eth0/10000).toFixed(2));
 $("#chart_eth0").trigger("change");
 $("#chart_eth0").append((compl_eth0/10000).toFixed(2));
 $("#eth0_in").append('<span class="col-xs-6"><p class="font-xs text-center">'+caluc_eth0_in+'MB/s<i class="fa fa-caret-down icon-color-bad"></i></p></span><span class="col-xs-6"><p class="font-xs text-center">'+caluc_eth0_out+'MB/s<i class="fa fa-caret-up icon-color-bad"></i></p></span>');

 })};

function eth1_status(){
$.getJSON('./php/results_eth1.json',function(data){

 $("#chart_eth1").empty();
 $("#eth1_in").empty();
 var compl_eth1 = parseInt(data.eth1_in)+parseInt(data.eth1_out);
 var caluc_eth1_in 	= (data.eth1_in/10000).toFixed(2);
 var caluc_eth1_out = (data.eth1_out/10000).toFixed(2);
 $("#chart_eth1").val((compl_eth1/10000).toFixed(2));
 $("#chart_eth1").trigger("change");
 $("#chart_eth1").append((compl_eth1/10000).toFixed(2));
 $("#eth1_in").append('<span class="col-xs-6"><p class="font-xs text-center">'+caluc_eth1_in+'MB/s<i class="fa fa-caret-down icon-color-bad"></i></p></span><span class="col-xs-6"><p class="font-xs text-center">'+caluc_eth1_out+'MB/s<i class="fa fa-caret-up icon-color-bad"></i></p></span>');

 })};

function eth2_status(){
$.getJSON('./php/results_eth2.json',function(data){

 $("#chart_eth2").empty();
 $("#eth2_in").empty();
 var compl_eth2 = parseInt(data.eth2_in)+parseInt(data.eth2_out);
 var caluc_eth2_in 	= (data.eth2_in/10000).toFixed(2);
 var caluc_eth2_out = (data.eth2_out/10000).toFixed(2);
 $("#chart_eth2").val((compl_eth2/10000).toFixed(2));
 $("#chart_eth2").trigger("change");
 $("#chart_eth2").append((compl_eth2/10000).toFixed(2));
 $("#eth2_in").append('<span class="col-xs-6"><p class="font-xs text-center">'+caluc_eth2_in+'MB/s<i class="fa fa-caret-down icon-color-bad"></i></p></span><span class="col-xs-6"><p class="font-xs text-center">'+caluc_eth2_out+'MB/s<i class="fa fa-caret-up icon-color-bad"></i></p></span>');

 })};

function eth3_status(){
$.getJSON('./php/results_eth3.json',function(data){

 $("#chart_eth3").empty();
 $("#eth3_in").empty();
 var compl_eth3 = parseInt(data.eth3_in)+parseInt(data.eth3_out);
 var caluc_eth3_in 	= (data.eth3_in/10000).toFixed(2);
 var caluc_eth3_out = (data.eth3_out/10000).toFixed(2);
 $("#chart_eth3").val((compl_eth3/10000).toFixed(2));
 $("#chart_eth3").trigger("change");
 $("#chart_eth3").append((compl_eth3/10000).toFixed(2));
 $("#eth3_in").append('<span class="col-xs-6"><p class="font-xs text-center">'+caluc_eth3_in+'MB/s<i class="fa fa-caret-down icon-color-bad"></i></p></span><span class="col-xs-6"><p class="font-xs text-center">'+caluc_eth3_out+'MB/s<i class="fa fa-caret-up icon-color-bad"></i></p></span>');

 })};

setInterval(function(){server_status();}, 2000);
setInterval(function(){eth0_status();}, 2000);
setInterval(function(){eth1_status();}, 2000);
setInterval(function(){eth2_status();}, 2000);
setInterval(function(){eth3_status();}, 2000);

  	var bgcolor 	= '#CCC';
  	var fgcolor 	= '#F09D61'; //#438FBA
  	var inputColor	= '#5F5F5F';
  	var font		= 'Impact';
  	var fontWeight	= 'bold';
  	var fontSize	= '14px';

  	$("#chart_cpu").knob({
      'min'			: 0,
      'max'			: 150,
      'width'		: 130,
      'height'		: 50,
      'thickness'	: .2,
      'readOnly'	: true,
      'displayPrevious'	: true,
      'fgColor'		: fgcolor,
      'bgColor'		: bgcolor,
      'inputColor'	: inputColor,
      'angleArc'	:180,
      'angleOffset' :270,



    				});
    $("#chart_mem").knob({
      'min'			: 0,
      'max'			: 4000,
      'width'		: 130,
      'height'		: 50,
      'thickness'	: .2,
      'readOnly'	: true,
      'fgColor'		: fgcolor,
      'bgColor'		: bgcolor,
      'inputColor'	: inputColor,
      'angleArc'	:180,
      'angleOffset' :270,

	  				});
	  $("#chart_eth0").knob({
      'min'			: 0,
      'max'			: 50,
      'width'		: 130,
      'height'		: 50,
      'thickness'	: .2,
      'readOnly'	: true,
      'fgColor'		: fgcolor,
      'bgColor'		: bgcolor,
      'inputColor'	: inputColor,
      'angleArc'	:180,
      'angleOffset' :270,
      //'displayInput':false,

	  				});
	  $("#chart_eth1").knob({
      'min'			: 0,
      'max'			: 50,
      'width'		: 130,
      'height'		: 50,
      'thickness'	: .2,
      'readOnly'	: true,
      'fgColor'		: fgcolor,
      'bgColor'		: bgcolor,
      'inputColor'	: inputColor,
      'angleArc'	:180,
      'angleOffset' :270,
      //'displayInput':false,

	  				});
	  $("#chart_eth2").knob({
      'min'			: 0,
      'max'			: 50,
      'width'		: 130,
      'height'		: 50,
      'thickness'	: .2,
      'readOnly'	: true,
      'fgColor'		: fgcolor,
      'bgColor'		: bgcolor,
      'inputColor'	: inputColor,
      'angleArc'	:180,
      'angleOffset' :270,
      //'displayInput':false,

	  				});
	  $("#chart_eth3").knob({
      'min'			: 0,
      'max'			: 50,
      'width'		: 130,
      'height'		: 50,
      'thickness'	: .2,
      'readOnly'	: true,
      'fgColor'		: fgcolor,
      'bgColor'		: bgcolor,
      'inputColor'	: inputColor,
      'angleArc'	:180,
      'angleOffset' :270,
      //'displayInput':false,

	  				});

	  $("#chart_sda1").knob({
      'min'			: 0,
      'max'			: 13285488,
      'width'		: 130,
      'height'		: 50,
      'thickness'	: .2,
      'readOnly'	: true,
      'displayPrevious'	: true,
      'fgColor'		: fgcolor,
      'bgColor'		: bgcolor,
      'inputColor'	: inputColor,
      'angleArc'	:180,
      'angleOffset' :270,


	  				});
	   $("#chart_sda2").knob({
      'min'			: 0,
      'max'			: 1031991040,
      'width'		: 130,
      'height'		: 50,
      'thickness'	: .2,
      'readOnly'	: true,
      'fgColor'		: fgcolor,
      'bgColor'		: bgcolor,
      'inputColor'	: inputColor,
      'angleArc'	:180,
      'angleOffset' :270,


	  				});

  	});

	</script>
</body>
</html>
