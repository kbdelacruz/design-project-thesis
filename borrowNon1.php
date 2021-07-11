<!DOCTYPE html>
<html>

<head>


    <title>BORROW-NON-CONSUMABLE</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.2.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>

    <script>
        var item_array = [];

        function removeA(arr) {
            var what, a = arguments,
                L = a.length,
                ax;
            while (L > 1 && arr.length) {
                what = a[--L];
                while ((ax = arr.indexOf(what)) !== -1) {
                    arr.splice(ax, 1);
                }
            }
            return arr;
        }

        function checkbox_borrowConsum(checkbox) {
            if (document.getElementById('btn_checkbox' + checkbox).checked) {
                item_array.push(checkbox);
            } else {
                removeA(item_array, checkbox);
            }
            if (item_array.length > 0) {
                document.getElementById('table_lister').disabled = false;
            } else {
                document.getElementById('table_lister').disabled = true;
            }
        }

        function done(event) {
            var insert_quantity = [];
            for (var loop = 0; loop < item_array.length; loop++) {
                insert_quantity.push([item_array[loop], document.getElementById('Insert_Quantity' + item_array[loop]).value]);
            }
            console.log(insert_quantity);
            var success_table;
            /*$.ajax({
                url: "php_function/Borrow_Consum.php",
                data: {
                    items: JSON.stringify(insert_quantity)
                },
                type: "POST",
                success: function(result) {
                    document.getElementById('table').innerHTML = "";
                    if (result == "Error!") {
                        alert("MALI ANG INYONG INPUT");
                    } else {
                        var table = JSON.parse(result);
                        for (var loop = 0; loop < table.length; loop++) {
                            console.log(table[loop]);
                            document.getElementById('table').innerHTML += "<tr><td>" + table[loop][0] + "</td><td>" + table[loop][1] + "</td></tr>";
                        }
                    }
                }
            });*/
        }
    </script>

</head>

<body>
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="sidebar-brand-text mx-2">Borrowing<sup>system</sup></div>
            </a>
            <hr class="sidebar-divider my-0">
            <div class="nav-item">
                <a class="nav-link" href="home.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </div>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Interface
            </div>
            <div class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Items</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">List of Items:</h6>
                        <a class="collapse-item" href="withProd.php">Equipments</a>
                        <a class="collapse-item" href="nonConsum_Items.php">Non-Consumable Items</a>
                        <a class="collapse-item" href="withoutProd.php">Cosumable Items</a>

                    </div>
                </div>
            </div>
            <div class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder-plus"></i>
                    <span>Borrow</span>
                </a>
                <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Categories:</h6>
                        <a class="collapse-item text-danger active" href="borrowNon.php">Equipments </a>
                        <a class="collapse-item" href="borrow_nonConsum.php">Non-Consumable Items</a>
                        <a class="collapse-item" href="borrowConsum.php">Consumable Items</a>
                    </div>
                </div>
            </div>
            <div class="nav-item">
                <a class="nav-link" href="return.php">
                    <i class="fas fa-fw fa-folder-minus"></i>
                    <span>Return</span></a>
            </div>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content" class="side">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-3 static-top shadow">
                    <h5>University of the East - Computer Engineering Department</h5>
                </nav>
                <div class="container-fluid">
                    <div class="mb-4"></div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-danger">ITEM LIST</h6>
                        </div>
                        <div class="card-body" style="height:419px;">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="input-group">
                                        <div class="col-lg-3">
                                            <div id="dataTable_filter" class="dataTables_filter">
                                                <div class="input-group">
                                                    <input type="search" class="form-control border-danger" id="" onkeyup="searchFun()" placeholder="Search..">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="float-right">
                                                <div id="dataTable_filter" class="dataTables_filter">
                                                    <button type="button" class="btn btn-outline-success" id="table_lister" onclick="done(event)" disabled>DONE</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $mysqli = new mysqli('localhost', 'root', '', 'inventorysystem') or die(mysqli_error($mysqli));
                                    $result = $mysqli->query("SELECT * FROM equipment") or die(mysqli_error($mysqli));
                                    ?>
                                    <div class="table table-responsive" style="height:335px;">
                                        <table class="table table-hover" id="myTable"><br>
                                            <thead>
                                                <tr role="row">
                                                    <th>PRODUCT NUMBER</th>
                                                    <th>CATEGORY NAME</th>
                                                    <th>PRODUCT DESCRIPTION</th>
                                                    <th>STATUS</th>
                                                    <th>ACTION</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($row = $result->fetch_assoc()) : ?>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1"> <?php echo $row['Product_Number']; ?></td>
                                                        <td> <?php echo $row['Category_Name']; ?></td>
                                                        <td><?php echo $row['Product_Description']; ?></td>
                                                        <td><?php echo $row['Status']; ?></td>
                                                        <td>
                                                            <input type="checkbox" name="btn_checkbox" id="btn_checkbox<?php echo $row['Product_Number']; ?>" onclick="checkbox_borrowConsum('<?php echo $row['Product_Number']; ?>')">
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                    </tr>
                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright © Your Website 2019</span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <div class="modal fade" id="Done" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="form-inline align-right">
                                <select name="item_category" class="form-control custom-select md-form">
                                    <option disabled selected>Professor's name...</option>
                                    <option>Consumables</option>
                                    <option>Trainers</option>
                                </select></div><br>
                            <div class="form-inline">
                                <input type="text" class="form-control" name="" placeholder="DELA CRUZ, JUAN" style="width: 28%;" required>&nbsp;
                                <input type="text" class="form-control" name="" placeholder="BSCPE" style="width: 10%;" required>&nbsp;
                                <input type="text" class="form-control" name="" placeholder="20170149196" style="width: 18%;" required>&nbsp;
                                <input type="text" class="form-control" name="" placeholder="December 25,2019 - WED" style="width: 29%;" required>&nbsp;
                                <input type="text" class="form-control" name="" placeholder="09:00AM" style="width: 12%;" required></div><br>
                            <div class="table-responsive">
                                <div class="col-sm-12">
                                    <table class="table table-hover" id="myTable"><br>
                                        <thead>
                                            <tr role="row">
                                                <th>PRODUCTION DESCRIPTION</th>
                                                <th>QUANTITY</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr role="row" class="even">
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="">DONE</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

</body>

</html>