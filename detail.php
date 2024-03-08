<?php
// include 'koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku='$id'");
$buku = mysqli_fetch_array($query);
$data = [
    'buku' => [
        'id_buku' => $buku['id_buku'],
        'judul' => $buku['judul'],
        'penulis' => $buku['penulis'],
        'penerbit' => $buku['penerbit'],
        'tahun_terbit' => $buku['tahun_terbit'],
        'deskripsi' => $buku['deskripsi'],
        'cover' => $buku['cover'],
    ]
];
// Ambil data ulasan dari database
$queryUlasan = mysqli_query($koneksi, "SELECT ulasan.*, user.username
FROM ulasan
JOIN user ON ulasan.id_user = user.id_user WHERE id_buku='$id'");
$ulasan = [];
while ($row = mysqli_fetch_assoc($queryUlasan)) {
    $ulasan[] = $row;
}
?>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="">
                <div class="card-body box-profile">
                    <h3 class="profile-username text-start"><?= $data['buku']['judul']; ?></h3>
                    <tr>
                        <td style="width: 250px;">
                            <img class="w-100" src="./assets/upload/<?= $data['buku']["cover"]; ?>" alt="cover">
                        </td>
                    </tr>
                    <?php if ($_SESSION["user"]["level"] == "peminjam") { ?>
                        <a href="?page=ulasan_tambah&id=<?= $data["buku"]["id_buku"] ?>" class="btn btn-primary btn-block mt-2">
                            <p class="m-0">Komentar</p>
                        </a>
                        <a href="?page=peminjaman_tambah&id=<?= $data["buku"]["id_buku"] ?>" class="btn btn-danger btn-block mt-2">
                            <p class="m-0">Pinjam</p>
                        </a>
                        <a href="?page=koleksi_tambah&id=<?= $data["buku"]["id_buku"] ?>" class="btn btn-danger btn-block mt-2">
                            <p class="m-0">Koleksi</p>
                        </a>
                    <?php } else {; ?>
                        <a href="?page=buku_ubah&id=<?= $data["buku"]["id_buku"] ?>" class="btn btn-danger btn-block mt-2">
                            <p class="m-0">Ubah buku</p>
                        </a>
                    <?php }; ?>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!-- /.col -->

        <div class="col-md-9">
            <div class="">
                <div class="card-header">
                    <h4>Informasi Buku</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td style="width: 150px;">Penulis</td>
                            <td><?= $data['buku']['penulis']; ?></td>
                        </tr>
                        <tr>
                            <td>Penerbit</td>
                            <td><?= $data['buku']['penerbit']; ?></td>
                        </tr>
                        <tr>
                            <td>Tahun Terbit</td>
                            <td><?= $data['buku']['tahun_terbit']; ?></td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td><?= $data['buku']['deskripsi']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="">
                <div class="card-header ">
                    <h4>Ulasan</h4>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Ulasan</th>
                                <th>Rating</th>
                                <th>Pemberi Ulasan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ulasan as $row) : ?>
                                <tr>
                                    <td><?= $row['ulasan']; ?></td>
                                    <td><?= $row['rating']; ?></td>
                                    <td><?= $row['username']; ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->