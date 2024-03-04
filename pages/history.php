<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3 text-center">Riwayat Peminjaman</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <a href="cetak.php" target="blank" class="ms-3 btn btn-success"><i class="fa fa-print"></i> Generate Laporan</a>
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead class="text-center">
                                <tr>
                                    <th class="text-sm">No</th>
                                    <th class="text-sm">Username</th>
                                    <th class="text-sm">Judul</th>
                                    <th class="text-sm">Tanggal Peminjaman</th>
                                    <th class="text-sm">Tanggal Pengembalian</th>
                                    <th class="text-sm">Status Peminjaman</th>
                                    <th class="text-sm">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                $i = 1;
                                $query = mysqli_query($koneksi, "SELECT * FROM peminjaman LEFT JOIN user ON peminjaman.id_user=user.id_user LEFT JOIN buku ON peminjaman.id_buku=buku.id_buku");
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $data['username']; ?></td>
                                        <td><?php echo $data['judul']; ?></td>
                                        <td><?php echo $data['tanggal_peminjaman']; ?></td>
                                        <td><?= (empty($data['tanggal_pengembalian']) ? '-' : $data['tanggal_pengembalian']) ?></td>
                                        <td class="mt-4 badge bg-gradient-info"><?php echo $data['status_peminjaman']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning ms-3" data-bs-toggle="modal" data-bs-target="#editpeminjaman<?= $data['id_peminjaman']; ?>">Edit</button>
                                            <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#hapushistory<?= $data['id_peminjaman']; ?>">Hapus</button>
                                        </td>
                                    </tr>

                                    <!-- Modal edit peminjaman-->
                                    <div class="modal fade" id="editpeminjaman<?php echo $data['id_peminjaman']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Edit Data Peminjaman</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: black;"></button>
                                                </div>
                                                <form action="crud_kode/bukucrud.php" method="post">
                                                    <input type="hidden" name="id" value="<?= $data['id_peminjaman']; ?>">
                                                    <div class="modal-body">
                                                        <div class="row mb-3">
                                                            <div class="cols-12">
                                                                <label for="">Username</label>
                                                                <div><input type="text" class="form-control" class="input-group input-group-outline focused is-focused" name="username" value="<?= $data['username']; ?>"></div>
                                                            </div>
                                                            <div class="cols-12">
                                                                <label for="">Judul</label>
                                                                <div><input type="text" class="form-control" name="judul" value="<?= $data['judul']; ?>"></div>
                                                            </div>
                                                            <div class="cols-12">
                                                                <label for="">Tanggal Peminjaman</label>
                                                                <div><input type="date" class="form-control" name="tanggal_peminjaman" value="<?= $data['tanggal_peminjaman']; ?>"></div>
                                                            </div>
                                                            <div class="cols-12">
                                                                <label for="">Tanggal Pengembalian</label>
                                                                <div><input type="date" class="form-control" name="tanggal_pengembalian" value="<?= $data['tanggal_pengembalian']; ?>"></div>
                                                            </div>
                                                            <div class="cols-12">
                                                                <label for="">Status Peminjaman</label>
                                                                <div><input type="text" class="form-control" name="status_peminjaman" value="<?= $data['status_peminjaman']; ?>"></div>
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



                                    <!-- Modal Hapus history-->
                                    <div class="modal fade" id="hapushistory<?= $data['id_peminjaman']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Hapus Peminjaman</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="./crud_kode/pinjamcrud.php" method="post">
                                                    <input type="hidden" name="id" value="<?= $data['id_peminjaman'] ?>">
                                                    <div class="modal-body">
                                                        Apakah Anda yakin Menghapus data ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                        <button type="submit" name="hapushistory" class="btn btn-danger">Yakin</button>
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