<h1 class="mt-4">Petugas</h1>
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <form action="" method="post" enctype="multipart/form-data">
          <?php
          $id = $_GET["id"];

          if (isset($_POST["submit"])) {
            $nama = $_POST["nama"];
            $username = $_POST["username"];
            $email = $_POST["email"];
            $noTelepon = $_POST["no_telepon"];
            $alamat = $_POST["alamat"];
            $password = md5($_POST["password"]);

            $query = mysqli_query($koneksi, "UPDATE user SET nama = '$nama', username = '$username', email = '$email', password = '$password', alamat = '$alamat', no_telepon = '$noTelepon' WHERE id_user = '$id'");

            if ($query) {
              echo "<script>location.href = '?page=petugas'</script>";
            }
          }

          $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id'");
          $data = mysqli_fetch_array($query);
          ?>
          <div class="row mb-3">
            <div class="col-md-2">Nama</div>
            <div class="col-md-8">
              <input class="form-control" type="text" value="<?= $data['nama']; ?>" name="nama">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2">Username</div>
            <div class="col-md-8">
              <input class="form-control" type="text" value="<?= $data['username']; ?>" name="username">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2">Email</div>
            <div class="col-md-8">
              <input class="form-control" type="text" value="<?= $data['email']; ?>" name="email">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2">Alamat</div>
            <div class="col-md-8">
              <input class="form-control" type="text" value="<?= $data['alamat']; ?>" name="alamat">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2">No telepon</div>
            <div class="col-md-8">
              <input class="form-control" type="text" value="<?= $data['no_telepon']; ?>" name="no_telepon">
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <button class="btn btn-primary" name="submit" value="submit">Simpan</button>
              <button class="btn btn-secondary" name="reset">Reset</button>
              <a href="?page=petugas" class="btn btn-danger">Kembali</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>