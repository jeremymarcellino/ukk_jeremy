<h1 class="mt-4">Petugas</h1>
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <a href="?page=petugas_tambah" class="btn btn-primary my-4">Tambah petugas</a>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <tr>
            <th>No</th>
            <th>Id</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Alamat</th>
            <th>No telepon</th>
            <th>Aksi</th>
          </tr>
          <?php
          $num = 1;
          $query = mysqli_query($koneksi, "SELECT * FROM user WHERE level = 'petugas'");
          while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td><?= $num++; ?></td>
              <td><?= $data["id_user"]; ?></td>
              <td><?= $data["nama"]; ?></td>
              <td><?= $data["username"]; ?></td>
              <td><?= $data["email"]; ?></td>
              <td><?= $data["password"]; ?></td>
              <td><?= $data["alamat"]; ?></td>
              <td><?= $data["no_telepon"]; ?></td>
              <td>
                <a href="?page=petugas_ubah&&id=<?= $data['id_user']; ?>" class="btn btn-info text-light">Ubah</a>
                <a onclick="return confirm('Apakah anda yakin menghapus kategori ini?');" href="?page=petugas_hapus&&id=<?= $data['id_user']; ?>" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
          <?php }; ?>
        </table>
      </div>
    </div>
  </div>
</div>