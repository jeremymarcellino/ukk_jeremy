<?php
require_once "koneksi.php";

$id = $_GET["id"];
$query = mysqli_query($koneksi, "DELETE FROM user WHERE id_user = '$id'");
echo "<script>location.href = '?page=petugas'</script>";
