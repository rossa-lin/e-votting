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
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login E-Voting</title>

    <link rel="stylesheet" href="https://cdn.hugeicons.com/font/hgi-stroke-rounded.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:"Poppins",sans-serif;
        }

        body{
            background-image:url("background-utama.png");
            background-size:cover;
            background-position:center;
            min-height:100vh;
            color:#E4CBBA;
            overflow:hidden;
        }

        /* NAVBAR */

        nav{
            background:#701F31;
            height:55px;
            width:100%;
            position:fixed;
            top:0;
            left:0;
            z-index:1000;
            box-shadow:0 0 5px black;
        }

        .logo img{
            width:200px;
            margin-top:-30px;
            margin-left:-25px;
        }

        /* CONTENT */

        .teks-judul{
            min-height:100vh;
            padding-top:55px;
            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction:column;
        }

        .title{
            text-align:center;
            margin-bottom:15px;
        }

        .title h1{
            font-size:40px;
        }

        .title p{
            font-size:18px;
        }

        .container{
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .card{
            background:#EBD4C1;
            width:420px;
            padding:40px;
            border-radius:30px;
            box-shadow:0 10px 30px rgba(0,0,0,0.2);
        }

        .teks{
            color:#482119;
            margin-bottom:25px;
        }

        .teks p{
            margin-bottom:10px;
            font-weight:500;
        }

        .input-box{
            width:100%;
            height:50px;
            border:1px solid #5B2D2D;
            border-radius:20px;
            display:flex;
            align-items:center;
            gap:15px;
            padding:0 20px;
        }

        .input-box i{
            color:#7A120D;
            font-size:20px;
        }

        .input-box input{
            width:100%;
            border:none;
            outline:none;
            background:transparent;
            font-size:15px;
            color:#5B2D2D;
        }

        .input-box input::placeholder{
            color:#B3877D;
        }

        .login-btn{
            display:block;
            margin:auto;
            background:#723238;
            color:white;
            border:none;
            border-radius:30px;
            padding:10px 35px;
            font-size:16px;
            font-weight:bold;
            cursor:pointer;
            transition:0.3s;
        }

        .login-btn:hover{
            background:#CA757D;
            transform:scale(1.05);
        }

        .peringatan-box{
            background:#F8D7DA;
            color:#721C24;
            border:1px solid #F5C6CB;
            border-radius:10px;
            padding:10px;
            margin-bottom:20px;
            text-align:center;
            font-size:13px;
            font-weight:600;
        }

        .girl{
            position:fixed;
            right:80px;
            bottom:0;
            width:390px;
        }

    </style>
</head>

<body>

    <!-- NAVBAR -->

    <nav>
        <div class="logo">
            <img src="Logo PilihAja.png" alt="">
        </div>
    </nav>

    <!-- GAMBAR -->

    <img src="Animasi Perempuan.png" alt="" class="girl">

    <!-- CONTENT -->

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

                    <button type="submit" class="login-btn">
                        Login
                    </button>

                </form>

            </div>

        </div>

    </div>

</body>
</html>