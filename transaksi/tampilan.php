<?php

include("../login_guard.php");

allow_page_access_exclusive(["admin", "kasir"]);
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div class="judul">
    <?php include("../navbar.php");
    navbar(); ?>
    <h3 align="center">TAMPIL TRANSAKSI</h3>
</div>
<a href="transaksi.php" class="btn btn-info">Tambah Pesanan+</a>
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
            include "../koneksi.php";

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

    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php
    ?>