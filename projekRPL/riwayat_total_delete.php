<?php
	include 'koneksi.php';

	$idhapus 	= $_POST['idhapus'] ;


	$sql	= "DELETE FROM orderstatus WHERE orderstatusid ='$idhapus'" ;

	$query	= mysqli_query($connect,$sql);

	if($query) {
		header("location:riwayat_total.php") ;
	} else{
		echo "Hapus Data Gagal";
	} 
?>