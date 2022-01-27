<?php
if($_POST){
    $id_outlet=$_POST['id_outlet'];
    $nama=$_POST['nama'];
    $alamat=$_POST['alamat'];
    $tlp= $_POST['tlp'];

    if(empty($nama)){
        echo "<script>alert('nama outlet tidak boleh kosong');location.href='ubah_outlet.php';</script>";
    }else {
    include "../koneksi.php";
    
    $update=mysqli_query($conn,"update outlet set nama ='".$nama."',alamat='".$alamat."',tlp='".$tlp."'
    where id_outlet = '".$id_outlet."'")
    or die(mysqli_error($conn));

if($update){
echo "<script>alert('Sukses update outlet');location.href='tampil_outlet.php';</script>";
} else {
echo "<script>alert('Gagal update outlet');location.href='ubah_outlet.php?id_outlet=".$id_outlet."';</script>";
}
}
}
?>