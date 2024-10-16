<?php

$conn = mysqli_connect('localhost', 'root', '', 'bitebox') or die('connection failed');

if (isset($_POST['submited'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $menu = $_POST['menu'];
    $qty = $_POST['qty'];

    $tmp_name = $_FILES['foto']['tmp_name'];
    $file_name = $_FILES['foto']['name'];

    $validExtension = ['jpg', 'jpeg', 'png'];
    $fileExtension = explode('.', $file_name);
    $fileExtension = strtolower(end($fileExtension));
    if(!in_array($fileExtension, $validExtension)) {
        echo "
            <script>
                alert('File yang diupload bukan gambar!');
            </script>";
            exit;
        
    } else{
        $newFileName =  date('d-m-y'). '-' . $file_name;
        if(move_uploaded_file($tmp_name,'images/' .$newFileName)) {
        $sql = "INSERT INTO order_data VALUES (null, '$name', '$number', '$address', '$menu', '$qty', '$newFileName')";
        $result = mysqli_query($conn, $sql);

        if($result) {
            echo "
            <script>
                alert('Berhasil menambah data pelanggan');
            </script>" ;
            } else {
            echo "
            <script>
                alert('Gagal menambah data pelanggan!');
            </script>";
            }
        } else {
        echo "
            <script>
                alert('Gagal upload gambar!');
            </script>";
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
    <title>Bite Box</title>
    <!-- Link -->
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <!-- header section starts -->
    <header>
        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>
        <a href="#" class="logo">Bite Box
            <span>.</span>
        </a>
        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#about">about me</a>
            <a href="#menu">menu</a>
            <a href="#contact">order</a>
        </nav>
        
        <div class="mode">
            <img src="../images/moon.png" id="icon">
        </div>
    </header>
    <!-- header section ends -->
    >
    <!-- home section starts  -->
    <section class="home" id="home">
        <div class="contents">
            <h3>Your Box
                <br>
                Bite Box
            </h3>
            <span>The fire is on for your food</span>
            <p>Kami bukan hanya sebuah restoran cepat saji biasa, kami adalah destinasi makanan cepat premium yang
                selalu mengutamakan kualitas bahan dan rasa, memberikan kebahagiaan dalam setiap sajian.</p>
            <a href="#contact"
                class="btn">order now</a>
        </div>
        <div class="images">
            <img src="../images/menu.png" class="header-img" alt="" width="75%">
        </div>
    </section>
    <!-- home section ends -->
    <!-- products section starts -->
    <section class="menu" id="menu">
        <h1 class="heading"> hot
            <span>menu</span>
        </h1>
        <div class="box-container">
            <div class="box">
                <span class="discount">-15%</span>
                <div class="image">
                    <img src="../images/burger.png" alt="" width="95%">
                </div>
                <div class="content">
                    <h3>Burger</h3>
                    <div class="price"> Rp21.250
                        <span> Rp25.000</span>
                    </div>
                </div>
            </div>
            <div class="box">
                <span class="discount">-10%</span>
                <div class="image">
                    <img src="../images/ayam.png" alt="" width="80%">
                </div>
                <div class="content">
                    <h3>Fried Chicken</h3>
                    <div class="price"> Rp16.200
                        <span> Rp18.000</span>
                    </div>
                </div>
            </div>
            <div class="box">
                <span class="discount">-10%</span>
                <div class="image">
                    <img src="../images/kentang.png" alt="" width="80%">
                </div>
                <div class="content">
                    <h3>French Fries</h3>
                    <div class="price"> Rp12.750
                        <span> Rp15.000</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact section starts -->
    <section class="contact" id="contact">
        <h1 class="heading">
            <span> order</span> here
        </h1>
        <div class="row">

            <!-- <form action="../views/data.php" method="post"> -->
            <form action="" method="post" enctype="multipart/form-data">

                <input name="name" type="text" placeholder="nama" class="box" required>
                <input name="number" type="number" placeholder="nomer hp" class="box" required>
                <input name="address" type="text" placeholder="alamat" class="box" required>
                <input name="menu" type="text" placeholder="Pesanan" class="box" required>
                <input name="qty" type="number" min="1" value="1" placeholder="jumlah" class="box" required>
                <input type="file" name="foto" id="foto" accept="images/*" required>
                <input type="submit" value="Send Message" name="submited" class="btn-submit">
                <a href="../views/data.php" class="btn-submit"> Data Order </a>

            </form>
        </div>
        </div>
    </section>
    <!-- contact section ends -->
    <!-- footer section starts -->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Quick Links</h3>
                <a href="#home">home</a>
                <a href="#about">about</a>
                <a href="#menu">menu</a>
                <a href="#contact">order</a>
            </div>
            <div class="box">
                <h3>Location</h3>
                <a href="https://www.google.co.id/maps/@-0.4947968,117.1357696,14z?entry=ttu">Samarinda</a>
                <a
                    href="https://www.google.co.id/maps/place/Balikpapan,+Kota+Balikpapan,+Kalimantan+Timur/@-1.174603,116.841748,11z/data=!3m1!4b1!4m6!3m5!1s0x2df14710964d9c91:0xcaa6ec96c2aea6d2!8m2!3d-1.2379274!4d116.8528526!16zL20vMDJsYjZ4?entry=ttu">Balikpapan</a>
                <a
                    href="https://www.google.co.id/maps/place/Surabaya,+Jawa+Timur/@-7.1282662,112.815134,12.5z/data=!4m6!3m5!1s0x2dd7fbf8381ac47f:0x3027a76e352be40!8m2!3d-7.2574719!4d112.7520883!16zL20vMDFmNHhk?entry=ttu">Surabaya</a>
                <a
                    href="https://www.google.co.id/maps/place/Denpasar,+Kota+Denpasar,+Bali/@-8.6726833,115.2242733,12z/data=!3m1!4b1!4m6!3m5!1s0x2dd2409b0e5e80db:0xe27334e8ccb9374a!8m2!3d-8.6704582!4d115.2126293!16zL20vMDJuYmgx?entry=ttu">Denpasar</a>
            </div>
            
        </div>
        <div class="credit"> Muhammad Alfarizi'
            <span> 2309106105</span>
        </div>
    </section>
    <!-- footer section ends -->
</body>
<script text="javascript" src="../js/javascripts.js"></script>

</html>