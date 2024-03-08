<h1 class="mt-4">Kategori buku</h1>
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <a href="?page=kategori_tambah" class="btn btn-primary my-4">Tambah data</a>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <tr>
            <th>No</th>
            <th>Nama kategori</th>
          </tr>
          <?php
          $num = 1;
          $query = mysqli_query($koneksi, "SELECT * FROM kategori");
          while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td><?= $num++; ?></td>
              <td><?= $data["kategori"]; ?></td>
              <td>
                <a href="?page=kategori_ubah&&id=<?= $data['id_kategori']; ?>" class="btn btn-info text-light">Ubah</a>
                <a onclick="return confirm('Apakah anda yakin menghapus kategori ini?');" href="?page=kategori_hapus&&id=<?= $data['id_kategori']; ?>" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
          <?php }; ?>
        </table>
      </div>
    </div>
  </div>
</div>