<?php
include('../Asset/connection/connection.php');
include('Head.php');
if (isset($_POST['btnsubmit'])) {
    $District = $_POST['txtdistrict'];
    $Panchayat = $_POST['txtpanchayat'];
    $Village = $_POST['txtvillage'];

    $insQry = "insert into tbl_village(village_name,panchayat_id) values('" . $Village . "','" . $Panchayat . "')";
    if ($con->query($insQry)) {
        echo "
        <script>
        alert('Inserted');
        </script>";
    } else {
        echo "Failed";
    }
}
if (isset($_GET["did"])) {
    $delqry = "delete from tbl_village where village_id=" . $_GET["did"];
    if ($con->query($delqry)) {
?>
<script>
alert("Data Deleted");
window.location="village.php";
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
    <title>Village Management</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 30px;
        }

        .table-container {
            margin-top: 30px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center">Village Management</h2>
        <form method="post" action="" class="bg-light p-4 rounded">
            <div class="form-group">
                <label for="txtdistrict">District</label>
                <select name="txtdistrict" id="txtdistrict" class="form-control" onchange="getPlace(this.value)">
                    <option>--Select--</option>
                    <?php
                    $selqry = "select * from tbl_district";
                    $result = $con->query($selqry);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <option value="<?php echo $row["district_id"]; ?>"><?php echo $row["district_name"]; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="txtpanchayat">Panchayat</label>
                <select name="txtpanchayat" id="txtpanchayat" class="form-control">
                    <option>--Select--</option>
                    <?php
                    $selqry = "select * from tbl_panchayat";
                    $result = $con->query($selqry);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <option value="<?php echo $row["panchayat_id"]; ?>"><?php echo $row["panchayat_name"]; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="txtvillage">Village</label>
                <input type="text" name="txtvillage" id="txtvillage" class="form-control" required />
            </div>

            <button type="submit" name="btnsubmit" id="btnsubmit" class="btn btn-primary">Submit</button>
        </form>

        <div class="table-container">
            <h3 class="text-center">Village List</h3>
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>District</th>
                        <th>Panchayat</th>
                        <th>Village</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    $selqry = "select * from tbl_village s inner join tbl_panchayat p on s.panchayat_id=p.panchayat_id inner join tbl_district d on p.district_id=d.district_id";
                    $result = $con->query($selqry);
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                    ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row["district_name"]; ?></td>
                            <td><?php echo $row["panchayat_name"]; ?></td>
                            <td><?php echo $row["village_name"]; ?></td>
                            <td>
                                <a href="village.php?did=<?php echo $row["village_id"]; ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function getPlace(did) {
            $.ajax({
                url: "../Asset/AjaxPages/AjaxPanchayat.php?did=" + did,
                success: function(result) {
                    $("#txtpanchayat").html(result);
                }
            });
        }
    </script>
</body>

</html>

<?php
include('Foot.php');
?>
