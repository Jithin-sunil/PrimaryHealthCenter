<?php
include('../Asset/connection/connection.php');
include('Head.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>PHC Booking</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 20px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table-header {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body>
<div class="container">
    <h2 class="text-center">PHC Booking</h2>
    <table class="table table-bordered mt-4">
        <thead class="table-header">
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>User Name</th>
                <th>Contact</th>
                <th>Booked Date</th>
                <th>PHC</th>
                <th>Category</th>
                <th>Subcategory</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        $sel = "SELECT * FROM tbl_booking b 
                INNER JOIN tbl_phc p ON b.phc_id = p.phc_id 
                INNER JOIN tbl_subcategory s ON b.subcategory_id = s.subcategory_id 
                INNER JOIN tbl_category c ON s.category_id = c.category_id 
                INNER JOIN tbl_user u ON b.user_id = u.user_id 
                WHERE b.phc_id = " . $_SESSION['pid'];
        $res = $con->query($sel);
        while ($data = $res->fetch_assoc()) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo htmlspecialchars($data["booking_date"]); ?></td>
                <td><?php echo htmlspecialchars($data["user_name"]); ?></td>
                <td><?php echo htmlspecialchars($data["user_contact"]); ?></td>
                <td><?php echo htmlspecialchars($data["booking_fordate"]); ?></td>
                <td><?php echo htmlspecialchars($data["phc_address"]); ?></td>
                <td><?php echo htmlspecialchars($data["category_name"]); ?></td>
                <td><?php echo htmlspecialchars($data["subcategory_name"]); ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>

<script src="../Asset/JQ/jQuery.js"></script>
</body>
</html>

<?php 
include('Foot.php');
?>
