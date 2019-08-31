<?php 


//koneksi ke database
$conn = mysqli_connect("localhost","root","","db_sapra");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$row = [];
	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;


}


function hapus($id_pegawai){
	global $conn;
	mysqli_query($conn,"DELETE FROM pegawai WHERE id_pegawai = $id_pegawai");
	return mysqli_affected_rows($conn);
}


function cari($keyword){
	$query = "SELECT * FROM pegawai
				WHERE
			  nama_pegawai LIKE '%$keyword%' OR
			  telp LIKE '$keyword' OR
			  alamat LIKE '%$keyword%'
			";
	return query($query);
} 

function caripinjam($keyword){
	$query = "SELECT * FROM peminjaman
				WHERE
			  id_pegawai LIKE '%$keyword%' OR
			  id_inventaris LIKE '$keyword%'
			";
	return query($query);
} 

function tambah($data){
	global $conn;
	//ambil data dari tiap elemen
	$id_pegawai = htmlspecialchars($data["id_pegawai"]);
	$nama = htmlspecialchars($data["nama"]);
	$tgl_pinjam = htmlspecialchars($data["tgl_pinjam"]);
	$tgl_kembali = htmlspecialchars($data["tgl_kembali"]);

  	$result = mysqli_query($conn, "SELECT * FROM inventaris where nama = '$nama'");
  	$tes = mysqli_fetch_assoc($result);
  	$id_inventaris = $tes["id_inventaris"]; 

	//query insert data
	$query = "INSERT INTO peminjaman 
				VALUES 
				('','$id_inventaris','$id_pegawai','$tgl_pinjam','$tgl_kembali','Belum')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function delete($id_pinjam){
	global $conn;
	mysqli_query($conn,"DELETE FROM peminjaman WHERE id_pinjam = '$id_pinjam'");
	return mysqli_affected_rows($conn);
}

function add($data){
	global $conn;
	//ambil data dari tiap elemen
	$nama = htmlspecialchars($data["nama"]);
	$jumlah = htmlspecialchars($data["jumlah"]);
	$tgl_registrasi = htmlspecialchars($data["tgl_register"]);

	//query insert data
	$query = "INSERT INTO inventaris 
				VALUES 
				('','$nama','$jumlah','$tgl_registrasi')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function drop($id_inventaris){
	global $conn;
	mysqli_query($conn,"DELETE FROM inventaris WHERE id_inventaris = '$id_inventaris'");
	return mysqli_affected_rows($conn);
}

function kembali($id_inventaris){
	global $conn;
    $result = mysqli_query($conn, "SELECT * FROM inventaris where id_inventaris = '$id_inventaris'");
    $coba = mysqli_fetch_assoc($result);
    $jumlah = $coba["jumlah"];
    $jumlah += 1;
	//query insert data
	$query = "UPDATE inventaris SET 
			jumlah = '$jumlah'
			WHERE id_inventaris = $id_inventaris
			";
	return mysqli_query($conn, $query);
}

function terima($id_inventaris){
	global $conn;
    $result = mysqli_query($conn, "SELECT * FROM inventaris where id_inventaris = '$id_inventaris'");
    $coba = mysqli_fetch_assoc($result);
    $jumlah = $coba["jumlah"];
    $jumlah -= 1;
	//query insert data
	$query = "UPDATE inventaris SET 
			jumlah = '$jumlah'
			WHERE id_inventaris = $id_inventaris
			";
	return mysqli_query($conn, $query);
}

?>