<?php
session_start();
$items = json_decode($_POST['items']);
$user = $_SESSION["user_student"];

if(!count($items)){
    echo "Error!";
    return 0;
}

foreach($items as $data){
    if(!intval($data[1])){
        echo "Error!";
        return 0;
    }
}

$mysqli = new mysqli('localhost','root','','inventorysystem') or die(mysqli_error($mysqli)); 

$consumable = $mysqli->query("SELECT * FROM consumable_items") or die(mysqli_error($mysqli));

$return_array = array();

while($row = mysqli_fetch_assoc($consumable)){
    foreach($items as $data){
        if($row['Item_Name'] == $data[0]){
            if(intval($row['Quantity']) >= intval($data[1])){
                array_push($return_array, $data);
            }
            else {
                echo "Error!";
                return 0;
            }
        }
    }
}

echo json_encode($return_array);

?>