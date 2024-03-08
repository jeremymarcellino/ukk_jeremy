<h1 class="mt-4">Laporan peminjaman buku</h1>
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <a href="cetak.php" target="_blank" class="btn btn-primary my-4"><i class="fs fa-print"></i>Cetak data</a>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <tr>
            <th>No</th>
            <th>User</th>
            <th>Buku</th>
            <th>Tanggal peminjaman</th>
            <th>Tanggal pengembalian</th>
            <th>Status peminjam</th>
            <th>Aksi</th>
          </tr>
          <?php
          $num = 1;
          $query = mysqli_query($koneksi, "SELECT * FROM peminjaman LEFT JOIN user ON user.id_user = peminjaman.id_user LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku");
          while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td><?= $num++; ?></td>
              <td><?= $data["nama"]; ?></td>
              <td><?= $data["judul"]; ?></td>
              <td><?= $data["tanggal_peminjaman"]; ?></td>
              <td><?= $data["tanggal_pengembalian"]; ?></td>
              <td><?= $data["status_peminjaman"]; ?></td>
              <?php if ($data["status_peminjaman"] == "dikembalikan") { ?>
                <td>-</td>
              <?php } else { ?>
                <td><a onclick="return confirm('Apakah anda yakin mengembalikan buku ini?');" href="?page=peminjaman_hapus&&id=<?= $data['id_peminjaman']; ?>" class="btn btn-danger">Kembalikan</a></td>
              <?php }; ?>
            </tr>
          <?php }; ?>
        </table>
      </div>
    </div>
  </div>
</div>