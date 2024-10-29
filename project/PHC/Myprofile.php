<?php
include('../Asset/connection/connection.php');
include('Head.php');
session_start();

$selqry = "SELECT * FROM tbl_phc s 
            INNER JOIN tbl_panchayat p ON s.panchayat_id = p.panchayat_id 
            INNER JOIN tbl_district d ON p.district_id = d.district_id 
            WHERE s.phc_id = '" . $_SESSION["pid"] . "'";

$result = $con->query($selqry);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Profile View</title>
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
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-info img {
            border-radius: 50%;
            margin-bottom: 20px;
        }
        .btn {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="container profile-container">
        <h2>Profile Information</h2>
        <div class="profile-info text-center">
            <img src="../Asset/Files/PHC/<?php echo $row['phc_photo']; ?>" width="150" height="150" alt="Profile Photo"/>
        </div>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Email</th>
                    <td><?php echo $row['phc_email']; ?></td>
                </tr>
                <tr>
                    <th>Contact</th>
                    <td><?php echo $row['phc_contact']; ?></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><?php echo $row['phc_address']; ?></td>
                </tr>
                <tr>
                    <th>District</th>
                    <td><?php echo $row['district_name']; ?></td>
                </tr>
                <tr>
                    <th>Panchayat</th>
                    <td><?php echo $row['panchayat_name']; ?></td>
                </tr>
            </tbody>
        </table>
        <div class="text-center">
            <a href="Editprofile.php" class="btn btn-primary">Edit</a>
            <a href="Changepassword.php" class="btn btn-secondary">Change Password</a>
        </div>
    </div>

    <script src="../Asset/JQ/jQuery.js"></script>
</body>
</html>
<?php 
include('Foot.php');
?>
