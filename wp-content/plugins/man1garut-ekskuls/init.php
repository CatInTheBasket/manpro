<?php
/*
Plugin Name: ekskuls
Description:
Version: 1
Author: man1garut.com
Author URI: http://man1garut.com
*/
// function to create the DB / Options / Defaults					
function ss_options_install() {

    global $wpdb;

    $table_name = $wpdb->prefix . "ekskul";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
            `id` varchar(3) CHARACTER SET utf8 NOT NULL,
            `name` varchar(50) CHARACTER SET utf8 NOT NULL,
            PRIMARY KEY (`id`)
          ) $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

// run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'ss_options_install');

//menu items
add_action('admin_menu','man1garut_ekskuls_modifymenu');
function man1garut_ekskuls_modifymenu() {
	
	//this is the main item for the menu
	add_menu_page('ekskuls', //page title
	'ekskuls', //menu title
	'manage_options', //capabilities
	'man1garut_ekskuls_list', //menu slug
	'man1garut_ekskuls_list' //function
	);
	
	//this is a submenu
	add_submenu_page('man1garut_ekskuls_list', //parent slug
	'Add New ekskul', //page title
	'Add New', //menu title
	'manage_options', //capability
	'man1garut_ekskuls_create', //menu slug
	'man1garut_ekskuls_create'); //function
	
	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
	'Update ekskul', //page title
	'Update', //menu title
	'manage_options', //capability
	'man1garut_ekskuls_update', //menu slug
	'man1garut_ekskuls_update'); //function
	
	add_menu_page('pendaftaran', //page title
	'Pendaftaran', //menu title
	'manage_options', //capabilities
	'man1garut_pendaftaran_list', //menu slug
	'man1garut_pendaftaran_list' //function
	);
	
	
	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
	'Update Ekskul', //page title
	'Update', //menu title
	'manage_options', //capability
	'man1garut_pendaftaran_update', //menu slug
	'man1garut_pendaftaran_update'); //function
}

define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'ekskuls-list.php');
require_once(ROOTDIR . 'ekskuls-create.php');
require_once(ROOTDIR . 'ekskuls-update.php');
require_once(ROOTDIR . 'pendaftaran-list.php');
require_once(ROOTDIR . 'pendaftaran-create.php');
require_once(ROOTDIR . 'pendaftaran-update.php');
