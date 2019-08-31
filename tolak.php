<?php 

session_start();
if( !isset($_SESSION["admin"])){
	header("location: login.php");
	exit;
}

require 'functions.php';

$id_pinjam = $_GET["id_pinjam"];

//query insert data
$query = "UPDATE peminjaman SET 
		status = 'Tolak'
		WHERE id_pinjam = $id_pinjam
		";
mysqli_query($conn, $query);
echo "
		<script>
			document.location.href = 'daftarpengajuan.php';
		</script>
 	";
 ?>