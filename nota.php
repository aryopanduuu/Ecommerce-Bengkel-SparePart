<?php

include("./pages/function.php");

session_start()


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
        <h1>Zee Auto Part</h1>
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
          <!-- <li class="nav-item">
            <a href="#about" class="nav-link">About</a>
          </li> -->
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

  //  $no_nota = $ambil_data['no_nota_suku_cadang'];
  $cek = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE No_Nota_Suku_Cadang = '" . $_GET['id'] . "'");

  ?>
  <div class="container-md cart">
    <table>
      <td>
        <div class="cart-info">

          <div>
            <p>Nota</p>

          </div>
      </td>
      <tr>
        <th>No Nota</th>
        <th></th>
        <th></th>
        <th></th>

        <th><?= $ambil_data['no_nota_suku_cadang'] ?></th>
      </tr>
      <tr>
        <th>Pembeli</th>
        <th></th>
        <th></th>
        <th></th>

        <th><?= $ambil_data['nama_pemilik'] ?></th>
      </tr>
      <tr>
        <th>Email</th>
        <th></th>
        <th></th>
        <th></th>
        <th><?= $ambil_data['email'] ?></th>
      </tr>
      <tr>
        <th>Status</th>
        <th></th>
        <th></th>
        <th></th>

        <th><?php
            if (mysqli_num_rows($cek) < 1) {
              echo 'BELUM BAYAR';
            } else {
              echo 'SUDAH BAYAR';
            } ?></th>
      </tr>
      <tr>
        <th>ID</th>
        <th>Barang</th>
        <th>Harga</th>
        <th>Jumlah</th>

        <th>Subtotal</th>
      </tr>

      <?php
      $nsc = mysqli_query($koneksi, "SELECT sc.ID_Suku_Cadang, sc.Nama_Suku_cadang, 
                                               sc.Harga_Satuan, dn.Banyak FROM suku_cadang sc, detail_nota_suku_cadang dn
                                        WHERE sc.ID_suku_Cadang = dn.ID_Suku_Cadang AND
                                        No_Nota_suku_Cadang = '" . $_GET['id'] . "' ");

      $total = 0;
      foreach ($nsc as $data) :
        $subtotal = $data['Harga_Satuan'] * $data['Banyak'];
      ?>
        <tr>
          <td>
            <div class="cart-info">

              <div>
                <p><?php echo $data['ID_Suku_Cadang']; ?></p>

                <br />
              </div>
          </td>
          <td>
            <div>
              <p><?php echo $data['Nama_Suku_cadang']; ?></p>

              <br />
            </div>

          </td>
          <td>
            <div>
              <p><?php echo number_format($data['Harga_Satuan']); ?></p>

              <br />
            </div>
          </td>
          <td>
            <div>
              <p><?php echo  $data['Banyak']; ?></p>

              <br />
            </div>
          </td>
          <td>
            <div>
              <p><?php echo number_format($subtotal); ?></p>

              <br />
            </div>
          </td>

        </tr>

      <?php
        $total += $subtotal;
      endforeach
      ?>
    </table>

    <div class="total-price">
      <table>

        <tr>
          <td>Total</td>
          <td><?php echo number_format($total) ?>; </td>
        </tr>

      </table>
      <?php
      $id = $_GET['id'];
      ?>
      <?php
      if (mysqli_num_rows($cek) < 1) {
      ?>
        <a class="checkout btn" href="pembayaran.php?id=<?php echo $id; ?>">Bayar</a>
      <?php
      }
      ?>
    </div>

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