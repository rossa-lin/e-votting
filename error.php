<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>

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
        }


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

        .content{
            padding-top:80px;
        }

        .teks-eror{
            text-align:center;
            color:#E4CBBA;
            font-size:35px;
        }

        .eror{
            display:flex;
            justify-content:center;
            margin-top:15px;
        }

        .eror img{
            width:350px;
            height:auto;
        }

        .teks{
            text-align:center;
            color:#E4CBBA;
            font-size:25px;
            margin-top:10px;
        }

        .button{
            display:flex;
            justify-content:center;
            margin-top:25px;
        }

        .btn-coba{
            text-decoration:none;
            background:#E4CBBA;
            color:#49232B;
            padding:10px 35px;
            border-radius:20px;
            font-weight:bold;
            transition:0.3s;
        }

        .btn-coba:hover{
            background:#CA757D;
            color:#E4CBBA;
            transform:scale(1.05);
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

    <!-- CONTENT -->

    <div class="content">

        <div class="teks-eror">
            <h2>Error!</h2>
        </div>

        <div class="eror">
            <img src="error.png" alt="">
        </div>

        <div class="teks">
            <p>
                <b>
                    NIS atau Kode Anda Salah.
                    <br>
                    Silahkan Coba Lagi!
                </b>
            </p>
        </div>

        <div class="button">
            <a href="index.php" class="btn-coba">Coba Lagi</a>
        </div>

    </div>

</body>
</html>