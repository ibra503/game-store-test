<?php



error_reporting(E_ALL);
ini_set('display_errors', 1);




$connect = mysqli_connect("localhost", "root", "", "the shop");

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);

    if($row){
        if($row['user_type'] == 'admin'){
            header("Location: admin.html");
        } else {
            header("Location: user.php");
        }
    } else {
        echo "Invalid username or password!";
    }
}
?>

