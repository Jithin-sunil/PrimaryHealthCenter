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
        .table-container {
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h2 {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container table-container">
        <h2 class="text-center">PHC Booking</h2>
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>User Name</th>
                    <th>Contact</th>
                    <th>Booked Date</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $sel = "SELECT * FROM tbl_booking b 
                        INNER JOIN tbl_subcenter p ON b.sc_id = p.sc_id 
                        INNER JOIN tbl_subcategory s ON b.subcategory_id = s.subcategory_id 
                        INNER JOIN tbl_category c ON s.category_id = c.category_id 
                        INNER JOIN tbl_user u ON b.user_id = u.user_id 
                        WHERE b.sc_id = " . $_SESSION['pid'];
                $res = $con->query($sel);
                while ($data = $res->fetch_assoc()) {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data["booking_date"]; ?></td>
                    <td><?php echo $data["user_name"]; ?></td>
                    <td><?php echo $data["user_contact"]; ?></td>
                    <td><?php echo $data["booking_fordate"]; ?></td>
                    <td><?php echo $data["category_name"]; ?></td>
                    <td><?php echo $data["subcategory_name"]; ?></td>
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
