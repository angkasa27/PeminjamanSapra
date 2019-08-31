<?php 

session_start();
if( !isset($_SESSION["login"])){
	header("location: login.php");
	exit;
}

require 'function.php';

$id_pegawai = $_GET["id_pegawai"];

if( hapus($id_pegawai)>0){
	echo "
		<script>
			document.location.href = 'pegawai.php';
		</script>
 	";
} else {
	echo "
 		<script>
			alert('Data Gagal Dihapus');
			document.location.href = 'pegawai.php';
		</script>
 	";
}

 ?>