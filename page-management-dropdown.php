<?php

/*
Plugin Name: Page Management Dropdown
Plugin URI: http://jaschaephraim.com/wordpress/
Description: Adds a dropdown admin menu containing links to edit each of your pages. Must be used in conjunction with any dropdown admin menu plugin.
Version: 1.0
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

function jeml_page_management_dropdown() {
	global $menu, $submenu;
	$menu_position = 11;
	
	while (array_key_exists($menu_position, $menu)) {
		$menu_position++;
	}
	
	$menu[$menu_position] = array(__('Pages'), 'edit_pages', 'edit-pages.php');
	$submenu['edit-pages.php'][0] = array(__('Manage Pages'), 'edit_pages', 'edit-pages.php');
	$submenu['edit-pages.php'][1] = array(__('Write a New Page'), 'edit_pages', 'page-new.php');
	
	$page_array = get_pages('sort_column=menu_order');
	
	foreach ($page_array as $i => $page) {
		$submenu['edit-pages.php'][$i+2] = array($page->post_title, 'edit_pages', 'page.php?action=edit&post='.$page->ID);
	}
}

?>
