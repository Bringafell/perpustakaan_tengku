<?php
include '../koneksi.php';

if (isset($_POST['peminjaman'])) {
    $id_buku = $_POST['id_buku'];
    $id_user = $_POST['id_user'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $status_peminjaman = $_POST['status_peminjaman'];

    $query = mysqli_query($koneksi, "INSERT INTO peminjaman(id_buku,id_user,tanggal_peminjaman,status_peminjaman,jumlah_dipinjam) values ('$id_buku','$id_user','$tanggal_peminjaman','dipinjam','1') ");

    if ($query) {
        echo '<script>alert("Peminjaman Terkonfirmasi");location.href="../?page=history"</script>';
    } else {
        echo '<script>alert("Peminjaman Gagal")</script>';
    }
}


if (isset($_POST['return'])) {
    $id = $_POST['id_peminjaman'];
    $tanggal = $_POST['tanggal'];
    $id_buku = $_POST['id_buku'];

    $return = mysqli_query($koneksi, "UPDATE peminjaman SET tanggal_pengembalian='$tanggal',status_peminjaman='dikembalikan' WHERE id_peminjaman='$id'");

    if ($return) {
        $trigger = mysqli_query($koneksi,"UPDATE buku set stok=stok+1 where id_buku='$id_buku'");
        if ($trigger) {
            echo '<script>alert("Buku Berhasil Dikembalikan");location.href="../?page=history";</script>';
        }
  
    }
}




if (isset($_POST['edithistory'])) {
    $id_his = $_POST['id'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $stok = $_POST['stok'];

    $query_up = mysqli_query($koneksi, "UPDATE peminjaman SET judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun_terbit', stok='$stok' WHERE id_buku='$id'");

    if ($query_up) {
        echo '<script>alert("Data Berhasil Diubah");location.href="../?page=buku";</script>';
    }
}



if (isset($_POST['hapushistory'])) {
    $id_his = $_POST['id'];

    $query_hpshistory = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE id_peminjaman='$id_his'");

    if ($query_hpshistory) {
        echo '<script>alert("Data Berhasil Dihapus");location.href="../?page=history";</script>';
    }
}
