<!DOCTYPE html>
<html>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<title>Member</title>
</head>

<body>
	<?php include("../navbar.php");
	navbar(); ?>
	<h3 align="center">List Member</h3>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>NO</th>
				<th>NAMA</th>
				<th>ALAMAT</th>
				<th>JENIS KELAMIN</th>
				<th>TELEPON</th>
				<th>OPSI</th>
			</tr>
		</thead>
		<tbody>
			<a href="tambah_member.php" class="btn btn-info">Tambah member+</a>
			<?php
			include "../koneksi.php";
			$qry_member = mysqli_query($conn, "select * from member");
			$no = 0;
			while ($data_member = mysqli_fetch_array($qry_member)) {
				$no++; ?>
				<tr>
					<td><?= $no ?></td>
					<td><?= $data_member['nama'] ?></td>
					<td><?= $data_member['alamat'] ?></td>
					<td><?= $data_member['jenis_kelamin'] ?></td>
					<td><?= $data_member['tlp'] ?></td>
					<!-- mulai upload file -->
					<!-- akhir upload file -->

					<td>
						<a href="ubah_member.php?id=<?= $data_member['id_member'] ?>" class="btn btn-success">Ubah</a>
						<a href="hapus_member.php?id=<?= $data_member['id_member'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
					</td>
				</tr>
			<?php
			}
			?>

		</tbody>
	</table>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>