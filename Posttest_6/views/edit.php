<?php
require "../aksi/koneksi.php";
$id = $_GET['id'];

$result =mysqli_query($conn, "SELECT * FROM order_data where id=$id ");

$order_data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $order_data[] = $row;
}

$order_data = $order_data[0];


if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $menu = $_POST['menu'];
    $qty = $_POST['qty'];

    $oldImg = $_POST['oldimg'];

    function updatePenjualan($conn, $id, $name, $number, $address, $menu, $qty, $file_name) {
        // Query UPDATE
        $sql = "UPDATE order_data SET name='$name', number='$number', address='$address', menu='$menu', qty='$qty', foto='$file_name' WHERE id=$id";
    
        // Eksekusi query
        $result = mysqli_query($conn, $sql);
    
        // Pengecekan hasil
        if ($result) {
            // Pesan sukses dan redirect
            echo "
            <script>
                alert('Data berhasil diubah!');
            </script>";
        } else {
            // Pesan gagal dan redirect
            echo "
            <script>
                alert('Data gagal diubah!');
            </script>";
        }
    }
  
    if ($_FILES['foto']['error'] === 4) { // cek apakah ada file yg diupload
        $file_name = $oldImg; // kalo tidak, akan mengambil gambar lama
        updatePenjualan($conn, $id, $name, $number, $address, $menu, $qty, $file_name);
    } else {
        $tmp_name = $_FILES['foto']['tmp_name']; // mengambil path temporary file
        $file_name = $_FILES['foto']['name']; // mengambil nama file
  
        // cek apakah yang diupload adalah file gambar
        $validExtensions = ['png', 'jpg', 'jpeg'];
        $fileExtension = explode('.', $file_name);
        $fileExtension = strtolower(end($fileExtension));
        if (!in_array($fileExtension, $validExtensions)) {
          echo "
                  <script>
                      alert('Tolong upload file gambar!');
                  </script>";
        } else {
          $newFileName = date('d-m-Y') . '-' . $file_name;
          move_uploaded_file($tmp_name, 'images/' . $newFileName);
          unlink('images/'.$oldImg); // menghapus gambar lama dari folder images
          updatePenjualan($conn, $id, $name, $number, $address, $menu, $qty, $newFileName);
        }
    }
}

?>

<!-- HTML -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BITE BOX</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>

    <section class="contact" id="contact">
        <h1 class="heading">
            <span> Edit </span> order
        </h1>
        <div class="row">

            <!-- <form action="../views/data.php" method="post"> -->
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="oldimg" value="<?= $order_data['foto'] ?>">
                <input name="name" type="text" placeholder="name" class="box" value="<?php echo $order_data['name'] ?>" required>
                <input name="number" type="number" placeholder="nomer hp" class="box" value="<?php echo $order_data['number'] ?>" required>
                <input name="address" type="text" placeholder="alamat" class="box" value="<?php echo $order_data['address'] ?>" required>
                <input name="menu" type="text" placeholder="Pesanan" class="box" value="<?php echo $order_data['menu'] ?>" required>
                <input name="qty" type="number" min="1" placeholder="jumlah" class="box" value="<?php echo $order_data['qty'] ?>" required>
                <input type="file" name="foto" id="foto"> <br>
                <img src="images/<?= $order_data['foto'] ?>" alt="<?= $order_data['foto'] ?>" width="80px" height="100px">
                <input type="submit" value="Edit Data" name="edit" class="btn-submit">
            </form>
        </div>
        </div>
    </section>
    
</body>
</html>
