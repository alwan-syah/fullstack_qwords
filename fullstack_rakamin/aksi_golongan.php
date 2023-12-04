<?php

session_start();
include "koneksi.php";

if (!isset($_SESSION['login'])) {
  header('location:login.php');
}

//jika ada get act
if (isset($_GET['act'])) {

  // act insert
  if ($_GET['act'] == 'insert') {
    //proses menyimpan data
    //menyimpan kiriman form ke variabel
    $kode       = $_POST['kodegolongan'];
    $nama       = $_POST['namagolongan'];
    $tunjsi     = $_POST['tunjangansi'];
    $tunjanak   = $_POST['tunjangananak'];
    $uangmakan  = $_POST['uangmakan'];
    $uanglembur = $_POST['uanglembur'];
    $askes      = $_POST['askes'];

    if ($kode == '' || $nama == '' || $tunjsi == '' || $tunjanak == '' || $uangmakan == '' || $uanglembur == '' || $askes == '') {
      header('location:data_golongan.php?view=tambah&e=bl');
    } else {
      //proses query simpan data
      $simpan = mysqli_query($konek, "INSERT INTO golongan(
                kode_golongan, nama_golongan, tunjangan_suami_istri, tunjangan_anak, uang_makan, uang_lembur, askes) VALUES ('$kode','$nama',
                '$tunjsi','$tunjanak','$uangmakan','$uanglembur','$askes')");

      if ($simpan) {
        header('location:data_golongan.php?e=sukses');
      } else {
        header('location:data_golongan.php?e=gagal');
      }
    }
  }
  //jika act update
  elseif ($_GET['act'] == 'update') {
    //menyimpan kiriman form ke variabel
    $kode       = $_POST['kodegolongan'];
    $nama       = $_POST['namagolongan'];
    $tunjsi     = $_POST['tunjangansi'];
    $tunjanak   = $_POST['tunjangananak'];
    $uangmakan  = $_POST['uangmakan'];
    $uanglembur = $_POST['uanglembur'];
    $askes      = $_POST['askes'];

    if ($kode == '' || $nama == '' || $tunjsi == '' || $tunjanak == '' || $uangmakan == '' || $uanglembur == '' || $askes == '') {
      header('location:data_golongan.php?view=edit&e=bl');
    } else {
      //proses query update data
      $update = mysqli_query($konek, "UPDATE golongan SET nama_golongan='$nama', 
            tunjangan_suami_istri='$tunjsi',tunjangan_anak='$tunjanak',uang_makan='$uangmakan',uang_lembur='$uanglembur',askes='$askes' WHERE kode_golongan='$kode'");

      if ($update) {
        header('location:data_golongan.php?e=sukses');
      } else {
        header('location:data_golongan.php?e=gagal');
      }
    }
  } elseif ($_GET['act'] == 'delete') { //jika act =delete
    $hapus = mysqli_query($konek, "DELETE FROM golongan WHERE kode_golongan='$_GET[id]'");

    if ($hapus) {
      header('location:data_golongan.php?e=sukses');
    } else {
      header('location:data_golongan.php?e=gagal');
    }
  }
}
