<?php include 'db.php'; 
if(isset($_GET['del'])){
    $id = $_GET['del'];
    mysqli_query($conn, "DELETE FROM cars WHERE id=$id");
    header("location:delete_car.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Cars</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table { width: 90%; margin: 20px auto; border-collapse: collapse; background: white; color:black; } /* updated color */
        th, td { padding: 12px; border: 1px solid #ddd; text-align: center; }
        th { background: #333; color: white; }
        .btn-del { background: red; color: white; padding: 5px 10px; text-decoration: none; border-radius: 5px; }
        .btn-upd { background: blue; color: white; padding: 5px 10px; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
<h2 style="text-align:center;">Manage Available Cars</h2>
<table>
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Model</th>
        <th>Rent</th>
        <th>Actions</th>
    </tr>
    <?php 
    $res = mysqli_query($conn, "SELECT * FROM cars");
    while($row = mysqli_fetch_assoc($res)){ ?>
    <tr>
        <td><img src="images/<?php echo $row['image']; ?>" width="50"></td>
        <td><?php echo $row['car_name']; ?></td>
        <td><?php echo $row['model']; ?></td>
        <td><?php echo $row['rent_per_day']; ?></td>
        <td>
            <a href="update_car.php?id=<?php echo $row['id']; ?>" class="btn-upd">Update</a>
            <a href="delete_car.php?del=<?php echo $row['id']; ?>" class="btn-del" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
<center><a href="admin_dashboard.php" class="btn">Back</a></center>
</body>
</html>
