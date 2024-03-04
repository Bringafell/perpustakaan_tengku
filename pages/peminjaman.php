<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3 text-center">Tabel Peminjaman</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                </div>

                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead class="text-center">
                            <tr>
                                <th class="text-sm">No</th>
                                <th class="text-sm">Judul</th>
                                <th class="text-sm">Tanggal Peminjaman</th>
                                <th class="text-sm">Tanggal Pengembalian</th>
                                <th class="text-sm">Status Peminjaman</th>
                                <th class="text-sm">Aksi</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">

                            <?php
                            $i = 1;

                            $idp = $_SESSION['user']['id_user'];

                            $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN buku on peminjaman.id_buku=buku.id_buku where id_user = '$idp'");


                            while ($data = mysqli_fetch_array($query)) {
                                $id = $data['id_buku'];
                                $querykategori = mysqli_query($koneksi, "SELECT*FROM kategoribuku_relasi INNER JOIN kategori_buku ON kategoribuku_relasi.id_kategori=kategori_buku.id_kategori WHERE id_buku='$id'");
                                $datakategori = mysqli_fetch_array($querykategori);
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $data['judul']; ?></td>
                                    <td><?php echo $data['tanggal_peminjaman']; ?></td>
                                    <td><?php echo $data['tanggal_pengembalian']; ?></td>
                                    <td><?php echo $data['status_peminjaman']; ?></td>

                                    <td><a href="?page=ulasan&id=<?= $data['id_buku'] ?>" class="btn btn-info btn-sm">Lihat Ulasan</a></td>
                                    <td>
                                        <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#hapusbuku<?= $data['id_buku']; ?>">Hapus</button>
                                    </td>
                                </tr>

                                <!-- Modal Kategori -->
                                <div class="modal fade" id="kategorikan<?= $data['id_buku'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="col-12">
                                                    <div class="text-center">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Kategorikan Buku</h1>
                                                        <button type="button" class="btn-close" style="float: right; margin-right: 0px; margin-top: -30px; background-color:black;" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="./crud_kode/bukucrud.php" method="post">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">Kategorikan Buku <strong><?= $data['judul'] ?></strong></label>
                                                        <div>
                                                            <input type="hidden" name="id" value="<?= $data['id_buku'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Nama Kategori</strong></label>
                                                        <div>
                                                            <select name="nama_kategori" id="">
                                                                <option value="" hidden>Pilih Kategori</option>
                                                                <?php
                                                                $query_kategori = mysqli_query($koneksi, "SELECT * FROM kategori_buku");
                                                                while ($data_kategori = mysqli_fetch_array($query_kategori)) {
                                                                ?>
                                                                    <option value="<?= $data_kategori['id_kategori'] ?>"><?= $data_kategori['nama_kategori'] ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="col-12">
                                                            <div class="text-center">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary" name="kategorikan">Simpan</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Hapus buku-->
                                <div class="modal fade" id="hapusbuku<?= $data['id_buku']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Hapus Buku</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="./crud_kode/bukucrud.php" method="post">
                                                <input type="hidden" name="id" value="<?= $data['id_buku'] ?>">
                                                <div class="modal-body">
                                                    Apakah Anda yakin Menghapus data ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                    <button type="submit" name="hapusbuku" class="btn btn-danger">Yakin</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal edit-->
                                <div class="modal fade" id="editbuku<?php echo $data['id_buku']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Edit Data Buku</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: black;"></button>
                                            </div>
                                            <form action="crud_kode/bukucrud.php" method="post">
                                                <input type="hidden" name="id" value="<?= $data['id_buku']; ?>">
                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <div class="cols-12">
                                                            <label for="">Judul</label>
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input type="text" class="form-control" placeholder="Masukkan judul..." aria-label="Username" name="judul" value="<?= $data['judul']; ?>" aria-describedby="basic-addon1">
                                                            </div>
                                                        </div>
                                                        <div class="cols-12">
                                                            <label for="">Penulis</label>
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input type="text" class="form-control" placeholder="Masukkan penulis..." aria-label="Username" name="penulis" value="<?= $data['penulis']; ?>" aria-describedby="basic-addon1">
                                                            </div>
                                                        </div>
                                                        <div class="cols-12">
                                                            <label for="">Penerbit</label>
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input type="text" class="form-control" placeholder="Masukkan penerbit..." aria-label="Username" name="penerbit" value="<?= $data['penerbit']; ?>" aria-describedby="basic-addon1">
                                                            </div>
                                                        </div>
                                                        <div class="cols-12">
                                                            <label for="">Tahun Terbit</label>
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input type="text" class="form-control" placeholder="Masukkan tahun terbit..." aria-label="Username" name="tahun_terbit" value="<?= $data['tahun_terbit']; ?>" aria-describedby="basic-addon1">
                                                            </div>
                                                            <div class="cols-12">
                                                                <label for="">Stok</label>
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <input type="text" class="form-control" placeholder="Masukkan stok..." aria-label="Username" name="stok" value="<?= $data['stok']; ?>" aria-describedby="basic-addon1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" name="editbuku" class="btn btn-warning ">Ubah</button>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>




                            <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal  tambah -->
<div class="modal fade" id="tambahbuku" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: black;"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="crud_kode/bukucrud.php">
                    <table class="table">
                        <tr>
                            <td width="200">Judul</td>
                            <td width="1">:</td>
                            <td>
                                <div class="input-group input-group-dynamic mb-4">
                                    <input type="text" class="form-control" placeholder="Masukkan judul..." aria-label="Username" name="judul" aria-describedby="basic-addon1" required>
                            </td>
                        </tr>
                        <tr>
                            <td width="200">Penulis</td>
                            <td width="1">:</td>
                            <td>
                                <div class="input-group input-group-dynamic mb-4">
                                    <input type="text" class="form-control" placeholder="Masukkan penulis..." aria-label="Username" name="penulis" aria-describedby="basic-addon1" required>
                            </td>
                        </tr>
                        <tr>
                            <td width="200">Penerbit</td>
                            <td width="1">:</td>
                            <td>
                                <div class="input-group input-group-dynamic mb-4">
                                    <input type="text" class="form-control" placeholder="Masukkan penerbit..." aria-label="Username" name="penerbit" aria-describedby="basic-addon1" required>
                            </td>
                        </tr>
                        <tr>
                            <td width="200">Tahun Terbit</td>
                            <td width="1">:</td>
                            <td>
                                <div class="input-group input-group-dynamic mb-4">
                                    <input type="text" class="form-control" placeholder="Masukkan tahun terbit..." aria-label="Username" name="tahun_terbit" aria-describedby="basic-addon1" required>
                            </td>
                        </tr>
                        <tr>
                            <td width="200">Stok</td>
                            <td width="1">:</td>
                            <td>
                                <div class="input-group input-group-dynamic mb-4">
                                    <input type="text" class="form-control" placeholder="Masukkan stok..." aria-label="Username" name="stok" aria-describedby="basic-addon1" required>
                            </td>
                        </tr>
                    </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info" name="tambahbuku">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>