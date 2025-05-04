<?php
$conn = mysqli_connect("localhost", "root", "", "the shop");
error_reporting(E_ALL); ini_set('display_errors', 1);

// Fetch all products
$products = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");

// If product clicked
$selected_product = null;
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $req = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
    $selected_product = mysqli_fetch_assoc($req);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Main Page - LUGX Store</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    .container { display: flex; }
    .left { width: 50%; padding: 20px; }
    .right { width: 50%; padding: 20px; border-left: 2px solid #ccc; }
    .card { border: 1px solid #ccc; margin-bottom: 10px; padding: 10px; text-align: center; }
    .card img { width: 100px; height: auto; }
  </style>
</head>
<body>

<!-- HEADER -->
<div class="header">
  <img class="logo" src="images/logo.png" />
  <div class="header-links">
    <a href="mainpage.php">Home</a>
    <a href="#">Products</a>
    <a href="#">Contact</a>
    <a href="#">About</a>
    <button class="btn"><a href="login.html">Login</a></button>
  </div>
</div>

<!-- LANDING PAGE -->
<div class="landing-page">
  <div class="landing-page-left-section">
    <span>Welcome To Lugx Gaming</span>
    <h1>Lugx Gaming Store</h1>
    <p>Find the best PC and console games here!</p>
    <div class="landing-page-search">
      <input placeholder="Start typing..." />
      <button class="btn">Search</button>
    </div>
  </div>
  <div class="landing-page-image-container">
    <img src="images/backlevl.jpg" />
  </div>
</div>

<!-- MAIN CONTENT: 2 Columns -->
<div class="container">
  <!-- LEFT SIDE: Product List -->
  <div class="left">
    <h2>Available Products</h2>
    <?php while($row = mysqli_fetch_assoc($products)) { ?>
      <a href="mainpage.php?id=<?= $row['id'] ?>" style="text-decoration:none; color:inherit;">
        <div class="card">
          <img src="<?= $row['pr_img'] ?>" alt="Product Image">
          <h3><?= $row['pr_name'] ?></h3>
          <p>Price: $<?= $row['pr_price'] ?></p>
        </div>
      </a>
    <?php } ?>
  </div>

  <!-- RIGHT SIDE: Product Details -->
  <div class="right">
    <?php if ($selected_product) { ?>
      <h2><?= $selected_product['pr_name'] ?></h2>
      <img src="<?= $selected_product['pr_img'] ?>" width="200" /><br><br>
      <strong>Price:</strong> $<?= $selected_product['pr_price'] ?><br><br>
      <strong>Category ID:</strong> <?= $selected_product['pr_cate'] ?><br><br>
      <strong>Description:</strong><br>
      <p><?= nl2br(htmlspecialchars($selected_product['pr_info'])) ?></p>
    <?php } else { ?>
      <h2>Select a product to view details</h2>
    <?php } ?>
  </div>
</div>

</body>
</html>
