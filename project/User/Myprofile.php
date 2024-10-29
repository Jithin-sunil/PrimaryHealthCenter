<?php
include('../Asset/connection/connection.php');
include('Head.php');
session_start();
$selqry = "SELECT * FROM tbl_user u 
            INNER JOIN tbl_village v ON u.village_id = v.village_id 
            INNER JOIN tbl_panchayat p ON v.panchayat_id = p.panchayat_id 
            INNER JOIN tbl_district d ON p.district_id = d.district_id 
            WHERE u.user_id = '" . $_SESSION["uid"] . "'";

$result = $con->query($selqry);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .profile-container {
            margin-top: 50px;
            border: 1px solid #ced4da;
            border-radius: 10px;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .profile-image {
            border-radius: 50%;
            border: 2px solid #007bff;
            margin-bottom: 20px;
        }
        .table th {
            background-color: #007bff;
            color: #ffffff;
        }
        .btn-custom {
            margin: 5px;
        }
    </style>
</head>

<body>
    <div class="container profile-container">
        <div class="text-center">
            <img src="../Asset/Files/User/<?php echo $row['user_photo'] ?>" width="150" height="150" class="profile-image" alt="User Photo"/>
        </div>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Name</th>
                    <td><?php echo $row['user_name'] ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $row['user_email'] ?></td>
                </tr>
                <tr>
                    <th>Contact</th>
                    <td><?php echo $row['user_contact'] ?></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><?php echo $row['user_address'] ?></td>
                </tr>
                <tr>
                    <th>District</th>
                    <td><?php echo $row['district_name'] ?></td>
                </tr>
                <tr>
                    <th>Panchayat</th>
                    <td><?php echo $row['panchayat_name'] ?></td>
                </tr>
                <tr>
                    <th>Village</th>
                    <td><?php echo $row['village_name'] ?></td>
                </tr>
            </tbody>
        </table>
        <div class="text-center">
            <a href="Editprofile.php" class="btn btn-primary btn-custom">Edit</a>
            <a href="changepassword.php" class="btn btn-secondary btn-custom">Change Password</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
include('Foot.php');
?>
