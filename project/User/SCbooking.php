<?php
include('../Asset/connection/connection.php');
include('Head.php');
session_start();

if (isset($_POST['btnsubmit'])) {
    $date = $_POST['txtdate'];
    $ins = "INSERT INTO tbl_booking (user_id, subcategory_id, booking_fordate, booking_date, sc_id)
            VALUES ('" . $_SESSION['uid'] . "', '" . $_GET['did'] . "', '" . $date . "', CURDATE(), '" . $_POST["txt_subcenter"] . "')";
    
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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <title>Vaccine Booking</title>
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
        .flatpickr-calendar .flatpickr-day.disabled {
            pointer-events: none;
            background-color: #e0e0e0; /* Light gray to indicate disabled dates */
        }
    </style>
</head>

<body>
    <div class="container booking-form-container">
        <h2 class="form-header">Vaccine Booking Form</h2>
        <form id="form1" name="form1" method="post" action="">
            <div class="form-group">
                <label for="txt_district">District</label>
                <select name="txt_district" id="txt_district" class="form-control" onchange="getPanchayat(this.value)">
                    <option>--Select--</option>
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
                <label for="txt_panchayath">Panchayat</label>
                <select name="txt_panchayath" id="txt_panchayath" class="form-control" onchange="getVillage(this.value)">
                    <option>--Select--</option>
                </select>
            </div>
            <div class="form-group">
                <label for="txt_village">Village</label>
                <select name="txt_village" id="txt_village" class="form-control" onchange="getSubCenter(this.value)">
                    <option>--Select--</option>
                </select>
            </div>
            <div class="form-group">
                <label for="txt_subcenter">Sub Center</label>
                <select name="txt_subcenter" id="txt_subcenter" class="form-control">
                    <option>--Select--</option>
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

    <script src="../Asset/JQ/jQuery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        function getPanchayat(did) {
            $.ajax({
                url: "../Asset/AjaxPages/AjaxPanchayat.php?did=" + did,
                success: function (result) {
                    $("#txt_panchayath").html(result);
                }
            });
        }
        
        function getVillage(did) {
            $.ajax({
                url: "../Asset/AjaxPages/Ajaxvillage.php?vid=" + did,
                success: function (result) {
                    $("#txt_village").html(result);
                }
            });
        }

        function getSubCenter(did) {
            $.ajax({
                url: "../Asset/AjaxPages/Ajaxsubcenter.php?did=" + did,
                success: function (result) {
                    $("#txt_subcenter").html(result);
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
