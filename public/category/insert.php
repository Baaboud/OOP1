<?php
require_once("category.php");
if (isset($_POST['add-category'])) {
    $category = new Category();
    $category->add($_POST);
} else {
    header("location:index.php"); // if not requst redirct to index.php
}