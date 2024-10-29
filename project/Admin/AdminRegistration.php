<?php
include('../Asset/connection/connection.php');


if(isset($_POST['btnsubmit']))
{
	$name=$_POST['txtname'];
	$contact=$_POST['txtcontact'];
	$email=$_POST['txtemail'];
	$password=$_POST['txtpassword'];
	
	$insQry="insert into tbl_admin(admin_name,admin_contact,admin_email,admin_password)values('".$name."','".$contact."','".$email."','".$password."')";
	if($con->query($insQry))
	{
		echo "
		<script>
		alert('inserted')
		</script>";
		//echo "inserted";
	}
	else
	{
		echo"failed";
	}
}




if(isset($_GET["did"]))
{
	$_delqry="delete from tbl_admin where admin_id=".$_GET["did"];
	if($con->query($_delqry))
	{
?>
<script>
alert("Data deleted")
window.location="AdminRegistration.php"
</script>
<?php
	}
}


?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Care&Cure::AdminRegistration</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtcontact"></label>
      <input type="text" name="txtcontact" id="txtcontact" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <input type="text" name="txtemail" id="txtemail" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txtpassword"></label>
      <input type="text" name="txtpassword" id="txtpassword" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btnsubmit" id="btnsubmit" value="Save" />
      <input type="reset" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>



 <table width="342" height="125" border="1">
    <tr>
      <td> #</td>
      <td>Name</td>
      <td>Contact</td>
      <td>Email</td>
      <td>Password</td>
      <td>Action</td>
    </tr>
    <?php
	$i=0;
	$selqry="select*from tbl_admin";
	$result=$con->query($selqry);
	while($row=$result->fetch_assoc())
	{
		$i++;
		?>	
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row["admin_name"];?></td>
      <td><?php echo $row["admin_contact"];?></td>
      <td><?php echo $row["admin_email"];?></td>
      <td><?php echo $row["admin_password"];?></td>
      <td><a href="AdminRegistration.php?did=<?php echo $row["admin_id"];?>">Delete </a> </td>
    </tr>
    <?php
	}
    ?>
  </table>
 