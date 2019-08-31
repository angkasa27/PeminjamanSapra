<?php 

session_start();
if( !isset($_SESSION["login"])){
	header("location: login.php");
	exit;
}

require 'functions.php';

$id_pinjam = $_GET["id_pinjam"];

if( delete($id_pinjam)>0){
	echo "
		<script>
			document.location.href = 'historyadmin.php';
		</script>
 	";
} else {
	echo "
 		<script>
			alert('Data Gagal Dihapus');
			document.location.href = 'historyadmin.php';
		</script>
 	";
}

 ?>