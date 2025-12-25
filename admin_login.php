<?php
include 'db.php';

if(isset($_POST['login'])){
    $u = $_POST['user'];
    $p = $_POST['pass'];

    $q = mysqli_query($conn,"SELECT * FROM admin WHERE username='$u' AND password='$p'");
    if(mysqli_num_rows($q) > 0){
        header("Location: admin_dashboard.php");
    } else {
        echo "<script>alert('Invalid Login');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
    <script>
    function validateAdmin(){
        let user = document.getElementById('user').value;
        let pass = document.getElementById('pass').value;
        if(user=="" || pass==""){
            alert("Username or Password cannot be empty");
            return false;
        }
        return true;
    }
    </script>
</head>
<body class="bg-admin">
<form method="post" class="admin-form" onsubmit="return validateAdmin()" 
      style="background: rgba(255,255,255,0.85); padding: 30px; border-radius: 20px;">
<h2 style="color:#333;">Admin Login</h2>
<input type="text" name="user" id="user" placeholder="Username" required><br>
<input type="password" name="pass" id="pass" placeholder="Password" required><br>
<button name="login">Login</button>
</form>
</body>
</html>
