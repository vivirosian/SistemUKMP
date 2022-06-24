<?php
// include database connection file
include_once("config.php");
 
// Get id from URL to delete that user
$id = $_GET['id'];
 
// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM anggota WHERE nia=$id");
// $result = mysqli_query($mysqli, "DELETE FROM prestasi WHERE nia=$id");



 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:prestasi.php");
?>