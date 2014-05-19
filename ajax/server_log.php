<?php
  		include('../php/language.php');
  		$domTable = "#log_table";
        $ajaxUrl = "php/datatables/table.log.php";
        $table_name = "log_table";
?>
<section id="widget-grid" class="">
<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0" data-widget-editbutton="false">
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
					<h2><?php echo _('Images');?></h2>

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
						<table id="log_table" class="table table-striped table-hover">
							<thead>
									<tr>
										<th data-class="expand"><?php echo _("Image name");?></th>
										<th data-hide="phone,"><?php echo _("Count PC`s");?></th>
										<th data-hide="phone,"><?php echo _("Type");?></th>
										<th data-hide="phone"><?php echo _("Room");?></th>
										<th data-hide="phone"><?php echo _("User");?></th>
										<th data-hide="phone"><?php echo _("Date");?></th>
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
//---------------------------------------------------- DATATABLE START
    var <?php echo $table_name; ?> = $('<?php echo $domTable; ?>');
    <?php echo $table_name; ?>.dataTable({
    	"aaSorting": [[ 5, "desc" ]],
    	//"aoColumnDefs": [ { "sType": "html", "aTargets": [ "column-5" ] } ],
        "sDom": "<'dt-top-row'lf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
        "sPaginationType": "bootstrap",
        "iDisplayLength": 10,
        "aLengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]],
        "oLanguage": {
                "sUrl": "./locale/datatable_<?php echo $lang; ?>.txt"
                },
                "aoColumns": [

			      {
			        "mData": "log_image"
			      },
			      {
			        "mDataProp": "log_count",
			        "mRender": function ( data, type, full ) {
			        if (data>1)	{
						return '<span class="badge bg-color-orange">'+data+'</span>';
								}
						return '<span class="badge">'+data+'</span>';
				},

			      },
			      {
			        "mDataProp": "log_type",
			        "mRender": function ( data, type, full ) {
						return '<span class="label label-sm label-'+data+'">'+data+'</span>';
					},
			      },
			      {
			        "mDataProp": "log_room"
			      },
			      {
			        "mDataProp": "log_user"
			      },
			      {
			        "mDataProp": "log_date",
			        "stype": "date"
			      },

			              ],

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
