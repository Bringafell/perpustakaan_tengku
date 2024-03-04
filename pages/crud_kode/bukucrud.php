 <?php
  include "../koneksi.php";


  if (isset($_POST['tambahbuku'])) {

    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $stok = $_POST['stok'];



    $query = mysqli_query($koneksi, "INSERT INTO buku(judul,penulis,penerbit,tahun_terbit,stok) values('$judul','$penulis', '$penerbit', '$tahun_terbit', '$stok')");

    if ($query) {
      echo '<script>alert("Tambah Data Buku Berhasil");location.href="../?page=buku"</script>';
    } else {
      echo '<script>alert("Tambah Data Buku Gagal")</script>';
    }
  }





  if (isset($_POST['editbuku'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $stok = $_POST['stok'];

    $query_up = mysqli_query($koneksi, "UPDATE buku SET judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun_terbit', stok='$stok' WHERE id_buku='$id'");

    if ($query_up) {
      echo '<script>alert("Data Berhasil Diubah");location.href="../?page=buku";</script>';
    }
  }

  if (isset($_POST['hapusbuku'])) {
    $id = $_POST['id'];

    $query_del = mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku='$id'");

    if ($query_del) {
      echo '<script>alert("Data Berhasil Dihapus");location.href="../?page=buku";</script>';
    }
  }




  if (isset($_POST['kategorikan'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama_kategori'];

    $query_kategori = mysqli_query($koneksi, "INSERT INTO kategoribuku_relasi (id_kategoribuku, id_buku, id_kategori) VALUES (NULL,'$id','$nama')");

    if ($query_kategori) {
      echo '<script>alert("BUKU BERHASIL DIKATEGORIKAN");location.href="../?page=buku";</script>';
    }
  }

  // CRUD USERR
  if (isset($_POST['hapususer'])) {
    $id_user = $_POST['id'];

    $query_hpsuser = mysqli_query($koneksi, "DELETE FROM user WHERE id_user='$id_user'");

    if ($query_hpsuser) {
      echo '<script>alert("Data Berhasil Dihapus");location.href="../?page=user";</script>';
    }
  }

  
  if (isset($_POST['beriulasan'])) {
    $user = $_POST['id_user'];
    $buku = $_POST['id_buku'];
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];

    $query_ulasan = mysqli_query($koneksi,"INSERT INTO ulasan_buku (id_user,id_buku,ulasan,rating) VALUES ('$user','$buku','$ulasan','$rating')");
              
    if ($query_ulasan) {
        echo '<script>alert("Buku berhasil diberi rating");location.href="../?page=buku";</script>';
    }
}

if (isset($_POST['tambahkoleksi'])) {
    $id_buku = $_POST['id_buku'];
    $id_user = $_POST['id_user'];

    $query_addkol = mysqli_query($koneksi,"INSERT INTO koleksipribadi (id_user,id_buku) VALUES ('$id_user','$id_buku')");

    if ($query_addkol) {
        echo '<script>alert("Buku Ditambahkan ke Koleksi");location.href="../?page=buku";</script>';
    }
}

if (isset($_POST['hapuskoleksi'])) {
    $id_buku = $_POST['id_buku'];
    $id_user = $_POST['id_user'];

    $query_delkol = mysqli_query($koneksi, "DELETE FROM koleksipribadi WHERE id_user='$id_user' AND id_buku='$id_buku'");

    if ($query_delkol) {
        echo '<script>alert("Buku Dihapus Dari Koleksi");location.href="../?page=koleksi";</script>';
    }
}