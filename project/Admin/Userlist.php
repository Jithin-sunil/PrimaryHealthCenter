<?php
include('../Asset/connection/connection.php');
include('Head.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table-container {
            margin-top: 30px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        img {
            border-radius: 5px;
        }
        .action-links a {
            margin-right: 10px;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="table-container">
        <h2 class="text-center">User List</h2>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Village</th>
                    <th>Panchayat</th>
                    <th>District</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $i = 0;
            $selqry = "
                SELECT 
                    s.user_id, s.user_name, s.user_email, s.user_contact, 
                    s.user_dob, s.user_gender, s.user_address, s.user_photo, 
                    v.village_name, 
                    p.panchayat_name, 
                    d.district_name
                FROM 
                    tbl_user s 
                INNER JOIN 
                    tbl_village v ON s.village_id = v.village_id
                INNER JOIN 
                    tbl_panchayat p ON v.panchayat_id = p.panchayat_id
                INNER JOIN 
                    tbl_district d ON p.district_id = d.district_id
            ";
            $result = $con->query($selqry);
            while ($row = $result->fetch_assoc()) {
                $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo htmlspecialchars($row["user_name"]); ?></td>
                    <td><?php echo htmlspecialchars($row["village_name"]); ?></td>
                    <td><?php echo htmlspecialchars($row["panchayat_name"]); ?></td>
                    <td><?php echo htmlspecialchars($row["district_name"]); ?></td>
                    <td><?php echo htmlspecialchars($row["user_email"]); ?></td>
                    <td><?php echo htmlspecialchars($row["user_contact"]); ?></td>
                    <td><?php echo htmlspecialchars($row["user_dob"]); ?></td>
                    <td><?php echo htmlspecialchars($row["user_gender"]); ?></td>
                    <td><?php echo htmlspecialchars($row["user_address"]); ?></td>
                    <td>
                        <a href="../Asset/Files/Userlist/<?php echo htmlspecialchars($row["user_photo"]); ?>" target="_blank">
                            <img src="../Asset/Files/Userlist/<?php echo htmlspecialchars($row["user_photo"]); ?>" width="100" height="100" alt="Photo">
                        </a>
                    </td>
                    <td class="action-links">
                        <a href="Userlist.php?did=<?php echo $row["user_id"]; ?>" class="btn btn-success btn-sm">Allotted</a>
                        <a href="Userlist.php?did=<?php echo $row["user_id"]; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Include Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
