<?php
require "../aksi/koneksi.php";

$result = mysqli_query($conn, "SELECT * FROM order_data");
$order_data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $order_data[] = $row;
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

        <div class="mode">
            <img src="../images/moon.png" id="icon">
        </div>
    </header>
    <!-- header section ends -->
    >

    <br><br><br><br><br><br>
    <!-- contact section starts -->
    <section class="contact">
        <h1 class="heading">
            <span> Your Order Data</span> here
        </h1>
        <div class="row">
            <form>
                <table style="width: 100%; " align="center" cellpadding="10">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Nomer Hp</th>
                            <th>Alamat</th>
                            <th>Pesanan</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    <?php $i = 1;
                    foreach ($order_data as $od) : ?>   
                        <tr align="center">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $od['name']; ?></td>
                            <td><?php echo $od['number']; ?></td>
                            <td><?php echo $od['address']; ?></td>
                            <td><?php echo $od['menu']; ?></td>
                            <td><?php echo $od['qty']; ?></td>
                            <td>
                                    <a href="edit.php?id=<?php echo $od["id"] ?>" class="btn-form"> update </a>
                                    <a href="hapus.php?id=<?php echo $od["id"] ?>" class="btn-form"> delete </a>

                            </td>
                           
                        </tr>
                    <?php $i++;
                    endforeach;
                    ?>
                </table>

                <br>
                <a href="../views/index.php" class="btn-submit">Back</a>
            </form>

            <br>
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
                <a href="#contact">contact</a>
            </div>
            <div class="box">
                <h3>Location</h3>
                <a href="https://www.google.co.id/maps/@-0.4947968,117.1357696,14z?entry=ttu">Samarinda</a>
                <a href="https://www.google.co.id/maps/place/Balikpapan,+Kota+Balikpapan,+Kalimantan+Timur/@-1.174603,116.841748,11z/data=!3m1!4b1!4m6!3m5!1s0x2df14710964d9c91:0xcaa6ec96c2aea6d2!8m2!3d-1.2379274!4d116.8528526!16zL20vMDJsYjZ4?entry=ttu">Balikpapan</a>
                <a href="https://www.google.co.id/maps/place/Surabaya,+Jawa+Timur/@-7.1282662,112.815134,12.5z/data=!4m6!3m5!1s0x2dd7fbf8381ac47f:0x3027a76e352be40!8m2!3d-7.2574719!4d112.7520883!16zL20vMDFmNHhk?entry=ttu">Surabaya</a>
                <a href="https://www.google.co.id/maps/place/Denpasar,+Kota+Denpasar,+Bali/@-8.6726833,115.2242733,12z/data=!3m1!4b1!4m6!3m5!1s0x2dd2409b0e5e80db:0xe27334e8ccb9374a!8m2!3d-8.6704582!4d115.2126293!16zL20vMDJuYmgx?entry=ttu">Denpasar</a>
            </div>
            
        </div>
        <div class="credit"> Muhammad Alfarizi
            <span> 2309106105</span>
        </div>
    </section>
    <!-- footer section ends -->
</body>
    <script>
        
var icon = document.getElementById("icon");

icon.onclick = function(){
    document.body.classList.toggle("dark-theme");
    if(document.body.classList.contains("dark-theme")){
        icon.src="../images/moon.png";
    } else{
       icon.src = "../images/sun.png";
    } 
}
    </script>
</html>
