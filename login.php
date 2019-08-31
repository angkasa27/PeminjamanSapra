<?php 
session_start();

if( isset($_SESSION["admin"])){
	header("location: daftarpengajuan.php");
	exit;
} elseif (isset($_SESSION["user"])) {
	header("location: belum.php");
	exit;
}



require 'function.php';
if( isset($_POST["login"])){
	$username = $_POST["username"];
	$password = $_POST["password"];
	$result = mysqli_query($conn, "SELECT * FROM akun WHERE username = '$username'");
	$hasil = mysqli_query($conn, "SELECT * FROM akun WHERE username = '$username'");
	$jawab = mysqli_fetch_array($hasil);
	$_SESSION['id'] = $jawab['id'];

	 
	//cek username
	if(mysqli_num_rows($result) === 1 ){
	
		//cek password
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"])){
			$_SESSION["login"] = true;
			if ($row["level"] > 1) {
				$_SESSION["user"] = true;
				header("location: belum.php");
				exit;
			} elseif ($row["level"] = 1) {
				$_SESSION["admin"] = true;
				header("location: daftarpengajuan.php");
				exit;
			}
		}

	}

	$error = true;

}


 ?>
<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Masuk | SapraDaring</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Changa+One" rel="stylesheet"> 
    <style type="text/css">
    	h1{
    		margin-top: 10%;
    		margin-bottom: 5%;
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
    		padding: 20px;
    	}
    	.kecil{
    		font-size: 9px;
    	}
    	.none{
        margin-top: -7px;
        margin-bottom: -7px;
      }
    </style>
</head>
<body class="bg-secondary">
	<div class="container">
		<div class="row">
			<div class="col-md"></div>
			<div class="card text-center bg-dark col-md-8">

				<h1 class="text-light gaya">login</h1>
				<div class="row">
					<div class="col-md"></div>
					<form  action="" method="post" class="col-md-4">
						<div class="form-group">
							<input type="text" class="form-control bg-dark text-light " name="username" id="username" placeholder="username" required autofocus autocomplete="off">
						</div>
						<div class="form-group">
							<input type="password" class="form-control bg-dark text-light" name="password" id="password" placeholder="password" aria-describedby="failed">
						    <small id="password" class="form-text text-muted"><?php if(isset($error)) :?>
								<p class="text-danger">username / password salah</p>
							<?php endif; ?></small>
						</div>
						<div class="form-group">
							<p class="text-light font-weight-light none">Belum punya akun? <a class="text-warning" href="registrasi.php">Registrasi</a></p>
						</div>
						<button type="submit" name="login" class="btn btn-info btn-block gaya jarak">login</button>
					</form>
					<div class="col-md"></div>
				</div>
				

				<div class="row halaman">
                	<p class="col-sm kecil text-secondary font-weight-bold text-monospace">by: Dimas Angkasa Nurindra</p>
            	</div>

			</div>
			<div class="col-md"></div>
		</div>
	</div>
	
	

	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>