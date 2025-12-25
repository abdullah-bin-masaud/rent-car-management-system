<?php include 'db.php'; 
$id = $_GET['id'];
$car = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM cars WHERE id=$id"));

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $model = $_POST['model'];
    $rent = $_POST['rent'];
    
    mysqli_query($conn, "UPDATE cars SET car_name='$name', model='$model', rent_per_day='$rent' WHERE id=$id");
    echo "<script>alert('Data Updated!'); window.location='delete_car.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Car</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="admin-form" style="color:black;"> <!-- updated color -->
    <h2>Update Car Details</h2>
    <form method="post">
        <input type="text" name="name" value="<?php echo $car['car_name']; ?>">
        <input type="text" name="model" value="<?php echo $car['model']; ?>">
        <input type="number" name="rent" value="<?php echo $car['rent_per_day']; ?>">
        <button name="update">Save Changes</button>
    </form>
</div>
</body>
</html>
