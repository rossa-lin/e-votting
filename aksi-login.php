<?php
//echo $_POST['input_email'];
//echo $_POST['input_password'];
include "./config.php"; /*menghubungkan ke DB*/
$query = "SELECT * FROM users WHERE email='".$_POST['input_email']."'"; /*mengambil data dari DB*/
//cek email dan password
//email: admin@gmail.id
//password: admin123
$result = $conn->query($query);


echo "jumlah data: ";
echo $result->num_rows;
echo "<br /> <br />";




$row = $result->fetch_assoc();

if ($result->num_rows == 0) {
  // jika num_rows = 0 berarti tidak ada data yang ditemukan dari database 
  // echo "Akun tidak ditemukan";
  header("location:index.php");
  exit(); // langsung akhiri eksekusi tanpa harus lanjut ke bawah
} else {
  if ($_POST['nis'] == $row['nis']) {
    // echo "Anda berhasil login";
    header("location:halaman-login.html");
  } else {
    // echo "Password anda salah";
    header("location:error.html");
  }
}


if ($result->num_rows == 0) {
  echo "Akun tidak ditemukan";
  exit(); 
} else {
  if ($_POST['nis'] == $row['nis']) {
    echo "Anda berhasil login";
  } else {
    echo "NIS anda salah";
  }
}