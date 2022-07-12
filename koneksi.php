<?php
$koneksi = mysqli_connect("localhost", "root","");
    if(!($koneksi)){
        echo "<script language=\"javascript\">\n";
        echo "alert(\"Tidak bisa terkoneksi dengan database...\");\n";
        echo "</script>";
        die;
    }else{
        $select = mysqli_select_db($koneksi, "situbes");
        //echo "Sukses";
    }
?>
