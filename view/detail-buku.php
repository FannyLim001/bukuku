<?php
require_once '../controller/BooksController.php';
require_once '../controller/CartController.php';

$id = $_GET['id'];

$controller = new BooksController();
$book = $controller->displayBookDetail($id);

// Create an instance of CartController
$cartController = new CartController();

// Call the handleCartSubmission method to handle form submission
$cartController->handleCartSubmission();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku - BukuKu</title>
    <link rel="stylesheet" href="../assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script src="https://kit.fontawesome.com/d42ce06cb7.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="./">Buku<span>Ku</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../">Katalog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./keranjang.php"><i class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;Keranjang</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="book-detail content">
            <div class="container-fluid">
                <div class="row justify-content-center g-4">
                    <div class="col-lg-4 d-flex justify-content-center align-items-center">
                        <img src="../public/books-cover/<?php echo $book->cover ?>" class="img-fluid book-cover-v2" alt="">
                    </div>
                    <div class="col-lg-8">
                        <h1 class="book-title"><?php echo $book->judul_buku ?></h1>
                        <div class="row">
                            <div class="col-auto">
                                <h5 class="book-details"><?php echo $book->author ?></h5>
                            </div>
                            <div class="col-auto">
                                <h5 class="book-details"><?php echo $book->tahun_terbit ?></h5>
                            </div>
                        </div>
                        <p class="book-desc"><?php echo $book->deskripsi_buku ?></p>
                        <h5 class="book-details">Rp <?php echo number_format($book->harga_buku, 0, ',', '.') ?></h5>
                        <br>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $book->id_buku; ?>" method="POST">
                            <input type="hidden" name="id_buku" value="<?php echo $book->id_buku ?>">
                            <div class="row">
                                <div class="col-auto">
                                    <input type="number" class="order-amount-v2" name="jumlah_order" placeholder="0">
                                </div>
                                <div class="col-auto">
                                    <button class="buy-btn-v2" type="submit">Beli</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <footer class="mt-auto">
            <div class="text-center">
                <p>Fanny - 4TID<br>&#169; <?php echo date("Y"); ?>
                </p>
            </div>
        </footer>
    </div>
    <script src="../assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>