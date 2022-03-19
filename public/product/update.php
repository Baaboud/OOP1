<?php
require_once("product.php");
//update product
if (isset($_POST['updateProduct'])) {
    $image = $_FILES['image']['name'];
    $file_path = "../upload/"; //this path for storge image
    $filePart = explode(".", $image);
    $ex = end($filePart);
    $file_ex = ["png", "jpg"];
    if (in_array($ex, $file_ex)) {
        $newName = time() . "." . $ex;
        move_uploaded_file($_FILES["image"]["tmp_name"], $file_path . $newName);
    $product = new Product();
    $product->update($_POST,$_GET['ID'],$newName);
    }
} else {
    header("location:index.php");
}
