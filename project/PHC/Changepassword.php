<?php
include('../Asset/connection/connection.php');
include('Head.php');
session_start();

if (isset($_POST['btnsubmit'])) {
    $selqry = "SELECT * FROM tbl_phc WHERE phc_id='" . $_SESSION["pid"] . "'";
    $result = $con->query($selqry);
    $row = $result->fetch_assoc();
    $password = $row['phc_password'];
    $useroldpassword = $_POST['txtold'];
    $usernewpassword = $_POST['txtnew'];
    $userretypepassword = $_POST['txtretype'];

    if ($password == $useroldpassword) {
        if ($usernewpassword == $userretypepassword) {
            $update = "UPDATE tbl_phc SET phc_password='" . $userretypepassword . "' WHERE phc_id='" . $_SESSION["pid"] . "'";
            if ($con->query($update)) {
                echo "
                <script>
                alert('Password updated successfully');
                window.location='myprofile.php';
                </script>";
            }
        } else {
            echo "<script>alert('New passwords do not match!');</script>";
        }
    } else {
        echo "<script>alert('Old password is incorrect!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Change Password</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        h2 {
            margin-bottom: 30px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container form-container">
        <h2>Change Password</h2>
        <form id="form1" name="form1" method="post" action="">
            <div class="form-group">
                <label for="txtold">Old Password</label>
                <input type="password" class="form-control" name="txtold" id="txtold" required>
            </div>
            <div class="form-group">
                <label for="txtnew">New Password</label>
                <input type="password" class="form-control" name="txtnew" id="txtnew" required>
            </div>
            <div class="form-group">
                <label for="txtretype">Retype Password</label>
                <input type="password" class="form-control" name="txtretype" id="txtretype" required>
            </div>
            <div class="text-center">
                <input type="submit" name="btnsubmit" id="btnsubmit" class="btn btn-primary" value="Change Password">
                <input type="reset" name="txtcancel" id="txtcancel" class="btn btn-secondary" value="Cancel">
            </div>
        </form>
    </div>

    <script src="../Asset/JQ/jQuery.js"></script>
</body>
</html>
<?php 
include('Foot.php');
?>
