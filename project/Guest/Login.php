<?php
include('../Asset/connection/connection.php');
session_start();
if(isset($_POST['btnsubmit']))
{
	$Email=$_POST['txtemail'];
	$Password=$_POST['txtpassword'];
	$selqry="select *  from tbl_admin where admin_email='".$Email."' and admin_password='".$Password."'";
	$result=$con->query($selqry);
	
	$sel="select * from tbl_dmo where dmo_email='".$Email."' and dmo_password='".$Password."'";
	$res=$con->query($sel);
	
	$selq="select * from tbl_phc where phc_email='".$Email."' and phc_password='".$Password."'";
	$resu=$con->query($selq);
	
	$selqr="select *  from tbl_subcenter where sc_email='".$Email."' and sc_password='".$Password."'";
	$ress=$con->query($selqr);
	
	$select="select * from tbl_user where user_email='".$Email."' and user_password='".$Password."'";
	$resul=$con->query($select);
	
	if($dataadmin=$result->fetch_assoc())
	{
		$_SESSION["aid"]=$dataadmin["admin_id"];
		header('location:../Admin/homepage.php');
	}
	else if($datadmo=$res->fetch_assoc())
	{
		$_SESSION["did"]=$datadmo["dmo_id"];
		header('location:../DMO/homepage.php');
}
    else if($dataphc=$resu->fetch_assoc())
	{
		$_SESSION["pid"]=$dataphc["phc_id"];
		header('location:../PHC/homepage.php');
	}
	
	else if($datasc=$ress->fetch_assoc())
	{
		$_SESSION["sid"]=$datasc["sc_id"];
		header('location:../Subcenter/homepage.php');
	}
	
	else if($datauser=$resul->fetch_assoc())
	{
		$_SESSION["uid"]=$datauser["user_id"];
		header('location:../User/homepage.php');
}
}
	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vaccine Booking Registration</title>
<style>
    /* Resetting default styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    /* Page background */
    body {
        background-color: #f5f7fa;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    /* Form styling */
    .form-container {
        width: 350px;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333333;
    }

    /* Table styling */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        padding: 10px 0;
        color: #555555;
        font-size: 14px;
    }

    /* Input styling */
    input[type="text"], input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #d3d3d3;
        border-radius: 4px;
        margin-top: 5px;
        font-size: 14px;
        color: #333333;
    }

    input[type="text"]:focus, input[type="password"]:focus {
        border-color: #007bff;
        outline: none;
    }

    /* Submit button styling */
    #btnsubmit {
        width: 100%;
        padding: 12px;
        background-color: #007bff;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    #btnsubmit:hover {
        background-color: #0056b3;
    }

    /* Footer text */
    .footer-text {
        text-align: center;
        margin-top: 10px;
        font-size: 12px;
        color: #777777;
    }
</style>
</head>

<body>
<div class="form-container">
    <h2>Vaccine Registration</h2>
    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <td>Email</td>
                <td><input type="text" name="txtemail" id="txtemail" placeholder="Enter your email" /></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="txtpassword" id="txtpassword" placeholder="Enter your password" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnsubmit" id="btnsubmit" value="Login" />
                </td>
            </tr>
        </table>
    </form>
  
</div>
</body>
</html>
