<?php
session_start();
include_once('./pages/function.php');

date_default_timezone_set("Asia/jakarta");
                $tanggal        = date("Y-m-d");
                $jam            = date('H:i:s');

$pemilik = mysqli_query($koneksi,"SELECT ID_pemilik FROM customer WHERE email='".$_SESSION['email']."'");
$row = $pemilik-> fetch_assoc();
$id = $row['ID_pemilik'];

$nota        = mysqli_query($koneksi,"INSERT INTO nota_suku_cadang (Tgl_Nota_Suku_Cadang, ID_pemilik)
VALUES ('$tanggal','$id')");




//ambiil no nota
$no_nota     = mysqli_query($koneksi,"SELECT No_Nota_Suku_Cadang FROM nota_suku_cadang
ORDER BY No_Nota_Suku_Cadang DESC LIMIT 1");
$row_nota    = $no_nota->fetch_assoc();
$no_nota_sc  = $row_nota['No_Nota_Suku_Cadang'];


//insert detail  nota
foreach ($_SESSION['cart'] as $id_suku_cadang => $jumlah){
$detail      = mysqli_query($koneksi, "INSERT INTO detail_nota_suku_cadang VALUES
 ('$no_nota_sc', '$id_suku_cadang', '$jumlah')");
}
echo "<script>location='nota.php?id=$no_nota_sc ';</script>";
