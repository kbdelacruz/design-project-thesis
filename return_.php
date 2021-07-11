<?php

session_start();
$student_num =  $_SESSION["user_student"];





$mysqli = new mysqli('localhost','root','','inventorysystem') or die(mysqli_error($mysqli));



if(isset($_POST['btn_return_equipment'])){
    date_default_timezone_set("Asia/Manila"); 
    $timeinborrow = date("h:i:s a");
    $borrowid = $_POST['borrowid'];
    $model = $_POST['model'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $date = date('m-d-Y');
    $product_number = $_POST['product_number'];
    $itemname = $model." - ".$product;

    $query = mysqli_query($mysqli, "UPDATE borrow_equipments SET Status = 'returned' where BorrowID = '$borrowid'");
    $equipment =  mysqli_query($mysqli, "UPDATE equipment SET Status = 'Available', Quantity ='1' where Product_Number = '$product_number'");
    $remarks = "Returned";

    $returned_equipments = mysqli_query($mysqli, "INSERT INTO return_equipments VALUES ('$borrowid','$student_num','$quantity','$date','$remarks','$timeinborrow','$product_number',' $product','EQUIPMENT')") or die('error');

      print "<script language='JavaScript'>
      window.location.href='return.php';
      </script>";
}else{
    print "<script language='JavaScript'>
    window.location.href='return.php';
    </script>";

}

if(isset($_POST['btn_return_nonconsumable'])){
    date_default_timezone_set("Asia/Manila"); 
    $timeinborrow = date("h:i:s a");
    $borrowid = $_POST['borrowid'];
    $quantity = $_POST['quantity'];
    $date = date('m-d-Y');
    $name = $_POST['name'];
    $type = $_POST['type'];


    $query = mysqli_query($mysqli, "UPDATE borrow_consumable SET Status = 'returned' where BorrowID = '$borrowid'");
    $equipment =  mysqli_query($mysqli, "UPDATE non_consumable_items SET Status = 'Available', Quantity = Quantity + '$quantity' where Item_Name = '$name'");
    $remarks = "Returned";

    $returned_nonconsumable = mysqli_query($mysqli, "INSERT INTO return_non_consumable VALUES ('$borrowid','$student_num','$type','$name','$quantity','$date','$timeinborrow','$remarks')") or die('error');

      print "<script language='JavaScript'>
      window.location.href='return.php';
      </script>";
}else{
    print "<script language='JavaScript'>
    wind    ow.location.href='return.php';
    </script>";

}

?>