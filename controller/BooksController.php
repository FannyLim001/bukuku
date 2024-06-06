<?php
require_once __DIR__ . '/../config/koneksi.php';
require_once __DIR__ . '/../model/Books.php';

class BooksController
{
    private $booksModel;

    public function __construct()
    {
        $database = new Database();
        $db = $database->getConnection();
        $this->booksModel = new BookModel($db);
    }

    public function displayBooks()
    {
        $result = $this->booksModel->getBooks();
        $books = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $books[] = $row;
            }
        }
        return $books; // Return the books data
    }

    public function displayBookDetail($bookId)
    {
        // Call the method from BookModel to get book detail by ID
        $bookDetail = $this->booksModel->getBookDetail($bookId);

        // Fetch the first (and only) row as an object
        $bookData = $bookDetail->fetch_object();

        // Return the book data
        return $bookData;
    }
}
