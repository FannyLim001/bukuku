<?php
require_once './controller/BooksController.php';

$controller = new BooksController();
$books = $controller->displayBooks();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BukuKu</title>
    <link rel="stylesheet" href="./assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <script src="https://kit.fontawesome.com/d42ce06cb7.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="./">Buku<span>Ku</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto grid gap-0 column-gap-5">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#katalog">Katalog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./view/keranjang.php"><i class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;Keranjang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main id="katalog">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <img src="./assets/img/book-lover.svg" class="home-img img-fluid" alt="book-lover">
                </div>
                <div class="col-lg-8">
                    <h1 class="header-title">Selamat Berbelanja di Buku<span>Ku</span></h1>
                    <p class="header-desc">Cari buku favoritmu disini! Ada buku apa saja loh</p>
                    <button class="search-btn"><a href="#">Cari Buku</a></button>
                </div>
            </div>
        </div>
        <br>
        <div class="container-fluid">
            <h1 class="catalog-title text-center">Katalog Buku</h1>
            <br>
            <div class="row justify-content-center gap-0 row-gap-5">
                <?php if (!empty($books)) : ?>
                    <?php foreach ($books as $book) : ?>
                        <div class="col-auto">
                            <div class="card" style="width: 20rem;">
                                <img src="./public/books-cover/<?php echo htmlspecialchars($book['cover']) ?>" class="card-img-top img-fluid book-cover" alt="buku">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($book['judul_buku']); ?></h5>
                                    <p class="card-text">Rp <?php echo htmlspecialchars(number_format($book['harga_buku'], 0, ',', '.')); ?></p>
                                    <button class="buy-btn"><a href="./view/detail-buku.php?id=<?php echo $book['id_buku']; ?>">Beli</a></button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No records found</p>
                <?php endif; ?>
            </div>
        </div>
    </main>
    <footer>
        <div class="text-center sticky-bottom">
            <p>Fanny - 4TID<br>&#169; <?php echo date("Y"); ?> </p>
        </div>
    </footer>
    <script src="./assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>