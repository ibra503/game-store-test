<?php
// Database connection
$host = "localhost";
$user = "root";
$password = "";
$database = "the shop";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch products
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

// Start outputting HTML with styles
echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Product List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 100px;
            height: auto;
            border-radius: 4px;
        }
    </style>
</head>
<body>
";

echo "<h2>Product List</h2>";
echo "<table>
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Price</th>
  <th>Image</th>
  <th>Category</th>
  <th>Info</th>
</tr>";

while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['pr_name'] . "</td>";
    echo "<td>" . $row['pr_price'] . "</td>";
    echo "<td><img src='" . $row['pr_img'] . "' alt='" . $row['pr_name'] . "'></td>";
    echo "<td>" . $row['pr_cate'] . "</td>";
    echo "<td>" . $row['pr_info'] . "</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($conn);

echo "
</body>
</html>
";
?>
