<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Available Cars</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-cars">
<h2 style="text-align:center; margin-top:20px; color:white;">Available Cars</h2> 

<div style="text-align:center;">
<?php 
$result = mysqli_query($conn, "SELECT * FROM cars");
while($row = mysqli_fetch_assoc($result)){ 
?>
    <div class="car-card">
        <img src="images/<?php echo $row['image']; ?>" alt="Car Image" style="height:150px; width:100%; object-fit:cover;">
        <h3><?php echo $row['car_name']; ?></h3>
        <p>Model: <?php echo $row['model']; ?></p>
        <p>Rent: <b><?php echo $row['rent_per_day']; ?> PKR</b></p>
        <a href="rent.php?id=<?php echo $row['id']; ?>">Rent Now</a>
    </div>
<?php } ?>
</div>

<center><a href="index.php" class="btn">Back to Home</a></center>
</body>
</html>
