<?php
include('../Asset/connection/connection.php');
include('Head.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table-container {
            margin-top: 50px;
        }
        .table th {
            background-color: #007bff;
            color: #ffffff;
        }
        .table td {
            vertical-align: middle;
        }
        th, td {
            text-align: center;
        }
        .table-title {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container table-container">
        <div class="table-title">PHC Booking</div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Booked Date</th>
                    <th>Subcenter Address</th>
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
                        INNER JOIN tbl_category c ON s.category_id = c.category_id";
                $res = $con->query($sel);
                while ($data = $res->fetch_assoc()) {
                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $data["booking_date"]; ?></td>
                        <td><?php echo $data["booking_fordate"]; ?></td>
                        <td><?php echo $data["sc_address"]; ?></td>
                        <td><?php echo $data["category_name"]; ?></td>
                        <td><?php echo $data["subcategory_name"]; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>

        <br><br>

        <div class="table-title">SC Booking</div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Booked Date</th>
                    <th>SC Address</th>
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
                        INNER JOIN tbl_category c ON s.category_id = c.category_id";
                $res = $con->query($sel);
                while ($data = $res->fetch_assoc()) {
                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $data["booking_date"]; ?></td>
                        <td><?php echo $data["booking_fordate"]; ?></td>
                        <td><?php echo $data["sc_address"]; ?></td>
                        <td><?php echo $data["category_name"]; ?></td>
                        <td><?php echo $data["subcategory_name"]; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php 
include('Foot.php');
?>
