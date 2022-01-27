<?php
if ($_GET['id']) {
	include "../koneksi.php";
	$qry_hapus = mysqli_query($conn, "delete from detail_transaksi where id_transaksi ='". $_GET['id'] . "'");
	$qry_hapus1 = mysqli_query($conn, "delete from transaksi where id_transaksi ='". $_GET['id'] . "'");
	if ($qry_hapus1) {
		echo "<script>alert('Sukses hapus paket');location.href='tampilan.php';</script>";
	} else {
		echo "<script>alert('Gagal hapus paket');location.href='tampilan.php';</script>";
	}
}
