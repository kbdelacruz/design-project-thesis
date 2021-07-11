<?php
//Logout the system
$mysqli = new mysqli('localhost','root','','inventorysystem') or die(mysqli_error($mysqli));
if(isset($_POST['logout'])){
    header("location: login.php");
}
?>