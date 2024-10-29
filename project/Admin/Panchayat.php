<?php
include('../Asset/connection/connection.php');
$Panchayat = "";
$District = "";
$panchayatid = "";
include('Head.php');

if (isset($_POST['btnsubmit'])) {
    $District = $_POST['txtdistrict'];
    $Panchayat = $_POST['txtpanchayat'];
    $pid = $_POST['txtid'];

    if ($pid == "") {
        $insqry = "insert into tbl_panchayat (panchayat_name,district_id) values('".$Panchayat."', '".$District."')";
        if ($con->query($insqry)) {
            echo "<script>alert('Inserted');</script>";
        } else {
            echo "Failed";
        }
    } else {
        $update = "update tbl_panchayat set panchayat_name='".$Panchayat."', district_id='".$District."' where panchayat_id=".$pid;
        if ($con->query($update)) {
            echo "<script>
                    alert('Data Updated');
                    window.location='Panchayat.php';
                  </script>";
        }
    }
}

if (isset($_GET["did"])) {
    $delqry = "delete from tbl_panchayat where panchayat_id=".$_GET["did"];
    if ($con->query($delqry)) {
        echo "<script>
                alert('Data Deleted');
                window.location='Panchayat.php';
              </script>";
    }
}

if (isset($_GET["edt"])) {
    $selqry = "select * from tbl_panchayat where panchayat_id=".$_GET["edt"];
    $res = $con->query($selqry);
    $data = $res->fetch_assoc();
    $Panchayat = $data["panchayat_name"];
    $panchayatid = $data["panchayat_id"];
    $District = $data["district_id"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panchayat Management</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            margin-top: 50px;
        }
        .table-container {
            margin-top: 30px;
        }
        .btn {
            margin-right: 10px;
        }
        .card {
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container form-container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <h4 class="text-center mb-4">Panchayat Management</h4>
                <form id="form1" name="form1" method="post" action="">
                    <div class="form-group">
                        <label for="txtdistrict">District</label>
                        <select name="txtdistrict" id="txtdistrict" class="form-control" required>
                            <option value="">-- Select --</option>
                            <?php
                            $selqry = "select * from tbl_district";
                            $result = $con->query($selqry);
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $row['district_id']; ?>"
                                    <?php if ($row['district_id'] == $District) echo "selected"; ?>>
                                    <?php echo $row['district_name']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="txtpanchayat">Panchayat</label>
                        <input type="text" name="txtpanchayat" id="txtpanchayat" class="form-control" value="<?php echo $Panchayat; ?>" required />
                        <input type="hidden" name="txtid" id="txtid" value="<?php echo $panchayatid; ?>" />
                    </div>

                    <div class="text-center">
                        <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="table-container">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>District</th>
                    <th>Panchayat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $selqry = "select * from tbl_panchayat s inner join tbl_district c on s.district_id=c.district_id";
                $result = $con->query($selqry);
                while ($row = $result->fetch_assoc()) {
                    $i++;
                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["district_name"]; ?></td>
                        <td><?php echo $row["panchayat_name"]; ?></td>
                        <td>
                            <a href="Panchayat.php?did=<?php echo $row["panchayat_id"]; ?>" class="btn btn-danger btn-sm">Delete</a>
                            <a href="Panchayat.php?edt=<?php echo $row["panchayat_id"]; ?>" class="btn btn-info btn-sm">Edit</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php include('Foot.php'); ?>
