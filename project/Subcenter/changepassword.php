<?php
include('../Asset/connection/connection.php');
include('Head.php');
session_start();

if (isset($_POST['btnsubmit'])) {
    $selqry = "SELECT * FROM tbl_sc WHERE sc_id='" . $_SESSION["sid"] . "'";
    $result = $con->query($selqry);
    $row = $result->fetch_assoc();
    $password = $row['sc_password'];
    $useroldpassword = $_POST['txtold'];
    $usernewpassword = $_POST['txtnew'];
    $userretypepassword = $_POST['txtretype'];

    if ($password == $useroldpassword) {
        if ($usernewpassword == $userretypepassword) {
            $update = "UPDATE tbl_sc SET sc_password='" . $userretypepassword . "' WHERE sc_id='" . $_SESSION["sid"] . "'";
            if ($con->query($update)) {
                echo "
                <script>
                alert('Password updated successfully');
                window.location='myprofile.php';
                </script>";
            }
        } else {
            echo "<script>alert('New passwords do not match');</script>";
        }
    } else {
        echo "<script>alert('Old password is incorrect');</script>";
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
        .password-change-container {
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 400px;
        }
        .form-header {
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container password-change-container">
        <h2 class="form-header">Change Password</h2>
        <form id="form1" name="form1" method="post" action="">
            <div class="form-group">
                <label for="txtold">Old Password</label>
                <input type="password" name="txtold" id="txtold" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="txtnew">New Password</label>
                <input type="password" name="txtnew" id="txtnew" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="txtretype">Re-type Password</label>
                <input type="password" name="txtretype" id="txtretype" class="form-control" required />
            </div>
            <div class="text-center">
                <input type="submit" name="btnsubmit" id="btnsubmit" class="btn btn-primary" value="Change Password" />
                <input type="reset" name="btncancel" id="btncancel" class="btn btn-secondary" value="Cancel" />
            </div>
        </form>
    </div>

    <script src="../Asset/JQ/jQuery.js"></script>
</body>
</html>

<?php include('Foot.php'); ?>
