<?php
include('../Asset/connection/connection.php');
include('Head.php');
session_start();
$selqry = "SELECT * FROM tbl_sc WHERE sc_id='" . $_SESSION["sid"] . "'";
$result = $con->query($selqry);
$row = $result->fetch_assoc();

if (isset($_POST['btnsubmit'])) {
    $email = $_POST['txtemail'];
    $contact = $_POST['txtcontact'];
    $address = $_POST['txtaddress'];
    
    $update = "UPDATE tbl_sc SET sc_email='" . $email . "', sc_contact='" . $contact . "', sc_address='" . $address . "' WHERE sc_id='" . $_SESSION["sid"] . "'";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Edit Profile</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .profile-edit-container {
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 500px;
        }
        .form-header {
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container profile-edit-container">
        <h2 class="form-header">Edit Profile</h2>
        <form id="form1" name="form1" method="post" action="">
            <div class="form-group">
                <label for="txtemail">Email</label>
                <input type="email" name="txtemail" id="txtemail" class="form-control" value="<?php echo $row['sc_email'] ?>" required />
            </div>
            <div class="form-group">
                <label for="txtcontact">Contact</label>
                <input type="text" name="txtcontact" id="txtcontact" class="form-control" value="<?php echo $row['sc_contact'] ?>" required />
            </div>
            <div class="form-group">
                <label for="txtaddress">Address</label>
                <textarea name="txtaddress" id="txtaddress" class="form-control" cols="45" rows="5" required><?php echo $row['sc_address'] ?></textarea>
            </div>
            <div class="text-center">
                <input type="submit" name="btnsubmit" id="btnsubmit" class="btn btn-primary" value="Save Changes" />
            </div>
        </form>
    </div>

    <script src="../Asset/JQ/jQuery.js"></script>
</body>
</html>

<?php include('Foot.php'); ?>
