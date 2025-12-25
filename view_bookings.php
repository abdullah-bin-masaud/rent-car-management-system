<?php 
include 'db.php'; 

if(isset($_GET['del_id'])){
    $del_id = $_GET['del_id'];
    mysqli_query($conn, "DELETE FROM bookings WHERE id=$del_id");
    echo "<script>alert('Booking Record Deleted!'); window.location='view_bookings.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Customer Bookings</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table { width: 95%; margin: 20px auto; border-collapse: collapse; background: white; color:black; } /* updated color */
        th, td { padding: 12px; border: 1px solid #ddd; text-align: center; }
        th { background: #333; color: white; }
        .date-start { color: #2196F3; font-weight: bold; }
        .date-end { color: #f44336; font-weight: bold; }
        .btn-del { background: red; color: white; padding: 5px 10px; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
<h2 style="text-align:center; margin-top: 20px;">📋 All Booking Records</h2>
<table>
    <thead>
        <tr>
            <th>Customer Name</th>
            <th>Car Name</th>
            <th>Starting Date</th>
            <th>Days</th>
            <th>Return Date (End)</th>
            <th>Total Bill</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $query = "SELECT bookings.*, cars.car_name FROM bookings JOIN cars ON bookings.car_id = cars.id ORDER BY bookings.id DESC";
        $res = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($res)){ 
            $start = $row['booking_date'];
            $days = $row['days'];
            $end = date('Y-m-d', strtotime($start . " + $days days"));
        ?>
        <tr>
            <td><?php echo $row['customer_name']; ?></td>
            <td><?php echo $row['car_name']; ?></td>
            <td class="date-start"><?php echo $start; ?></td>
            <td><?php echo $days; ?></td>
            <td class="date-end"><?php echo $end; ?></td>
            <td style="color:green; font-weight:bold;"><?php echo $row['total_rent']; ?> PKR</td>
            <td>
                <a href="view_bookings.php?del_id=<?php echo $row['id']; ?>" class="btn-del" onclick="return confirm('Record delete kar dein?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<center><a href="admin_dashboard.php" class="btn">Back to Dashboard</a></center>
</body>
</html>
