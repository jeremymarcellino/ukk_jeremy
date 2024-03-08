<h1 class="mt-4">Petugas</h1>
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <form action="" method="post" enctype="multipart/form-data">
          <?php
          if (isset($_POST["submit"])) {
            $nama = $_POST["nama"];
            $username = $_POST["username"];
            $email = $_POST["email"];
            $noTelepon = $_POST["no_telepon"];
            $alamat = $_POST["alamat"];
            $password = md5($_POST["password"]);

            $insert = mysqli_query($koneksi, "INSERT INTO user(nama, username, password, email, alamat, no_telepon, level) VALUES('$nama', '$username', '$password', '$email', '$alamat', '$noTelepon', 'petugas')");

            if ($insert) {
              echo "<script>location.href = '?page=petugas'</script>";
            }
          }
          ?>
          <div class="row mb-3">
            <div class="col-md-2">Nama</div>
            <div class="col-md-8">
              <input class="form-control" type="text" name="nama" placeholder="masukkan nama petugas">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2">Username</div>
            <div class="col-md-8">
              <input class="form-control" type="text" name="username" placeholder="masukkan username petugas">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2">Alamat</div>
            <div class="col-md-8">
              <input class="form-control" type="text" name="alamat" placeholder="masukkan alamat petugas">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2">No telepon</div>
            <div class="col-md-8">
              <input class="form-control" type="text" name="no_telepon" placeholder="masukkan no telepon petugas">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2">Email</div>
            <div class="col-md-8">
              <input class="form-control" type="text" name="email" placeholder="email nama petugas">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2">Password</div>
            <div class="col-md-8">
              <input class="form-control" type="password" name="password" placeholder="masukkan password petugas">
            </div>
          </div>
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <button class="btn btn-primary" name="submit" value="submit">Simpan</button>
              <button class="btn btn-secondary" name="reset">Reset</button>
              <a href="?page=buku" class="btn btn-danger">Kembali</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>