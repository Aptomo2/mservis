<?php
session_start();
include "setting/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MServis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&family=Poppins:wght@300;400;500;600;700;800&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">

    <style>
        .fa {
            padding: 10px;
            font-size: 25px;
            width: 50px;
            text-align: center;
            text-decoration: none;
            border-radius: 50%;
            margin: 2px;
        }

        .fa:hover {
            opacity: 0.7;
        }

        .fa-whatsapp {
            background: #075E54;
            color: white;
        }

        .fa-facebook {
            background: #3B5998;
            color: white;
        }

        .fa-twitter {
            background: #55ACEE;
            color: white;
        }

        .fa-google {
            background: #dd4b39;
            color: white;
        }

        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
        .box{
     border-top-color:#34495E !important;
    }
    </style>

</head>

<body>
    <!-- Navbar -->

    <?php
    include 'menu.php';
    ?>

    <div class="wrapper">
        <!-- untuk home-->
        <section id="home">
            <img class="pic" src="img/home1.jpg" width="60%" />
            <div class="kolom-atas erepair">
                <p class="deskripsi"> INGIN SERVIS MOTOR? PESAN DISINI!</p>
                <h3>Langsung di MServis</h3>
                <p style="font-size:18px">Motor terasa berat dan tidak ada tenaga ? Saatnya cek kondisi motor anda sekarang di
                    MServis.Menyediakan layanan servis motor , cek berkala, penjualan sparepart seperti Oli,Filter Udara
                    dan lain-lain.</p>

            </div>
        </section>

        <!-- untuk jenis jasa -->
        <section id="jenisjasa">
            <div class="tengah">
             <div class="kolom">
                    <h2 >Jenis Jasa</h2>
                    <p class="deskripsi">Pilih Layanan Yang Anda Inginkan !</p>
                    <p style="font-weight: bold;">MServis Menyediakan Layanan Servis Untuk Semua Jenis Motor.</p>
                </div>
            <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="card" style="width: 15rem; border: none;">
                    <img src="img/servismotor.jpg" class="card-img-top w-70 mx-auto mt-3" alt="..."
                        onclick="toggleText('servis')">
                    <br>
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center;">Servis Motor</h5>
                        <p id="servis" class="card-text fade-in" style="display: none;">Perawatan Pada Motor 
                        Dengan Cara Membersihkan Komponen Pada Bagian Mesin Seperti Karburator dan CVT.</p>
                    </div>
                </div>
                <div class="card mx-4" style="width: 15rem; border: none;">
                    <img src="img/kondisi.jpg" class="card-img-top w-70 mx-auto mt-3" alt="..."
                        onclick="toggleText('kondisi')">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center;">Cek Kondisi Motor</h5>
                        <p id="kondisi" class="card-text fade-in" style="display: none;">Pengecekan Berkala 
                         Pada Komponen Penting Motor Seperti Pengereman, Busi, Filter Udara dan Kelistrikan
                         Untuk Menjaga Perfoma Motor Tetap Optimal.</p>
                    </div>
                </div>
                <div class="card me-4" style="width: 15rem; border: none;">
                    <img src="img/gantioli.jpg" class="card-img-top w-70 mx-auto mt-3" alt="..."
                        onclick="toggleText('oli')">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center;">Pergantian Oli</h5>
                        <p id="oli" class="card-text fade-in" style="display: none;">Frekuensi Penggatian Oli
                        Bergantung Pada Jarak Tempuh Motor. Umumnya Penggantian Oli Setiap 2.000-4.000 Kilometer
                        Atau Setiap 2-6 bulan, tergantung mana yang tercapai lebih dulu.</p>
                    </div>
                </div>
                <div class="card" style="width: 15rem; border: none;">
                    <img src="img/sparepart.jpg" class="card-img-top w-70 mx-auto mt-3" alt="..."
                        onclick="toggleText('spare')">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center;">Sparepart</h5>
                        <p id="spare" class="card-text fade-in" style="display: none;">Mandiri Motor Menyediakan 
                        Berbagai Macam Sparepart Untuk Motor Mulai Dari Pengereman, Komponen Mesin, Lampu Motor,
                        Baut dan lain-lain.</p>
                    </div>
                </div>
            </div>
            </div>
            </div>
            </section>

        <!-- untuk order -->
        <section id="order">
            <div class="kolom-bawah reveal">
                <h2>Servis Motor Anda dengan <span>Cepat</span> dan <span>Berkualitas.</span></h2>
                <p>MServis memberi pelayanan yang berkualitas dan cepat untuk merawat motor kesayangan anda. Pesan
                    layanan yang anda inginkan melalui website ini.</p>
                <br>
                <a class="tombol" href="jasa.php">Pesan Sekarang<a>
            </div>
            <img src="img/order.jpg" />
        </section>
    </div>

     <!--Testimoni-->

        <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Tentang Mandiri Motor</h2>
          <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 px-4">
              <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="img/motorcycle.svg" width="70px">
                <h5 class="mt-3">200+ MOTOR </h5>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
              <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="img/customers.svg" width="70px">
                <h5 class="mt-3">200+ PELANGGAN</h5>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
              <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="img/rating.svg" width="70px">
                <h5 class="mt-3">200+ TESTIMONI</h5>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
              <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="img/montir.svg" width="70px">
                <h5 class="mt-3">2 MONTIR TERPERCAYA</h5>
              </div>
            </div>
            
        </div>
       </div> 
       
       <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Testimoni</h2>

  <div class="container mt-5">
    <div class="swiper swiper-testimonials">
      <div class="swiper-wrapper mb-6">
        <div class="swiper-slide p-4" style="background-color:ghostwhite;">
          <div class="profile d-flex align-items-center mb-3">
            <img src="img/person-circle.svg" width="30px">
            <h6 class="m-0 ms-2">Toni Malik</h6>
          </div>
          <p>
           Bengkel rekomendasi untuk di daerah Lampiri, orangnya jujur dan amanah dan bisa di percaya.
            Bisa di tinggal klo ga bisa nungguin, untuk harga spare part dan biaya servis terjangkau.
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
        </div>
        <div class="swiper-slide p-4" style="background-color:ghostwhite;">
          <div class="profile d-flex align-items-center p-4">
            <img src="img/person-circle.svg" width="30px">
            <h6 class="m-0 ms-2">Dian Eko Adinugrogo</h6>
          </div>
          <p>
            Yang punya bengkel orangnya jujur dan amanah Rekomended banget bagi yang punya motor
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
        </div>
        <div class="swiper-slide p-4" style="background-color:ghostwhite;">
          <div class="profile d-flex align-items-center p-4">
            <img src="img/person-circle.svg" width="30px">
            <h6 class="m-0 ms-2">Santoso Dwi Saputro</h6>
          </div>
          <p>
            Bengkel langganan, Setiap servis motor selalu disini...
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
        </div>

      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

    <section id="contact" style="margin-top:10%;">
        <div class="container contactContent">
            <div class="row mt-4">
                <div class="col-lg-6">
                    <h1 class="text-center">Alamat</h1>
                    <br>
                    <iframe style="height:80%; width:100%; border:1px solid #000; margin: auto;" frameborder="0"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d316.8518501847043!2d106.93846528636514!3d-6.253276761168268!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698d39473efbb1%3A0x3285b863ddf70ac0!2sBengkel%20Mandiri%20Motor!5e0!3m2!1sid!2sid!4v1694808526504!5m2!1sid!2sid"
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <a style=" font-weight: bold;"><i class="bi bi-geo-alt-fill"></i>Jl. Lampiri, Jl. Melati III No.123, RT.004/RW.002, Jatibening Baru, Kecamatan Pondok Gede, Kota Bekasi, Jawa Barat 17412</a>
                </div>

                <div class="col-lg-6">
                    <h1 class="text-center">Kontak</h1>
                    <br>
                    <div style="margin-left: 10%">
                        <div class="contact-item">
                            <a href="#" class="fa fa-whatsapp"></a>
                            <span class="contact-text">081282239092</span>
                        </div>
                        <br>
                        <div class="contact-item">
                            <a href="#" class="fa fa-facebook"></a>
                            <span class="contact-text">Facebook</span>
                        </div>
                        <br>
                        <div class="contact-item">
                            <a href="#" class="fa fa-twitter"></a>
                            <span class="contact-text">Twitter</span>
                        </div>
                        <br>
                        <div class="contact-item">
                            <a href="#" class="fa fa-google"></a>
                            <span class="contact-text">Google</span>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div id="copyright">
                <div class="wrapper">
                    &copy; 2023. <b>MServis</b> All Rights Reserved.
                </div>
            </div>
        </div>
    </section>

    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
     <script>
        function toggleText(id) {
            var textElement = document.getElementById(id);
            if (textElement.style.display === "none" || textElement.style.display === "") {
                textElement.style.display = "block";
                textElement.classList.add("fade-in");
            } else {
                textElement.style.display = "none";
                textElement.classList.remove("fade-in");
            }
        }
        
        var swiper = new Swiper(".swiper-container", {
      spaceBetween: 30,
      effect: "fade",
      loop: true,
      autoplay: {
        delay: 3500,
        disableOnInteraction: false
      }
    });

    var swiper = new Swiper(".swiper-testimonials", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      slidesPerView: "3",
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
        },
        640: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
      }
    });

    </script>


</body>

</html>