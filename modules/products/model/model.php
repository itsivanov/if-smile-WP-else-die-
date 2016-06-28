<?php

/*
*	Filter data
*/
function dataFilter($val)
{
		return htmlspecialchars(trim($val));
}


/*
*	Add product
*/
function addProduct($image, $title, $description, $link_cart, $link_compare, $id_posts)
{
		global $wpdb;
		$wpdb->query("INSERT INTO products (`title`, `description`, `image`, `link_cart`, `link_compare`) " .
		"VALUES ('$title', '$description', '$image', '$link_cart', '$link_compare')");

		// Select last id_product
		$last_id = $wpdb->get_results("SELECT MAX(id)
																	 FROM products", ARRAY_A);

		// Connection between product and post
		$last_id = $last_id[0]['MAX(id)'];
		$wpdb->query("INSERT INTO products_relations_posts (`id_product`, `id_posts`) " .
		"VALUES ('$last_id', '$id_posts')");
}


 /*
 *	Delete product
 */
function deleteProduct($id)
{
		global $wpdb;
		$id = (int)$id;

		$wpdb->query("DELETE
									FROM products
									WHERE id = '$id'");

		$wpdb->query("DELETE
									FROM products_relations_posts
									WHERE id_product = '$id'");
}


 /*
 *	Upload file in server
 */
 function upload_file($file){
 			copy($file['tmp_name'],  $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/natural/images/products/' . $file['name']);
 }


 /*
 *	Select name posts
 */
 function itemsForSelect()
 {
		 	global $wpdb;
		 	$table_posts = $wpdb->get_blog_prefix() . 'posts';
		 	return $wpdb->get_results("SELECT id, post_title
		                              FROM $table_posts
		                              WHERE post_type = 'post'
		                              AND post_name <> ''", ARRAY_A);
 }


 /*
 *	View product
 */
 function viewProduct()
 {
	 		global $wpdb;
	 		$table_posts = $wpdb->get_blog_prefix() . 'posts';
	 		$products = $wpdb->get_results("SELECT *
	 		                                FROM products", ARRAY_A);

	 		for($i = 0; $i < count($products); $i++)
	 		{
	 				// Select id_posts for this зкщвгсе
	 				$id_product = $products[$i]['id'];
	 				$id_posts = $wpdb->get_results("SELECT id_posts
	 																					 FROM products_relations_posts
	 																					 WHERE id_product = '$id_product'", ARRAY_A);
	 		    $id_posts = $id_posts[0]['id_posts'];

	 				// Title posts for product
	 				$posts_title = $wpdb->get_results("SELECT post_title
	 																					 FROM $table_posts
	 																					 WHERE id = '$id_posts'
	 																					 AND post_name <> ''", ARRAY_A);

	 				$products[$i]['posts_title'] = $posts_title[0]['post_title'];
	 		}

	 		return $products;
 }


 /*
 *	Select data for edit
 */
 function selectDataForEdit($id)
 {
			 global $wpdb;
			 $table_posts = $wpdb->get_blog_prefix() . 'posts';

			 $id = (int)$id;
			 $edit = $wpdb->get_results("SELECT *
																	 FROM products
																	 WHERE id = '$id'", ARRAY_A);

			 $id_product = $edit[0]['id'];
			 $id_post = $wpdb->get_results("SELECT id_posts
																		  FROM products_relations_posts
																		  WHERE id_product = '$id_product'", ARRAY_A);

			 $id_post = $id_post[0]['id_posts'];
			 $name_post = $wpdb->get_results("SELECT post_title
																			  FROM $table_posts
																			  WHERE id = '$id_post'
																				AND post_name <> ''", ARRAY_A);

			$edit[0]['id_posts'] = $id_post;
			$edit[0]['name_posts'] = $name_post[0]['post_title'];

		  return $edit;
 }


 /*
 *	Edit product
 */
 function editProduct($id, $image, $title, $description, $link_cart, $link_compare, $id_posts)
 {
 			 global $wpdb;

			 $query = "UPDATE products
										 SET `title` = '$title',
												 `description` = '$description',
												 `link_cart` = '$link_cart',
												 `link_compare` = '$link_compare'";

			 if(!empty($image)){
				 	$query .= ",`image` = '$image'";
			 }

			 $query .= "WHERE id = '$id'";

			 $wpdb->query($query);

			 $wpdb->query("UPDATE products_relations_posts
										 SET `id_posts` = '$id_posts'
										 WHERE id_product = '$id'");
 }


 /*
 *	Redirect
 */
 function redirect()
 {
		 $redirect = 'http://' . $_SERVER['SERVER_NAME'] . '/wp-admin/admin.php?page=ProductsController.php';
		 header ('Location: $redirect');
 }
