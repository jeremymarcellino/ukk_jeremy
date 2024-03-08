<h1 class="mt-4">Ulasan</h1>
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <a href="?page=ulasan_tambah" class="btn btn-primary my-4">Tambah ulasan</a>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <tr>
            <th>No</th>
            <th>User</th>
            <th>Buku</th>
            <th>Ulasan</th>
            <th>Rating</th>
          </tr>
          <?php
          $num = 1;
          $query = mysqli_query($koneksi, "SELECT * FROM ulasan LEFT JOIN user ON user.id_user = ulasan.id_user LEFT JOIN buku ON buku.id_buku = ulasan.id_buku");
          while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td><?= $num++; ?></td>
              <td><?= $data["nama"]; ?></td>
              <td><?= $data["judul"]; ?></td>
              <td><?= $data["ulasan"]; ?></td>
              <td><?= $data["rating"]; ?></td>
              <td>
                <a href="?page=ulasan_ubah&&id=<?= $data['id_ulasan']; ?>" class="btn btn-info text-light">Ubah</a>
                <a onclick="return confirm('Apakah anda yakin menghapus kategori ini?');" href="?page=ulasan_hapus&&id=<?= $data['id_ulasan']; ?>" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
          <?php }; ?>
        </table>
      </div>
    </div>
  </div>
</div>