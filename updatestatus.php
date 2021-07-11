<?php
  $itemname = $row['Item_Name'];
                            if($row['Quantity'] == 0){
                              $query = mysqli_query($mysqli, "UPDATE consumable_items set Status = 'Out of Stock' where Item_Name = '$itemname'");
                            }else{
                              $query1 = mysqli_query($mysqli, "UPDATE consumable_items set Status = 'Available' where Item_Name = '$itemname'");
                            }
?>