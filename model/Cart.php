<?php
class CartModel
{
    private $conn;
    private $table_name = "keranjang";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getCartList()
    {
        $query = "SELECT k.*, b.* 
          FROM " . $this->table_name . " k 
          INNER JOIN buku b ON k.id_buku = b.id_buku";

        $result = $this->conn->query($query);
        return $result;
    }

    public function insertToCart($bookId, $jumlah_order)
    {
        // Prepare the SQL query to insert data into the keranjang table
        $query = "INSERT INTO " . $this->table_name . " (id_buku, jumlah_order) VALUES ('$bookId','$jumlah_order')";

        // Execute the query
        $result = $this->conn->query($query);

        // Check if the query was successful
        if ($result) {
            // Insertion successful
            return true;
        } else {
            // Insertion failed
            return false;
        }
    }

    public function updateCart($cartId, $jumlah_order)
    {
        $query = "UPDATE " . $this->table_name . " SET jumlah_order = '$jumlah_order' WHERE id_keranjang = '$cartId'";

        $result = $this->conn->query($query);

        if ($result) {
            // Insertion successful
            return true;
        } else {
            // Insertion failed
            return false;
        }
    }


    public function deleteCart($cartId)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_keranjang = '$cartId'";
        $result = $this->conn->query($query);

        if ($result) {
            // Insertion successful
            return true;
        } else {
            // Insertion failed
            return false;
        }
    }
}
