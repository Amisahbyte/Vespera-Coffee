<?php
// ===============================
// VESPERA COFFEE - CONTACT FORM PHP
// Simpan file ini sebagai: contact.php
// ===============================

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $phone = htmlspecialchars($_POST['phone'] ?? '');

    // Validasi sederhana
    if (!empty($name) && !empty($email) && !empty($phone)) {
        // Simpan ke file txt (simple backend)
        $data = "Nama: $name | Email: $email | Phone: $phone" . PHP_EOL;
        file_put_contents('contact_data.txt', $data, FILE_APPEND);

        $message = "Pesan berhasil dikirim ✔";
    } else {
        $message = "Semua field wajib diisi ✖";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contact Vespera Coffee</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #c5a059;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .form-box {
            width: 400px;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        h2 { text-align: center; }
        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        button {
            width: 100%;
            padding: 12px;
            border: none;
            background: #13131a;
            color: white;
            border-radius: 8px;
            cursor: pointer;
        }
        .msg {
            text-align: center;
            margin-bottom: 15px;
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="form-box">
    <h2>Get in Touch</h2>

    <?php if ($message): ?>
        <div class="msg"><?php echo $message; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="phone" placeholder="Phone" required>
        <button type="submit">Contact Now</button>
    </form>
</div>

</body>
</html>
