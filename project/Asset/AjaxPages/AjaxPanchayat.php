<option>...Select...</option>
<?php
include('../connection/connection.php');
$selqry="select * from tbl_panchayat where district_id=".$_GET["did"];
$result=$con->query($selqry);
while($row=$result->fetch_assoc())
{
	?>
	<option value="<?php echo $row["panchayat_id"];?> "> <?php echo $row["panchayat_name"];?></option>
	<?php
}
?>