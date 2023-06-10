<?php
session_start();
if (empty($_SESSION['username'])) {
	header("location:login.php?message=belum_login");
}
if ($_SESSION['level'] != "admin") {
	die("Anda Bukan Admin");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Laman Admin</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<style>

 	*{
 	font-family: 'Poppins';
 	}

 	.col{
 		margin: 0px 0 40px 0;
 	}

 	.d-block{
 		/*margin-top: 30px;*/
 		margin-bottom: 20px;
 	}

 	
</style>

<body>

		<nav class="navbar navbar-expand-lg" style="background-color: #1570ef;" >
		  <div class="container-fluid" style="padding:2% 0 2% 0%; font-size: 15pt">
		    <a class="navbar-brand" href="#" style="color: white; padding-left: 3%;font-size: 25pt;">Depot TREASURE</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarNavDropdown" style="padding-left: 52%">
		      <ul class="navbar-nav">
		       
		        <li class="nav-item">
		          <a class="nav-link" href="riwayat_total.php" style="color: white">Riwayat Total</a>
		        </li>
		        <li class="nav-item dropdown">
		          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white">Bantuan</a>
		          <ul class="dropdown-menu">
		            <li><a class="dropdown-item " href="#" >081226963161</a></li>
		            <li><a class="dropdown-item" href="#" >tresure987@gmail.com</a></li>
		          </ul>
		        </li>
		       <li class="nav-item">
		        	<a class="nav-link" href="logout.php" style="color: white; background-color:#1570ef; border:1px solid white; border-radius: 7px;">Logout</a>
		        </li>
		      </ul>
		     
		    </div>
		  </div>
		</nav>

		<div id="carouselExampleDark" class="carousel slide container" data-bs-ride="carousel" style="margin-top:40px;">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active bg-dark" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" class="bg-dark" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3500">
                	<!-- <h1 style="color: white; text-align: center;margin: ">Informasi<br> -->
                	<!-- Alamat: Jl. Tambak Bayan No.1 A, Janti, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 5528</h1> -->
                    <img src=foto/tresur.jpg class="d-block w-100" alt="foto" style="opacity: 75%;border-radius:10px;" height="350" width="150">
                    <!-- <div class="carousel-caption d-none d-md-block" style="background-color: rgba(255,255,255,0.7); border-radius: 10px; color: black;">
                        <h3 style="font-weight: bold;">Informasi</h3>
                        <a href="sedekah.php"><button class="btn btn-outline-dark">SEDEKAH</button></a>
                    </div> -->
                </div>
                <div class="carousel-item" data-bs-interval="3500">
                	<!-- <h1 style="color: white; text-align: center;">Promosi</h1> -->
                    <img src="foto/tresur2.jpg" class="d-block w-100" alt="foto" style="opacity: 75%;border-radius:10px;" height="350" width="150">
                    <!-- <div class="carousel-caption d-none d-md-block" style="background-color: rgba(255,255,255,0.7); border-radius: 10px; color: black;">
                        <h3 style="font-weight: bold;">Wakaf Untuk Umat</h3>
                        <a href="wakaf.php"><button class="btn btn-outline-dark">WAKAF</button></a>
                    </div> -->
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
       


        	<div class="container text-center" style="margin-top:40px;background-color: #afd4fd; color: #656a70;border: 20px;border-radius:10px;">
        		  <div id="produk">
        <div class="p-3 m-0 border-0">
            <div class="container text-center">
                <div class="row">
                    <?php
                    include('koneksi.php');

                    $sql   = "SELECT * FROM product";
                    $query  = mysqli_query($connect, $sql);
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <div class="m-2 p-1" style="height:270px;">
                                    <img src="foto/<?php echo $data['foto']; ?>" class="card-img-top" width="150" height = "270">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?= $data['name']; ?></h5>
                                    <h6 class="card-title">Rp. <?= number_format($data['price'], 0, "", ".") ?></h6>
                                  
                                    <a href=index_admin_delete.php?productid=<?php echo $data['productid']; ?>>
                                        <button type="button" class="btn btn-danger pt-1 pb-1 mb-2" style="width: 80%;">
                                            Hapus Barang
                                        </button></a>
                                    <a href=index_admin_edit.php>
                                        <form action="index_admin_edit.php" method="post">
                                            <input type="hidden" name="productid" value="<?= $data['productid']; ?>">
                                            <input type="hidden" name="name" value="<?= $data['name']; ?>">
                                            
                                            <input type="hidden" name="price" value="<?= $data['price']; ?>">
                                            <button type="submit" class="btn btn-warning pt-1 pb-1" style="width: 80%;">
                                                Edit Barang
                                            </button>
                                    </a>
                                    </form>



                                    <div class="modal fade" id="staticBackdrop<?= $data['productid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <form method="POST" action="index_admin_edit.php">

                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Masukkan Pesanan</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
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

			
        


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>