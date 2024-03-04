<?php
  include "../koneksi.php";




if (isset($_POST['tambahkategori'])) {
    $id_kategori = $_POST['id'];
    $nama_kategori = $_POST['nama_kategori'];
   
    
    

    $query_tmbhkategori= mysqli_query($koneksi, "INSERT INTO kategori_buku(nama_kategori) values('$nama_kategori')");

    if ($query_tmbhkategori) {
      echo '<script>alert("Tambah Data Kategori Berhasil");location.href="../?page=kategori"</script>';
    } else {
      echo '<script>alert("Tambah Data kategori Gagal")</script>';
    }
  }

  if (isset($_POST['editkategori'])) {
    $id_kategori = $_POST['id'];
    $nama_kategori = $_POST['nama_kategori'];

    $query_upkategori = mysqli_query($koneksi, "UPDATE kategori_buku SET nama_kategori='$nama_kategori' WHERE id_kategori='$id_kategori'");

    if ($query_upkategori) {
      echo '<script>alert("Data Berhasil Diubah");location.href="../?page=kategori";</script>';
    }
  }

  if (isset($_POST['hapuskategori'])) {
    $id_kategori = $_POST['id'];

    $query_hpskategori = mysqli_query($koneksi, "DELETE FROM kategori_buku WHERE id_kategori='$id_kategori'");

    if ($query_hpskategori) {
      echo '<script>alert("Data Berhasil Dihapus");location.href="../?page=kategori";</script>';
    }
  }
