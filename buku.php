<h1 class="mt-4">Buku</h1>
<div class="card">
  <div class="card-body">
    <div class="row">
      <div style="overflow-x: auto;" class="col-md-12">
        <a href="?page=buku_tambah" class="btn btn-primary my-4">Tambah buku</a>
        <table style="width: 2000px;" class="table table-bordered table-danger" id="dataTable" width="100%" cellspacing="0">
          <tr>
            <th>No</th>
            <th>Id</th>
            <th>Judul</th>
            <th>Cover</th>
            <th>Deskripsi</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun terbit</th>
            <th>Aksi</th>
          </tr>
          <?php
          $num = 1;
          $query = mysqli_query($koneksi, "SELECT * FROM buku LEFT JOIN kategori ON buku.id_kategori = kategori.id_kategori");
          while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td><?= $num++; ?></td>
              <td><?= $data["id_buku"]; ?></td>
              <td><?= $data["judul"]; ?></td>
              <td style="width: 220px;">
                <img class="w-100" src="./assets/upload/<?= $data["cover"]; ?>" alt="">
              </td>
              <td><?= $data["deskripsi"]; ?></td>
              <td><?= $data["penerbit"]; ?></td>
              <td><?= $data["penulis"]; ?></td>
              <td><?= $data["tahun_terbit"]; ?></td>
              <td style="width: 200px;">
                <a href="?page=buku_ubah&&id=<?= $data['id_buku']; ?>" class="btn btn-info text-light">Ubah</a>
                <a onclick="return confirm('Apakah anda yakin menghapus kategori ini?');" href="?page=kategori_hapus&&id=<?= $data['id_kategori']; ?>" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
          <?php }; ?>
        </table>
      </div>
    </div>
  </div>
</div>