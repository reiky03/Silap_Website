<?php
// Memasukkan file config agar terkoneksi dengan database
include "config.php";

// Nama variabel penampung
$tujuan = '';
$tempat = '';
$url = '';
$komentar = '';
$berhasil = '';
$gagal = '';
$gagal_Isian = '';


// script php mysql untuk menyimpan data (insert data ke database)
if (isset($_POST['simpan'])) {
  $komentar = $_POST['komentar1'];
  //variabel query adalah variabel yang menyimpan perintah sql dml
  if ($komentar != '') {
    $query = mysqli_query($koneksi, "INSERT INTO saran (id,tkomentar) VALUES (NULL,'$komentar')");

    if ($query) {
      echo "anda berhasil memasukkan data";
      header("refresh:0;");
    } else {
      echo "anda gagal memasukkan data";
    }
  } else {
    echo "silahkan masukkan semua data";
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lokasi Puskesmas | Silap</title>
  <link rel="icon" href="img/SILAP.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
  rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
  crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="bg">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark shadow-5-strong">
    <div class="container">
      <a class="navbar-brand brand" href="#">SILAP</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-right" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item px-lg-3 mx-lg-3">
            <a class="nav-link active " aria-current="page" href="../utama.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-lg-3 mx-lg-3" href="jadwal.php">Jadwal</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Akhir Navbar -->

  <!-- Menu -->
  <div class="container mt-5 pb-4">
  <h3 class="pt-5 mb-5 text-center caption-quote">Lokasi Puskesmas</h3>
    <table class="content-table text-center mx-auto">
    <!-- <table class="table table-hover bdr"> -->

      <thead >
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Puskesmas</th>
          <th scope="col">Alamat</th>
          <th scope="col">Map</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql2 = "select * from lokasi order by id DESC";
        $q2 = mysqli_query($koneksi, $sql2);
        $urut = 1;
        while ($r2 = mysqli_fetch_array($q2)) {
          $id = $r2['id'];
          $tujuan = $r2['nama_puskesmas'];
          $tempat = $r2['tempat'];
          $url = $r2['url_map'];
        ?>
        <tr>
          <th scope="row">
            <?php echo $urut++ ?>
          </th>
          <td scope="row">
            <?php echo $tujuan ?>
          </td>
          <td scope="row">
            <?php echo $tempat ?>
          </td>
          <td scope="row">
            <button class="fcc-btn" type="submit">
              <a href="<?php echo $url ?>"><img class="tbl-img" src="img/IconLocation.png" alt="Location"></a>
            </button>
            <!-- <a class="fcc-btn" href="<?php echo $url ?>">View</a> -->
          </td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <!-- Akhir menu -->

    <!-- Maps -->
    <section class="container navi">
    <div class="row">
      <div class="col-md-15 p-10 text-center align-items-center ">
      <h2 class="caption-quote">Temukan Puskesmas Terdekatmu</h2>
          <p>Ayo cari dan jelajahi lokasi puskesmas yang terdapat didalam sekitaran wilayahmu, dan carilah lokasi
            puskesmas
            yang paling dekat dengan lokasimu.
          </p>
        <iframe class="w-100 border-dark rounded-4"
          src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d126527.00357597017!2d110.34034658105497!3d-7.686490492099677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1spuskesmas%20di%20yogyakarta!5e0!3m2!1sid!2sid!4v1668769280424!5m2!1sid!2sid"
          width="500" height="300" style="border:1px;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
    </div>
  </section>
  <!-- Google Maps -->

  <!-- Footer -->
 <footer class="text-center text-lg-start border border-dark-subtle bg-footer-2">
    <div class="col-12 text-center p-3 text-dark bg-light">
        © 2023 Copyright :
        <a class="text-decoration-none text-info" href="../Sisi Admin/login.php">SILAP</a>
  </div>
  </footer>
  <!-- Akhir Footer -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script>

</html>