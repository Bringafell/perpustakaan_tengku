<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 text-center">Tabel User</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead class="text-center">
                    <tr>
                      <th >No</th>
                      <th >Username</th>
                      <th >Email</th>
                      <th >Nama Lengkap</th>
                      <th >Alamat</th>
                      <th >Role</th>
                      <th >Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                <?php
                $i = 1;
                $query = mysqli_query($koneksi,"SELECT*FROM user");
                while ($data = mysqli_fetch_array($query)){
                  ?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['nama_lengkap']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td><?php echo $data['role']; ?></td>
                    <td>
                    <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#hapususer<?= $data['id_user']; ?>">Hapus</button>
                    </td>
                  </tr>


                      <!-- Modal Hapus user-->
                      <div class="modal fade" id="hapususer<?= $data['id_user']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">Hapus Kategori</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="./crud_kode/bukucrud.php" method="post">
                          <input type="hidden" name="id" value="<?= $data['id_user'] ?>">
                          <div class="modal-body">
                            Apakah Anda yakin Menghapus data ini?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            <button type="submit" name="hapususer" class="btn btn-danger">Yakin</button>
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