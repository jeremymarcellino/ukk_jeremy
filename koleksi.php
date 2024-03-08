<div class="card bg-white">
  <div class="card-body">
    <h1 class="mt-4 text-center">Koleksi Buku</h1>
    <div class="row">
      <div class="col_md_12">
        <a href="?page=koleksi_tambah" class="btn btn-primary"><i class="fa fa-plus"></i> tambah koleksi</a>
        <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
          <tr>
            <th>No</th>
            <th>buku</th>
            <th>hapus</th>
          </tr>
          <?php
          $id = $_GET["id"];
          $i = 1;
          $query = mysqli_query($koneksi, "SELECT buku.*, koleksi.* FROM buku INNER JOIN koleksi ON koleksi.id_buku = buku.id_buku WHERE koleksi.id_user = $id");
          while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $data['judul']; ?></td>
              <td>
                <a onclick="return confirm('apakah anda yakin menghapus data ini??')" href="?page=koleksi_hapus&&id=<?php echo $data['id']; ?>" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
          <?php
          }
          ?>
        </table>
      </div>
    </div>
  </div>
</div>