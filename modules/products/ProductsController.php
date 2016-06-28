<?php
require_once('model/model.php');

/*
*	Add product
*/
if(isset($_POST['add']))
{
    $image = dataFilter($_FILES['images']['name']);
    $title = dataFilter($_POST['title']);
    $description = dataFilter($_POST['description']);
    $link_cart = dataFilter($_POST['link_cart']);
    $link_compare = dataFilter($_POST['link_compare']);
    $id_posts = dataFilter($_POST['id_posts']);

    addProduct($image, $title, $description, $link_cart, $link_compare, $id_posts);

    // Upload image
    if($_FILES['images']['tmp_name'] != ''){
        upload_file($_FILES['images']);
    }

    redirect();
}


/*
*	Edit product
*/
if(isset($_POST['edit_go'])){

    $id = (int)$_POST['id'];
    $image = dataFilter($_FILES['images']['name']);
    $title = dataFilter($_POST['title']);
    $description = dataFilter($_POST['description']);
    $link_cart = dataFilter($_POST['link_cart']);
    $link_compare = dataFilter($_POST['link_compare']);
    $id_posts = dataFilter($_POST['id_posts']);

    editProduct($id, $image, $title, $description, $link_cart, $link_compare, $id_posts);

    // Upload image
    if($_FILES['images']['tmp_name'] != ''){
        upload_file($_FILES['images']);
    }

    redirect();
}


/*
*	Delete product
*/
if(isset($_POST['del'])){

    $id = $_POST['id'];
    deleteProduct($id);

    redirect();
}


/*
*	Views
*/
require_once('view/css/style.css');
$items_for_select = itemsForSelect();
$products = viewProduct();
require_once('view/add.php');

if($_POST['edit'])
{
    $edit = selectDataForEdit($_POST['id']);
    require_once('view/edit.php');
}
else
{
    require_once('view/index.php');
}
