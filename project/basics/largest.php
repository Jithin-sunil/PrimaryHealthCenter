<?php
$RESULT='';
if(isset($_POST["bt_large"]))
{
	$NUMBER1=$_POST['txt_num1'];
	$NUMBER2=$_POST['txt_num2'];
	$NUMBER3=$_POST['txt_num3'];
	if($NUMBER1>$NUMBER2 and $NUMBER1>$NUMBER3)
	{
		$RESULT=$NUMBER1;
	}
	elseif($NUMBER2>$NUMBER3 and $NUMBER2>$NUMBER1)
	{
		$RESULT=$NUMBER2;
	}
	else
	{
		$RESULT=$NUMBER3;
	}
	
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
      <td>NUMBER1</td>
      <td><label for="txt_num1"></label>
      <input type="text" name="txt_num1" id="txt_num1" /></td>
    </tr>
    <tr>
      <td>NUMBER2</td>
      <td><label for="txt_num2"></label>
      <input type="text" name="txt_num2" id="txt_num2" /></td>
    </tr>
    <tr>
      <td>NUMBER3</td>
      <td><label for="txt_num3"></label>
      <input type="text" name="txt_num3" id="txt_num3" /></td>
    </tr>
    <tr>
      <td align="center" colspan="2"><input type="submit" name="bt_large" id="bt_large" value="Submit" /></td>
    </tr>
    <tr>
      <td>RESULT</td>
      <td><?php echo $RESULT ?></td>
    </tr>
  </table>
</form>
</body>
</html>