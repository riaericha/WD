<?php
    // Setting id to empty
    $id = '';
    // IF ID is Method GET
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    require_once 'class/book.class.php';

    $obj = new Product();
    // If else statement for delete product
    if ($obj->delete($id)){
        echo 'Success';
        // header("refresh:2; url='index.php'")
    }else{
        echo "Failed";
    }