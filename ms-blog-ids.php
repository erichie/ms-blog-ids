<?php
/*
Plugin name: Multisite Blog Id's
Version: 1.0
Author: Edward Richards
Description: Displays the Site ID on the Network Sites page
Text Domain: mu-blog-ids
*/

class Blog_ID {

	public function __construct() {
		add_filter('wpmu_blogs_columns', array($this, 'add_blog_id_column'));
		add_action('manage_sites_custom_column', array($this, 'show_blog_ids'), 10, 2);
	}

	public function add_blog_id_column($columns) {
		$columns['blog_id'] = ('Site ID');
		return $columns;
	}

	public function show_blog_ids($column_name, $blog_id) {
		if ($column_name == 'blog_id') {
			echo $blog_id;
		}
	}

}

$show_ids = new Blog_ID();

?>