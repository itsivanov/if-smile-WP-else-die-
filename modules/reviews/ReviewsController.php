<?php
require_once('model/model.php');

/*
*	Add reviews
*/
if(isset($_POST['add']))
{
    $image = dataFilter($_FILES['images']['name']);
    $name = dataFilter($_POST['name']);
    $date_review = strtotime(dataFilter($_POST['date_review']));
    $review = dataFilter($_POST['review']);

    addReview($name, $date_review, $review, $image);

    // Upload image
    if($_FILES['images']['tmp_name'] != ''){
        upload_file($_FILES['images']);
    }

    redirect();
}


/*
*	Edit reviews
*/
if(isset($_POST['edit_go'])){

    $id = (int)$_POST['id'];
    $image = dataFilter($_FILES['images']['name']);
    $name = dataFilter($_POST['name']);
    $date_review = dataFilter($_POST['date_review']);
    $review = dataFilter($_POST['review']);

    editReview($id, $name, $date_review, $review, $image);

    // Upload image
    if($_FILES['images']['tmp_name'] != ''){
        upload_file($_FILES['images']);
    }

    redirect();
}


/*
*	Delete reviews
*/
if(isset($_POST['del'])){

    $id = $_POST['id'];
    deleteReview($id);

    redirect();
}


/*
*	Views
*/

$reviews = viewReview();
require_once('view/add.php');
require_once('view/css/style.css');
require_once('view/js/connect_js.php');


if($_POST['edit'])
{
    $edit = selectDataForEdit($_POST['id']);
    require_once('view/edit.php');
}
else
{
    require_once('view/index.php');
}
