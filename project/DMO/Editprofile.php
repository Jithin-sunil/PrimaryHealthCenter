<?php
include('../Asset/connection/connection.php');
include('Head.php');
session_start();
$selqry = "select * from tbl_dmo where dmo_id='" . $_SESSION["did"] . "'";
$result = $con->query($selqry);
$row = $result->fetch_assoc();

if (isset($_POST['btnsubmit'])) {
    $email = $_POST['txtemail'];
    $contact = $_POST['txtcontact'];

    $update = "update tbl_dmo set dmo_email='" . $email . "', dmo_contact='" . $contact . "' where dmo_id='" . $_SESSION["did"] . "'";
    if ($con->query($update)) {
        echo "<script>
        alert('Data Updated');
        window.location='Myprofile.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
                    <h3 class="text-center mb-4">Edit Profile</h3>
                    <form id="form1" name="form1" method="post" action="">
                        <div class="form-group">
                            <label for="txtemail">Email</label>
                            <input type="email" name="txtemail" id="txtemail" class="form-control" value="<?php echo $row['dmo_email'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="txtcontact">Contact</label>
                            <input type="text" name="txtcontact" id="txtcontact" class="form-control" value="<?php echo $row['dmo_contact'] ?>" required>
                        </div>
                        <button type="submit" name="btnsubmit" id="btnsubmit" class="btn btn-primary btn-block">Update</button>
                        <a href="Myprofile.php" class="btn btn-secondary btn-block">Cancel</a>
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
