<?php
include('../Asset/connection/connection.php');
include('Head.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHC List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table-container {
            margin-top: 30px;
        }
        .table td, .table th {
            vertical-align: middle;
        }
        .table img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 5px;
        }
        .action-btns {
            display: flex;
            gap: 10px;
        }
        .action-btns .btn {
            margin: 0;
        }
    </style>
</head>
<body>

<div class="container table-container">
    <h2 class="text-center mb-4">PHC List</h2>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Panchayat</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $selqry = "select * from tbl_phc s inner join tbl_panchayat p on s.panchayat_id=p.panchayat_id";
            $result = $con->query($selqry);
            while ($row = $result->fetch_assoc()) {
                $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row["panchayat_id"]; ?></td>
                <td><?php echo $row["phc_email"]; ?></td>
                <td><?php echo $row["phc_contact"]; ?></td>
                <td><?php echo $row["phc_address"]; ?></td>
                <td><img src="<?php echo $row['phc_photo']; ?>" alt="PHC Photo" class="img-thumbnail"></td>
                <td class="action-btns">
                    <a href="PHC.php?did=<?php echo $row['phc_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
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
