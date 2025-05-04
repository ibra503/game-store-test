<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="prd.css">
</head>
<body>

<div class="container">
    <h1>Add Product</h1>

    <form action="" method="post" enctype="multipart/form-data">
        Name: <input type="text" name="name" required><br><br>
        Price: <input type="text" name="price" required><br><br>
        Image: <input type="file" name="img" required><br><br>
        Category: <input type="text" name="cate" required><br><br>
        Info: <input type="text" name="info" required><br><br>

        <input type="submit" name="add" value="Add Product">
        <input type="reset" value="Clear">
    </form>
</div>

</body>
</html>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = mysqli_connect("localhost", "root", "", "the shop");

if(isset($_POST['add'])){

    $pr_name = $_POST["name"];
    $pr_price = $_POST["price"];
    $pr_cate = $_POST["cate"];
    $pr_info = $_POST["info"];

    // Image Upload Code
    $target_dir = "uploads/"; // Folder where images will be stored
    $target_file = $target_dir . basename($_FILES["img"]["name"]);

    // Move Image to Folder
    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

    // Insert Query
    $req = "INSERT INTO products(pr_name, pr_price, pr_img, pr_cate, pr_info) 
            VALUES('$pr_name', '$pr_price', '$target_file', '$pr_cate', '$pr_info')";

    $result = mysqli_query($conn, $req);

    if($result){
        echo "<h3 style='text-align:center;'>Product Added Successfully!</h3>";
    }else{
        echo "<h3 style='text-align:center;'>Error Adding Product!</h3>";
    }
}
?>
