<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"SELECT * FROM user where username='".$username."' and password='".md5($password)."'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
	echo $username;
	echo $password;
// cek apakah username dan password di temukan pada database
if($cek > 0){
	echo $username;
	$data = mysqli_fetch_assoc($login);
	// cek jika user login sebagai admin
	if($data['role']=="admin"){
		// buat session login dan username
		$_SESSION['id_user'] = $data['id_user'];
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:home_admin.php");
	}
	
	// cek jika user login sebagai kasir
	else if($data['role']=="kasir"){
		$_SESSION['id_user'] = $data['id_user'];
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "kasir";
		// alihkan ke halaman dashboard kasir
		header("location:home_kasir.php");

	}
	// cek jika user login sebagai kasir
	else if($data['role']=="owner"){
		$_SESSION['id_user'] = $data['id_user'];

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "owner";
		// alihkan ke halaman dashboard kasir
		header("location:home_owner.php");

	}
	else{
		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal1");
	}	
	}else{
		header("location:login.php?pesan=gagal2");
}
