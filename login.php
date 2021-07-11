<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'inventorysystem') or die(mysqli_error($mysqli));
if (isset($_POST['btn_student_login'])) {
    $student = $_POST['student_number'];
    $_SESSION["user_student"] = $student;
    $result = $mysqli->query("SELECT ID_Number AS student_number FROM student_account WHERE ID_Number='$student'") or die(mysqli_error($mysqli));
    $values = mysqli_fetch_assoc($result);
    $student_user = $values['student_number'];
    if ($student_user == $student) {
        header("location: home.php");
    } else {
        print "<script language='JavaScript'>
              window.alert('Student Number Does Not Exist!')
              window.location.href='login.php';
               </script>";
        $student = '';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script language="javascript" type="text/javascript">
        window.history.forward();
    </script>
    <script type="application/javascript">
        function digitvalidation(evt) {
            var ch = String.fromCharCode(evt.which);
            if (!(/[0-9]/.test(ch))) {
                evt.preventDefault();
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body">
                        <div class="col-lg">
                            <div class="p-3">
                                <div class="text-center">
                                    <div><img src="cpe.png" class="logo" width="90" height="90"></div>
                                    <hr><br>
                                </div>
                                <form action="login.php" method="POST" class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="student_number" placeholder="Enter Student Number" onkeypress=" digitvalidation(event)" maxlength="11" required></div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="btn_student_login">Login</button>
                                    </div><br>
                                </form>
                                <hr><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>