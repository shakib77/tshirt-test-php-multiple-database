<?php require_once 'db.php';?>

<?php

if (isset($_GET['delete'])) {
$tid = $_GET['delete'];
$sql = "DELETE FROM `tshirts` WHERE `tid`='$tid'";
$result = mysqli_query($conn, $sql);
}