<?php
include('../Asset/connection/connection.php');
include('Head.php');

if (isset($_POST['btnsubmit'])) {
    $Email = $_POST['txtemail'];
    $Contact = $_POST['txtcontact'];
    $Address = $_POST['txtaddress'];
    $District = $_POST['txtdistrict'];
    $Panchayat = $_POST['txtpanchayat'];
    $Village = $_POST['txtvillage'];
    $Photo = $_FILES['filephoto']['name'];
    $tempphoto = $_FILES['filephoto']['tmp_name'];
    move_uploaded_file($tempphoto, "../Asset/Files/Subcenter/" . $Photo);
    $Password = $_POST['txtpassword'];
    $Confirm = $_POST['txtconfirm'];

    $insqry = "INSERT INTO tbl_subcenter(sc_email, sc_contact, sc_password, sc_address, sc_photo, village_id) 
               VALUES('" . $Email . "','" . $Contact . "','" . $Password . "','" . $Address . "','" . $Photo . "','" . $Village . "')";

    if ($con->query($insqry)) {
        echo "<script>alert('Inserted')</script>";
    } else {
        echo "Failed";
    }
}

if (isset($_GET["did"])) {
    $delqry = "DELETE FROM tbl_subcenter WHERE sc_id=" . $_GET["did"];
    if ($con->query($delqry)) {
        ?>
        <script>
            alert("Data deleted");
            window.location = 'Subcenter.php';
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Manage Subcenters</title>
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
        .btn-action {
            margin-right: 5px;
        }
    </style>
</head>

<body>
<div class="container">
    <h2 class="text-center">Manage Subcenters</h2>
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <div class="card mb-4">
            <div class="card-header">Add Subcenter</div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="txtemail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="txtemail" id="txtemail" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtcontact" class="col-sm-2 col-form-label">Contact</label>
                    <div class="col-sm-10">
                        <input type="text" name="txtcontact" id="txtcontact" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtaddress" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <textarea name="txtaddress" id="txtaddress" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtdistrict" class="col-sm-2 col-form-label">District</label>
                    <div class="col-sm-10">
                        <select name="txtdistrict" id="txtdistrict" class="form-control" onchange="getPlace(this.value)" required>
                            <option value="">--Select--</option>
                            <?php
                            $selqry = "SELECT * FROM tbl_district";
                            $result = $con->query($selqry);
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $row["district_id"]; ?>"><?php echo $row["district_name"]; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtpanchayat" class="col-sm-2 col-form-label">Panchayat</label>
                    <div class="col-sm-10">
                        <select name="txtpanchayat" id="txtpanchayat" class="form-control" onchange="getvillage(this.value)" required>
                            <option value="">--Select--</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtvillage" class="col-sm-2 col-form-label">Village</label>
                    <div class="col-sm-10">
                        <select name="txtvillage" id="txtvillage" class="form-control" required>
                            <option value="">--Select--</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="filephoto" class="col-sm-2 col-form-label">Photo</label>
                    <div class="col-sm-10">
                        <input type="file" name="filephoto" id="filephoto" class="form-control-file" accept="image/*" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtpassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="txtpassword" id="txtpassword" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtconfirm" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="txtconfirm" id="txtconfirm" class="form-control" required>
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
        <div class="card-header">Subcenter List</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Village</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                $selqry = "SELECT * FROM tbl_subcenter";
                $result = $con->query($selqry);
                while ($row = $result->fetch_assoc()) {
                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["sc_email"]; ?></td>
                        <td><?php echo $row["sc_contact"]; ?></td>
                        <td><?php echo $row["sc_address"]; ?></td>
                        <td><?php echo $row["village_id"]; ?></td>
                        <td>
                            <a href="../Asset/Files/Subcenter/<?php echo $row["sc_photo"]; ?>" target="_blank">
                                <img src="../Asset/Files/Subcenter/<?php echo $row["sc_photo"]; ?>" width="100" height="100" alt="Photo">
                            </a>
                        </td>
                        <td>
                            <a href="subcentervaccination.php?did=<?php echo $row["sc_id"]; ?>" class="btn btn-success btn-action">Allotted</a>
                            <a href="Subcenter.php?did=<?php echo $row["sc_id"]; ?>" class="btn btn-danger btn-action">Delete</a>
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
<script>
    function getPlace(did) {
        $.ajax({
            url: "../Asset/AjaxPages/AjaxPanchayat.php?did=" + did,
            success: function (result) {
                $("#txtpanchayat").html(result);
            }
        });
    }

    function getvillage(vid) {
        $.ajax({
            url: "../Asset/AjaxPages/Ajaxvillage.php?vid=" + vid,
            success: function (result) {
                $("#txtvillage").html(result);
            }
        });
    }
</script>
  <?php 
include('Foot.php');
?>