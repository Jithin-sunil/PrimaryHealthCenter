<?php
include('../Asset/connection/connection.php');
include('Head.php');
session_start();

$selqry = "SELECT * FROM tbl_subcenter s 
            INNER JOIN tbl_village v ON s.village_id = v.village_id 
            INNER JOIN tbl_panchayat p ON v.panchayat_id = p.panchayat_id 
            INNER JOIN tbl_district d ON p.district_id = d.district_id 
            WHERE s.sc_id ='" . $_SESSION["sid"] . "'";

$result = $con->query($selqry);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Profile</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .profile-container {
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 500px;
        }
        .profile-image {
            border-radius: 50%;
            margin-bottom: 20px;
        }
        .btn-custom {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="container profile-container">
        <h2 class="text-center">Profile Information</h2>
        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <div class="text-center">
                <img src="../Asset/Files/Subcenter/<?php echo $row['sc_photo'] ?>" class="profile-image" width="150" height="150" alt="Profile Picture"/>
            </div>
            <div class="form-group">
                <label>Email</label>
                <p><?php echo $row['sc_email'] ?></p>
            </div>
            <div class="form-group">
                <label>Contact</label>
                <p><?php echo $row['sc_contact'] ?></p>
            </div>
            <div class="form-group">
                <label>Address</label>
                <p><?php echo $row['sc_address'] ?></p>
            </div>
            <div class="form-group">
                <label>District</label>
                <p><?php echo $row['district_name'] ?></p>
            </div>
            <div class="form-group">
                <label>Village</label>
                <p><?php echo $row['village_name'] ?></p>
            </div>
            <div class="text-center">
                <a href="Editprofile.php" class="btn btn-primary btn-custom">Edit Profile</a>
                <a href="changepassword.php" class="btn btn-secondary btn-custom">Change Password</a>
            </div>
        </form>
    </div>

    <script src="../Asset/JQ/jQuery.js"></script>
</body>
</html>

<?php include('Foot.php'); ?>
