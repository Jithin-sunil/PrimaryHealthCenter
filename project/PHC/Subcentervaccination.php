<?php
include('../Asset/connection/connection.php');
include('Head.php');

if (isset($_POST['btnsubmit'])) {
    $Date = $_POST['txtdate'];
    $Start = $_POST['txtstime'];
    $End = $_POST['txtetime'];

    $insqry = "INSERT INTO tbl_scvaccination(vc_date, vc_starttime, vc_endtime) 
               VALUES('" . $Date . "','" . $Start . "','" . $End . "')";

    if ($con->query($insqry)) {
        echo "<script>alert('Inserted');</script>";
    } else {
        echo "Failed";
    }
}
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
        .container {
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>

<body>
<div class="container">
    <h2 class="text-center">Vaccination Schedule</h2>
    <form id="form1" name="form1" method="post" action="">
        <div class="card mb-4">
            <div class="card-header">Add Vaccination Schedule</div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="txtdate" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                        <input type="date" name="txtdate" id="txtdate" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtstime" class="col-sm-2 col-form-label">Start Time</label>
                    <div class="col-sm-10">
                        <input type="time" name="txtstime" id="txtstime" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtetime" class="col-sm-2 col-form-label">End Time</label>
                    <div class="col-sm-10">
                        <input type="time" name="txtetime" id="txtetime" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" name="btnsubmit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="card">
        <div class="card-header">Vaccination Schedule List</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                $selqry = "SELECT * FROM tbl_scvaccination";
                $result = $con->query($selqry);
                while ($row = $result->fetch_assoc()) {
                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["vc_date"]; ?></td>
                        <td><?php echo $row["vc_starttime"]; ?></td>
                        <td><?php echo $row["vc_endtime"]; ?></td>
                        <td>
                            <a href="vaccination.php?did=<?php echo $row["vc_id"]; ?>" class="btn btn-warning btn-sm">Reload</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="../Asset/JQ/jQuery.js"></script>
</body>
</html>

<?php include('Foot.php'); ?>
