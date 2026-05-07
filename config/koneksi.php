<?php  

  date_default_timezone_set('Asia/Jakarta');

  // DEVELOPMENT - LOCAL DB
  $host = "172.20.11.49";
  $username = "appuser";
  $password = "password_";
  $database = "dev_gudang_logistik_06";

  

  $koneksi = mysqli_connect($host, $username, $password, $database);
  $conn_trans = new mysqli($host, $username, $password,$database);

  if (!$koneksi) {
    echo "Koneksi gagal " . mysqli_connect_error();
  }
    
  if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }



?>