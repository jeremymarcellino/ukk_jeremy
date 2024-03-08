<?php
require_once "koneksi.php";

$id = $_GET["id"];
$query = mysqli_query($koneksi, "UPDATE peminjaman SET status_peminjaman = 'dikembalikan' WHERE id_peminjaman = '$id'");
echo "<script>location.href = '?page=laporan'</script>";
