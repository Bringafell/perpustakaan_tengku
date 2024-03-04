<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">

                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2  ">
                    <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3" align="center">Pengembalian Buku</h6>
                    </div>
                </div>

                <?php
                if (isset($_POST['user'])) {
                    $id = $_POST['user'];

                    $query = mysqli_query($koneksi, "SELECT * FROM peminjaman INNER JOIN buku ON buku.id_buku=peminjaman.id_buku INNER JOIN user ON user.id_user=peminjaman.id_user WHERE peminjaman.id_user='$id' AND status_peminjaman!='dikembalikan'");
                ?>

                    <div class="card-body px-0 pb-2 ms-4">
                        <h3 align='center'>Pilih Pengembalian</h3>
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead class='text-center'>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Judul</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Status Peminjaman</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class='text-center'>
                                    <?php
                                    $no = 1;


                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data['nama_lengkap'] ?></td>
                                            <td><?= $data['judul'] ?></td>
                                            <td><?= $data['tanggal_peminjaman'] ?></td>
                                            <td><?= $data['status_peminjaman'] ?></td>
                                            <td>
                                                <form method="post">
                                                    <input type="hidden" name="peminjaman" value="<?= $data['id_peminjaman'] ?>">
                                                    <button type="submit" class="btn btn-info btn-sm">Pilih</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>




                <?php
                } else  if (isset($_POST['peminjaman'])) {
                    $peminjaman = $_POST['peminjaman'];

                    $query1 = mysqli_query($koneksi, "SELECT * FROM peminjaman INNER JOIN buku ON buku.id_buku=peminjaman.id_buku INNER JOIN user ON user.id_user=peminjaman.id_user WHERE id_peminjaman  ='$peminjaman'");

                    $data1 = mysqli_fetch_array($query1);


                ?>

                    <div class="card-body px-0 pb-2 ms-4">
                        <h3 align='center'>Konfirmasi Pengembalian</h3>
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <form method="post" action="./crud_kode/pinjamcrud.php">
                                    <tr class="text-right">
                                        <td>Nama Peminjam</td>
                                        <td>:</td>
                                        <td><?= $data1['nama_lengkap'] ?></td>
                                    </tr>
                                    <tr class="text-right">
                                        <td>Username Peminjam</td>
                                        <td>:</td>
                                        <td><?= $data1['username'] ?></td>
                                    </tr>
                                    <tr class="text-right">
                                        <td>Judul Buku</td>
                                        <td>:</td>
                                        <td><?= $data1['judul'] ?></td>
                                    </tr>
                                    <tr class="text-right">
                                        <td>Tanggal Peminjaman</td>
                                        <td>:</td>
                                        <td>
                                            <input type="date" value="<?= $data1['tanggal_peminjaman'] ?>" style="width: 60% ;" disabled>
                                        </td>
                                    </tr>
                                    <tr class="text-right">
                                        <td>Tanggal Pengembalian</td>
                                        <td>:</td>
                                        <td>
                                            <input type="date" name="tanggal" value="<?= date('Y-m-j') ?>" style="width: 60% ;">
                                            <input type="hidden" name="id_peminjaman" value="<?= $_POST['peminjaman'] ?>">
                                            <input type="hidden" name="id_buku" value="<?= $data1['id_buku']?>">
                                        </td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class='text-end'>
                            <a href="?page=pengembalianx" class="btn btn-danger btn-sm">Kembali</a>
                            <button type="submit" name="return" class="btn btn-info btn-sm">Konfirmasi</button>
                        </div>
                    </div>
                    </form>

                <?php
                } else {
                ?>

                    <div class="card-body px-0 pb-2 ms-4">
                        <h3 align='center'>PILIH USER</h3>
                        <div class="ms-4">
                            <form method="post">
                                <input type="text" name="nama_user" placeholder="Cari username..." style="width: 20% ;">
                                <button type="submit" class="btn btn-warning btn-sm mt-2">Cari</button>
                            </form>
                        </div>
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead class='text-center'>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class='text-center'>
                                    <?php
                                    $no = 1;
                                    if (isset($_POST['nama_user'])) {
                                        $nama_user = $_POST['nama_user'];
                                        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE role='user' AND username LIKE '%$nama_user%'");
                                    } else {
                                        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE role='user'");
                                    }

                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data['nama_lengkap'] ?></td>
                                            <td><?= $data['username'] ?></td>
                                            <td><?= $data['email'] ?></td>
                                            <td><?= $data['alamat'] ?></td>
                                            <td><?= $data['role'] ?></td>
                                            <td>
                                                <form method="post">
                                                    <input type="hidden" name="user" value="<?= $data['id_user'] ?>">
                                                    <button type="submit" class="btn btn-info btn-sm">Pilih</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                <?php
                }
                ?>

            </div>
        </div>
    </div>
</div>