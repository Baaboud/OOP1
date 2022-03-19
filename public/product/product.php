<?php
require_once("../connection.php");
class Product
{
    private $con;

    function __construct()
    {
        $this->con = mysqli_connect("localhost", "root", "", "crud"); // connection to database
        if (!$this->con) {
            die(" Connection Error ");
        } // check connection
    }

    // This  Add Products
    function add($data)
    {
        if (empty($data['pro-name']) || empty($data['pro-des']) || empty($data['price']) || empty($data['category'])) // For make sure that post value is not empty
        {
            echo " Please Fill in the Blanks";
        } else {
            $proName = $data['pro-name'];
            $proDes = $data['pro-des'];
            $proPrice = $data['price'];
            $proGata = $data['category'];
            $proImage = $_FILES['image']['name'];

            $file_path = "../upload/";  // Path that will storge the image
            $filePart = explode(".", $proImage);
            $ex = end($filePart);
            $file_ex = ["png", "jpg"]; // extintion of images
            if (in_array($ex, $file_ex)) {
                $newName = time() . "." . $ex; // for change name of image
                move_uploaded_file($_FILES["image"]["tmp_name"], $file_path . $newName);

                $query = " insert into product (name,price,description,img,category) values('$proName','$proPrice','$proDes','$newName','$proGata')"; //Query for insert values to product table
                $result = mysqli_query($this->con, $query);

                if ($result) //check query 
                {
                    header("location:index.php"); // If true redirct to view.php
                } else {
                    echo '  Please Check Your Query '; // if false message 
                }
            }
        }
    }

    function update($data, $id,$img)
    {
        $proID = $id;
        $proName = $data['pro-name'];
        $proDes = $data['pro-des'];
        $price = $data['price'];
        $gata = $data['category'];

        $query = "update product set name ='" . $proName . "', description='" . $proDes . "', price ='" . $price . "', img ='" . $img . "', category ='" . $gata . "' where id='" . $proID . "'"; //this query for update table products
        $result = mysqli_query($this->con, $query);

        if ($result) {
            header("location:index.php");
        } else {
            echo ' Please Check Your Query ';
        }
    }

    function delete($id)
    {
        $proId = $id;
        $query = " delete from product where id = '" . $proId . "'"; // this query for delete record from table product
        $result = mysqli_query($this->con, $query);
        if ($result) {
            header("location:index.php");
        } else {
            echo ' Please Check Your Query ';
        }
    }
}
