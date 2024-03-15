<?php
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
 
    $query = "SELECT * FROM user WHERE id = $id";
    $result = mysqli_query($dbconnect, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result); 
        $username = $row['username'];
        $password = $row['password'];
        $role = $row['role'];
        $token = $row['token'];
    } else {
        echo "Data tidak ditemukan";
        exit();
    }
} else {
    echo "Invalid request";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pengguna</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 50px;
        } 
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4">Edit Data Pengguna</h2>
        <form method="post" action="update.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" value="<?php echo $password; ?>" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role:</label>
                <input type="text" class="form-control" name="role" value="<?php echo $role; ?>" required>
            </div>
            <div class="mb-3">
                <label for="token" class="form-label">Token:</label>
                <input type="text" class="form-control" name="token" value="<?php echo $token; ?>" required>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-outline-info" value="Update">
            </div>
        </form> 
        <a href="user.php" class="btn btn-outline-secondary">Kembali ke User</a>
    </div>

    <!-- Optional: Add Bootstrap JS and Popper.js scripts if needed -->
    <!-- <script src="path/to/popper.js"></script>
         <script src="path/to/bootstrap.js"></script> -->
</body>
</html>