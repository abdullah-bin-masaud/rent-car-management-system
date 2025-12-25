<?php 
include 'db.php'; 

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $model = $_POST['model'];
    $rent = $_POST['rent'];
    
    $img_name = $_FILES['car_img']['name'];
    $tmp_name = $_FILES['car_img']['tmp_name'];
    $folder = "images/" . $img_name;

    if(move_uploaded_file($tmp_name, $folder)){
        $q = "INSERT INTO cars (car_name, model, rent_per_day, image) VALUES ('$name', '$model', '$rent', '$img_name')";
        mysqli_query($conn, $q);
        echo "<script>alert('Car and Image Uploaded Successfully!'); window.location='admin_dashboard.php';</script>";
    } else {
        echo "<script>alert('Image upload failed!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Car</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="admin-form" style="color:black;"> <!-- updated color -->
    <h2>Add New Car</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Car Name" required>
        <input type="text" name="model" placeholder="Model Year" required>
        <input type="number" name="rent" placeholder="Rent Per Day" required>
        
        <p style="text-align:left; margin-left:15px; font-size:14px;">Select Car Image:</p>
        <input type="file" name="car_img" accept="image/*" required>
        
        <button name="add">Upload Car Data</button>
        <br><br>
        <a href="admin_dashboard.php">Back</a>
    </form>
</div>
</body>
</html>
