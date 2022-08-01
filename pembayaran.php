<?php

include('./pages/function.php');
function getTotal($order_id)
{
  include('./pages/function.php');
  $detail = mysqli_query($koneksi, "SELECT * FROM detail_nota_suku_cadang a
                                        INNER JOIN suku_cadang b ON a.ID_Suku_Cadang = b.ID_Suku_Cadang
                                        WHERE a.No_Nota_Suku_Cadang = '$order_id'");


  $total = 0;
  while ($d = mysqli_fetch_array($detail)) {
    $total += ($d['Harga_Satuan'] * $d['Banyak']);
  }

  return $total;
}
$nsc = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM nota_suku_cadang WHERE No_Nota_Suku_Cadang = '" . $_GET['id'] . "'"));

// $query                  =  "SELECT No_Nota_Suku_Cadang FROM detail_nota_suku_cadang
//                             ORDER BY No_Nota_Suku_Cadang DESC LIMIT 1";
// $execute                =  mysqli_query($koneksi, $query);
// $row_nsc                =  mysqli_fetch_assoc($execute);
// $id_nsc                 =  $row_nsc['No_Nota_Suku_Cadang'];

$id_byr                 = '1';
$query1                 =  "INSERT INTO pembayaran (id_pembayaran)
                                        VALUES ('$id_byr')";
$execute1               =  mysqli_query($koneksi, $query1);
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">

  <!-- Box icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />

  <!-- Custom StyleSheet -->
  <link rel="stylesheet" href="./css/styles.css" />
  <title>Keranjang</title>
</head>

<body>
  <!-- Navigation -->
  <nav class="nav">
    <div class="navigation container">
      <div class="logo">
        <h1>Codevo</h1>
      </div>

      <div class="menu">
        <div class="top-nav">
          <div class="logo">
            <h1>Codevo</h1>
          </div>
          <div class="close">
            <i class="bx bx-x"></i>
          </div>
        </div>

        <ul class="nav-list">
          <li class="nav-item">
            <a href="./pages/Landingpage.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="product.php" class="nav-link">Products</a>
          </li>
          <li class="nav-item">
            <a href="#about" class="nav-link">About</a>
          </li>
          <li class="nav-item">
            <a href="histori.php" class="nav-link">Histori</a>
          </li>
          <li class="nav-item">
            <a href="#contact" class="nav-link">Account</a>
          </li>
          <li class="nav-item">
            <a href="cart.html" class="nav-link icon"><i class="bx bx-shopping-bag"></i></a>
          </li>
        </ul>
      </div>

      <a href="cart.html" class="cart-icon">
        <i class="bx bx-shopping-bag"></i>
      </a>

      <div class="hamburger">
        <i class="bx bx-menu"></i>
      </div>
    </div>
  </nav>

  <!-- Cart Items -->

  <?php
  include("./pages/function.php");

  $pembelian = mysqli_query($koneksi, "SELECT * FROM pembelian WHERE no_nota_suku_cadang ='" . $_GET['id'] . "' ");
  $ambil_data = $pembelian->fetch_assoc();


  $cek = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE No_Nota_Suku_Cadang = '" . $_GET['id'] . "'");

  ?>
  <div class="container-md cart">
    <table>
      <td>
        <div class="cart-info">

          <div>
            <p>Pembayaran</p>

          </div>
      </td>
      <tr>
        <th>No Nota</th>
        <th></th>
        <th></th>
        <th></th>

        <th><?= $nsc['No_Nota_Suku_Cadang'] ?></th>
      </tr>
      <tr>
        <th>Total</th>
        <th></th>
        <th></th>
        <th></th>

        <th><?= getTotal($nsc['No_Nota_Suku_Cadang']) ?></th>
      </tr>
      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>

        <th></th>
      </tr>
      <tr>

        <th></th>
        <th></th>
        <th></th>
        <th></th>

        <th></th>
      </tr>

    </table>

    <table>

      <div class="container-fluid py-1 px-5">
        <div class="row col-md-6">
          <form method="post" enctype="multipart/form-data">
            <div class="form-group  mb-0">
              <label for="exampleInputPassword1">Bukti Bayar</label>
              <input type="file" name="gambar" class="form-control">
            </div>

            <button type="submit" name="bayar" class="btn bg-gradient-info  mt-4 mb-2">Konfirmasi</button>
          </form>
        </div>
      </div>
      <?php
      if (isset($_POST['bayar'])) {



        $o = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM nota_suku_cadang WHERE No_Nota_Suku_Cadang = '" . $_GET['id'] . "'"));

        $query                  =  "SELECT No_Nota_Suku_Cadang FROM detail_nota_suku_cadang
                              ORDER BY No_Nota_Suku_Cadang DESC LIMIT 1";
        $execute                =  mysqli_query($koneksi, $query);
        $row_nsc                =  mysqli_fetch_assoc($execute);
        $id_nsc                 =  $row_nsc['No_Nota_Suku_Cadang'];
        $nsc1                   = $id_nsc;

        $total1          = getTotal($o['No_Nota_Suku_Cadang']);


        $gambar         = $_FILES['gambar']['name'];
        $lokasi         = $_FILES['gambar']['tmp_name'];

        date_default_timezone_set("Asia/jakarta");
        $tanggal        = date("Y-m-d");

        move_uploaded_file($lokasi, 'images/Bukti/' . $gambar);




        $pembayaran = mysqli_query($koneksi, "INSERT INTO pembayaran (No_Nota_Suku_Cadang, tgl_pembayaran, total_harga, bukti_pembayaran) 
                                          VALUES ('$nsc1','$tanggal','$total1','$gambar' )");


        echo "<script>location='histori.php';</script>";
      }
      ?>
    </table>

  </div>


  <!-- Footer -->
  <footer id="footer" class="section footer">
    <div class="container">
      <div class="footer-container">
        <div class="footer-center">
          <h3>EXTRAS</h3>
          <a href="#">Brands</a>
          <a href="#">Gift Certificates</a>
          <a href="#">Affiliate</a>
          <a href="#">Specials</a>
          <a href="#">Site Map</a>
        </div>
        <div class="footer-center">
          <h3>INFORMATION</h3>
          <a href="#">About Us</a>
          <a href="#">Privacy Policy</a>
          <a href="#">Terms & Conditions</a>
          <a href="#">Contact Us</a>
          <a href="#">Site Map</a>
        </div>
        <div class="footer-center">
          <h3>MY ACCOUNT</h3>
          <a href="#">My Account</a>
          <a href="#">Order History</a>
          <a href="#">Wish List</a>
          <a href="#">Newsletter</a>
          <a href="#">Returns</a>
        </div>
        <div class="footer-center">
          <h3>CONTACT US</h3>
          <div>
            <span>
              <i class="fas fa-map-marker-alt"></i>
            </span>
            42 Dream House, Dreammy street, 7131 Dreamville, USA
          </div>
          <div>
            <span>
              <i class="far fa-envelope"></i>
            </span>
            company@gmail.com
          </div>
          <div>
            <span>
              <i class="fas fa-phone"></i>
            </span>
            456-456-4512
          </div>
          <div>
            <span>
              <i class="far fa-paper-plane"></i>
            </span>
            Dream City, USA
          </div>
        </div>
      </div>
    </div>
    </div>
  </footer>
  <!-- End Footer -->

  <!-- GSAP -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
  <!-- Custom Script -->
  <script src="./js/index.js"></script>
</body>

</html>