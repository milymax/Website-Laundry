<?php
if ($_POST) {
    session_start();
    $id_member = $_POST['id_member'];
    $tgl = $_POST['tgl'];
    $batas_waktu = $_POST['batas_waktu'];
    $tgl_bayar = $_POST['tgl_bayar'];
    $status = $_POST['status'];
    $dibayar = $_POST['dibayar'];
    $qty = $_POST['qty'];
    $id_paket = $_POST['id_paket'];
    $id_user = $_SESSION['id_user'];


    if (empty($tgl)) {
        echo  "<script>alert('Tanggal tidak boleh kosong');location.href='transaksi.php';</script>";
    } elseif (empty($batas_waktu)) {
        echo "<script>alert('Batas Waktu tidak boleh kosong');location.href='transaksi.php';</script>";
    } elseif (empty($tgl_bayar)) {
        echo "<script>alert('Tanggal Dibayar tidak boleh kosong');location.href='transaksi.php';</script>";
    } elseif (empty($status)) {
        echo "<script>alert('Status tidak boleh kosong');location.href='transaksi.php';</script>";
    } elseif (empty($dibayar)) {
        echo "<script>alert('Status Pembayaran tidak boleh kosong');location.href='transaksi.php';</script>";
    } else {
        include "../koneksi.php";
        $insert = mysqli_query($conn, "insert into transaksi (id_member,tgl,batas_waktu,tgl_bayar,status,dibayar,id_user) value ('$id_member','$tgl','$batas_waktu','$tgl_bayar','$status','$dibayar','$id_user')");
        echo mysqli_error($conn);
        $id_transaksi = mysqli_insert_id($conn);
        for ($i = 0; $i < count($qty); $i++) {
            $_qty = $qty[$i];
            $_id_paket = $id_paket[$i];
            var_dump($_qty, $_id_paket, $id_transaksi);
            $insert = mysqli_query($conn, "insert into detail_transaksi (id_transaksi, id_paket, qty) value ($id_transaksi, $_id_paket, $_qty)");
            echo mysqli_error($conn);
        }
        if ($insert) {
            echo "<script>alert('Sukses menambahkan');location.href='tampilan.php';</script>";
        } else {
            echo "<script>alert('gagal menambahkan ');location.href='transaksi'</script>";
        }
    }
}
