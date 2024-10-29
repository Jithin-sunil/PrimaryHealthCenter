<?php
include('../Asset/connection/connection.php');
include('Head.php');
session_start();

$selqry = "SELECT * FROM tbl_phc WHERE phc_id='" . $_SESSION["pid"] . "'";
$result = $con->query($selqry);
$row = $result->fetch_assoc();

if (isset($_POST['btnsubmit'])) {
    $email = $_POST['txtemail'];
    $contact = $_POST['txtcontact'];
    $address = $_POST['txtaddress'];
    
    $update = "UPDATE tbl_phc SET phc_email='" . $email . "', phc_contact='" . $contact . "', phc_address='" . $address . "' WHERE phc_id='" . $_SESSION["pid"] . "'";
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
        <h2>Edit Profile</h2>
        <form id="form1" name="form1" method="post" action="">
            <div class="form-group">
                <label for="txtemail">Email</label>
                <input type="email" class="form-control" name="txtemail" id="txtemail" value="<?php echo $row['phc_email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="txtcontact">Contact</label>
                <input type="text" class="form-control" name="txtcontact" id="txtcontact" value="<?php echo $row['phc_contact']; ?>" required>
            </div>
            <div class="form-group">
                <label for="txtaddress">Address</label>
                <textarea class="form-control" name="txtaddress" id="txtaddress" cols="45" rows="5" required><?php echo $row['phc_address']; ?></textarea>
            </div>
            <div class="text-center">
                <input type="submit" name="btnsubmit" id="btnsubmit" class="btn btn-primary" value="Edit">
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
