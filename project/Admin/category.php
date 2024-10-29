<?php
include('../Asset/connection/connection.php');
$categoryname='';
$categoryid='';
include('Head.php');
if(isset($_POST['bt_submit']))
{
	$category=$_POST['txt_name'];
	$categoryid=$_POST["category_id"];
	if($categoryid=="")
	
{
	$insqry="insert into tbl_category(category_name)values('".$category."')";
	if($con->query($insqry))
	{
		echo"<script>
		alert('inserted');
		</script>";
	
	}
	else
	{
		echo "failed";
	}
} 
else
{
	$update = "update tbl_category set category_name='".$category."'where category_id=".$categoryid;
	if($con->query($update))
	{
		echo"<script>
		alert('Data Updated')
		window.location='category.php'
		</script>";
	}
}
}
if(isset($_GET["did"]))
{
	$delqry="delete from tbl_category where category_id=".$_GET["did"];
	if($con->query($delqry))
	{
?>
<script>
alert("Data Deleted")
window.location="category.php"
</script>
<?php
	}
}
if(isset($_GET["eid"]))
{
	$selqry="select * from tbl_category where category_id=".$_GET["eid"];
	$res=$con->query($selqry);
	$data=$res->fetch_assoc();
	$categoryname=$data["category_name"];
	$categoryid=$data["category_id"];
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="400" border="1">
    <tr>
      <td> category name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $categoryname;?>"/>
      <input type="hidden" name="category_id" value="<?php echo $categoryid;?>"</td>
    </tr>
    <tr>
      <td align="center" colspan="2"><input type="submit" name="bt_submit" id="bt_submit" value="Submit" />
      <input type="reset" name="bt_clear" id="bt_clear" value="clear" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="200" border="1">
    <tr>
      <td>#</td>
      <td>Category</td>
      <td>Action</td>
    </tr>
    
	<?php
	$i=0;
	$selqry="select * from tbl_category";
	$result=$con->query($selqry);  
	while($row=$result->fetch_assoc())
	{
	$i++;
    ?>
    
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row["category_name"]; ?></td>
      <td><a href="category.php?did=<?php echo $row["category_id"];?>">Delete</a>
      <a href="category.php?eid=<?php echo $row["category_id"];?>">Edit</a></td>
    </tr>
    <?php
}
?>
 </table>
</form>
</body>
</html>
<?php
include('Foot.php');
?>