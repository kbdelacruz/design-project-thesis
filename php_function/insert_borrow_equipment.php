<?php
session_start();
$mysqli = new mysqli('localhost','root','','inventorysystem') or die(mysqli_error($mysqli));
date_default_timezone_set("Asia/Manila"); 
$studentid = $_SESSION["user_student"];

echo $studentid;
$query = mysqli_query($mysqli, "SELECT * from student_account where ID_Number = '$studentid'");
$row = mysqli_fetch_assoc($query);
$studentname = "".$row['First_Name']."".$row['Last_Name']."";


$productnumber = $_POST['name'];
$qty=$_POST['qty'];


$borrowid = rand(999,99);
$date = date('m-d-Y');
$time = date('h:i:s a');

$queryequipment = mysqli_query($mysqli, "SELECT * from equipment where Product_Number = '$productnumber'");
$fetch = mysqli_fetch_assoc($queryequipment);
$categoryname = $fetch['Category_Name'];
$itemmodel = $fetch['Item_Model'];
$prodcutdescription = $fetch['Product_Description'];



$sql = "INSERT INTO `borrow_equipments`(`BorrowID`, `Student_Name`, `Student_ID`, `ItemType`, `Category_Name`, `Product_Number`, `Item_Model`, `Product_Description`, `Quantity`, `date`, `time`, `Status`) 
VALUES ('$borrowid','$studentname','$studentid','EQUIPMENT','$categoryname','$productnumber','$itemmodel','$prodcutdescription','$qty', '$date','$time','Pending')" or die('error equipment');
if (mysqli_query($mysqli, $sql)) {
    echo json_encode(array("statusCode"=>200));
} 
else {
    echo json_encode(array("statusCode"=>201));
}
mysqli_close($conn);

?>