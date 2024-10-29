<?php
include('../Asset/connection/connection.php');
include('Head.php');
if (isset($_POST['btnregister'])) {
    $Name = $_POST['txtname'];
    $Email = $_POST['txtemail'];
    $Contact = $_POST['txtcontact'];
    $Password = $_POST['txtpassword'];
    $District = $_POST['txtdistrict'];
    $confirm = $_POST['txtconfirm'];
    
    if ($Password === $confirm) {
        $insqry = "insert into tbl_dmo(dmo_name,dmo_email,dmo_contact,dmo_password,district_id) values('".$Name."','".$Email."','".$Contact."','".$Password."','".$District."')";
        if ($con->query($insqry)) {
            echo "<script>alert('Inserted');</script>";
        } else {
            echo "Failed";
        }
    } else {
        echo "<script>alert('Passwords do not match');</script>";
    }
}

if (isset($_GET["did"])) {
    $delqry = "delete from tbl_dmo where dmo_id=" . $_GET["did"];
    if ($con->query($delqry)) {
?>
        <script>
            alert("Data Deleted");
            window.location = "Dmo.php";
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
    <title>DMO Registration</title>
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
                    <h4 class="text-center mb-4">DMO Registration</h4>
                    <form id="form1" name="form1" method="post" action="">
                        <div class="form-group">
                            <label for="txtname">Name</label>
                            <input type="text" name="txtname" id="txtname" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label for="txtemail">Email</label>
                            <input type="email" name="txtemail" id="txtemail" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label for="txtcontact">Contact</label>
                            <input type="text" name="txtcontact" id="txtcontact" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label for="txtdistrict">District</label>
                            <select name="txtdistrict" id="txtdistrict" class="form-control" required>
                                <option>-- Select --</option>
                                <?php
                                $selqry = "select * from tbl_district";
                                $result = $con->query($selqry);
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $row['district_id']; ?>"><?php echo $row['district_name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="txtpassword">Password</label>
                            <input type="password" name="txtpassword" id="txtpassword" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label for="txtconfirm">Confirm Password</label>
                            <input type="password" name="txtconfirm" id="txtconfirm" class="form-control" required />
                        </div>

                        <div class="text-center">
                            <input type="submit" name="btnregister" id="btnregister" value="Register" class="btn btn-primary" />
                            <input type="reset" name="bt_clear" id="bt_clear" value="Clear" class="btn btn-secondary" />
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>District</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    $selqry = "select * from tbl_dmo";
                    $result = $con->query($selqry);
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row["dmo_name"]; ?></td>
                            <td><?php echo $row["dmo_email"]; ?></td>
                            <td><?php echo $row["dmo_contact"]; ?></td>
                            <td><?php echo $row["district_id"]; ?></td>
                            <td><a href="Dmo.php?did=<?php echo $row["dmo_id"]; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
include('Foot.php');
?>
