<?php

require 'koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM lapangan WHERE id_lap='".mysqli_escape_string($koneksi, $_POST['id_lap'])."'");
$data = mysqli_fetch_array($query);

echo json_encode($data);
?>
