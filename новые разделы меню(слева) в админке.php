<?php
// Products for posts
add_action('admin_menu', 'my_admin_menu');

function my_admin_menu() {
add_menu_page('Setting products', 'Products', 1, 'ProductsController.php', 'print_page_function');
	function print_page_function() {
			require_once('modules/products/ProductsController.php');
	}
}
add_action('admin_menu', 'my_admin_menu');


// Rewievs for posts
function my_admin_menu_reviews() {
add_menu_page('Setting reviews', 'Reviews', 1, 'ReviewsController.php', 'print_page_function2');
	function print_page_function2() {
			require_once('modules/reviews/ReviewsController.php');
	}
}
add_action('admin_menu', 'my_admin_menu_reviews');
