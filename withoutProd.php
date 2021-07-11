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


    <title> CONSUMABLE ITEMS</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.2.css" rel="stylesheet">


    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="sidebar-brand-text mx-2">Borrowing<sup>system</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="home.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>


            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Items</span>
                </a>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">List of Items:</h6>
                        <a class="collapse-item" href="withProd.php">Equipments</a>
                        <a class="collapse-item" href="nonConsum_Items.php">Non-Consumable Items</a>
                        <a class="collapse-item  text-danger active" href="withoutProd.php">Cosumable Items</a>

                    </div>
                </div>
            </li>



            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder-plus"></i>
                    <span>Borrow</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Categories:</h6>
                        <a class="collapse-item" href="borrowNon.php">Equipments</a>
                        <a class="collapse-item" href="borrow_nonConsum.php">Non-Consumable Items</a>
                        <a class="collapse-item" href="borrowConsum.php">Consumable Items</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="return.php">
                    <i class="fas fa-fw fa-folder-minus"></i>
                    <span>Return</span></a>
            </li>






            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" class="side">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-3 static-top shadow">

                    <h5>University of the East - Computer Engineering Department</h5>



                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="mb-4"></div>




                    <!-- BEGIN -->



                 


                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-danger">ITEM LIST</h6>
                            </div>


                            <div class="card-body">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-lg"></div>
                                        <div class="col-lg-3">
                                            <div id="dataTable_filter" class="dataTables_filter">
                                                <div class="input-group">
                                                    <input type="search" class="form-control border-danger" id="searchbar" onkeyup="searchFun()" placeholder="Search..">
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                        $mysqli = new mysqli('localhost','root','','inventorysystem') or die(mysqli_error($mysqli));
                        $result = $mysqli->query("SELECT * FROM borrow_consumable where Student_ID = '$student_num' AND ItemType = 'CONSUMABLE'") or die(mysqli_error($mysqli));
                                        ?>

                                        <div class="table table-responsive">
                                            <table class="table table-hover" id="myTable"><br>

                                                <thead>
                                                    <tr role="row">
                                                        <th>ITEM NAME</th>
                                                        <th>QUANTITY</th>
                                                        <th>STATUS</th>

                                                </thead>
                                                <tbody>
                                                <?php
                          while($row = $result->fetch_assoc()):
                            include '../SADCAPSTONE/updatestatus.php';
                          ?>
                                               
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1"><?php echo $row['Item_Name'];?></td>
                                                        <td> <?php echo $row['Quantity'];?></td>
                                                        <td><?php echo $row['Status'];?></td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                    </tr>
                                                </tbody>
                                                <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
         



            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © Your Website 2019</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
    </div>



    <!-- Logout Modal-->

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="submit" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit" name="logout">Logout</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>


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
