   <option>...Select...</option>
<?php
include('../connection/connection.php');
		$selqry="select * from tbl_subcenter where village_id=".$_GET["did"];
		$result=$con->query($selqry);
		while($row=$result->fetch_assoc())
		{
			?>
            <option value="<?php echo $row["sc_id"];
			?> "> <?php echo $row["sc_address"];?></option>
            <?php
		}
		?>