<h1 class="mt-4">Peminjaman buku</h1>
<div class="">
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <tr>
            <th>No</th>
            <th>Buku</th>
            <th>Tanggal peminjaman</th>
            <th>Tanggal pengembalian</th>
            <th>Status peminjam</th>
          </tr>
          <?php
          $id_user = $_SESSION["user"]["id_user"];
          $num = 1;
          $query = mysqli_query($koneksi, "SELECT peminjaman.*, buku.*, user.* FROM peminjaman INNER JOIN user ON user.id_user = peminjaman.id_user INNER JOIN buku ON buku.id_buku = peminjaman.id_buku WHERE peminjaman.id_user = '$id_user'");
          while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td><?= $num++; ?></td>
              <td><?= $data["judul"]; ?></td>
              <td><?= $data["tanggal_peminjaman"]; ?></td>
              <td><?= $data["tanggal_pengembalian"]; ?></td>
              <td><?= $data["status_peminjaman"]; ?></td>
            </tr>
          <?php }; ?>
        </table>
      </div>
    </div>
  </div>
</div>