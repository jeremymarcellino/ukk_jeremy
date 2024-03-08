<h1 class="mt-4">List User</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <a href="?page=user_tambah" class="btn btn-primary">+ User</a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Nama user</th>
                    <th>level</th>
                    <th>Keterangan</th>
                </tr>
                <?php
                $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM user");
                    while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $data['username']; ?></td>
                            <td><?php echo $data['level']; ?></td>
                            
                        
                            <td>
                                
                                <a onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini?')" href="?page=user_hapus&&id=<?php echo $data['id_user']; ?>" class="btn btn-danger">Hapus</a>
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