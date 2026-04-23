<?php
$nis = $_POST['nis'];
$kode = $_POST['kode'];


$nis_benar = "12345";
$kode_benar = "abc123";


if ($nis == $nis_benar && $kode == $kode_benar) {
    header("Location: kandidat.php");
    exit();
} else {
    header("Location: error.php");
    exit();
}
?>