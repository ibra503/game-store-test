<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="logxsign.css"> <!-- Link to the stylesheet -->
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
              <button type="submit" name="signup">Sign Up</button>

            </div>
        </form>
    </div>
</body>
</html>

<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$connect = mysqli_connect("localhost", "root", "", "the shop");

if(isset($_POST['signup'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if username already exists
    $req = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($connect, $req);
    $row = mysqli_fetch_assoc($result);

    if($row){
        echo "Username already exists!";
    }else{
        // Insert into database with user_type = user
        $req2 = "INSERT INTO users(username, email, password, user_type) 
         VALUES('$username', '$email', '$password', 'user')";

        $result2 = mysqli_query($connect, $req2);

        if($result2){
            echo "Account created successfully! <a href='login.html'>Login Here</a>";
        }else{
            echo "Error while creating account.";
        }
    }

}

?>
