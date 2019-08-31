<?php 

session_start();
if( !isset($_SESSION["login"])){
	header("location: login.php");
	exit;
}

require 'functions.php';

$id_pinjam = $_GET["id_pinjam"];

//query insert data
$query = "UPDATE peminjaman SET 
		status = 'Kembali'
		WHERE id_pinjam = $id_pinjam
		";
mysqli_query($conn, $query);

$hasil = mysqli_query($conn, "SELECT * FROM peminjaman where id_pinjam = '$id_pinjam'");
$tes = mysqli_fetch_assoc($hasil);
$id_inventaris = $tes["id_inventaris"]; 

if( kembali($id_inventaris)>0){
	echo "
		<script>
			document.location.href = 'pinjam.php';
		</script>
 	";
} else {
	echo "
 		<script>
			alert('Error');
			document.location.href = 'pinjam.php';
		</script>
 	";
}



 ?>