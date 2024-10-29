<?php
$Result='';
if(isset($_POST["bt_add"]))
{
	$Number1=$_POST['txt_num1'];
	$Number2=$_POST['txt_num2'];
	$Result=$Number1+$Number2;
}
if(isset($_POST["bt_minus"]))
{
	$Number1=$_POST['txt_num1'];
	$Number2=$_POST['txt_num2'];
	$Result=$Number1-$Number2;
}
if(isset($_POST["bt_mul"]))
{
	$Number1=$_POST['txt_num1'];
	$Number2=$_POST['txt_num2'];
	$Result=$Number1*$Number2;
}
if(isset($_POST["bt_div"]))
{
	$Number1=$_POST['txt_num1'];
	$Number2=$_POST['txt_num2'];
	$Result=$Number1/$Number2;
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
  <table width="200" border="1">
    <tr>
      <td>Number1</td>
      <td><label for="txt_num1"></label>
      <input type="text" name="txt_num1" id="txt_num1" /></td>
    </tr>
    <tr>
      <td>Number2</td>
      <td><label for="txt_num2"></label>
      <input type="text" name="txt_num2" id="txt_num2" /></td>
    </tr>
    <tr>
      <td align="center" colspan="2"><input type="submit" name="bt_add" id="bt_add" value="+" />
      <input type="submit" name="bt_minus" id="bt_minus" value="-" />
      <input type="submit" name="bt_mul" id="bt_mul" value="*" />
      <input type="submit" name="bt_div" id="bt_div" value="/" /></td>
    </tr>
    <tr>
      <td>Result</td>
      <td><?php echo $Result ?></td>
    </tr>
  </table>
</form>
</body>
</html>