<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'function.php';

// menangkap data yang dikirim dari form login
$email = $_POST['email'];
$password = $_POST['password'];


// menyeleksi data user dengan email dan password yang sesuai
$login = mysqli_query($koneksi, "select * from customer where email='$email' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah email dan password di temukan pada database
if ($cek > 0) {

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if ($data['role'] == "admin") {

		// buat session login dan email
		$_SESSION['email'] = $email;
		$_SESSION['role'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:tables.php");

		// cek jika user login sebagai customer
	} else if ($data['role'] == "customer") {
		// buat session login dan email
		$_SESSION['email'] = $email;
		$_SESSION['role'] = "customer";
		// alihkan ke halaman dashboard customer
		header("location:Landingpage.php");

		// cek jika user login sebagai pengurus
	} else if ($data['role'] == "pengurus") {
		// buat session login dan email
		$_SESSION['email'] = $email;
		$_SESSION['role'] = "pengurus";
		// alihkan ke halaman dashboard pengurus
		header("location:halaman_pengurus.php");
	} else {

		// alihkan ke halaman login kembali
		header("location:index.php?pesan=blok");
	}
} else {
	header("location:sign-in.php?pesan=gagal");
}
