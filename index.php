<?php
session_start();
include 'config.php';

$peringatan = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $query = "SELECT * FROM users WHERE username='".$_POST['nis']."' AND plain_code='".$_POST['kode']."'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $user_id = $user['id'];

        // Cek apakah user sudah pernah vote
        $cek = $conn->query("SELECT id FROM votes WHERE user_id = $user_id LIMIT 1");
        if ($cek->num_rows > 0) {
            $peringatan = "Anda sudah pernah voting, login hanya dilakukan 1 kali!";
        } else {
            $_SESSION['user_id'] = $user_id;
            header("location:kandidat.php");
            exit();
        }
    } else {
        header("location:error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login E-Voting</title>
    <link rel="stylesheet" href="https://cdn.hugeicons.com/font/hgi-stroke-rounded.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
    .navbar {
        width: auto;
        height: 65px;
        background: #701F31;
        display: flex;
        align-items: center;
        padding: 0 20px;
        border-bottom: 3px solid rgba(0, 0, 0, 0.15);
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
    }
    .logo img {
        width: 165px;
        height: auto;
        object-fit: contain;
        display: block;
    }
    .teks-judul {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .title {
        text-align: center;
        margin-bottom: 10px;
    }
    * {
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family: 'Poppins', sans-serif;
    }
    body {
        background-image: url(background-utama.png);
        color: #E4CBBA;
    }
    .teks {
        font-size: 16px;
        text-align:start;
        color: #482119;
        width: 100%;
        margin-bottom: 30px;
    }
    .container {
        display:flex;
        align-items:center;
        justify-content:center;
        gap:80px;
        margin-top:60px;
    }
    .card {
        background:#e8d0bf;
        padding:40px;
        border-radius:25px;
        width:416px;
        box-shadow:0 10px 30px rgba(0,0,0,0.2);
    }
    .login-btn {
        display: block;
        margin:auto;
        background: #723238;
        color: white;
        border: none;
        border-radius: 30px;
        padding: 10px 26px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }
    .login-btn:hover {
        background: #CA757D;
        transform: scale(1.05);
    }
    .input-box {
        width: 100%;
        height: 51px;
        border: 1px solid #5b2d2d;
        border-radius: 20px;
        display: flex;
        align-items: center;
        padding: 0 25px;
        gap: 20px;
        margin-top:10px;
        margin-bottom: 30px;
    }
    .input-box i {
        color: #7a120d;
    }
    .input-box input {
        border: none;
        outline: none;
        background: transparent;
        font-size: 16px;
        color: #b3877d;
        width: 100%;
    }
    .input-box input::placeholder {
        color: #b3877d;
    }
    .girl {
        position: absolute;
        right: 80px;
        bottom: 0;
        width: 390px;
    }
    .peringatan-box {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        border-radius: 10px;
        padding: 10px 15px;
        margin-bottom: 15px;
        font-size: 13px;
        text-align: center;
        font-weight: 600;
    }
    </style>
</head>

<body>
<nav class="navbar">
    <div class="logo">
        <img src="Logo PilihAja.png" alt="">
    </div>
</nav>

<img src="Animasi Perempuan.png" alt="" class="girl">

<div class="teks-judul">
    <div class="title">
        <h1>E-Voting Ketua Kelas</h1>
        <p>XI RPL 2 SMKN 1 Kandeman</p>
    </div>

    <div class="container">
        <div class="card">
            <form action="" method="POST">

                <?php if ($peringatan): ?>
                <div class="peringatan-box">
                    ⚠️ <?= $peringatan ?>
                </div>
                <?php endif; ?>

                <div class="teks">
                    <p>Masukkan NIS Anda</p>
                    <div class="input-box">
                        <i class="hgi hgi-stroke hgi-user"></i>
                        <input type="text" name="nis" placeholder="NIS" required>
                    </div>
                </div>

                <div class="teks">
                    <p>Masukkan Kode Anda</p>
                    <div class="input-box">
                        <i class="hgi hgi-stroke hgi-square-lock-02"></i>
                        <input type="text" name="kode" placeholder="Kode" required>
                    </div>
                </div>

                <button type="submit" class="login-btn">Login</button>

            </form>
        </div>
    </div>
</div>

</body>
</html>