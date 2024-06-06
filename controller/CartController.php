<?php
require_once __DIR__ . '/../config/koneksi.php';
require_once __DIR__ . '/../model/Cart.php';

class CartController
{
    private $cartModel;

    public function __construct()
    {
        $database = new Database();
        $db = $database->getConnection();
        $this->cartModel = new CartModel($db);
    }

    public function displayCart()
    {
        $result = $this->cartModel->getCartList();
        $cart = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $cart[] = $row;
            }
        }
        return $cart; // Return the cart data
    }

    public function insertBooksToCart($bookId, $jumlah_order)
    {
        // Call the method from CartModel to insert books into the cart
        $result = $this->cartModel->insertToCart($bookId, $jumlah_order);

        // Check if the insertion was successful
        if ($result) {
            // Insertion successful
            return true;
        } else {
            // Insertion failed
            return false;
        }
    }

    public function handleCartSubmission()
    {
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id_buku']) && isset($_POST['jumlah_order'])) {
            // Get the value of 'jumlah_order' from $_POST
            $bookId = $_POST['id_buku'];
            $jumlah_order = $_POST['jumlah_order'];

            // Call the insertBooksToCart method of CartController to insert books into the cart
            $insertResult = $this->insertBooksToCart($bookId, $jumlah_order);

            // Check if insertion was successful
            if ($insertResult) {
                // Insertion successful, redirect the user to the cart page
                header("Location: ./keranjang.php");
                exit();
            } else {
                // Insertion failed, handle the error accordingly
                echo "Failed to insert books into the cart.";
            }
        }
    }

    public function updateBooksInCart($cartId, $jumlah_order)
    {
        $result = $this->cartModel->updateCart($cartId, $jumlah_order);

        if ($result) {
            // Insertion successful
            return true;
        } else {
            // Insertion failed
            return false;
        }
    }

    public function updateCartSubmission()
    {
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['edit']) && isset($_POST['id_keranjang']) && isset($_POST['jumlah_order'])) {
            // Get the value of 'jumlah_order' from $_POST
            $cartId = $_POST['id_keranjang'];
            $jumlah_order = $_POST['jumlah_order'];

            // Call the insertBooksToCart method of CartController to insert books into the cart
            $updateResult = $this->updateBooksInCart($cartId, $jumlah_order);

            // Check if insertion was successful
            if ($updateResult) {
                // Insertion successful, redirect the user to the cart page
                header("Location: ./keranjang.php");
                exit();
            } else {
                // Insertion failed, handle the error accordingly
                echo "Failed to update books in the cart.";
            }
        }
    }

    public function deleteBooksInCart($cartId)
    {
        $result = $this->cartModel->deleteCart($cartId);

        if ($result) {
            // Insertion successful
            return true;
        } else {
            // Insertion failed
            return false;
        }
    }

    public function deleteCartSubmission()
    {
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete']) && isset($_POST['id_keranjang'])) {
            // Get the value of 'jumlah_order' from $_POST
            $cartId = $_POST['id_keranjang'];

            // Call the insertBooksToCart method of CartController to insert books into the cart
            $deleteResult = $this->deleteBooksInCart($cartId);

            // Check if insertion was successful
            if ($deleteResult) {
                // Insertion successful, redirect the user to the cart page
                header("Location: ./keranjang.php");
                exit();
            } else {
                // Insertion failed, handle the error accordingly
                echo "Failed to delete books in the cart.";
            }
        }
    }
}
