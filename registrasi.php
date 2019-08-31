<?php 
require 'function.php';

if( isset($_POST["register"])){

	if (registrasi($_POST) > 0) {
		echo "
 			<script>
				alert('Berhasil Registrasi!');
				document.location.href = 'Pegawai.php';
			</script>
 		";
	} else{
		echo mysqli_error($conn);
	}

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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <style type="text/css">
    	.ww{
    		margin-top: 3%;
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
    </style>
</head>
<body class="bg-secondary">
	<div class="container">
		<div class="row">
			<div class="col-md"></div>
			<div class="card text-center bg-dark col-md-8">
				<form class="form-inline ww">
		          	<a href="login.php" class="btn btn-primary mb-2 jarak btn-sm col-md-1"><i class="fas fa-backward"></i></a>
		            <h1 class="text-light gaya text-center col-md">REGISTRASI</h1>
		            <div class="col-md-1"></div>
		        </form>
				<div class="row">
					<div class="col-md"></div>
					<form  action="" method="post" class="col-md-4">
						<div class="form-group">
							<input type="number" class="form-control bg-dark text-light" name="id" id="id" placeholder="id" required autofocus autocomplete="off">
						</div>
						<div class="form-group">
							<input type="text" class="form-control bg-dark text-light" name="username" id="username" placeholder="username" required autocomplete="off">
						</div>
						<div class="form-group">
							<input type="password" class="form-control bg-dark text-light" name="password" id="password" placeholder="password" required>
						</div>
						<div class="form-group">
							<input type="password" class="form-control bg-dark text-light" name="password2" id="password2" placeholder="konfirmasi password" required>
						</div>
						<button type="submit" name="register" class="btn btn-info btn-block gaya jarak">Daftar</button>
					</form>
					<div class="col-md"></div>
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