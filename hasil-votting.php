<?php

$host     = "localhost";
$dbname   = "rpl-vote";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "
    SELECT 
        o.id,
        o.candidate_name,
        o.photo,
        COUNT(v.id) AS jumlah_suara
    FROM options o
    LEFT JOIN votes v ON v.option_id = o.id
    GROUP BY o.id, o.candidate_name, o.photo
    ORDER BY o.id ASC
";

$result = $conn->query($sql);
$kandidats = [];

while ($row = $result->fetch_assoc()) {
    $kandidats[] = $row;
}

// Hitung total suara
$total_suara = array_sum(array_column($kandidats, 'jumlah_suara'));

$conn->close();
?>
<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Hasil Voting</title>

    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
      rel="stylesheet"
    />

    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
      }

      body {
        background-image: url("background-utama.png");
        background-size: cover;
        background-position: center;
        min-height: 100vh;
      }

      /* NAVBAR */
      nav {
        background: #701f31;
        height: 55px;
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1000;
        box-shadow: 0 0 5px black;
      }

      .logo img {
        width: 200px;
        margin-top: -30px;
        margin-left: -25px;
      }

      /* SIDEBAR */
      .side-bar {
        background: #701f31;
        width: 230px;
        position: fixed;
        top: 55px;
        left: 0;
        bottom: 0;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 40px 20px 20px;
      }

      .menu,
      .bottom {
        display: flex;
        flex-direction: column;
        gap: 20px;
      }

      .side-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 45px;
        border-radius: 30px;
        background: #ebd4c1;
        color: #571c21;
        text-decoration: none;
        font-size: 18px;
        font-weight: 700;
        transition: 0.3s;
      }

      .side-btn:hover {
        background: #ca757d;
        color: white;
        transform: scale(1.05);
      }

      .user {
        color: #ebd4c1;
        text-align: center;
        opacity: 0.7;
      }

      /* CONTENT */
      .content {
        margin-left: 230px;
        padding-top: 90px;
        padding-bottom: 40px;
      }

      .judul h1 {
        color: #ebd4c1;
        text-align: center;
        font-size: 50px;
        margin-bottom: 40px;
      }

      /* CARD */
      .kandidats {
        display: flex;
        justify-content: center;
        gap: 40px;
        flex-wrap: wrap;
      }

      .profil {
        background: #ebd4c1;
        width: 230px;
        height: 340px;
        border-radius: 30px;
        padding: 25px 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1px;
      }

      .profil img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 20px;
      }

      .profil h1 {
        color: #6f120b;
        font-size: 30px;
      }

      .profil h3 {
        color: #6f120b;
        margin-top: -5px;
        margin-bottom: 10px;
      }

      /* SUARA dan PERSENTASE */
      .suara button,
      .persen button {
        width: 120px;
        height: 30px;
        border: none;
        border-radius: 10px;
        background: #723238;
        color: #ebd4c1;
        font-size: 17px;
        font-weight: 600;
        margin-top: 4px;
      }
    </style>
  </head>

  <body>
    <!-- NAVBAR -->
    <nav>
      <div class="logo">
        <img src="Logo PilihAja.png" alt="" />
      </div>
    </nav>

    <!-- SIDEBAR -->
    <div class="side-bar">
      <div class="menu">
        <a href="kandidat.php" class="side-btn">Voting</a>
        <a href="hasil-votting.php" class="side-btn">Hasil Voting</a>
      </div>

      <div class="bottom">
        <div class="user">Hi, Voters!</div>
        <a href="index.php" class="side-btn">Log out</a>
      </div>
    </div>

    <!-- CONTENT -->
    <div class="content">
      <div class="judul">
        <h1>Hasil Voting</h1>
      </div>

      <div class="kandidats">
        <?php foreach ($kandidats as $index => $kandidat): 
            $no        = $index + 1;
            $suara     = $kandidat['jumlah_suara'];
            $persen    = $total_suara > 0 ? round(($suara / $total_suara) * 100) : 0;
            $foto      = $kandidat['photo'] ?? 'default.jpg';
            $nama      = htmlspecialchars($kandidat['candidate_name']);
        ?>
        <!-- KANDIDAT <?= $no ?> -->
        <div class="profil">
          <img src="<?= htmlspecialchars($foto) ?>" alt="<?= $nama ?>" />
          <h1>Kandidat <?= $no ?></h1>
          <h3><?= $nama ?></h3>

          <div class="persen">
            <button><?= $persen ?>%</button>
          </div>
          <div class="suara">
            <button><?= $suara ?> Suara</button>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </body>
</html>