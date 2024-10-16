<?php
require "../aksi/koneksi.php";
$id = $_GET['id'];


$result = mysqli_query($conn,"DELETE FROM order_data WHERE id = '$id'");

if ($result) {
    echo "
    <script>
        alert('Data berhasil Hapus!');
        document.location.href = 'data.php'
    </script>";
} else {
    echo "
    <script>
        alert('Data Gagal Hapus!');
        document.location.href = 'data.php'
    </script>";
}
