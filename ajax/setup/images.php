<?php
  		include('../../php/language.php');
  		$domTable = "#images_table";
        $ajaxUrl = "./php/datatables/table.images.php";
        $table_name = "images_table";
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
					<h2><?php echo _('Image Management');?></h2>

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
						<table id="images_table" class="table table-striped table-hover">
							<thead>
									<tr>
										<th data-class="expand"><?php echo _("Image name");?></th>
										<th data-hide="phone,"><?php echo _("Harddrive");?></th>
										<th data-hide="phone"><?php echo _("Operating system");?></th>
										<th data-hide="phone"><?php echo _("Hardware");?></th>
										<th data-hide="phone"><?php echo _("Image type");?></th>
										<th data-hide="phone"><?php echo _("Image size");?></th>
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
//---------------------------------------------------- DATATABELE EDITOR
	editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": "<?php echo $ajaxUrl; ?>",
        "domTable": "<?php echo $domTable; ?>",
        "fields": [ {
                "type": "hidden",
				"name": "image_name"
            }, {
                "type": "hidden",
				"name": "part"
            }, {
               "type": "hidden",
			   "name": "os"
            }, {
                "type": "hidden",
				"name": "hw_type"
            },
            {
                "type": "hidden",
				"name": "image_size"
            },
            {
            "type": "select",
            "ipOpts": [
                    { "label": "<?php echo _('Normal');?>", "value": "normal" },
                    { "label": "<?php echo _('Old Version');?>", "value": "old" },
					{ "label": "<?php echo _('Privat');?>", "value": "privat" },
					{ "label": "<?php echo _('Clean OS');?>", "value": "clean" }
                      ],
            "label": "<?php echo _('Image type');?>:",
            "name": "image_type"
			},
			{
            "type": "hidden",
            "name": "date"
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
				"mData": "image_name"
				},
				{
				"mData": "part"
				},
				{
				"mData": "os",
				"mRender": function ( data, type, full ) {
				return '<img height="40" src="img/pics/os/'+data+'.png">';
				},
				},
				{
				"mData": "hw_type"
				},
				{
				"mData": "image_type",
				"mRender": function ( data, type, full ) {
				  return '<span class="label label-sm label-'+data+'">'+data+'</span>';
				},
				},
				{
				"mData": "image_size",
				"mRender": function ( data, type, full ) {
				  return '<div class="progress progress-lg"><div class="progress-bar bg-color-blue" role="progressbar" style="width: '+data+'%"></div><p class="text-center">'+data+'GB</p></div>';
				},
				},
				{
				"mData": "date"
				}
				],
        "oTableTools" : {
        			"sRowSelect": "single",
       				"aButtons" : [
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
