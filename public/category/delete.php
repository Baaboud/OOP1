<?php
require_once("category.php");
if(isset($_GET['DelID']))
         {
            $product = new Category();
            $product->delete($_GET['DelID']);
        }
         ?>