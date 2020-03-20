<?php session_start();
    include "../db.php";

    include_once "cloudinary/Cloudinary.php";
    include_once "cloudinary/Uploader.php";
    include_once "cloudinary/Api.php";
    Cloudinary::config(array("cloud_name" => "snapshop", "api_key" => "276611561975319", "api_secret" => "BfcyNjEthQVl4TKLBBHQQBl1M0E"));

    if($_POST['action'] == 'update_prod'){
        $title =$_POST['title'];
        $id = $_POST['id'];
        $price = $_POST['price'];
        $img = $_POST['img'];
        $category = $_POST['category'];
        $sub = $_POST['sub'];

        $cloudUpload = \Cloudinary\Uploader::upload($img);
        $img_url = $cloudUpload['url'];

        $query = "UPDATE products SET p_title = '{$title}', p_price = '{$price}', p_img = '{$img_url}', p_cat_id = '{$category}', p_cat = '{$sub}' WHERE p_id  = {$id}";
        $edit_post = mysqli_query($conn, $query);
        if(!$edit_post) echo mysqli_error($conn);
        else echo 1;
    }

    if($_POST['action'] == 'add_prod'){
        $title =$_POST['title'];
        $price = $_POST['price'];
        $img = $_POST['img'];
        $category = $_POST['category'];
        $sub = $_POST['sub'];

        $cloudUpload = \Cloudinary\Uploader::upload($img);
        $img_url = $cloudUpload['url'];

        $query = "INSERT INTO products(p_title, p_price, p_img, p_cat, p_cat_id) VALUES('$title', '$price', '$img_url', '$sub', '$category')";
        $add_product = mysqli_query($conn, $query);
        if(!$add_product) echo mysqli_error($conn);
        else echo 1;
    }

    if($_POST['action'] == 'getsubcats'){
        $category = $_POST['category'];
        $query = "SELECT * FROM categories WHERE cat_id = '$category'";
        $subcats = mysqli_fetch_assoc(mysqli_query($conn, $query))['cat_sub'];
        echo $subcats;
    }
?>