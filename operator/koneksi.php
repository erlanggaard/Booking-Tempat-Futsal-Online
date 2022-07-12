<?php

$kon = mysqli_connect('localhost', 'root', '', 'gofutsal');

if (!$kon) {
    die("Koneksi Gagal : " . mysqli_connect_error());
}