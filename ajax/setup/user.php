<?php
  		include('../../php/language.php');
  		$domTable = "#users_table";
        $ajaxUrl = "./php/datatables/table.users.php";
        $table_name = "users_table";
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
					<h2><?php echo _('User management');?></h2>

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
						<table id="users_table" class="table table-striped table-hover">
							<thead>
									<tr>
									 <th data-class="expand"><?php echo _('Username');?></th>
									 <th data-hide="phone"><?php echo _('First name');?></th>
									 <th data-hide="phone"><?php echo _('Last name');?></th>
									 <th data-hide="phone"><?php echo _('Access level');?></th>
									 <th data-hide="phone"><?php echo _('Add date');?></th>
									 <th data-hide="phone"><?php echo _('Last login');?></th>
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
//---------------------------------------------------- DATATABELE EDITOR
	editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": "<?php echo $ajaxUrl; ?>",
        "domTable": "<?php echo $domTable; ?>",
        "fields": [ {
				"label": "<?php echo _('First name');?>:",
				"name": "first_name"
				}, {
				"label": "<?php echo _('Last name');?>:",
				"name": "last_name"
				}, {
				"label": "<?php echo _('Username');?>:",
				"name": "username"
				}, {
				"type": "password",
				"label": "<?php echo _('Password');?>:",
				"name": "passwort"
				}, {
				"type": "hidden",
				"label": "<?php echo _('Add date');?>",
				"name": "add_user_date"
				}, {
				"type": "select",
				"ipOpts": 	[
                    	{ "label": "TAC - Trainer", "value": "0" },
						{ "label": "TAC - Admin", "value": "1" }
							],
				"label": "<?php echo _('Access level');?>:",
				"name": "user_access_level"
				}, {
				"type": "hidden",
				"label": "<?php echo _('Last login');?>",
				"name": "last_user_login"
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
        "mData": "username"
		},{
        "mData": "first_name"
		},{
        "mData": "last_name"
		},{
        "mData": "user_access_level"
		},{
        "mData": "add_user_date"
		},{
        "mData": "last_user_login"
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
