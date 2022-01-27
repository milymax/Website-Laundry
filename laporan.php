<?php include("navbar.php");
navbar();

?>

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
        include "koneksi.php";
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

<h3 align="center">TAMPIL TRANSAKSI</h3>
</div>
<div class="table">
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>NO</th>
                <th>NAMA PELANGGAN</th>
                <th>TGL</th>
                <th>BATAS WAKTU</th>
                <th>TGL BAYAR</th>
                <th>STATUS</th>
                <th>DIBAYAR</th>
                <th>JENIS</th>
                <th>QTY</th>
                <th>JUMLAH</th>
                <th>AKSI</th>
            </tr>

        </thead>
        <tbody>
            <?php
            include "koneksi.php";

            $qry_transaksi = mysqli_query($conn, "select t.id_transaksi as id_transaksi, m.nama as nama_member, t.tgl as tgl, batas_waktu, tgl_bayar, status, dibayar from transaksi t, member m where t.id_member = m.id_member");
            echo mysqli_error($conn);
            $no = 0;
            while ($data_transaksi = mysqli_fetch_array($qry_transaksi)) {
                $qry_detail_transaksi = mysqli_query($conn, "select *, detail_transaksi.qty * paket.harga as total from detail_transaksi, paket where id_transaksi = " . $data_transaksi['id_transaksi'] . " AND paket.id_paket = detail_transaksi.id_paket");
                $jumlah_pesanan = mysqli_num_rows($qry_detail_transaksi);

                $no++;

                $i = 0;
                while ($data_dtl_transaksi = mysqli_fetch_array($qry_detail_transaksi)) {
                    $i++;
                    if ($i == 1) {
            ?>
                        <tr>

                            <td><?= $no ?></td>

                            <td><?= $data_transaksi['nama_member'] ?></td>
                            <td><?= $data_transaksi['tgl'] ?></td>
                            <td><?= $data_transaksi['batas_waktu'] ?></td>
                            <td><?= $data_transaksi['tgl_bayar'] ?></td>
                            <td><?= $data_transaksi['status'] ?></td>
                            <td><?= $data_transaksi['dibayar'] ?></td>
                            <td><?= $data_dtl_transaksi['jenis'] ?></td>
                            <td><?= $data_dtl_transaksi['qty'] ?></td>
                            <td><?= $data_dtl_transaksi['total'] ?></td>

                            <td>
                                <a href="hapus.php?id=<?= $data_transaksi['id_transaksi'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php
                    } else {
                    ?>
                        <tr>

                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?= $data_dtl_transaksi['jenis'] ?></td>
                            <td><?= $data_dtl_transaksi['qty'] ?></td>
                            <td><?= $data_dtl_transaksi['total'] ?></td>

                            <td>
                            </td>
                        </tr>

            <?php
                    }
                }
            }
            ?>
        </tbody>


        <body>

            <table class="table table-hover table-striped">
                <thead>
                    <h3 align="center">List Paket</h3>
                    <tr>
                        <th>NO</th>
                        <th>JENIS</th>
                        <th>HARGA</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <a href="tambah_paket.php" class="btn btn-info">Tambah paket+</a>
                    <?php
                    include "koneksi.php";
                    $qry_paket = mysqli_query($conn, "select * from paket");
                    $no = 0;
                    while ($data_paket = mysqli_fetch_array($qry_paket)) {
                        $no++; ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $data_paket['jenis'] ?></td>
                            <td><?= $data_paket['harga'] ?></td>
                            <!-- mulai upload file -->
                            <!-- akhir upload file -->

                            <td>
                                <a href="ubah_paket.php?id_paket=<?= $data_paket['id_paket'] ?>" class="btn btn-success">Ubah</a>
                                <a href="hapus_paket.php?id_paket=<?= $data_paket['id_paket'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        </body>