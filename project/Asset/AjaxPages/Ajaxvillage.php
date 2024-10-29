   <option>...Select...</option>
<?php
include('../connection/connection.php');
		$selqry="select * from tbl_village where panchayat_id=".$_GET["vid"];
		$result=$con->query($selqry);
		while($row=$result->fetch_assoc())
		{
			?>
            <option value="<?php echo $row["village_id"];
			?> "> <?php echo $row["village_name"];?></option>
            <?php
		}
		?>