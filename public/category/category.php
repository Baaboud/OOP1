<?php
require_once("../connection.php");
class Category
{
    private $con;

    function __construct()
    {
        $this->con = mysqli_connect("localhost", "root", "", "crud"); // connection to database
        if (!$this->con) {
            die(" Connection Error ");
        } // check connection
    }

    function selectAll()
    {
        $query = "select * from category  "; // Query to select all data about category table
        $result = mysqli_query($this->con, $query);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

    // This  Add Products
    function add($data)
    {
        if (empty($data['cate-name']) || empty($data['cate-description'])) // For make sure that post value is not empty
        {
            echo " Please Fill in the Blanks";
        } else {
            $cateName = $data['cate-name'];
            $cateDes = $data['cate-description'];
            $query = " insert into category (name,description) values('$cateName','$cateDes')"; //Query for insert values to product table
            $result = mysqli_query($this->con, $query);

            if ($result) //check query 
            {
                header("location:index.php"); // If true redirct to view.php
            } else {
                echo '  Please Check Your Query '; // if false message 
            }
        }
    }

    function update($data, $id)
    {
        $cateName = $data['cate-name'];
        $cateDes = $data['cate-description'];
        $query = " update category set name = '" . $cateName . "', description='" . $cateDes . "' where id='" . $id . "'"; // this query for update table category
        $result = mysqli_query($this->con, $query);
        if ($result) //check query 
        {
            header("location:index.php"); // If ture redirct to view.php
        } else {
            echo ' Please Check Your Query '; // if false will print error message
        }
    }

    function delete($id)
    {
        $query = " delete from category where id = '" . $id . "'"; // this query for delete record from table category
        $result = mysqli_query($this->con, $query);
        if ($result) {
            header("location:index.php");
        } else {
            echo ' Please Check Your Query ';
        }
    }
}
