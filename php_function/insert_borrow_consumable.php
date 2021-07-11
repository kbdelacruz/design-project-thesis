<?php
session_start();

$mysqli = new mysqli('localhost','root','','inventorysystem') or die(mysqli_error($mysqli));
date_default_timezone_set("Asia/Manila"); 
$studentid = $_SESSION["user_student"];
$query = mysqli_query($mysqli, "SELECT * from student_account where ID_Number = '$studentid'");
$row = mysqli_fetch_assoc($query);
$studentname = "".$row['First_Name']."".$row['Last_Name']."";


$name=$_POST['name'];
$qty=$_POST['qty'];


$borrowid = rand(999,99);

$date = date('m-d-Y');
$time = date('h:i:s a');

$sql = "INSERT INTO `borrow_consumable`( `BorrowID`,`Student_Name`,`Student_ID`,`ItemType`, `Item_Name`, `Quantity`,`date`,`time`, `Status`) 
VALUES ('$borrowid','$studentname','$studentid','CONSUMABLE','$name','$qty','$date','$time','Pending')";
if (mysqli_query($mysqli, $sql)) {
    echo json_encode(array("statusCode"=>200));
} 
else {
    echo json_encode(array("statusCode"=>201));
}
mysqli_close($conn);

?>