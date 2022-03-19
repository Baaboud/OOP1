<?php
require_once('product.php');
if(isset($_GET['DelID']))
         {
            $product = new Product();
            $product->delete($_GET['DelID']);
        }
