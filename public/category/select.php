<?php
require_once("category.php");
// Update category
if (isset($_POST['add-category'])) {
    $category = new Category();
    $category->update($_POST,$_GET['ID']);
} else {
    header("location:index.php"); // if not requst redirct to index.php
}
