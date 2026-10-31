
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "koneksi.php";

echo "PHP berhasil dijalankan!";
?>

<?php
require_once "koneksi.php";

// Mengambil data username
$query = mysqli_query($conn, "SELECT username FROM tabungan");

if (!$query) {
    die("Gagal mengambil data: " . mysqli_error($conn));
}

$total = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tabungan Biru</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #eef5ff;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            width: 100%;
            max-width: 450px;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
        }

        h1 {
            color: #1769cc;
            margin-bottom: 10px;
        }

        p {
            color: #64748b;
            margin-bottom: 20px;
        }

        .status {
            background: #dcfce7;
            color: #166534;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .data {
            background: #f1f5f9;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .data strong {
            color: #1769cc;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Tabungan Biru</h1>

    <p>Selamat datang di sistem tabungan Kamu.</p>

    <div class="status">
        ✓ Database berhasil terhubung!
    </div>

    <div class="data">
        Nama Database:
        <strong>tabunganbiru</strong>
    </div>

    <div class="data">
        Total Pengguna:
        <strong><?php echo $total; ?></strong>
    </div>

    <h3>Daftar Pengguna</h3>

    <?php while ($row = mysqli_fetch_assoc($query)) : ?>

        <div class="data">
            <?php echo htmlspecialchars($row['username']); ?>
        </div>

    <?php endwhile; ?>

</div>

</body>
</html>
