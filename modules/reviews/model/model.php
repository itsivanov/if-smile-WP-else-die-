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
function addReview($name, $date_review, $review, $image)
{
		global $wpdb;
		$wpdb->query("INSERT INTO reviews (`name`, `date_review`, `review`, `image`) " .
		"VALUES ('$name', '$date_review', '$review', '$image')");

}


 /*
 *	Delete product
 */
function deleteReview($id)
{
		global $wpdb;
		$id = (int)$id;

		$wpdb->query("DELETE
									FROM reviews
									WHERE id = '$id'");

}


 /*
 *	Upload file in server
 */
 function upload_file($file){
 			copy($file['tmp_name'],  $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/natural/images/reviews/' . $file['name']);
 }



 /*
 *	Select data for edit
 */
 function selectDataForEdit($id)
 {
			 global $wpdb;

			 $id = (int)$id;
			 $edit = $wpdb->get_results("SELECT *
																	 FROM reviews
																	 WHERE id = '$id'", ARRAY_A);

		  return $edit;
 }


 /*
 *	View product
 */
 function viewReview()
 {
 		 global $wpdb;
 		 $reviews = $wpdb->get_results("SELECT *
 																		 FROM reviews", ARRAY_A);

 		 return $reviews;
 }


 /*
 *	Edit product
 */
 function editReview($id, $name, $date_review, $review, $image)
 {
 			 global $wpdb;

			 $query = "UPDATE reviews
										 SET `name` = '$name',
												 `date_review` = '$date_review',
												 `review` = '$review'";

			 if(!empty($image)){
				 	$query .= ",`image` = '$image'";
			 }

			 $query .= "WHERE id = '$id'";

			 $wpdb->query($query);
 }


 /*
 *	Redirect
 */
 function redirect()
 {
		 $redirect = 'http://' . $_SERVER['SERVER_NAME'] . '/wp-admin/admin.php?page=ReviewsController.php';
		 header ('Location: $redirect');
 }
