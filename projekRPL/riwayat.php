<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:login.php?message=belum_login");
}
?>

<html>

<head>
	<title>Riwayat Belanja</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<style>
	* {
        font-family: 'Poppins';
    }

	.login {
		margin: 0% 30% 0% 30%;
		padding: 1% 5%;
		/* background-color: powderblue;*/
		border: solid #1570ef;
		border-radius: 3%;
		border-width: 5pt;
	}

	.form-control {
		color: #1570ef;
		border: #1570ef solid;
	}

	.form-control:hover {
		font-size: larger;
		transition: 0.5s;
		color: #1570ef;
	}

	.login:hover {
		background-color: #89b1d6;
	}
</style>

<body style="height: 70%; margin-bottom: 5%;background-color: #afd4fd; ">

	<nav class="navbar navbar-expand-lg" style="background-color: #1570ef; margin-bottom: 100px;" >
		  <div class="container-fluid" style="padding:2% 0 2% 0%; font-size: 15pt">
		    <a class="navbar-brand" href="#" style="color: white; padding-left: 3%;font-size: 25pt;">Depot TREASURE</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarNavDropdown" style="padding-left: 45%">
		      <ul class="navbar-nav">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="home.php" style="color: white; margin-right: 10px;">Home</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="index_user.php" style="color: white">Produk</a>
		        </li>
		        <li class="nav-item dropdown">
		          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white">Bantuan</a>
		          <ul class="dropdown-menu">
		            <li><a class="dropdown-item " href="#" >081226963161</a></li>
		            <li><a class="dropdown-item" href="#" >tresure987@gmail.com</a></li>
		          </ul>
		        </li>
                 <li class="nav-item">
                    <a class="nav-link" href="keranjang.php" style="color: white;">Keranjang</a>
                  <!-- <a >Keranjang</a> -->
                </li>
		       <li class="nav-item">
		        	<a class="nav-link" href="logout.php" style="color: white; background-color:#1570ef; border:1px solid white; border-radius: 7px;">Logout</a>
		          <!-- <a >Keranjang</a> -->
		        </li>

		      </ul>
		     
		    </div>
		  </div>
		</nav>

       <section class="vh-100">
        <div class="container text-start pt-5">
            <div class="row pt-5">
                <div class="col-7">
                    <h3>Riwayat Pembelian</h3>
                    <div class="form-check">
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped table-hover text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <h4>User</h4>
                                        </th>
                                        <th scope="col">
                                            <h4>Waktu</h4>
                                        </th>
                                        <th scope="col">
                                            <h4>Total Harga</h4>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include('koneksi.php');
                                    $username = $_SESSION['username'];
                                    $sql = "SELECT * FROM orderstatus where username='$username';";
                                    $query    = mysqli_query($connect, $sql);
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td>
                                                <h5><?= $data['username'] ?></h5>
                                            </td>
                                            <td>
                                                <h5><?= $data['waktu'] ?></h5>
                                            </td>
                                            <td>
                                                <h5>Rp. <?= number_format($data['total_harga'], 0, "", ".") ?></h5>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </section> 



	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>