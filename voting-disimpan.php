<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Voting Disimpan</title>

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
    height:100vh;
    overflow:hidden;
}

/* NAVBAR */
nav{
    background:#701f31;
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

/* SIDEBAR */
.side-bar{
    background:#701f31;
    width:230px;
    position:fixed;
    top:55px;
    left:0;
    bottom:0;

    display:flex;
    flex-direction:column;
    justify-content:space-between;

    padding:40px 20px 20px;
}

.menu,
.bottom{
    display:flex;
    flex-direction:column;
    gap:20px;
}

.side-btn{
    display:flex;
    justify-content:center;
    align-items:center;

    width:100%;
    height:45px;

    border-radius:30px;
    background:#ebd4c1;

    color:#571c21;
    text-decoration:none;
    font-size:18px;
    font-weight:700;

    transition:0.3s;
}

.side-btn:hover{
    background:#ca757d;
    color:white;
    transform:scale(1.05);
}

.user{
    color:#ebd4c1;
    opacity:0.7;
    text-align:center;
}

/* CONTENT */
.content{
    margin-left:230px;
    margin-top:55px;
    height:100vh;
    padding-top:30px;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    gap:20px;
}

/* POPUP */
.popup{
    width:560px;
    height:280px;

    background:#ebd4c1;
    border-radius:25px;

    position:relative;

    display:flex;
    justify-content:center;
    align-items:center;
}

.toa img{
    position:absolute;
    width:180px;
    height:180px;

    top:-90px;
    left:190px;
}

.pesan{
    text-align:center;
}

.pesan p{
    color:#701f31;
    font-size:25px;
    line-height:1.7;
}

/* BUTTON */
.kembali-btn{
    width:320px;
    height:55px;

    background:#ebd4c1;
    color:#701f31;

    border-radius:30px;
    text-decoration:none;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:18px;
    font-weight:700;

    transition:0.3s;
}

.kembali-btn:hover{
    background:#ca757d;
    color:white;
    transform:scale(1.05);
}
</style>
</head>

<body>

<nav>
    <div class="logo">
        <img src="Logo PilihAja.png" alt="">
    </div>
</nav>

<div class="side-bar">

    <div class="menu">
        <a href="kandidat.php" class="side-btn">Voting</a>
<<<<<<< HEAD:voting-disimpan.php
        <a href="hasil-votting.php" class="side-btn">Hasil Voting</a>
=======
        <a href="hasil-votting.html" class="side-btn">Hasil Voting</a>
>>>>>>> fc3f6c33de6a8a31482d90f9680cb2ef9e3667c9:voting-disimpan.html
    </div>

    <div class="bottom">
        <div class="user">Hi, Voters!</div>
        <a href="index.php" class="side-btn">Log out</a>
    </div>

</div>

<div class="content">

    <div class="popup">

        <div class="toa">
            <img src="toaa.png" alt="">
        </div>

        <div class="pesan">
            <p>Pilihan anda sudah kami simpan!</p>
            <p>Terima kasih sudah berpartisipasi</p>
            <p>dalam pemilihan ini.</p>
        </div>

    </div>

    <a href="index.php" class="kembali-btn">
        Kembali ke Halaman Log in
    </a>

</div>

</body>
</html>