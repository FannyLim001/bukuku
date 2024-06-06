<?php
class BookModel
{
    private $conn;
    private $table_name = "buku";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getBooks()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $result = $this->conn->query($query);
        return $result;
    }

    public function getBookDetail($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_buku=" . $id;
        $result = $this->conn->query($query);
        return $result;
    }
}
