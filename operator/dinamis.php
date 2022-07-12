<?php
	/*===============================================================================
		Membuat Form Input Dinamis dengan PHP
		By: BliKomKom
		Website: http://www.komang.my.id
		Source code ini bisa anda gunakan dan modifikasi sesuai kebutuhan
	===============================================================================*/
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Metode Biseksi</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jq.min.js"></script>
<script language="javascript">
	function tambahHobi() {
    		var idf = document.getElementById("idf").value;
			var stre;
			stre="<p id='srow" + idf + "'><select name='id[]'><option>Senin</option><option>Selasa</option><option>Rabu</option><option>Kamis</option><option>Jumat</option><option>Sabtu</option><option>Minggu</option></select><select name='id[]'><option>Senin</option><option>Selasa</option><option>Rabu</option><option>Kamis</option><option>Jumat</option><option>Sabtu</option><option>Minggu</option></select><input type='text' size='40' name='rincian_hoby[]' placeholder='Masukkan Hobi' /> <input type='text' size='30' name='jenis_hoby[]' placeholder='Utama/Sambilan' /> <a href='#' style=\"color:#3399FD;\" onclick='hapusElemen(\"#srow" + idf + "\"); return false;'>Hapus</a></p>";
    		$("#divHobi").append(stre);	
    		idf = (idf-1) + 2;
    		document.getElementById("idf").value = idf;
		}
	function hapusElemen(idf) {
    		$(idf).remove();
		}
</script>
</head>
<body>
<div id="container">
<h2>Input Data Karyawan</h2>
<form method="post" action="proses.php">
	<input id="idf" value="1" type="hidden" />
	<p>  Nama : <input name="nama_karyawan" type="text" id="nama" size="40"> </p>
    <p>  Umur : <input name="umur_karyawan" type="text" id="nama" size="8"> </p>
	<button type="button"  onclick="tambahHobi(); return false;">Tambah Rincian Hobi</button>
 	<div id="divHobi"></div>
 	<button type="submit">Simpan</button>
</form>
</div>
</body>
</html>