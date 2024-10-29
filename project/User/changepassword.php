<?php
include('../Asset/connection/connection.php');
include('Head.php');
session_start();

if(isset($_POST['btnsubmit']))
{
    $selqry="select * from tbl_user where user_id='".$_SESSION["uid"]."'";
    $result=$con->query($selqry);
    $row=$result->fetch_assoc();
    $password=$row['user_password'];
    $useroldpassword=$_POST['txtpassword'];
    $usernewpassword=$_POST['txtnew'];
    $userretypepassword=$_POST['txtretype'];
    
    if($password == $useroldpassword)
    {
        if($usernewpassword == $userretypepassword)
        {
            $update="update tbl_user set user_password='".$userretypepassword."' where user_id='".$_SESSION["uid"]."'";
            if($con->query($update))
            {
                echo "<script>
                    alert('Password updated successfully');
                    window.location='myprofile.php';
                </script>";
            }
        }
        else
        {
            echo "<script>alert('New passwords do not match');</script>";
        }
    }
    else
    {
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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            max-width: 500px;
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
        <h3 class="text-center mb-4">Change Password</h3>
        <form id="form1" name="form1" method="post" action="">
            <div class="form-group">
                <label for="txtpassword">Old Password</label>
                <input type="password" name="txtpassword" id="txtpassword" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="txtnew">New Password</label>
                <input type="password" name="txtnew" id="txtnew" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="txtretype">Re-Type New Password</label>
                <input type="password" name="txtretype" id="txtretype" class="form-control" required />
            </div>
            <button type="submit" name="btnsubmit" class="btn btn-primary">Change Password</button>
            <button type="reset" class="btn btn-secondary mt-2">Cancel</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<?php
include('Foot.php');
?>
