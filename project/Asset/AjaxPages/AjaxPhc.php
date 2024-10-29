<option>...Select...</option>
<?php
include('../connection/connection.php');
$selqry="select * from tbl_phc where panchayat_id=".$_GET["did"];
$result=$con->query($selqry);
while($row=$result->fetch_assoc())
{
	?>
	<option value="<?php echo $row["phc_id"];?> "> <?php echo $row["phc_address"];?></option>
	<?php
}
?>