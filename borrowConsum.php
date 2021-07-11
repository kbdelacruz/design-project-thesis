<?php

session_start();
$student_num =  $_SESSION["user_student"];

date_default_timezone_set("Asia/Manila"); 
$timeinborrow = date("h:i:s a");
$dateinborrow = date("Y/m/d");
?>
<!DOCTYPE html>
<html>

<head>


    <title>BORROW-CONSUMABLE</title>
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

        function digitvalidation(evt) {
            var ch = String.fromCharCode(evt.which);
            if (!(/[0-9]/.test(ch))) {
                evt.preventDefault();
            }
        }

        function checkbox_borrowConsum(checkbox) {
            var check = true;
            if (document.getElementById('btn_checkbox' + checkbox).checked) {
                item_array.push(checkbox);
            } else {
                removeA(item_array, checkbox);
            }
            for (var loop = 0; loop < item_array.length; loop++) {
                if (document.getElementById('Insert_Quantity' + item_array[loop]).value <= 0) {
                    check = false;
                    break;
                }
            }
            if (item_array.length > 0 && check) {
                document.getElementById('table_lister').disabled = false;
            } else {
                document.getElementById('table_lister').disabled = true;
            }
        }

        function quantity_borrowConsume() {
            var check = true;
            for (var loop = 0; loop < item_array.length; loop++) {
                if (document.getElementById('Insert_Quantity' + item_array[loop]).value <= 0) {
                    check = false;
                    break;
                }
            }
            if (item_array.length > 0 && check) {
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
            var success_table;
            $.ajax({
                url: "php_function/Borrow_Consum.php",
                data: {
                    items: JSON.stringify(insert_quantity)
                },
                type: "POST",
                success: function(result) {
                    document.getElementById('table').innerHTML = "";
                    if (result == "Error!") {
                        alert("Invalid Input");
                    } else {
                        var table = JSON.parse(result);
                        for (var loop = 0; loop < table.length; loop++) {
                            console.log(table[loop]);
                           
                            document.getElementById('table').innerHTML += "<tr><td>" + table[loop][0] + "</td><td>" + table[loop][1] + "</td></tr>";
                        }
                    }
                }
            });
        }
        function insert(event){
            var insert_quantity = [];
            for (var loop = 0; loop < item_array.length; loop++) {
                insert_quantity.push([item_array[loop], document.getElementById('Insert_Quantity' + item_array[loop]).value]);

               
            }
            var success_table;
            $.ajax({
                url: "php_function/Borrow_Consum.php",
                data: {
                    items: JSON.stringify(insert_quantity)
                },
                type: "POST",
                success: function(result) {
                        var table = JSON.parse(result);
                        for (var loop = 0; loop < table.length; loop++) {
                            console.log(table[loop]);
                            $.ajax({
                url: "php_function/insert_borrow_consumable.php",
                data: { name: table[loop][0], qty: table[loop][1] } ,
                type: "POST",
                success: function(result) {
                    
                        }
                            });
                            
                        }
                    }
                
            });
           
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
                        <a class="collapse-item" href="borrowNon.php">Equipments</a>
                        <a class="collapse-item" href="borrow_nonConsum.php">Non-Consumable Items</a>
                        <a class="collapse-item text-danger active" href="borrowConsum.php">Consumable Items</a>
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
                                                    <input type="search" class="form-control border-danger" id="searchbar" onkeyup="searchFun()" placeholder="Search..">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="float-right">
                                                <div id="dataTable_filter" class="dataTables_filter">
                                                    
                                                        <button type="button" class="btn btn-outline-success" name="btn_done" data-toggle="modal" data-target="#Done" onclick="done(event)" id="table_lister" disabled>DONE</button>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $mysqli = new mysqli('localhost', 'root', '', 'inventorysystem') or die(mysqli_error($mysqli));
                                    $result = $mysqli->query("SELECT * FROM consumable_items") or die(mysqli_error($mysqli));
                                    ?>
                                    <div class="table table-responsive" style="height:335px;">
                                        <table class="table table-hover" id="myTable"><br>
                                            <thead>
                                                <tr role="row">
                                                    <th>ITEM NAME</th>
                                                    <th>QUANTITY</th>
                                                    <th >STATUS</th>
                                                    <th>INSERT QUANTITY</th>
                                                    <th>ACTION</th>

                                            </thead>
                                            <tbody>
                                           
                                                <?php 
                                                 $count = mysqli_num_rows($result);
                                                 $i=1;
                                                while ($row = $result->fetch_assoc()) :  ?>
                                                <p id='count' hidden><?php echo $count ?></p>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1"> <?php echo $row['Item_Name']; ?></td>
                                                        <td id="<?php echo $i; $i++; ?>"><?php echo $row['Quantity']; ?></td>
                                                        <td><?php echo $row['Status']; ?></td>
                                                        <td>
                                                            <form action="borrowConsum_connection.php" method="POST">
                                                            <?php if($row['Quantity'] != 0){ ?>
                                                                <input type="text" class="btn btn-outline-success" id="Insert_Quantity<?php echo $row['Item_Name']; ?>" onkeypress=" digitvalidation(event)" onchange="quantity_borrowConsume(event)">
                                                            </form>
                                                        </td>
                                                        
                                                        <td>
                                                            <input type="checkbox" name="btn_checkbox" id="btn_checkbox<?php echo $row['Item_Name']; ?>" onclick="checkbox_borrowConsum('<?php echo $row['Item_Name']; ?>')">
                                                        </td>
                                                            <?php  } ?>
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
                    <?php 
                    $query = mysqli_query($mysqli, "SELECT * FROM student_account where ID_Number = '$student_num'");
                    $fetch = mysqli_fetch_assoc($query);
                    ?>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="form-inline align-right">
                                <select name="item_category" class="form-control custom-select md-form" require>
                                    <option disabled selected >Please Select Your Professor's name... </option>
                                    <option>Engr. Limkian</option>
                                    <option>Engr. Corpuz</option>
                                    <option>Engr. Errol</option>
                                </select></div><br>
                            <div class="form-inline">
                                <input type="text" class="form-control" name="" value="<?php echo $fetch['First_Name']." ".$fetch['Last_Name']; ?>" style="width: 28%;" readonly>&nbsp;
                                <input type="text" class="form-control" name="" Value="BSCPE" style="width: 10%;" readonly>&nbsp;
                                <input type="text" class="form-control" name="" value="<?php echo $student_num; ?>" style="width: 18%;" readonly>&nbsp;
                                <input type="text" class="form-control" name="" Value=<?php echo $dateinborrow ?> style="width: 29%;" readonly>&nbsp;
                                <input type="text" class="form-control" name="" Value=<?php echo $timeinborrow ?> style="width: 12%;" readonly>
                            </div><br>
                            <div class="table-responsive">
                                <div class="col-sm-12">
                                    <table class="table table-hover" id="myTable"><br>

                                        <thead>
                                            <tr role="row">
                                                <th>ITEM NAME</th>
                                                <th>QUANTITY</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table">
                                            <tr role="row" class="odd">
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" onclick="insert(event)" >DONE</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
        var count = document.getElementById('count').innerHTML
        for($x=1; count >= $x; $x++){
           var quantity = document.getElementById($x).innerHTML
            if(quantity == 0){
                document.getElementById($x).innerHTML
            }
        }
        </script>

<script>
        function searchFun() {
            var filter, myTable, tr, td, i, td1, td2, txtValue, txtValue1, txtValue2;
            input = document.getElementById("searchbar");
            filter = input.value.toUpperCase();
            myTable = document.getElementById("myTable");
            tr = myTable.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                td1 = tr[i].getElementsByTagName("td")[1];
                td2 = tr[i].getElementsByTagName("td")[2];
                if (td || td1 || td2) {
                    txtValue = td.textContent || td.innerText;
                    txtValue1 = td1.textContent || td1.innerText;
                    txtValue2 = td2.textContent || td2.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

    </script>
</body>

</html>