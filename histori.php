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

    <!-- Cart Items -->

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h3>HISTORI</h3>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 align-middle text-center text-sm">No Nota</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $query_pemilik = "SELECT * FROM pembelian WHERE email = '" . $_SESSION['email'] . "'";
                                    $tabel_pemilik = mysqli_query($koneksi, $query_pemilik);
                                    foreach ($tabel_pemilik as $data_pemilik) :
                                        $cek = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE No_Nota_Suku_Cadang = '" . $data_pemilik['no_nota_suku_cadang'] . "'");
                                    ?>
                                        <tr>


                                            <td class="align-middle text-center text-sm">
                                                <span class="text-s font-weight-bold mb-0">
                                                    <?php echo $data_pemilik['no_nota_suku_cadang'];  ?>
                                                </span>
                                            </td>


                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-s font-weight-bold">
                                                    <?php if (mysqli_num_rows($cek) > 0) {
                                                        echo "SUDAH BAYAR";
                                                    } else {
                                                        echo "BELUM BAYAR";
                                                    }  ?>
                                                </span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <a href="nota.php?id=<?php echo $data_pemilik['no_nota_suku_cadang']; ?>" class="btn bg-info mt-3 btn-sm">nota</a>
                                            </td>

                                        </tr>
                                </tbody>
                            <?php
                                    endforeach
                            ?>
                            </table>
                        </div>
                    </div>
                </div>
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