<?php
  		include('../../php/language.php');
  		$domTable = "#computer_table";
        $ajaxUrl = "./php/datatables/table.computer.php";
        $table_name = "computer_table";
?>
<section id="widget-grid" class="">
<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-3" data-widget-editbutton="false">
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
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2><?php echo _('Computer management');?></h2>

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
						<div class="widget-body-toolbar">

						</div>
						<table id="computer_table" class="table table-striped table-hover">
							<thead>
									<tr>
										<th data-class="expand"><?php echo _("PC's name");?></th>
										<th data-hide="phone"><?php echo _(" PC's MAC Address");?></th>
										<th data-hide="phone"><?php echo _("PC's IP Address");?></th>
										<th data-hide="phone"><?php echo _("PC's Location");?></th>
	                                    <th data-hide="phone"><?php echo _("Computer type");?></th>
										<th data-hide="phone"><?php echo _("Computer visible");?></th>
									</tr>
								</thead>
							<tbody></tbody>
						</table>

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

	<!-- end row -->

</section>
<!-- end widget grid -->

<script type="text/javascript">

	// DO NOT REMOVE : GLOBAL FUNCTIONS!
	pageSetUp();

	// PAGE RELATED SCRIPTS

	/* remove previous elems */

	if($('.DTTT_dropdown.dropdown-menu').length){
		$('.DTTT_dropdown.dropdown-menu').remove();
	}

	loadDataTableScripts();
	function loadDataTableScripts() {

		loadScript		("js/plugin/datatables/jquery.dataTables.min.js", dt_2);


		function dt_2() {
			loadScript("js/plugin/datatables/ColReorder.min.js", dt_3);
		}

		function dt_3() {
			loadScript("js/plugin/datatables/FixedColumns.min.js", dt_4);
		}

		function dt_4() {
			loadScript("js/plugin/datatables/ColVis.min.js", dt_5);
		}

		function dt_5() {
			loadScript("js/plugin/datatables/ZeroClipboard.js", dt_6);
		}

		function dt_6() {
			loadScript("js/plugin/datatables/media/js/TableTools.js", dt_7);
		}

		function dt_7() {
			loadScript("js/plugin/datatables/DT_bootstrap.js", dt_8);
		}

		function dt_8() {
			loadScript("js/plugin/datatables/dataTables.editor.min.js", dt_10);
		}

		function dt_10() {
			loadScript("js/plugin/datatables/dataTables.editor.bootstrap.js", runDataTables);
		}

	}
	function runDataTables() {

		/*
		 * BASIC
		 */
		$('#dt_basic').dataTable({
			"sPaginationType" : "bootstrap_full"
		});

		/* END BASIC */
jQuery(function($) {

$(document).ready(function() {
//---------------------------------------------------- GET USER FROM DB
var test= new Array({"label" : "a", "value" : "a"});

function loader(){
test.splice(0,1);
$.ajax({
  url: './php/controller.php?what=get_rooms',
  async: false,
  dataType: 'json',
  success: function (json) {
      for(var a=0;a<json.length;a++){
        obj= { "label" : json[a][0], "value" : json[a][1]};
        test.push(obj);
      }
    }
});
return test;
}
//---------------------------------------------------- END GET USER FROM DB

//---------------------------------------------------- DATATABELE EDITOR
	editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": "<?php echo $ajaxUrl; ?>",
        "domTable": "<?php echo $domTable; ?>",
        "fields": [ {
            "type": "hidden",
            "label": "<?php echo _("PC's name");?>:",
            "name": "computer_name"
        }, {
            "label": "<?php echo _(" PC's MAC Address");?>:",
            "name": "computer_mac"
        }, {
            "label": "<?php echo _("PC's IP Address");?>:",
            "name": "computer_ip"
        }, {
            "label": "<?php echo _("PC's Location");?>:",
            "name": "computer_room",
            "type": "select",
            "ipOpts":loader()
        }, {
            "type": "hidden",
            "label": "<?php echo _("Computer type");?>:",
            "name": "computer_hardware"
        },  {
            "type": "select",
            "ipOpts": [
                    { "label": "<?php echo _("Visible");?>", "value": "yes" },
                    { "label": "<?php echo _("Hidden");?>", "value": "no" }
                      ],
            "label": "<?php echo _("Computer visible");?>:",
            "name": "computer_visible"
        }
				]
    } );
//---------------------------------------------------- END DATATABELE EDITOR
//---------------------------------------------------- DATATABLE START
    var <?php echo $table_name; ?> = $('<?php echo $domTable; ?>');
    <?php echo $table_name; ?>.dataTable({
        "sDom": "<'dt-top-row'Tlf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
        "sPaginationType": "bootstrap",
        "iDisplayLength": 10,
        "aLengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]],
        "oLanguage": {
                "sUrl": "./locale/datatable_<?php echo $lang; ?>.txt"
                },
        "aoColumns":[
		      {
		        "mData": "computer_name"
		      },
		      {
		        "mData": "computer_mac"
		      },
		      {
		        "mData": "computer_ip"
		      },
		      {
		        "mData": "computer_room"
		      },
		      {
		        "mData": "computer_hardware"
		      },
			  {
		        "mData": "computer_visible",
		        "mRender": function ( data, type, full ) {
			        if (data=="yes")	{
						return '<span class="badge bg-color-greenLight ">'+data+'</span>';
								}
						return '<span class="badge">'+data+'</span>';
				},
		      },
		      ],

        "oTableTools" : {
        			"sRowSelect": "single",
       				"aButtons" : [
       				{"sExtends": "editor_create"	,"sButtonClass": "btn btn-success", "editor": editor},
					{"sExtends": "editor_edit"		,"sButtonClass": "btn btn-warning", "editor": editor},
					{"sExtends": "text"			,"sButtonClass": "btn btn-danger","sButtonText": "<?php echo _("Reconfigure system");?>",
												"fnClick": function (nButton, oConfig, oFlash) {

                                                    reconfigure_mac();
                                                }

                                        },
					"copy", "print",
					{
					"sExtends" : "collection",
					"sButtonText" : 'Save <span class="caret" />',
					"aButtons" : ["csv", "xls", "pdf"]
					},
					],
				"sSwfPath" : "js/plugin/datatables/media/swf/copy_csv_xls_pdf.swf"
			},
        bProcessing    : true,
        bAutoWidth     : false,
        "sAjaxSource": "<?php echo $ajaxUrl; ?>",

    });
//---------------------------------------------------- END DATATABELE DEVICE

});
});
}
function reconfigure_mac()    {

                var url = './php/controller.php?what=reconfigure_mac';

                var tmp1 = $.ajax({
                    url:url,
                    async:true
                });



                                        };
</script>
</body>
</html>
