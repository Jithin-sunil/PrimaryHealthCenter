<?php
include('../Asset/connection/connection.php');
include('Head.php');
session_start();

$selqry="select * from tbl_user where user_id='".$_SESSION["uid"]."'";
$result=$con->query($selqry);
$row=$result->fetch_assoc();

if(isset($_POST['btnsubmit']))
{
    $Name=$_POST['txtname'];
    $Email=$_POST['txtemail'];
    $Contact=$_POST['txtcontact'];
    $Address=$_POST['txtaddress'];
    $update = "update tbl_user set user_name='".$Name."', user_email='".$Email."', user_contact='".$Contact."', user_address='".$Address."' where user_id='".$_SESSION["uid"]."'";
    
    if($con->query($update))
    {
        echo "<script>
                alert('Data Updated');
                window.location='MyProfile.php';
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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            max-width: 600px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-group label {
            font-weight: bold;
        }
        .btn {
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="container">
        <h3 class="text-center mb-4">Edit Profile</h3>
        <form id="form1" name="form1" method="post" action="">
            <div class="form-group">
                <label for="txtname">Name</label>
                <input type="text" name="txtname" id="txtname" class="form-control" value="<?php echo $row['user_name']; ?>" required />
            </div>
            <div class="form-group">
                <label for="txtemail">Email</label>
                <input type="email" name="txtemail" id="txtemail" class="form-control" value="<?php echo $row['user_email']; ?>" required />
            </div>
            <div class="form-group">
                <label for="txtcontact">Contact</label>
                <input type="text" name="txtcontact" id="txtcontact" class="form-control" value="<?php echo $row['user_contact']; ?>" required />
            </div>
            <div class="form-group">
                <label for="txtaddress">Address</label>
                <textarea name="txtaddress" id="txtaddress" class="form-control" rows="5" required><?php echo $row['user_address']; ?></textarea>
            </div>
            <button type="submit" name="btnsubmit" id="btnsubmit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

<?php 
include('Foot.php');
?>
