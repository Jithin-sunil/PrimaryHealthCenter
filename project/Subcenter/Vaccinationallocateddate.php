<?php
include('../Asset/connection/connection.php');
include('Head.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Vaccination Schedule</title>
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
        <h2 class="text-center">Vaccination Schedule</h2>
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $selQry = "SELECT * FROM tbl_scvaccination";
                $res = $con->query($selQry);
                $i = 0;
                while ($data = $res->fetch_assoc()) {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $data['vc_date'] ?></td>
                    <td><?php echo $data['vc_starttime'] . " - " . $data['vc_endtime'] ?></td>
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
