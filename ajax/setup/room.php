<?php
  		include('../../php/language.php');
  		$domTable = "#rooms_table";
        $ajaxUrl = "./php/datatables/table.rooms.php";
        $table_name = "rooms_table";
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
					<h2><?php echo _('Room Management');?></h2>

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
						<table id="rooms_table" class="table table-striped table-hover">
							<thead>
									<tr>
										<th data-class="expand"><?php echo _('Room name');?></th>
										<th data-hide="phone"><?php echo _('How many PC`s');?></th>
										<th data-hide="phone"><?php echo _('Room add date');?></th>
										<th data-hide="phone"><?php echo _('Room admin');?></th>
										<th data-hide="phone"><?php echo _('Ethernet port');?></th>
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

function room_admin(){
test.splice(0,1);
$.ajax({
  url: './php/controller.php?what=get_user',
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
                "label": "<?php echo _('Room name');?>:",
				"name": "room_name"
            }, {
                "label": "<?php echo _('How many PC`s');?>:",
				"name": "count_room_pc"
            }, {
               "type": "hidden",
			   "label": "<?php echo _('Room add date');?>:",
			   "name": "add_room_date"
            }, {
                "label": "<?php echo _('Room admin');?>:",
				"type": "select",
				"ipOpts":room_admin()
            },
            {
                "label": "<?php echo _('Ethernet port');?>:",
				"name": "iface"
            }
        ]
    } );
//---------------------------------------------------- END DATATABELE EDITOR
//---------------------------------------------------- DATATABLE START
    var <?php echo $table_name; ?> = $('<?php echo $domTable; ?>');
    <?php echo $table_name; ?>.dataTable({
        "sDom": "<'dt-top-row'Tlf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
        "sPaginationType": "bootstrap",
        "iDisplayLength": 5,
        "aLengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]],
        "oLanguage": {
                "sUrl": "./locale/datatable_<?php echo $lang; ?>.txt"
                },
                "aoColumns": [
				      {
				        "mData": "room_name"
				      },
				      {
				        "mData": "count_room_pc"
				      },
				      {
				        "mData": "add_room_date"
				      },
				      {
				        "mData": "room_admin"
				      },
				      {
				        "mData": "iface",
				        "mRender": function ( data, type, full ) {
						return '<img height="30" src="./img/pics/pic_eth.png"/>&nbsp;'+data+'';
					  },
				      }
				     ],
        "oTableTools" : {
        			"sRowSelect": "single",
       				"aButtons" : [
       				{"sExtends": "editor_create"	,"sButtonClass": "btn btn-success", "editor": editor},
					{"sExtends": "editor_edit"		,"sButtonClass": "btn btn-warning", "editor": editor},
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
</script>
</body>
</html>
