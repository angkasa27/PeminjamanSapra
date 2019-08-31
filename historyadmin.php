<?php
error_reporting(0);
session_start();
if( !isset($_SESSION["admin"])){
  header("location: login.php");
  exit;
}

require 'functions.php';

//pagination
//konfigurasi
$jumlahMaxData = 6;
$jumlahData = count(query("SELECT * FROM pegawai"));
$jumlahHalaman = ceil($jumlahData/$jumlahMaxData);
$halamanAktif = (isset($_GET["halaman"]))?$_GET["halaman"]:1;
$awalData = ( $jumlahMaxData * $halamanAktif ) - $jumlahMaxData;

$tolak = "Tolak";
$kembali = "Kembali";
$pengajuan = query("SELECT * FROM peminjaman WHERE status LIKE '$kembali' OR status LIKE '$tolak' LIMIT $awalData, $jumlahMaxData");

// Cari
if (isset($_POST["cari"])) {
  $pegawai = caripinjam($_POST["keyword"]); 
}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
      <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Pengajuan | SapraDaring</title>
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
      .halaman{
        position: fixed;
        top: 530px;
        left: 50%;
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
                <a class="nav-link bg-dark text-warning rounded-0" href="daftarpengajuan.php">PENGAJUAN</a>
              </li>
              <li class="nav-item">
                <a class="nav-link bg-dark text-info rounded-0" href="pegawai.php">PEGAWAI</a>
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

    <form action="" method="post" class="form-inline">
            <a href="daftarpengajuan.php" class="btn btn-primary mb-2 col-md-1 gaya jarak"><i class="fas fa-backward"></i></a>
            <a href="pinjam.php" class="btn btn-primary mb-2 col-md-1 gaya jarak"><i class="fas fa-clock"></i></a>
            <div class="col-md-1">
            </div><h2 class="gaya text-light col-md-4">RIWAYAT</h2>
            <input type="text" name="keyword" autofocus placeholder="Cari apa?" size="20%" autocomplete="off" class="form-control mb-2 col-md-3 ml-3 mr-2">
            <button type="submit" name="cari" class="btn btn-primary mb-2 gaya jarak col-md-1"><i class="fas fa-search"></i></button>
          </form>


          <div class="table-responsive">
            <table class="table table-bordered text-center text-light table-sm ">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Barang</th>
                  <th scope="col">Tgl. Pinjam</th>
                  <th scope="col">Tgl. Kembali</th>
                  <th scope="col">Status</th>
                  <th scope="col">Pilihan</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($pengajuan as $row) :?>
                  <?php 
                  $pegawai = $row["id_pegawai"];
                  $result = mysqli_query($conn, "SELECT * FROM pegawai where id_pegawai = '$pegawai'");
                  $coba = mysqli_fetch_assoc($result);
                  $nama = $coba["nama_pegawai"]; 
                  $inventaris = $row["id_inventaris"];
                  $hasil = mysqli_query($conn, "SELECT * FROM inventaris where id_inventaris = '$inventaris'");
                  $tes = mysqli_fetch_assoc($hasil);
                  $barang = $tes["nama"]; 
                  ?>
                <tr>
                  <th scope="row"><?= $i ?></th>
                  <td><?= $nama ?></td>
                  <td><?= $barang ?></td>
                  <td><?= $row["tgl_pinjam"] ?></td>
                  <td><?= $row["tgl_kembali"] ?></td>
                  <td><?= $row["status"] ?></td>
                  <td>
                    <a href="hapus.php?id_pinjam=<?= $row["id_pinjam"] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
                <?php $i++ ?>
              <?php endforeach; ?>
              </tbody>
            </table>
            </div>


            <div class="row halaman">
                <?php if($halamanAktif > 1) : ?>
                  <a href="?halaman=<?= $halamanAktif - 1?>" class="text-info">&laquo;&nbsp;</a>
                <?php endif; ?>

                <?php for ($i=1; $i <=$jumlahHalaman ; $i++) :?>
                  <?php if ( $i == $halamanAktif) : ?>
                    <a href="?halaman=<?= $i; ?>" class="text-warning"><?= $i; ?></a>
                  <?php else : ?>
                    <a href="?halaman=<?= $i; ?>" class="text-info"><?= $i; ?></a>
                  <?php endif; ?>
                <?php endfor;?>

                <?php if($halamanAktif < $jumlahHalaman) : ?>
                  <a href="?halaman=<?= $halamanAktif + 1?>" class="text-info">&nbsp; &raquo;</a>
                <?php endif; ?>
            </div>


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