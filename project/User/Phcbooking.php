<?php
include('../Asset/Connection/Connection.php');
include('Head.php');
session_start();
if (isset($_POST['btnsubmit'])) {
    $date = $_POST['txtdate'];
    $ins = "INSERT INTO tbl_booking (user_id, subcategory_id, booking_fordate, booking_date, phc_id) 
            VALUES ('" . $_SESSION['uid'] . "', '" . $_GET['did'] . "', '" . $date . "', CURDATE(), '" . $_POST["txt_phc"] . "')";
    if ($con->query($ins)) {
?>
        <script>
            alert('Vaccine Booked.');
            window.location = "Mybooking.php";
        </script>
<?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Booking Form</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .booking-form-container {
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .form-header {
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container booking-form-container">
        <h2 class="form-header">Vaccine Booking Form</h2>
        <form id="form1" name="form1" method="post" action="">
            <div class="form-group">
                <label for="txtdistrict">District</label>
                <select name="txtdistrict" id="txtdistrict" class="form-control" onchange="getPanchayat(this.value)">
                    <option>--select--</option>
                    <?php
                    $selqry = "SELECT * FROM tbl_district";
                    $result = $con->query($selqry);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <option value="<?php echo $row["district_id"]; ?>"><?php echo $row["district_name"]; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="txt_panchayth">Panchayat</label>
                <select name="txt_panchayth" id="txt_panchayth" class="form-control" onchange="getPHC(this.value)">
                    <option>--select--</option>
                </select>
            </div>
            <div class="form-group">
                <label for="txt_phc">PHC</label>
                <select name="txt_phc" id="txt_phc" class="form-control">
                    <option>--select--</option>
                </select>
            </div>
            <div class="form-group">
                <label for="txtdate">Date</label>
                <input type="text" name="txtdate" id="txtdate" class="form-control" />
            </div>
            <div class="text-center">
                <input type="submit" name="btnsubmit" id="btnsubmit" class="btn btn-primary" value="Submit" />
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        function getPanchayat(did) {
            $.ajax({
                url: "../Asset/AjaxPages/AjaxPanchayat.php?did=" + did,
                success: function (result) {
                    $("#txt_panchayth").html(result);
                }
            });
        }

        function getPHC(did) {
            $.ajax({
                url: "../Asset/AjaxPages/AjaxPHC.php?did=" + did,
                success: function (result) {
                    $("#txt_phc").html(result);
                }
            });
        }

        const dateInput = document.getElementById('txtdate');

        flatpickr(dateInput, {
            disable: [
                function (date) {
                    // Disable dates that are not Wednesdays
                    return date.getDay() !== 3; // 3 corresponds to Wednesday
                }
            ],
            dateFormat: "Y-m-d",
            minDate: "today",
            maxDate: new Date().fp_incr(30) // Optional: You can adjust the max date range if needed
        });
    </script>
    <?php include('Foot.php'); ?>
</body>
</html>
