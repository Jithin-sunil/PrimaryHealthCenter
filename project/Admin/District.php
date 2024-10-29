<?php
include('../Asset/connection/connection.php');
include('Head.php');
if (isset($_POST['bt_submit'])) {
    $District = $_POST['txt_name'];
    $insQry = "insert into tbl_district(district_name)values('" . $District . "')";
    if ($con->query($insQry)) {
        echo "
		<script>
		alert('inserted');
		</script>";
    } else {
        echo "failed";
    }
}
if (isset($_GET["did"])) {
    $_delqry = "delete from tbl_district where district_id=" . $_GET["did"];
    if ($con->query($_delqry)) {
?>
        <script>
            alert("Data deleted")
            window.location = "District.php"
        </script>
<?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>District Management</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            margin-top: 50px;
        }

        table {
            width: 100%;
        }

        .table-bordered {
            margin-top: 20px;
        }

        .btn {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="container form-container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form id="form1" name="form1" method="post" action="" class="bg-white p-4 shadow rounded">
                    <h4 class="text-center mb-4">Add District</h4>
                    <div class="form-group">
                        <label for="txt_name">District Name</label>
                        <input type="text" name="txt_name" id="txt_name" class="form-control" required />
                    </div>
                    <div class="text-center">
                        <input type="submit" name="bt_submit" id="bt_submit" value="Submit" class="btn btn-primary" />
                        <input type="reset" name="bt_clear" id="bt_clear" value="Clear" class="btn btn-secondary" />
                    </div>
                </form>

                <table class="table table-bordered table-striped mt-4">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>District</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        $selqry = "select * from tbl_district";
                        $result = $con->query($selqry);
                        while ($row = $result->fetch_assoc()) {
                            $i++;
                        ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $row["district_name"]; ?></td>
                                <td><a href="District.php?did=<?php echo $row["district_id"]; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
include('Foot.php');
?>
