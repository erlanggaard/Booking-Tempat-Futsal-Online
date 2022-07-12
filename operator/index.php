<?php require 'koneksi.php'; 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['operator'])){
	$username = $_SESSION['operator'];
	$sql = "select * from operator where username = '$username'";
	$query_sel = mysqli_query($kon,$sql);
	$sql_sel = mysqli_fetch_array($query_sel);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Form otomatis</title>

	<style>
		.container {
			width: 100;
			padding: 10px 30px 10px 30px;
		}

		select, input, textarea {
		    border: 1px solid #D6D6D6;
		    padding: 4px;
		    margin-bottom: 5px;
		}
	</style>

</head>
<body>

	<div class="container">

		<form action="" method="POST">
			<label>No Lapangan</label><br>
			<select name="no_lap" id="no_lap">
				<?php 
                               $p = mysqli_query($kon, "select * from lapangan where username = '$username'");
                               while ($o = mysqli_fetch_array($p)) {
							   	echo "<option>$o[no_lap]</option>";
							   
							   }
                               ?>
			</select><br>

			<label>Nama</label><br>
			<input type="text" name="username" id="username"  disabled/><br>
            <input type="hidden" name="username" id="username"  value="yunita" disabled/><br>

			<label>ID Lap</label><br>
			<textarea name="id_lap" id="id_lap" disabled></textarea><br>
            
            <label>Jenis Lapangan</label><br>
			<textarea name="jenis_rumput" id="jenis_rumput" disabled></textarea><br>
            
            <label>harga</label><br>
			<textarea name="harga" id="harga" disabled></textarea><br>
            
           
			
			<input type="submit" value="Simpan">
		</form>

	</div>

	<script src="../assets/js/jquery.min.js"></script>

	<script>
		$(function() {
			$("#no_lap").change(function(){
				var no_lap = $("#no_lap option:selected").val();
				var username = $("#username").val();
				

				$.ajax({
					url: 'getSiswa.php',
					type: 'POST',
					dataType: 'json',
					data: {
						'no_lap': no_lap
					},
					success: function (lap) {
						$("#id_lap").val(lap['id_lap']);
						$("#jenis_rumput").val(lap['jenis_rumput']);
						$("#harga").val(lap['harga']);
						$("#username").val(lap['username']);

					}
				});
			});
		});
	</script>
</body>
</html>