<?php
include('../Asset/connection/connection.php');
include('Head.php');
session_start();

if (isset($_POST['btnsubmit'])) {
    $selqry = "select * from tbl_dmo where dmo_id='" . $_SESSION["did"] . "'";
    $result = $con->query($selqry);
    $row = $result->fetch_assoc();
    $password = $row['dmo_password'];
    $useroldpassword = $_POST['txtold'];
    $usernewpassword = $_POST['txtnew'];
    $userretypepassword = $_POST['txtretype'];

    if ($password == $useroldpassword) {
        if ($usernewpassword == $userretypepassword) {
            $update = "update tbl_dmo set dmo_password='" . $userretypepassword . "' where dmo_id='" . $_SESSION["did"] . "'";
            if ($con->query($update)) {
                echo "
                <script>
                alert('Password updated successfully');
                window.location='Myprofile.php';
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
    <title>Change Password</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
        }
        .form-container {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                    <h3 class="text-center mb-4">Change Password</h3>
                    <form id="form1" name="form1" method="post" action="">
                        <div class="form-group">
                            <label for="txtold">Old Password</label>
                            <input type="password" name="txtold" id="txtold" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="txtnew">New Password</label>
                            <input type="password" name="txtnew" id="txtnew" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="txtretype">Re-type Password</label>
                            <input type="password" name="txtretype" id="txtretype" class="form-control" required>
                        </div>
                        <button type="submit" name="btnsubmit" id="btnsubmit" class="btn btn-primary btn-block">Change Password</button>
                        <button type="reset" name="btncancel" id="btncancel" class="btn btn-secondary btn-block">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
include('Foot.php');
?>
