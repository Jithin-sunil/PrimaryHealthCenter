<?php
include('../Asset/connection/connection.php');
include('Head.php');
if(isset($_POST['btnsubmit']))
{
	$Email = $_POST['txtemail'];
	$Contact = $_POST['txtcontact'];
	$Address = $_POST['txtaddress'];
	$District = $_POST['txtdistrict'];
	$Panchayat = $_POST['txtpanchayat'];
	$Photo = $_FILES['filephoto']['name'];
	$tempphoto = $_FILES['filephoto']['tmp_name'];
	move_uploaded_file($tempphoto, "../Asset/Files/PHC/" . $Photo);
	$Password = $_POST['txtpassword'];
	$Confirm = $_POST['txtconfirm'];
	{
		$insqry = "insert into tbl_phc(phc_email, phc_contact, phc_password, phc_address, phc_photo, panchayat_id) 
        values('$Email', '$Contact', '$Password', '$Address', '$Photo', '$Panchayat')";

		if($con->query($insqry)) {
			echo "<script>alert('Inserted');</script>";
		} else {
			echo "Failed";
		}
	}
}

if(isset($_GET["did"])) {
	$delqry = "delete from tbl_phc where phc_id=" . $_GET["did"];
	if($con->query($delqry)) {
		echo "<script>alert('Data deleted'); window.location='PHC.php';</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHC Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            margin-top: 30px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .table-container {
            margin-top: 50px;
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-container">
                <h3 class="text-center">PHC Registration</h3>
                <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                    <div class="form-group">
                        <label for="txtemail">Email</label>
                        <input type="email" class="form-control" name="txtemail" id="txtemail" required>
                    </div>
                    <div class="form-group">
                        <label for="txtcontact">Contact</label>
                        <input type="text" class="form-control" name="txtcontact" id="txtcontact" required>
                    </div>
                    <div class="form-group">
                        <label for="txtaddress">Address</label>
                        <textarea name="txtaddress" id="txtaddress" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="txtdistrict">District</label>
                        <select name="txtdistrict" id="txtdistrict" class="form-control" onchange="getPlace(this.value)" required>
                            <option>--select--</option>
                            <?php
                            $selqry = "select * from tbl_district";
                            $result = $con->query($selqry);
                            while($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["district_id"] . "'>" . $row["district_name"] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtpanchayat">Panchayat</label>
                        <select name="txtpanchayat" id="txtpanchayat" class="form-control" required>
                            <option>--select--</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="filephoto">Photo</label>
                        <input type="file" class="form-control-file" name="filephoto" id="filephoto" required>
                    </div>
                    <div class="form-group">
                        <label for="txtpassword">Password</label>
                        <input type="password" class="form-control" name="txtpassword" id="txtpassword" required>
                    </div>
                    <div class="form-group">
                        <label for="txtconfirm">Confirm Password</label>
                        <input type="password" class="form-control" name="txtconfirm" id="txtconfirm" required>
                    </div>
                    <button type="submit" name="btnsubmit" class="btn btn-primary btn-block">Register</button>
                </form>
            </div>

            <div class="table-container">
                <table class="table table-striped table-bordered">
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
                    $selqry = "select *from tbl_phc";
                    $result = $con->query($selqry);
                    while($row = $result->fetch_assoc()) {
                        $i++;
                        echo "<tr>";
                        echo "<td>$i</td>";
                        echo "<td>" . $row["panchayat_id"] . "</td>";
                        echo "<td>" . $row["phc_email"] . "</td>";
                        echo "<td>" . $row["phc_contact"] . "</td>";
                        echo "<td>" . $row["phc_address"] . "</td>";
                        echo "<td><img src='../Asset/Files/PHC/" . $row["phc_photo"] . "' alt='PHC Photo' width='50'></td>";
                        echo "<td><a href='PHC.php?did=" . $row["phc_id"] . "' class='btn btn-danger'>Delete</a></td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap and jQuery JS -->
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

<?php include('Foot.php'); ?>
