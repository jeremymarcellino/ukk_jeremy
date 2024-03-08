<h1 class="mt-4">tambah koleksi Buku</h1>
<div class="card bg-white">
  <div class="card-body">
    <div class="row">
      <div class="col_md_12">
        <form method="post">
          <?php
          if (isset($_POST['submit'])) {
            $id_user = $_SESSION['user']['id_user'];
            $id_buku = $_POST['id_buku'];
            $query = mysqli_query($koneksi, "INSERT INTO koleksi(id_user, id_buku)values('$id_user','$id_buku')");

            if ($query) {
              echo '<script>alert("Tambah Data Berhasil.");</script>';
            } else {
              echo '<script>alert("Tambah Data Gagal.");</script>';
            }
          }
          ?>
          <div class="row mb-3">
            <div class="col-md-2">buku</div>
            <div class="col-md-8">
              <select name="id_buku" class="form-control">
                <?php
                $buk = mysqli_query($koneksi, "SELECT*FROM buku");

                while ($buku = mysqli_fetch_array($buk)) {
                ?>
                  <option value="<?php echo $buku['id_buku']; ?>"><?php echo $buku['judul']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-2">Mau ditambah ke koleksi?</div>
        <div class="col-md-8">
          <button name="submit" class="btn btn-primary">Tambah</button>
        </div>
        <div class="row">
          <div class="col-md-1">
            <a href="?page=koleksi&id=<?= $_SESSION["user"]["id_user"]; ?>" class="btn btn-danger">Kembali</a>
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>