<?php
session_start();
include 'koneksi.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM admin WHERE Username = '$username'";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        if (password_verify($password, $data['Password'])) {
            $_SESSION['admin'] = $data['Username'];
            header("Location: tambah_menu.php");
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            color: #333;
        }

        .login-container {
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .login-container h2 {
            margin-bottom: 1.5rem;
            color: #444;
        }

        .login-container form {
            display: flex;
            flex-direction: column;
        }

        .login-container label {
            text-align: left;
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .login-container input {
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .login-container button {
            padding: 0.8rem;
            background: #4facfe;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s;
        }

        .login-container button:hover {
            background: #009ff2;
        }

        .login-container a {
            color: #4facfe;
            text-decoration: none;
        }

        .login-container a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: red;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Halaman Login</h2>

        <?php if ($error): ?>
            <p class="error-message"><?= $error; ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <p>Belum punya akun? <a href="register.php">Register di sini</a>.</p>
    </div>
</body>
</html>
