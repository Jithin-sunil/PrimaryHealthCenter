<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Eventlizer::View Feedback</title>
<style>
  .h1-heading {
    font-size: 50px;
    font-family: "Rockville Solid Regular";
    color: #000000;
    margin-bottom: 20px;
    margin-top: 30px;
   }
</style>
</head>

<body>
<?php 
//session_start();
include("../Asset/connection/connection.php");
include('Head.php');
?>

<h1 class="h1-heading">FAQ</h1>
<form id="form1" name="form1" method="post" action="">
<table width="200" border="1" align="center">
  <tr>
    <td>SI NO.</td>
    <td>Feedback</td>
    <td>Date</td>
    <td>User</td>
  </tr>
  <?php
  $i = 0;
  $selQry = "select * from tbl_feedback f inner join tbl_user u on f.user_id=u.user_id ";
  $row = $con->query($selQry);
  while($data=$row->fetch_assoc())
  {
	  $i++;
  
  ?>
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $data["feedback_content"]?></td>
    <td><?php echo $data["feedback_date"]?></td>
    <td><?php echo $data["user_name"]?></td>
    
  </tr>
  <?php
  }
  ?>
</table>
</form>
</body></br></br></br></br></br></br></br>
<?php
include('foot.php');
?>
</html>