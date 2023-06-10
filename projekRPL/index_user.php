<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:login.php?message=belum_login");
}
?>

<html>

<head>
	<title>Laman User</title>
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
		    <div class="collapse navbar-collapse" id="navbarNavDropdown" style="padding-left: 40%">
		      <ul class="navbar-nav">
		        
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
		          <a class="nav-link" href="keranjang.php" style="color: white">Keranjang</a>
		        </li>
		        <li class="nav-item">
                    <a class="nav-link" href="riwayat.php" style="color: white;">Riwayat</a>
                </li>
		       <li class="nav-item">
		        	<a class="nav-link" href="logout.php" style="margin-left:5px  ;color: white; background-color:#1570ef; border:1px solid white; border-radius: 7px;">Logout</a>
		          <!-- <a >Keranjang</a> -->
		        </li>

		      </ul>
		     
		    </div>
		  </div>
		</nav>


<div id="produk">
        <div class="p-3 m-0 border-0">
            <div class="container text-center">
                <div class="row">
                    <?php
                    include('koneksi.php');

                    $sql   = "SELECT * FROM product";
                    $query  = mysqli_query($connect, $sql);
                    $username = $_SESSION['username'];
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <div class="m-2 p-1" style="height:270px;">
                                    <img src="foto/<?php echo $data['foto']; ?>" class="card-img-top" width="150" height = "270">
                                </div>
                                <div class="card-body" style="height:230px;padding-top: 50px;">
                                    <h5 class="card-title"><?= $data['name']; ?></h5>
                                    <h6 class="card-title">Rp. <?= number_format($data['price'], 0, "", ".") ?></h6>
                                    
                                    <button type="button" class="btn btn-primary pt-1 pb-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $data['productid']; ?>" style="background-color: #1570ef;">
                                        Masukkan Keranjang
                                    </button>


                                    <div class="modal fade" id="staticBackdrop<?= $data['productid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <form method="POST" action="index_user_proses.php">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Masukkan Pesanan</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="username" value="<?= $username; ?>">
                                                        <input type="hidden" value="<?= $data['productid']; ?>" name="productid">
                                                        <input type="hidden" value="<?= $data['price']; ?>" name="price">
                                                        Jumlah barang
                                                        <input type="number" name="quantity" class="form-number text-center" min="1" id="customRange3" style="width: 50px; margin-right: -4px;" value="1">
                                                        <hr>
                                                        Tulis Catatan
                                                        <input class="card card-body" style="height: 5px; width: 100%" type="text" name="catatanorder">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary " style="background-color: #00A445;">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>