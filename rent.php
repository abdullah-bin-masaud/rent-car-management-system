<?php 
include 'db.php'; 
$id = $_GET['id']; 

if(isset($_POST['rent'])){
    $name = $_POST['name'];
    $cnic = $_POST['cnic'];
    $days = $_POST['days'];
    $rent_date = $_POST['rent_date'];

    $car_query = mysqli_query($conn, "SELECT * FROM cars WHERE id=$id");
    $car = mysqli_fetch_assoc($car_query);
    
    $total = $car['rent_per_day'] * $days;

    $insert_query = "INSERT INTO bookings (customer_name, cnic, car_id, days, total_rent, booking_date) 
                     VALUES ('$name', '$cnic', '$id', '$days', '$total', '$rent_date')";
    
    if(mysqli_query($conn, $insert_query)){
        echo "<script>alert('Car Rented Successfully! \\nTotal Bill: $total PKR'); window.location='cars.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

$res = mysqli_query($conn, "SELECT * FROM cars WHERE id=$id");
$car = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rent <?php echo $car['car_name']; ?></title>
    <link rel="stylesheet" href="style.css">
    <script>
        function updateDetails() {
            let rentPerDay = parseInt(document.getElementById('rent_per_day').value);
            let days = parseInt(document.getElementById('days').value);
            let rentDateInput = document.getElementById('rent_date').value;
            
            if (!isNaN(rentPerDay) && !isNaN(days) && days > 0 && rentDateInput !== "") {
                let total = rentPerDay * days;
                document.getElementById('total_display').innerText = "Total Rent: " + total + " PKR";

                let rentDate = new Date(rentDateInput);
                rentDate.setDate(rentDate.getDate() + days);
                
                let dd = String(rentDate.getDate()).padStart(2, '0');
                let mm = String(rentDate.getMonth() + 1).padStart(2, '0'); 
                let yyyy = rentDate.getFullYear();
                
                document.getElementById('return_display').innerText = "Return Date: " + yyyy + "-" + mm + "-" + dd;
            } else {
                document.getElementById('total_display').innerText = "Total Rent: 0 PKR";
                document.getElementById('return_display').innerText = "Return Date: --";
            }
        }
    </script>
</head>
<body class="bg-form1">

    <div class="admin-form">
        <h2 style="color:#333;">Rent Details</h2>
        <hr>
        <div style="text-align:left; margin-bottom:15px;">
            <p><b>Car:</b> <?php echo $car['car_name']; ?></p>
            <p><b>Rate:</b> <?php echo $car['rent_per_day']; ?> PKR / Day</p>
        </div>

        <form method="post">
            <input type="text" name="name" placeholder="Customer Name" required>
            <input type="text" name="cnic" placeholder="CNIC Number" required>
            
            <p style="text-align:left; font-size:14px; margin-bottom:5px;">Rent Start Date:</p>
            <input type="date" name="rent_date" id="rent_date" value="<?php echo date('Y-m-d'); ?>" onchange="updateDetails()" required>

            <p style="text-align:left; font-size:14px; margin-bottom:5px;">Number of Days:</p>
            <input type="number" name="days" id="days" placeholder="Days" oninput="updateDetails()" min="1" required>

            <input type="hidden" id="rent_per_day" value="<?php echo $car['rent_per_day']; ?>">

            <div style="background:#fff; padding:10px; border-radius:8px; margin-top:10px; border:1px dashed #ff9800;">
                <p id="total_display" style="font-weight:bold; color:green; margin:5px 0;">Total Rent: 0 PKR</p>
                <p id="return_display" style="font-weight:bold; color:#e91e63; margin:5px 0;">Return Date: --</p>
            </div>

            <button name="rent" style="background:#ff9800; margin-top:20px;">Confirm Booking</button>
            <br><br>
            <a href="cars.php" style="color:#666;">Go Back</a>
        </form>
    </div>

</body>
</html>
