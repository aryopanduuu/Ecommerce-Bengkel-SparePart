<?php
session_start();
// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['role'] == "") {
  header("location:sign-in.php");
}
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
  <title>Zee Auto Part</title>
</head>

<body>
  <!-- Header -->
  <header id="home" class="header">
    <!-- Navigation -->
    <nav class="nav">
      <div class="navigation container">
        <div class="logo">
          <h1>Zee Auto Part</h1>
        </div>

        <div class="menu">
          <div class="top-nav">
            <div class="logo">
              <h1>Zee Auto Part</h1>
            </div>
            <div class="close">
              <i class="bx bx-x"></i>
            </div>
          </div>

          <ul class="nav-list">
            <li class="nav-item">
              <a href="#home" class="nav-link scroll-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="product.php" class="nav-link">Products</a>
            </li>
            <li class="nav-item">
              <a href="#about" class="nav-link scroll-link">About</a>
            </li>
            <li class="nav-item">
              <a href="histori.php" class="nav-link scroll-link">Histori</a>
            </li>
            <li class="nav-item">
              <a href="#account" class="nav-link scroll-link">Account</a>
            </li>
            <li class="nav-item">
              <a href="cart.php" class="nav-link icon"><i class="bx bx-shopping-bag"></i></a>
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

    <!-- Hero -->
    <img src="./images/banner.png" alt="" class="hero-img" />

    <div class="hero-content">
      <h2><span class="discount">70% </span> SALE OFF</h2>
      <h1>
        <span>Summer Vibes</span>
        <span>mode on</span>
      </h1>
      <a class="btn" href="#">shop now</a>
    </div>
  </header>


  <!-- Featured -->
  <section class="section featured">
    <div class="title">
      <h1>Featured Products</h1>
    </div>

    <?php
    include('pages/function.php');
    $query_spare = mysqli_query($koneksi, "SELECT * FROM suku_cadang");
    while ($spare = mysqli_fetch_array($query_spare)) {
    ?>

      <div class="product-center container">
        <div class="product">
          <div class="product-header">
            <img src="./images/desain/<?= $spare['Gambar'] ?>" alt="">
            <ul class="icons">
              <span><i class="bx bx-heart"></i></span>
              <span><i class="bx bx-shopping-bag"></i></span>
              <span><i class="bx bx-search"></i></span>
            </ul>
          </div>
          <div class="product-footer">
            <a href="#">
              <h3><?= $spare['Nama_Suku_cadang'] ?></h3>
            </a>
            <div class="rating">
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bx-star"></i>
            </div>
            <h4 class="price"><?= $spare['Harga_Satuan'] ?></h4>
          </div>
        </div>
      <?php } ?>

      <div class="product">
        <div class="product-header">
          <img src="./images/pic1.jpg" alt="">
          <ul class="icons">
            <span><i class="bx bx-heart"></i></span>
            <span><i class="bx bx-shopping-bag"></i></span>
            <span><i class="bx bx-search"></i></span>
          </ul>
        </div>
        <div class="product-footer">
          <a href="#">
            <h3>Boy’s T-Shirt</h3>
          </a>
          <div class="rating">
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bx-star"></i>
          </div>
          <h4 class="price">$50</h4>
        </div>
      </div>
      <div class="product">
        <div class="product-header">
          <img src="./images/pic3.jpg" alt="">
          <ul class="icons">
            <span><i class="bx bx-heart"></i></span>
            <span><i class="bx bx-shopping-bag"></i></span>
            <span><i class="bx bx-search"></i></span>
          </ul>
        </div>
        <div class="product-footer">
          <a href="#">
            <h3>Boy’s T-Shirt</h3>
          </a>
          <div class="rating">
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bx-star"></i>
          </div>
          <h4 class="price">$50</h4>
        </div>
      </div>
      <div class="product">
        <div class="product-header">
          <img src="./images/pic4.jpg" alt="">

          <ul class="icons">
            <span><i class="bx bx-heart"></i></span>
            <span><i class="bx bx-shopping-bag"></i></span>
            <span><i class="bx bx-search"></i></span>
          </ul>
        </div>
        <div class="product-footer">
          <a href="#">
            <h3>Boy’s T-Shirt</h3>
          </a>
          <div class="rating">
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bx-star"></i>
          </div>
          <h4 class="price">$50</h4>
        </div>
      </div>
      </div>
  </section>





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