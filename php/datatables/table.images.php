<?php

/*
 * Editor server script for DB table images
 * Automatically generated by http://editor.datatables.net/generator
 */

// DataTables PHP library
include( "lib/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Join,
	DataTables\Editor\Validate;


// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'images' )
	->fields(
		Field::inst( 'image_name' ),
		Field::inst( 'part' ),
		Field::inst( 'os' ),
		Field::inst( 'hw_type' ),
		Field::inst( 'image_type' ),
		Field::inst( 'image_size' ),
		Field::inst( 'date' )
			->getFormatter( 'Format::date_sql_to_format', 'd.m.Y' )
			)
	->process( $_POST )
	->json();

