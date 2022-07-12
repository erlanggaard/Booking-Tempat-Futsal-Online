<?php

require 'koneksi.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['operator'])){
	$username = $_SESSION['operator'];
	$sql = "select * from operator where username = '$username'";
	$query_sel = mysqli_query($kon,$sql);
	$sql_sel = mysqli_fetch_array($query_sel);
}
$query = mysqli_query($kon, "SELECT * FROM lapangan WHERE no_lap='".mysqli_escape_string($kon, $_POST['no_lap'])."' && username='$username'");
$data = mysqli_fetch_array($query);

echo json_encode($data);
?>