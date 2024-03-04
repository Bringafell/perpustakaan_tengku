<h2 align="center">Laporan Peminjaman Buku</h2>
<table border="1" cellspacing="0" cellpadding="5" class="table align-items-center mb-0" width="100%">
    <thead class="text-center">
        <tr>
            <th class="text-sm">No</th>
            <th class="text-sm">Username</th>
            <th class="text-sm">Judul</th>
            <th class="text-sm">Tanggal Peminjaman</th>
            <th class="text-sm">Tanggal Pengembalian</th>
            <th class="text-sm">Status Peminjaman</th>
        </tr>
    </thead>
    <?php
    include "koneksi.php"
    ?>
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
                <td><?php echo $data['tanggal_pengembalian']; ?></td>
                <td><?php echo $data['status_peminjaman']; ?></td>
            </tr>
        <?php
            $i++;
        }
        ?>
    </tbody>
</table>
<script>
    window.print();
    setTimeout(function() {
        window.close();
    }, 100);
</script>