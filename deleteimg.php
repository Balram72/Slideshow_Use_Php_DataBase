<?php
    $con = mysqli_connect("localhost","root","","simple") or die("DataBase Is not Connected");
?>
<?php 
$srno1 = $_GET['srno1'];

$q = "select * from imgedata where srno1=$srno1";
 $res = mysqli_query($con,$q);
 while($row = mysqli_fetch_array($res)){
     $oldpath =  $row['img1'];
 }

$query ="DELETE FROM imgedata WHERE srno1=$srno1";
$res = mysqli_query($con,$query);
    unlink($oldpath);
    header('Location: admin.php');

?>