<?php
include('../Asset/connection/connection.php');
if(isset($_POST['btnsubmit']))
{
	$Name=$_POST['txtname'];
	$Email=$_POST['txtemail'];
	$Contact=$_POST['txtcontact'];
	$Gender=$_POST['txtgender'];
	$Date=$_POST['txtdob'];
	$Address=$_POST['txtaddress'];
	$Village=$_POST['txtvillage'];
	$Photo=$_FILES['filephoto']['name'];
	$tempphoto=$_FILES['filephoto']['tmp_name'];
	move_uploaded_file($tempphoto,"../Asset/Files/User/".$Photo);
	$Password=$_POST['txtpassword'];
	$confirm=$_POST['txtconfirm'];
	$District=$_POST['txtdistrict'];
	$Panchayat=$_POST['txtpanchayat'];
	{
	$insqry="insert into tbl_user(user_name,user_email,user_contact,user_gender,user_dob,village_id,user_address,user_password,user_photo)values('".$Name."','".$Email."','".$Contact."','".$Gender."','".$Date."','".$Village."','".$Address."','".$Password."','".$Photo."')";
	
	if($con->query($insqry))
	{
		echo"<script>
		alert('Inserted')
		</script>";
        }
      else
      {
      echo"Failed";
      }
	}
	
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration Page</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    /* Custom Styling for Page */
    body {
        background-color: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    .form-container {
        width: 80%;
        max-width: 900px;
        background-color: #fff;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .form-header {
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .form-header h2 {
        color: #333;
    }

    /* Submit Button */
    #btnsubmit {
        background-color: #007bff;
        color: white;
        font-size: 16px;
    }

    #btnsubmit:hover {
        background-color: #0056b3;
    }

    /* Footer Link */
    .footer-text {
        text-align: center;
        margin-top: 10px;
        font-size: 14px;
    }
</style>
</head>

<body>
<div class="form-container">
    <div class="form-header">
        <h2>User Registration</h2>
    </div>
    <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="txtname">Name</label>
                <input type="text" class="form-control" name="txtname" id="txtname" placeholder="Enter your name">
            </div>
            <div class="form-group col-md-6">
                <label for="txtemail">Email</label>
                <input type="email" class="form-control" name="txtemail" id="txtemail" placeholder="Enter your email">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="txtcontact">Contact</label>
                <input type="text" class="form-control" name="txtcontact" id="txtcontact" placeholder="Enter your contact">
            </div>
            <div class="form-group col-md-6">
                <label>Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="txtgender" value="Male">
                    <label class="form-check-label">Male</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="txtgender" value="Female">
                    <label class="form-check-label">Female</label>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="txtdob">Date of Birth (DOB)</label>
                <input type="date" class="form-control" name="txtdob" id="txtdob">
            </div>
            <div class="form-group col-md-6">
                <label for="filephoto">Photo</label>
                <input type="file" class="form-control-file" name="filephoto" id="filephoto">
            </div>
        </div>

        <div class="form-group">
            <label for="txtaddress">Address</label>
            <textarea class="form-control" name="txtaddress" id="txtaddress" rows="2" placeholder="Enter your address"></textarea>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="txtdistrict">District</label>
                <select name="txtdistrict" id="txtdistrict" class="form-control" onchange="getPlace(this.value)">
                    <option>--select--</option>
                    <?php
                    $selqry="select * from tbl_district";
                    $result=$con->query($selqry);
                    while($row=$result->fetch_assoc()) {
                        echo "<option value='{$row["district_id"]}'>{$row["district_name"]}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="txtpanchayat">Panchayat</label>
                <select name="txtpanchayat" id="txtpanchayat" class="form-control" onchange="getvillage(this.value)">
                    <option>--select--</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="txtvillage">Village</label>
                <select name="txtvillage" id="txtvillage" class="form-control">
                    <option>--select--</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="txtpassword">Password</label>
                <input type="password" class="form-control" name="txtpassword" id="txtpassword" placeholder="Enter password">
            </div>
            <div class="form-group col-md-6">
                <label for="txtconfirm">Confirm Password</label>
                <input type="password" class="form-control" name="txtconfirm" id="txtconfirm" placeholder="Confirm password">
            </div>
        </div>

        <button type="submit" name="btnsubmit" id="btnsubmit" class="btn btn-primary btn-block">Register</button>
    </form>
    <div class="footer-text">
        <p>Already registered? <a href="#" class="text-primary">Login here</a></p>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
