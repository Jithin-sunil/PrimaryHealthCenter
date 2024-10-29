<?php
include("../Connection/Connection.php");
$selQry="SELECT * from tbl_subcategory s inner join tbl_category c on c.category_id=s.category_id where TRUE";
if($_GET['cat']!=""){
    $selQry=$selQry." AND s.category_id=".$_GET['cat'];
}
if($_GET['name']!=""){
    $selQry=$selQry." AND subcategory_name LIKE '%".$_GET['name']."%'";
}
$res=$con->query($selQry);
if($res->num_rows>0){
    ?>
    <table border='1' cellspacing='10' cellpadding='10' align='center'>
        <tr>
            <?php
            $i=0;
                while($data=$res->fetch_assoc()){
                    $i++;
            ?>
            <td>
                    <p>Vaccine: <?php echo $data['subcategory_name'] ?></p>
                    <p>Category: <?php echo $data['category_name'] ?></p>
                    <p>Details: <?php echo $data['subcategory_details'] ?></p>
                    <p><a href="Phcbooking.php?did=<?php echo $data["subcategory_id"];?>">Book at PHC</a></p>
                    <p><a href="SCbooking.php?did=<?php echo $data["subcategory_id"];?>">Book at SC</a></p>
            </td>
            
        
            <?php
                if($i%4==0){
                    echo "</tr><tr>";
                }
                }
            ?>
        </tr>
    </table>
    <?php
}
else{
    echo "<h1 align='center'>No Data Found</h1>";
}
?>