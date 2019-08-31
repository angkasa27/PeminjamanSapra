<?php 

session_start();
if( !isset($_SESSION["admin"])){
	header("location: login.php");
	exit;
}

require 'function.php';


?>


<!DOCTYPE html>
<html lang="en">
  <head>
      <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Pegawai | SapraDaring</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Changa+One" rel="stylesheet"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<style type="text/css">
      h1{
      }
      .gaya{

        font-family: 'Changa One', cursive;
        text-transform: uppercase;
      }
      .jarak{
        letter-spacing: 2px;
        margin-bottom: 5%;
      }
      .card{
        margin-top: 10%;
        text-align: center;
        border-radius: 10px !important;
        height: 450px;
        padding-bottom: 20px;
      }
      .navigasi{
        margin-bottom: 15px;
      }
      .dropdown-divider{
        margin-top: -0.5px;
      }
      .data{
      	margin-top: 7%;
      }
    </style>
  </head>
  <body  class="bg-secondary">

    

    <div class="container">
      <div class="row">
        <div class="col-md"></div>
        <div class="card text-center bg-dark col-md-8">

          <div class="navigasi">
            <ul class="nav nav-pills nav-justified">
              <li class="nav-item">
                <a class="nav-link bg-dark text-info rounded-0" href="daftarpengajuan.php">PENGAJUAN</a>
              </li>
              <li class="nav-item">
                <a class="nav-link bg-dark text-warning rounded-0" href="pegawai.php">PEGAWAI</a>
              </li>
              <li class="nav-item">
                <a class="nav-link bg-dark text-info rounded-0" href="barang.php">BARANG</a>
              </li>
              <li class="nav-item">
                <a class="nav-link bg-dark text-info rounded-0" href="logout.php">KELUAR</a>
              </li>
            </ul>
            <div class="dropdown-divider"></div>
          </div>

          
          <form class="form-inline">
          	<a href="pegawai.php" class="btn btn-primary mb-2 gaya jarak btn-sm"><i class="fas fa-backward"></i></a>
            <h2 class="gaya text-light col-md-11">Pegawai Baru</h2>
           </form>

			<div class="row data">
				<div class="col-md"></div>
				<form  action="" method="post" enctype="multipart/form-data" class="col-md-4">
					<div class="form-group">
						<input class="form-control bg-dark text-light " id="nama_pegawai" type="text" name="nama_pegawai" required placeholder="nama" autofocus autocomplete="off">
					</div>
					<div class="form-group">
						<input class="form-control bg-dark text-light " id="telp" type="number" name="telp" required placeholder="telp" autocomplete="off">
					</div>
					<div class="form-group">
						<input class="form-control bg-dark text-light " id="alamat" type="text" name="alamat" required placeholder="alamat" autocomplete="off">
					</div>
					<button type="submit" name="submit" class="btn btn-info btn-block gaya jarak">Tambah</button>
				</form>
				<div class="col-md"></div>
			</div>
          

           <?php 

			 if( isset($_POST["submit"])){
				//CEK BUTTON BEKERJA
			 	//var_dump($_POST);
			 	//cek keberhasilan kirim data
			 	if( tambah($_POST)>0){
			 ?>
			 			<div class="alert alert-success" role="alert">
  							Berhasil ditambahkan!
						</div>
			<?php 
				} else {
			 ?>
			 	
			 			<div class="alert alert-danger" role="alert">
  							Gagal Ditambahkan, Harap cek kembali!
						</div>
			<?php 
				}
			}	
			?>



          </div>
        <div class="col-md"></div>
      </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

