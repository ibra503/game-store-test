```
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title><?= htmlspecialchars($row['pr_name']) ?> - Product Details</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    body {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .product-container {
      width: 80%;
      margin: 50px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-family: Arial, sans-serif;
      display: flex;
      flex-direction: row;
    }
    .product-container img {
      max-width: 300px;
      display: block;
      margin-right: 20px; /* Space between image and text */
    }
    .product-info h1 {
      margin: 0;
      color: #333;
    }
    .product-info p {
      font-size: 16px;
      color: #555;
    }
    .back-link {
      display: inline-block;
      margin-top: 20px;
      text-decoration: none;
      color: #007bff;
    }
    .products-list {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      width: 50%; /* Adjust width as needed */
    }
    .card {
      margin: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      overflow: hidden;
      width: 150px; /* Adjust width as needed */
    }
    .card img {
      max-width: 100%;
    }
  </style>
</head>
<body>
  <?php
  if (isset($_GET['id'])) {
    $conn = mysqli_connect("localhost", "root", "", "the shop");
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Check if a product ID is sent via URL
    $id = intval($_GET['id']); // Make sure it's an integer for safety
    $req = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
    $row = mysqli_fetch_assoc($req);
  }
  ?>

  <div class="header">
    <img class="logo" src="images/logo.png" />
    <div class="header-links">
      <a href="mainpage.php">Home</a>
      <a href="#">Products</a>
      <a href="#">Contact</a>
      <a href="#">About</a>
      <button class="btn"><a href="login.html">Logout</a></button>
    </div>
  </div>

  <div class="landing-page">
    <div class="landing-page-left-section">
      <span>Welcome To Lugx Gaming</span>
      <h1>Lugx Gaming Store</h1>
      <p>LUGX Gaming Store is the best place to find PC and console games at affordable prices.</p>
      <div class="landing-page-search">
        <input placeholder="Start typing..." />
        <button class="btn">Search</button>
      </div>
    </div>
    <div class="landing-page-image-container">
      <img src="images/backlevl.jpg" />
    </div>
  </div>

  <h2 style="text-align:center;">Latest Products</h2>
  <div class="product-container">
    <div class="products-list">
      <?php
      $conn = mysqli_connect("localhost", "root", "", "the shop");
      $req = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC LIMIT 6"); // Show latest 6 products
      while($row = mysqli_fetch_assoc($req)) {
        echo '<a href="user.php?id='.$row["id"].'">';
        echo '<div class="card">';
        echo '<img class="thumb" src="'.$row['pr_img'].'">';
        echo '<div class="card-info">';
        echo '<div class="card-name">';
        echo '<p>Category ID: '.htmlspecialchars($row['pr_cate']).'</p>';
        echo '<h3>'.htmlspecialchars($row['pr_name']).'</h3>';
        echo '</div>';
        echo '<img src="images/online-shopping.png" />';
        echo '</div></div></a>';
      }
      ?>
    </div>

    <?php
    if (isset($_GET['id'])) {
      echo '<div class="product-info">';
      echo '<img src="'.htmlspecialchars($row['pr_img
```
