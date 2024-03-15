<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch data by ID
    $query = "SELECT * FROM peminjaman WHERE id = $id";
    $result = $dbconnect->query($query);

    if ($result->num_rows == 1) {
        // Delete data by ID
        $delete_query = "DELETE FROM peminjaman WHERE id = $id";

        if ($dbconnect->query($delete_query) === TRUE) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error deleting record: " . $dbconnect->error;
        }
    } else {
        echo "Data tidak ditemukan";
        exit();
    }
}
?>