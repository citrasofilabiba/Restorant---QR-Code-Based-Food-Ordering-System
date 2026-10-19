<?php
session_start();
include 'koneksi.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $query = "INSERT INTO admin (Username, Password) VALUES ('$username', '$password')";

    if ($koneksi->query($query)) {
        $success = "Registrasi berhasil! Silakan login.";
        header("Location: login.php");
        exit();
    } else {
        $error = "Username sudah digunakan.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            background: linear-gradient(to right, #f093fb, #f5576c);
            color: #333;
        }

        .register-container {
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .register-container h2 {
            margin-bottom: 1.5rem;
            color: #444;
        }

        .register-container form {
            display: flex;
            flex-direction: column;
        }

        .register-container label {
            text-align: left;
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .register-container input {
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .register-container button {
            padding: 0.8rem;
            background: #f093fb;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s;
        }

        .register-container button:hover {
            background: #f5576c;
        }

        .register-container a {
            color: #f093fb;
            text-decoration: none;
        }

        .register-container a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: red;
            margin-bottom: 1rem;
        }

        .success-message {
            color: green;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Halaman Register</h2>

        <?php if ($error): ?>
            <p class="error-message"><?= $error; ?></p>
        <?php endif; ?>
        <?php if ($success): ?>
            <p class="success-message"><?= $success; ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Register</button>
        </form>

        <p>Sudah punya akun? <a href="login.php">Login di sini</a>.</p>
    </div>
</body>
</html>
