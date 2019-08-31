<?php 

session_start();
if( !isset($_SESSION["login"])){
	header("location: login.php");
	exit;
}

require 'functions.php';

$id_inventaris = $_GET["id_inventaris"];

if( drop($id_inventaris)>0){
	echo "
		<script>
			document.location.href = 'barang.php';
		</script>
 	";
} else {
	echo "
 		<script>
			alert('Data Gagal Dihapus');
			document.location.href = 'barang.php';
		</script>
 	";
}

 ?>