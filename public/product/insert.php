<?php
require_once("product.php");
// This  insert for products 

if (isset($_POST['pro'])) {
    $product = new Product();
    $product->add($_POST);
} else {
    header("location:index.php"); // if not requst redirct to index.php
}
