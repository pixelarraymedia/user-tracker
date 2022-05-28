<?php
/*
 * Plugin Name: Custom plugin for Wordpress
 * Plugin URI: 
 * Description: Custom post types and custom taxonomies
 */


function loadMyCustoms()
{
	
	register_post_type('songs',
	array(
		'labels' =>array (
		'name' => "Songs",
		'all_items' => "all Songs",
		'add_new' => "add a new song"
		
	),
	'singular_label' => 'song singular',
	'public' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'has_archive' => true,
	'menu_position' => 4,
	'show_in_menu' => true,
	'show_in_admin_bar' => true,
	'rewrite' => true,
	'taxonomies' => array('category','post_tag')
	)
	
);


register_taxonomy('free_songs','post', array(
'hierachical' => false,
'labels' => array(
'name' => 'Keywords',
'singular_name' => 'Free songs',
'search_items' => 'searching free songs',
'popular_items' => 'Popular Free songs',
'add_new_item' => 'add a new free song'

),
'query_var'=>true,
'rewrite'=> true
)
};

add_action('init','loadMyCustoms' 0);



	
}




?>