<?php
/**
* The Seon_Admin_Dashboard base class
*/

if( !defined( 'ABSPATH' ) )
	exit; 

class Seon_Admin_Dashboard extends Seon_Admin_Page {

	public function __construct() {
		$this->id = 'pxlart';
		$this->page_title = seon()->get_name();
		$this->menu_title = seon()->get_name();
		$this->position = '50';

		parent::__construct();
	}

	public function display() {
		include_once( get_template_directory() . '/inc/admin/views/admin-dashboard.php' );
	}
 
	public function save() {

	}
}
new Seon_Admin_Dashboard;
