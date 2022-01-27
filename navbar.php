<?php
function navbar()
{
	if (!isset($_SESSION)) {
		session_start();
	}
?>
	<!DOCTYPE html>
	<html>

	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<title>Welcome</title>
	</head>

	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<a class="navbar-brand" href="#">Laundry</a>
				<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<?php if ($_SESSION["role"] === "admin") : ?>
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="/Laundry/home_admin.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/Laundry/member/tampil_member.php">Member</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/Laundry/user/tampil_user.php">User</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/Laundry/paket/tampil_paket.php">Paket</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/Laundry/outlet/tampil_outlet.php">Outlet</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/Laundry/transaksi/tampilan.php">Transaksi</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/Laundry/laporan.php">Laporan</a>
							</li>
						<?php endif ?>
						<?php if ($_SESSION["role"] === "kasir") : ?>
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="/Laundry/home_kasir.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/Laundry/member/tampil_member.php">Member</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/Laundry/transaksi/tampilan.php">Transaksi</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/Laundry/laporan.php">Laporan</a>
							</li>
						<?php endif ?>
						<?php if ($_SESSION["role"] === "owner") : ?>
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="/Laundry/home_owner.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/Laundry/laporan.php">Laporan</a>
							</li>
						<?php endif ?>
					</ul>
					<ul class="navbar-nav mb-2 mb-lg-0">
						<?php if (isset($_SESSION["role"])) : ?>
							<li class="nav-item">
								<button type="button" class="btn btn-warning"><a class="nav-link" href="/Laundry/logout.php">Logout</a></button>
							</li>
						<?php else : ?>
							<li class="nav-item">
								<a class="nav-link" href="login.php">login</a>
							</li>
						<?php endif ?>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container" style="margin:10px">

		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	</body>
<?php
}
?>

	</html>