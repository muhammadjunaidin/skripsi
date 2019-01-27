<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?=get_css('bootstrap.min.css')?>" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="<?=get_css('styles.css')?>" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?=base_url('assets/font-awesome/css/all.css')?>">
    <style type="text/css">
      body{
        background: #EDF8F0 url("http://localhost/perizinan/assets/images/bg.png") top center repeat-x fixed;
        color: #033f1c;
      }
      .logo {
        max-width: 150px;
      }
      .header {
        margin: 50px auto;
        margin-top: 8%;
        text-align: center;
        max-width: 650px;
      }
      .header-title {
        display: inline-flex;
      }
      .header-title h2 {
        font-family: "Times New Roman", Times, serif;
        font-size: 40px;
        font-weight: bold;
        text-align: left;
        color: #07602c;
      }
      .intro {
        text-align: center;
        margin-bottom: 50px;
        padding-top: 10px;
      }
      .intro h3 {
        color: #07602c;
        font-weight: bold;
      }
      .feature {
        padding: 30px 10px;
      }
      .feature .col {
        text-align: center;
      }
      .feature i {
        font-size: 90px;
      }
      .detail {
        margin-top: 20px;
        padding: 0 20px;
      }
      a { color: inherit; }
    </style>
    <title>Perizinan Wilayah DIY</title>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <img class="logo" src="<?=get_image('logo-disnaker.png')?>">
        <div class="header-title">
          <h2>Pelayanan perizinan <br>Wilayah DIY</h2>
        </div>
      </div>
      <div class="content">
        <div class="intro">
          <h3>Selamat datang, di Perizinan online Wilayah DIY</h3>
          <h5>Sistem perizinan online ini di peruntukkan bagi pemohon yang ingin mengajukan permohonan perizinan secara online</h5>
        </div>
        <div class="feature row">
          <div class="col">
            <i class="far fa-file-alt"></i>
            <div class="detail">
              <a href="register"><h5>Registrasi Akun</h5></a>
              <p>Layanan ini digunakan untuk pembuatan akun</p>
            </div>
          </div>
          <div class="col">
            <i class="fas fa-file-contract"></i>
            <div class="detail">
              <a href="izin-usaha"><h5>Perizinan</h5></a>
              <p>Layanan ini digunakan untuk memantau proses perizinan</p>
            </div>
          </div>
          <div class="col">
            <i class="fas fa-unlock-alt"></i>
            <div class="detail">
              <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                <a href="logout"><h5>Logout</h5></a>
                <p>Silahkan logout dari aplikasi</p>
                <p>Klik <a href="<?=base_url('admin/dashboard')?>"><b>disini</b></a> untuk masuk kedalam dashboard</p>
              <?php else: ?>
                <a href="login"><h5>Login</h5></a>
                <p>Layanan ini digunakan untuk masuk ke aplikasi</p>
              <?php endif;?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
  </body>
</html>