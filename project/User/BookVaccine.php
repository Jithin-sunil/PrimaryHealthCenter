<?php
include('../Asset/connection/connection.php');
include('Head.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccine Search</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .search-container {
            margin-top: 50px;
            padding: 30px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .form-inline .form-control {
            margin: 5px;
        }

        .form-control {
            height: calc(2.25rem + 2px);
            border-radius: 5px;
        }

        select, input[type="text"] {
            width: 100%;
            border: 1px solid #ced4da;
            padding: 5px 10px;
        }

        #search {
            margin-top: 20px;
        }

        table {
            width: 100%;
        }

        .btn-primary {
            margin-top: 20px;
        }
    </style>
</head>

<body onload="getVacc()">
    <div class="container search-container">
        <h3 class="text-center mb-4">Vaccine Search</h3>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="" method="post" class="form-inline">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="sel_cat" class="sr-only">Select Category</label>
                        <select onchange="getVacc()" name="sel_cat" id="sel_cat" class="form-control">
                            <option value="">Select Category</option>
                            <?php
                            $selCat = "select * from tbl_category";
                            $resCat = $con->query($selCat);
                            while ($dataCat = $resCat->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $dataCat['category_id'] ?>"><?php echo $dataCat['category_name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="txt_search" class="sr-only">Search</label>
                        <input onkeyup="getVacc()" type="text" name="txt_search" id="txt_search" class="form-control" placeholder="Search Here...">
                    </div>
                </form>
                <div id="search"></div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function getVacc() {
            var cat = document.getElementById('sel_cat').value;
            var name = document.getElementById('txt_search').value;
            $.ajax({
                url: "../Asset/AjaxPages/AjaxVaccine.php?cat=" + cat + "&name=" + name,
                success: function(result) {
                    $("#search").html(result);
                }
            });
        }
    </script>
</body>

</html>
<?php
include('Foot.php');
?>
