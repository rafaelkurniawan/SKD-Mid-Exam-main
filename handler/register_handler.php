<?php
require_once('../db/index.php');

session_start();

if (isset($_POST['name'], $_POST["username"], $_POST["email"], $_POST["password"], $_POST["c_password"], $_POST['alamat'], $_POST['enc_method'])) {
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST["password"];
  $c_password = $_POST["c_password"];
  $alamat = $_POST['alamat'];
  $enc_method = $_POST['enc_method'];

  if ($password !== $c_password) {
    $_SESSION['error'] = "Password tidak sama!";
    header("Location: ../register1.php");
    exit();
  }

  if ($username == trim($username) && str_contains($username, ' ')) {
    $_SESSION['error'] = "Username tidak boleh menggunakan spasi!";
    header("Location: ../register1.php");
    exit();
  }

  $pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
  if (!preg_match($pattern, $password)) {
    $_SESSION['error'] = "Password kurang kuat";
    header("Location: ../register1.php");
    exit();
  }

  $name = $conn->escape_string($name);
  $username = $conn->escape_string($username);
  $email = $conn->escape_string($email);
  $alamat = $conn->escape_string($alamat);
  $token = bin2hex(random_bytes(36));

  $password_hash;
  if ($enc_method == 'md5') {
    $password_hash = md5($password);
  } else if ($enc_method == 'sha1') {
    $password_hash = sha1($password);
  } else if ($enc_method == 'sha256') {
    $password_hash = hash('sha256', $password);
  }

  $sql = "INSERT INTO user (nama, username, password, email, status, role, token, alamat) VALUES ('$name', '$username', '$password_hash', '$email', 0 , 'user', '$token', '$alamat')";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    $_SESSION['sucess'] = "Registrasi berhasil, harap login";
    header("Location: ../login1.php");
  } else {
    $_SESSION['error'] = "Registrasi gagal";
    header("Location: ../register1.php");
  }
} else {
  $_SESSION["error"] = "Username or password is not set";
  header("Location: ../register1.php");
}
