<?php
/*
Plugin name: MU Blog Id's
Plugin URI: 
Version: 1.0
Author: Edward Richards (erichie)
Description: Displays the Site ID on the Network Sites page
Text Domain: mu-blog-ids
GitHub Plugin URI: https://github.com/erichie/mu-blog-ids
*/

class Blog_ID {

	public function __construct() {
		add_filter('wpmu_blogs_columns', array($this, 'add_blog_id_column'));
		add_action('manage_sites_custom_column', array($this, 'show_blog_ids'), 10, 2);
		add_action('admin_head', array($this, 'adjust_column_width'));
	}

	public function add_blog_id_column($columns) {
		$split1 = array_slice($columns, 0, 1);
		$split2 = array_slice($columns, 1);
		$columns = $split1 + array('blog_id' => 'Site ID') + $split2;
		return $columns;
	}

	public function show_blog_ids($column_name, $blog_id) {
		if ($column_name == 'blog_id') {
			echo $blog_id;
		}
	}

	public function adjust_column_width() {
	    echo '<style type="text/css">';
	    echo '.column-blog_id { width: 5% }';
	    echo '</style>';
	}

}

$show_ids = new Blog_ID();

?>