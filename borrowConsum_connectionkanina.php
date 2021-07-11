    <?php
//////INSERTING A DATA OF A ITEM TO DATABASE item_list

$mysqli = new mysqli('localhost','root','','inventorysystem') or die(mysqli_error($mysqli));
if(isset($_POST['modal_done']))
{
    print "<script language='JavaScript'>
    window.alert('BOPOLS')
    window.location.href='borrowConsum.php';
    </script>";
}else{
    print "<script language='JavaScript'>
    window.alert('BOPOLS')
    window.location.href='borrowConsum.php';
    </script>";

}


?>


