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


    <title>BORROW-NON-CONSUMABLE</title>
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

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Items</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">List of Items:</h6>
                        <a class="collapse-item" href="withProd.php">Equipments</a>
                        <a class="collapse-item" href="nonConsum_Items.php">Non-Consumable Items</a>
                        <a class="collapse-item" href="withoutProd.php">Consumable Items</a>
                    </div>
                </div>
            </li>



            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-folder-plus"></i>
                    <span>Borrow</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Categories:</h6>
                        <a class="collapse-item" href="borrowNon.php">Equipments</a>
                        <a class="collapse-item" href="borrow_nonConsum.php">Non-Consumable Items</a>
                        <a class="collapse-item" href="borrowConsum.php">Consumable Items</a>
                    </div>
                </div>
            </li>

            <li class="nav-item active">
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
                                <h6 class="m-0 font-weight-bold text-danger">RETURN</h6>
                            </div>

                            <div class="card-body" style="height:395px;">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                    <div class="table table-responsive">
                                        <table class="table table-hover" id="myTable"><br>

                                            <thead>
                                                <tr role="row">
                                                    <th>EQUIPMENT</th>
                                                    <th>NON-CONSUMABLE ITEMS</th>
                                            </thead>

                                            <tbody>
                                                <tr role="row" class="odd">
                                                    <td><a><button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#equipment">RETURN ITEMS</button></a></td>
                                                    <td><a><button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#nonConsumable">RETURN ITEMS</button></a></td>
                                                </tr>
                                                <tr role="row" class="even"></tr>
                                            </tbody>
                                        </table>
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



                    <!-- Add ITEMS Modal -->
                    <div class="modal fade" id="equipment" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="text-danger">EQUIPMENT</h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                        <div class="table-responsive">
                                            <div class="col-sm-12">
                                                <table class="table table-hover" id="myTable"><br>
                                     
                                                <thead>
                                                    <tr role="row">
                                                        <th>CATEGORY NAME</th>
                                                        <th>PRODUCT NUMBER</th>
                                                        <th>ITEM MODEL</th>
                                                        <th>PRODUCT DESCRIPTION</th>
                                                        <th>QUANTITY</th>
                                                        <th>DATE BORROWED</th>
                                                        <th>BORROW ID</th>
                                                        <th>ACTION</th>


                                                </thead>
                                                <tbody>

                                                    <?php
                                                               $mysqli = new mysqli('localhost','root','','inventorysystem') or die(mysqli_error($mysqli));
                                                               $result = $mysqli->query("SELECT * FROM borrow_equipments where Student_ID = '$student_num' and Status = 'Approved' ") or die(mysqli_error($mysqli));
                                                                               
                                                      while($row = $result->fetch_assoc()):
                                                      ?>
                                                    <tr >
                                                        <td class="sorting_1"><?php echo $row ['Category_Name'];?></td>
                                                        <td><?php echo $row ['Product_Number'];?></td>
                                                        <td><?php echo $row ['Item_Model'];?></td>
                                                        <td><?php echo $row ['Product_Description'];?></td>
                                                        <td><?php echo $row ['Quantity'];?></td>
                                                        <td><?php echo $row ['date'];?></td>
                                                        <td><?php echo $row ['BorrowID'];?></td>
                                                        <td>
                                                        <form method='post' action='return_.php'>
                                                            <input name='product'  value="<?php echo $row ['Product_Description'];?>" hidden />
                                                            <input name='model' value="<?php echo $row ['Item_Model'];?>" hidden/>
                                                            <input name='quantity'value="<?php echo $row ['Quantity'];?>" hidden/>
                                                            <input name='borrowid' value="<?php echo $row ['BorrowID']; ?>" hidden/>
                                                            <input name='product_number' value="<?php echo $row ['Product_Number']; ?>" hidden/>
                                                            
                                                            

                                                            <button type='submit' class='btn btn-primary' name='btn_return_equipment'>Return</button>
                                                        </form>
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
                                    



                    <div class="modal fade" id="nonConsumable" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="text-danger">NON CONSUMABLE</h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                




                                        <div class="table-responsive">
                                            <div class="col-sm-15">
                                                <table class="table table-hover" id="myTable"><br>

                                                <thead>
                                                <thead>
                                                    <tr role="row">
                                                        <th>ITEM NAME</th>
                                                        <th>ITEM TYPE</th>
                                                        <th>QUANTITY</th>
                                                        <th>DATE BORROWED</th>
                                                        <th>BORROWED ID</th>
                                                        <th>ACTION</th>


                                                </thead>
                                                <tbody>

                                                    <?php
                                                               $mysqli = new mysqli('localhost','root','','inventorysystem') or die(mysqli_error($mysqli));
                                                               $result = $mysqli->query("SELECT * FROM borrow_consumable where Student_ID = '$student_num' and ItemType='NON-CONSUMABLE'and Status = 'Approved'") or die(mysqli_error($mysqli));
                                                                               
                                                      while($row = $result->fetch_assoc()):
                                                      ?>
                                                    <tr >
                                                        <td class="sorting_1"><?php echo $row ['Item_Name'];?></td>   
                                                        <td><?php echo $row ['ItemType'];?></td>
                                                        <td><?php echo $row ['Quantity'];?></td>
                                                        <td><?php echo $row ['date'];?></td>
                                                        <td><?php echo $row ['BorrowID'];?></td>
                                                        
                                                        <td>
                                                        <form method='post' action='return_.php'>
                                                            <input name='name'  value="<?php echo $row ['Item_Name'];?>" hidden />
                                                            <input name='type' value="<?php echo $row ['ItemType'];?>" hidden/>
                                                            <input name='quantity'value="<?php echo $row ['Quantity'];?>" hidden/>
                                                            <input name='borrowid' value="<?php echo $row ['BorrowID']; ?>" hidden/>
                                                           
                                                            
                                                            

                                                            <button type='submit' class='btn btn-primary' name='btn_return_nonconsumable'>Return</button>
                                                        </form>
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


 <!-- EDIT CODE IN JAVASCRIPT -->




</body>

</html>
