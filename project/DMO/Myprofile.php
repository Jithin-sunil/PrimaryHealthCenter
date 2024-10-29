<?php
include('../Asset/connection/connection.php');
include('Head.php');
session_start();
$selqry = "select * from tbl_dmo where dmo_id ='" . $_SESSION["did"] . "'";
$result = $con->query($selqry);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-container {
            margin-top: 50px;
            padding: 30px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-container h3 {
            margin-bottom: 20px;
        }

        .table td, .table th {
            vertical-align: middle;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="profile-container">
                    <h3 class="text-center">My Profile</h3>
                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <td><?php echo $row['dmo_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $row['dmo_email']; ?></td>
                        </tr>
                        <tr>
                            <th>Contact</th>
                            <td><?php echo $row['dmo_contact']; ?></td>
                        </tr>
                        <tr>
                            <th>District</th>
                            <td><?php echo $row['district_id']; ?></td>
                        </tr>
                    </table>
                    <div class="btn-container">
                        <a href="Editprofile.php" class="btn btn-primary">Edit Profile</a>
                        <a href="Changepassword.php" class="btn btn-warning">Change Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php 
include('Foot.php');
?>
