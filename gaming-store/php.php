<?php
// Database connection
if (isset($_GET['id'])) {
$conn = mysqli_connect("localhost", "root", "", "the shop");
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if a product ID is sent via URL

    $id = intval($_GET['id']); // Make sure it's an integer for safety
    $req = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
    $row = mysqli_fetch_assoc($req);

    // If no product found, show error
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title><?= htmlspecialchars($row['pr_name']) ?> - Product Details</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    .product-container {
      width: 80%;
      margin: 50px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-family: Arial, sans-serif;
    }
    .product-container img {
      max-width: 300px;
      display: block;
      margin-bottom: 20px;
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
  </style>
</head>
<body>

<div class="product-container">
  <img src="<?= htmlspecialchars($row['pr_img']) ?>" alt="Product Image">
  <div class="product-info">
    <h1><?= htmlspecialchars($row['pr_name']) ?></h1>
    <p><strong>Price:</strong> $<?= htmlspecialchars($row['pr_price']) ?></p>
    <p><strong>Category ID:</strong> <?= htmlspecialchars($row['pr_cate']) ?></p>
    <p><strong>Description:</strong><br><?= nl2br(htmlspecialchars($row['pr_info'])) ?></p>
  </div>
  <a class="back-link" href="user.php">⬅ Back to Products</a>
</div>

</body>
</html>

