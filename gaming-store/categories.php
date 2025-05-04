<?php
// Connect
$conn = mysqli_connect("localhost", "root", "", "the shop");
error_reporting(E_ALL); ini_set('display_errors', 1);

// Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $req = "DELETE FROM categories WHERE id = $id";
    mysqli_query($conn, $req);
}

// Add
if (isset($_POST['add'])) {
    $name = $_POST["name"];
    $date = $_POST["date"];
    $req = "INSERT INTO categories(name, date) VALUES('$name', '$date')";
    mysqli_query($conn, $req);
}

// Fetch all
$categories = mysqli_query($conn, "SELECT * FROM categories");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Categories</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h2 {
            color: #333;
        }
        table {
            width: 100%;
            border: 1px solid #ccc;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            color: red;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        form {
            background-color: #fff;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="text"] {
            padding: 8px;
            margin: 5px 0;
            width: calc(100% - 16px);
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h2> Categories</h2>

<!-- Table showing all categories -->
<table>
<tr><th>ID</th><th>Name</th><th>Date</th><th>Action</th></tr>
<?php while($row = mysqli_fetch_assoc($categories)) { ?>
<tr>
  <td><?= $row['id'] ?></td>
  <td><?= $row['name'] ?></td>
  <td><?= $row['date'] ?></td>
  <td><a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this category?')">❌ Delete</a></td>
</tr>
<?php } ?>
</table>

<br>

<!-- Add new category form -->
<h3>Add New Category</h3>
<form method="post">
  Name: <input type="text" name="name" required>
  Date: <input type="text" name="date" required>
  <input type="submit" name="add" value="Add Category">
</form>

</body>
</html>
