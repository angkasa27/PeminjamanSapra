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


function tambah($data){
	global $conn;
	//ambil data dari tiap elemen
	$nama_pegawai = htmlspecialchars($data["nama_pegawai"]);
	$telp = htmlspecialchars($data["telp"]);
	$alamat = htmlspecialchars($data["alamat"]);

	//query insert data
	$query = "INSERT INTO pegawai 
				VALUES 
				('','$nama_pegawai','$telp','$alamat')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function hapus($id_pegawai){
	global $conn;
	mysqli_query($conn,"DELETE FROM pegawai WHERE id_pegawai = $id_pegawai");
	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;
	//ambil data dari tiap elemen
	$id_pegawai = $data["id_pegawai"];
	$nama_pegawai = htmlspecialchars($data["nama_pegawai"]);
	$telp = htmlspecialchars($data["telp"]);
	$alamat = htmlspecialchars($data["alamat"]);

	//query insert data
	$query = "UPDATE pegawai SET 
				nama_pegawai = '$nama_pegawai',
				telp = '$telp',
				alamat = '$alamat'
			WHERE id_pegawai = $id_pegawai
			";
	return mysqli_query($conn, $query);
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

function caribarang($keyword){
	$query = "SELECT * FROM inventaris
				WHERE
			  nama LIKE '%$keyword%'
			";
	return query($query);
} 


function registrasi($data){
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	$id = mysqli_real_escape_string($conn, $data["id"]);

	//cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM akun WHERE username = '$username'");
	if( mysqli_fetch_assoc($result)){
		echo "
			<script>
				alert('Username sudah terdaftar');
			</script>
		";
		return false;
	}


	//cek konfirmasi password

	if($password !== $password2){
		echo "
			<script>
				alert('Password tidak cocok');
			</script>
		";
		return false;
	}

	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);
	$level = "2";


	//tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO akun VALUES('','$username','$password','$level','$id')");

	return mysqli_affected_rows($conn);

}

?>