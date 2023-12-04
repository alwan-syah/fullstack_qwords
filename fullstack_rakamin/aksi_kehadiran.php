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


            if ($simpan) {
                header('location:data_kehadiran.php?e=sukses');
            } else {
                header('location:data_kehadiran.php?e=gagal');
            }
        }
    }
    //jika act update
    elseif ($_GET['act'] == 'update') {
        //menyimpan kiriman form ke variabel


        if ($update) {
            header('location:data_kehadiran.php?e=sukses');
        } else {
            header('location:data_kehadiran.php?e=gagal');
        }
    }
        
    } elseif ($_GET['act'] == 'delete') { //jika act =delete
        $hapus = mysqli_query($konek, "DELETE FROM pegawai WHERE nip='$_GET[id]'");

        if ($hapus) {
            header('location:data_kehadiran.php?e=sukses');
        } else {
            header('location:data_kehadiran.php?e=gagal');
        }
    }
    }
}
