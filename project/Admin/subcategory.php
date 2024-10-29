<?php
include('../Asset/connection/connection.php');

$Category = "";
$subcategory = "";
$Subcategoryid = $Details = "";
include('Head.php');

if (isset($_POST['btnsubmit'])) {
    $Category = $_POST['txtname'];
    $Subcategory = $_POST['txtsub'];
    $Subcategoryid = $_POST['txtsubcategory'];
    $Details = $_POST['txtdetails'];

    if ($Subcategoryid == "") {
        $insqry = "insert into tbl_subcategory(category_id, subcategory_name, subcategory_details) values('" . $Category . "','" . $Subcategory . "','" . $Details . "')";
        if ($con->query($insqry)) {
            echo "<script>alert('Inserted');</script>";
        } else {
            echo "Failed";
        }
    } else {
        $update = "update tbl_subcategory set subcategory_name='" . $Subcategory . "', subcategory_details='" . $Details . "', category_id='" . $Category . "' where Subcategory_id=" . $Subcategoryid;
        if ($con->query($update)) {
            echo "<script>alert('Data Updated'); window.location='subcategory.php';</script>";
        }
    }
}

if (isset($_GET["did"])) {
    $delqry = "delete from tbl_subcategory where Subcategory_id=" . $_GET["did"];
    if ($con->query($delqry)) {
        echo "<script>alert('Data Deleted'); window.location='subcategory.php';</script>";
    }
}

if (isset($_GET["edt"])) {
    $selqry = "select * from tbl_subcategory where subcategory_id=" . $_GET["edt"];
    $res = $con->query($selqry);
    $data = $res->fetch_assoc();
    $subcategory = $data["subcategory_name"];
    $Subcategoryid = $data["subcategory_id"];
    $Category = $data["category_id"];
    $Details = $data["subcategory_details"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subcategory Management</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            margin-top: 30px;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .table-container {
            margin-top: 30px;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="form-container">
        <h2 class="text-center">Manage Subcategory</h2>
        <form id="form1" name="form1" method="post" action="">
            <div class="form-group">
                <label for="txtname">Category</label>
                <select name="txtname" id="txtname" class="form-control">
                    <option>--select--</option>
                    <?php
                    $selqry = "select * from tbl_category";
                    $result = $con->query($selqry);
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <option <?php if ($row["category_id"] == $Category) echo "selected"; ?>
                                value="<?php echo $row["category_id"]; ?>"><?php echo $row["category_name"]; ?></option>
                        <?php
                    } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="txtsub">Subcategory</label>
                <input type="text" name="txtsub" id="txtsub" value="<?php echo $subcategory; ?>" class="form-control"/>
                <input type="hidden" name="txtsubcategory" id="txtsubcategory" value="<?php echo $Subcategoryid; ?>"/>
            </div>
            <div class="form-group">
                <label for="txtdetails">Details</label>
                <textarea name="txtdetails" rows="4" id="txtdetails" class="form-control"><?php echo $Details; ?></textarea>
            </div>
            <button type="submit" name="btnsubmit" id="btnsubmit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>

    <div class="table-container">
        <h3 class="text-center">Subcategory List</h3>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Subcategory</th>
                <th>Category</th>
                <th>Details</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 0;
            $selqry = "select * from tbl_subcategory s inner join tbl_category c on s.category_id=c.category_id";
            $result = $con->query($selqry);
            while ($row = $result->fetch_assoc()) {
                $i++;
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row["subcategory_name"]; ?></td>
                    <td><?php echo $row["category_name"]; ?></td>
                    <td><?php echo $row["subcategory_details"] ?></td>
                    <td>
                        <a href="subcategory.php?did=<?php echo $row["subcategory_id"]; ?>" class="btn btn-danger btn-sm">Delete</a>
                        <a href="subcategory.php?edt=<?php echo $row["subcategory_id"]; ?>" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
include('Foot.php');
?>
