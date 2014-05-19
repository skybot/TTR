<?php
  		include('../../php/language.php');
  		$domTable = "#hardware_table";
        $ajaxUrl = "./php/datatables/table.hardware.php";
        $table_name = "hardware_table";
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
					<h2><?php echo _("Hardware management");?></h2>

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
						<table id="hardware_table" class="table table-striped table-hover">
							<thead>
									<tr>
										<th data-class="expand">	<?php echo _("Computer type");?></th>
					                    <th data-hide="phone">		<?php echo _("Computer producer");?></th>
					                    <th data-hide="phone">		<?php echo _("Computer memory");?></th>
					                    <th data-hide="phone">		<?php echo _("Computer harddisk");?></th>
					                    <th data-hide="phone">		<?php echo _("Computer date add");?></th>
					                    <th data-hide="phone">		<?php echo _("Computer picture");?></th>
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
                "label": "<?php echo _("Computer type");?>:",
				"name": "hardware_name"
            }, {
                "label": "<?php echo _("Computer Producer");?>:",
				"name": "hardware_producer"
            }, {
                "label": "<?php echo _("Computer memory");?>:",
				"name": "hardware_ram",
				"type": "select",
				"ipOpts": [
                    { "label": "6 GB", "value": "6" },
                    { "label": "8 GB", "value": "8" },
                    { "label": "12 GB", "value": "12" },
                    { "label": "16 GB", "value": "16" }

                      ]
            }, {
                "label": "<?php echo _("Computer harddisk");?>:",
				"name": "hardware_disk",
				"type": "select",
				"ipOpts": [
                    { "label": "500 GB"	, "value": "500" },
                    { "label": "1 TB"	, "value": "1000" },
                    { "label": "2.5 TB"	, "value": "2500" },
                    { "label": "3 TB"	, "value": "3000" },
                    { "label": "3.5 TB"	, "value": "3500" }

                      ]
            },
            {
                "type": "hidden",
				"name": "hardware_date",
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
        "mData": "hardware_name"
      },
      {
        "mData": "hardware_producer"
      },
     {
        "mData": "hardware_ram",
        "mRender": function ( data, type, full ) {
            return ''+data+' GB';
      },
      },
      {
        "mData": "hardware_disk",
        "mRender": function ( data, type, full ) {
        return ''+data+' GB';
      },
      },
      {
        "mData": "hardware_date"
      },
      {
          "mData": "hardware_pic",
          "mRender": function ( data, type, full ) {
          return '<img src="'+data+'">';
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
