<h1 class="mt-4">Peminjaman buku</h1>
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <form action="" method="post">
          <?php
          if (isset($_POST["submit"])) {
            $id_buku = $_POST["id_buku"];
            $id_user = $_SESSION['user']['id_user'];
            $tanggalPeminjaman = $_POST["tanggal_peminjaman"];
            $tanggalPengembalian = $_POST["tanggal_pengembalian"];
            $statusPeminjaman = $_POST["status_peminjaman"];
            $rating = $_POST["rating"];

            $query = mysqli_query($koneksi, "INSERT INTO peminjaman(id_buku, id_user, tanggal_peminjaman, tanggal_pengembalian, status_peminjaman) VALUES('$id_buku', '$id_user', '$tanggalPeminjaman', '$tanggalPengembalian', '$statusPeminjaman')");

            if ($query) {
              echo "<script>location.href = '?page=peminjaman'</script>";
            }
          }
          ?>
          <div class="row mb-3">
            <div class="col-md-2">Buku</div>
            <div class="col-md-8">
              <select name="id_buku" class="form-control">
                <?php
                $buk = mysqli_query($koneksi, "SELECT * FROM buku");

                while ($buku = mysqli_fetch_array($buk)) {
                ?>
                  <option value="<?= $buku["id_buku"] ?>"><?= $buku["judul"] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2">Tanggal peminjaman</div>
            <div class="col-md-8">
              <input type="date" class="form-control" name="tanggal_peminjaman">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2">Tanggal pengembalian</div>
            <div class="col-md-8">
              <input type="date" class="form-control" name="tanggal_pengembalian">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2">Status peminjaman</div>
            <div class="col-md-8">
              <select name="status_peminjaman" class="form-control" id="">
                <option value="dipinjam">Pinjam</option>
                <option value="dikembalikan">Dihapus</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <button class="btn btn-primary" name="submit" value="submit">Simpan</button>
              <button class="btn btn-secondary" name="reset">Reset</button>
              <a href="?page=peminjaman" class="btn btn-danger">Kembali</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>