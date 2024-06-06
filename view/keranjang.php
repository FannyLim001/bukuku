<?php
require_once '../controller/CartController.php';

$controller = new CartController();
$carts = $controller->displayCart();

$controller->updateCartSubmission();
$controller->deleteCartSubmission();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - BukuKu</title>
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
                            <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;Keranjang</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="book-detail content">
            <div class="container-fluid">
                <?php if (!empty($carts)) : ?>
                    <?php foreach ($carts as $cart) : ?>
                        <div class="card">
                            <div class="card-header">
                                Kode Buku: <?php echo $cart['id_buku'] ?>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center g-4">
                                    <div class="col-lg-4 d-flex justify-content-center align-items-center">
                                        <img src="../public/books-cover/<?php echo $cart['cover'] ?>" class="img-fluid book-cover-v3" alt="">
                                    </div>
                                    <div class="col-lg-8">
                                        <h5 class="card-title"><?php echo $cart['judul_buku'] ?></h5>
                                        <p class="card-text"><?php echo $cart['deskripsi_buku'] ?></p>
                                        <p class="card-text">Rp <?php echo number_format($cart['harga_buku'], 0, ',', '.') ?></p>

                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                            <input type="hidden" name="id_keranjang" value="<?php echo $cart['id_keranjang'] ?>">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <input type="number" class="order-amount" name="jumlah_order" value="<?php echo $cart['jumlah_order'] ?>">
                                                </div>
                                                <div class="col-auto">
                                                    <button type="submit" name="edit" class="edit-btn">Edit</button>
                                                </div>
                                                <div class="col-auto">
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="delete-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?php echo $cart['id_keranjang'] ?>">
                                                        Hapus
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Buku</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Kamu yakin ingin menghapus buku ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="edit-btn" data-bs-dismiss="modal">Batal</button>
                                                        <!-- Form for deletion -->
                                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                                            <!-- Hidden input field to store id_keranjang -->
                                                            <input type="hidden" name="id_keranjang" id="id_keranjang">
                                                            <!-- Submit button for deletion -->
                                                            <button type="submit" name="delete" class="delete-btn">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No records found</p>
                <?php endif; ?>
            </div>
        </main>
        <footer class="mt-auto">
            <div class="text-center">
                <p>Fanny - 4TID<br>&#169; <?php echo date("Y"); ?>
                </p>
            </div>
        </footer>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modalTriggerButtons = document.querySelectorAll('.delete-btn[data-bs-toggle="modal"]');
            modalTriggerButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var id = this.getAttribute('data-id');
                    var idInput = document.getElementById('id_keranjang');
                    idInput.value = id;
                });
            });
        });
    </script>

    <script src="../assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>