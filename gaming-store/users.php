<?php
$conn = mysqli_connect("localhost", "root", "", "the shop");
error_reporting(E_ALL); ini_set('display_errors', 1);


if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']); 
    $req = "DELETE FROM users WHERE id = $id";
    mysqli_query($conn, $req);
}


$users = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Manage Users</title>
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
  </style>
</head>
<body>

<h2>Users List</h2>

<table>
<tr>
  <th>ID</th>
  <th>Username</th>
  <th>Email</th>
  <th>User Type</th>
  <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($users)) { ?>
<tr>
  <td><?= $row['id'] ?></td>
  <td><?= $row['username'] ?></td>
  <td><?= $row['email'] ?></td>
  <td><?= $row['user_type'] ?></td>


  <td><a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this user?')"> Delete</a></td>
</tr>
<?php } ?>
<?php if($row['user_type'] != 'admin') { ?>
  <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this user?')">❌ Delete</a>
<?php } else { ?>
  <span style="color: gray;">🔒 Admin</span>
<?php } ?>

</table>

</body>
</html>
