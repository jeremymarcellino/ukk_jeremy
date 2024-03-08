<h1 class="mt-4 fw-bold">Buku</h1>
<?php
$conn = $koneksi;

// Fetch the book data query
$query_books = mysqli_query($koneksi, "SELECT * FROM buku");

?>

<!DOCTYPE html>
<html lang="en">

<body>
    <div class="container-fluid d-flex justify-content-between mt-3">
        <div style="display: flex; justify-content: flex-end; align-items: right;">
            <a href="logout_user.php">
                <i class="bi bi-box-arrow-left" style="margin-right:10px; color:#eddcfc;"></i>
            </a>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row d-flex flex-row flex-wrap justify-content-start" style="color:#eddcfc">
            <?php while ($buku = mysqli_fetch_assoc($query_books)) : ?>
                <?php
                // Fetch the average rating for each book
                $id_buku = $buku['id_buku'];
                $query_avg_rating = "SELECT AVG(rating) AS avg_rating FROM ulasan WHERE id_buku = ?";
                $stmt_avg_rating = $conn->prepare($query_avg_rating);

                if ($stmt_avg_rating) {
                    $stmt_avg_rating->bind_param("i", $id_buku);
                    $stmt_avg_rating->execute();
                    $result_avg_rating = $stmt_avg_rating->get_result();
                    $row_avg_rating = $result_avg_rating->fetch_assoc();
                    $avg_rating = $row_avg_rating['avg_rating'];
                } else {
                    $avg_rating = null;
                }
                ?>
                <a href="?page=detail&id=<?php echo $buku['id_buku']; ?>" class="text-decoration-none container-fluid text-dark col-lg-2 mb-4">
                    <div class="card col-lg-10">
                        <div class="card-img">
                            <img class="w-100" src="./assets/upload/<?= $buku["cover"]; ?>" alt="">
                        </div>
                        <div class="card-body">
                            <p class="mb-0 fs-5"><?php echo $buku['judul']; ?></p>
                            <?php if (isset($buku['kategori'])) : ?>
                                <p class="mb-0 text-secondary"><?php echo $buku['kategori']; ?></p>
                            <?php endif; ?>
                            <p class="mb-0 text-secondary"><?php echo $buku['penulis']; ?></p>
                            <br>
                            <?php
                            if ($avg_rating !== null) {
                                $rating_out_of_5 = ($avg_rating / 5) * 5;
                                echo number_format($rating_out_of_5, 1) . "/5.0";
                            } else {
                                echo '';
                            }
                            ?>
                        </div>
                    </div>
                </a>
            <?php endwhile ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>