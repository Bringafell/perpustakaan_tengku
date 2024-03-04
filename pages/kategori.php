<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3 text-center">Tabel kategori</h6>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-info ms-3" data-bs-toggle="modal" data-bs-target="#tambahkategori">
            + Tambah Kategori
          </button>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead class="text-center">
                <tr>
                  <th class="">No</th>
                  <th class="text-center">Kategori</th>
                  <th>Aksi</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php
                $i = 1;
                $query = mysqli_query($koneksi, "SELECT*FROM kategori_buku");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td class="text-center ">
                      <span class="badge badge-sm bg-gradient-success"> <?php echo $data['nama_kategori']; ?></span>
                    </td>
                    <td>
                      <button type="button" class="btn btn-warning ms-3" data-bs-toggle="modal" data-bs-target="#editkategori<?= $data['id_kategori']; ?>">Edit</button>
                      <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#hapuskategori<?= $data['id_kategori']; ?>">Hapus</button>
                    </td>
                  </tr>

                  <!-- Modal edit-->
                  <div class="modal fade" id="editkategori<?php echo $data['id_kategori']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">Edit Data Kategori</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: black;"></button>
                        </div>
                        <form action="crud_kode/kategoricrud.php" method="post">
                          <input type="hidden" name="id" value="<?= $data['id_kategori']; ?>">
                          <div class="modal-body">
                            <div class="row mb-3">
                              <div class="cols-12">
                                <label for="">Nama Kategori</label>
                                <div class="input-group input-group-dynamic mb-4">
                                <input type="text" class="form-control" placeholder="Masukkan judul..." aria-label="Username" name="nama_kategori" value="<?= $data['nama_kategori']; ?>" aria-describedby="basic-addon1">
                              </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="editkategori" class="btn btn-warning ">Ubah</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>



                  <!-- Modal Hapus kategori-->
                  <div class="modal fade" id="hapuskategori<?= $data['id_kategori']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">Hapus Kategori</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="./crud_kode/kategoricrud.php" method="post">
                          <input type="hidden" name="id" value="<?= $data['id_kategori'] ?>">
                          <div class="modal-body">
                            Apakah Anda yakin Menghapus data ini?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            <button type="submit" name="hapuskategori" class="btn btn-danger">Yakin</button>
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
</div>

<!-- Modal  tambah -->
<div class="modal fade" id="tambahkategori" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Kategori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: black;"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="crud_kode/kategoricrud.php">
          <table class="table">
            <tr>
              <td width="200">Nama Kategori</td>
              <td width="1">:</td>
              <td>
                <div class="input-group input-group-dynamic mb-4">
                  <input type="text" class="form-control" placeholder="Masukkan Nama Kategori..." aria-label="Username" name="nama_kategori" aria-describedby="basic-addon1" required>
              </td>
            </tr>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info" name="tambahkategori">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>