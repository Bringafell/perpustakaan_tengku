<?php

if (isset($_POST['peminjaman'])) {
    $id_buku = $_POST['id_buku'];
    $id_user = $_POST['id_user'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    $status_peminjaman = $_POST['status_peminjaman'];

    $query = mysqli_query($koneksi, "INSERT INTO peminjaman(id_buku,id_user,tanggal_peminjaman,tanggal_pengembalian,status_peminjaman) values ('$id_buku','$userid','$tanggal_peminjaman','$tanggal_pengembalian','dipinjam') ");

    if ($query) {
        echo '<script>alert("Peminjaman Terkonfirmasi")</script>';
    } else {
        echo '<script>alert("Peminjaman Gagal")</script>';
    }
}

?>



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">FORM PEMINJAMAN</h2>
                <h5 class="text-center">Silahkan isi data di bawah untuk meminjam buku</h5>
            </div>
            <div class="card-body">
                <form method="post" action="./crud_kode/pinjamcrud.php">
                    <table class="table">
                        <td>Pilih User</td>
                        <td>:</td>
                        <td>
                            <select name="id_user" id="" class="form-select">
                                <?php
                                $query_user =  mysqli_query($koneksi, "SELECT * from user where role='user'");
                                while ($datauser = mysqli_fetch_array($query_user)) {


                                ?>
                                    <option value="<?= $datauser['id_user'] ?>"><?= $datauser['username'] ?></option>
                                <?php
                                }
                                ?>

                            </select>
                        </td>
                        <tr>
                            <td>Pilih Buku</td>
                            <td>:</td>
                            <td>
                                <select name="id_buku" id="" class="form-select">
                                    <?php
                                    $query_buku =  mysqli_query($koneksi, "SELECT * from buku");
                                    while ($databuku = mysqli_fetch_array($query_buku)) {
                                    ?>
                                        <option value="<?= $databuku['id_buku'] ?>"><?= $databuku['judul'] ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td width="200">Tanggal Peminjaman</td>
                            <td width="1">:</td>
                            <td>
                                <input type="date" class="form-control" name="tanggal_peminjaman" value="<?= date('Y-m-d') ?>">

                            </td>
                        </tr>
                        <tr>
                            <td width="200">Tanggal Pengembalian</td>
                            <td width="1">:</td>
                            <td>
                                <input type="date" class="form-control" name="tanggal_pengembalian" required>
                            </td>
                        </tr>

                        <tr align="center">
                            <td colspan="3">
                                <input type="hidden" value="dipinjam" name="statuspeminjaman">
                                <button type="submit" name="pinjam" class="btn btn-info">Simpan</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>