<?php

/*
Plugin Name: Page Management Dropdown
Plugin URI: http://jaschaephraim.com/wordpress/
Description: Adds a link to edit each individual page to the new Pages admin menu.
Version: 2.1
Author: Jascha Ephraim
Author URI: http://jaschaephraim.com/

    Page Management Dropdown (Wordpress Plugin)
    Copyright (C) 2008 Jascha Ephraim

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/

add_action('admin_menu', 'jeml_page_management_dropdown');
add_action('admin_head', 'jeml_page_management_dropdown_change_submenu_file');

function jeml_page_management_dropdown() {
	global $submenu;
	
	$page_array = get_pages('sort_column=menu_order');
	
	foreach ($page_array as $page) {
		$submenu['edit-pages.php'][] = array($page->post_title, 'edit_pages', 'page.php?action=edit&post='.$page->ID);
	}
}

function jeml_page_management_dropdown_change_submenu_file() {
	global $submenu_file, $post_ID, $parent_file;
	if ($submenu_file == 'edit-pages.php') {
		$submenu_file = 'page.php?action=edit&post='.$post_ID;
	}
}

?>
