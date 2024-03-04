<div class="input-group input-group-dynamic mb-4">
  <input type="text" class="form-control" placeholder="Masukkan judul..." aria-label="Username" aria-describedby="basic-addon1" required> 

  <div class="input-group input-group-dynamic mb-4">

    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
</div>




if (isset($_POST['daftar'])) {
  $username = $_POST['username'];
  $nama = $_POST['nama'];
  $password = md5($_POST['password']);
  $email = $_POST['email'];
  $alamat = $_POST['alamat'];

  $cek = mysqli_query("SELECT * FROM user WHERE username='$username'");

  if (mysqli_num_rows($cek) == 0) {
      $query = mysqli_query("INSERT INTO user (username, password, nama_lengkap, email, alamat, role) VALUES ('$username', '$password', '$nama', '$email', '$alamat', 'anggota')");

      if ($query) {
          echo '<script>alert("Registrasi Berhasil<br>Akun Telah Dibuat");location.href="login.php"</script>';
      }
  } else {
      echo '<script>alert("Username sudah ada");</script>';

  }
}



<!-- SELECT * FROM ulasan_buku LEFT JOIN user ON ulasan_buku.id_user=user.id_user LEFT JOIN buku ON ulasan_buku.id_buku=buku.id_buku --> punya sepuh yang bener
<!-- SELECT * FROM ulasan_buku LEFT JOIN user on user.id_user LEFT JOIN buku on buku.id_buku = ulasan_buku.id_buku --> punya saya


<tr>
                            <td width="200">Rating</td>
                            <td width="1">:</td>
                            <td>
                                <select name="rating" class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </tr>






                             <!-- Modal Hapus kategori-->
                  <div class="modal fade" id="hapuskategori<?= $data['id_kategori']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">Hapus Kategori</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="./crud_kode/bukucrud.php" method="post">
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