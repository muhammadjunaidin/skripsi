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
        max-width: 130px;
      }
      .header {
      	margin: auto;
        text-align: center;
        max-width: 650px;
      }
      .header-title {
        display: inline-flex;
      }
      .header-title h2 {
        font-family: "Times New Roman", Times, serif;
        font-size: 36px;
        font-weight: bold;
        text-align: left;
        color: #07602c;
      }
      a { color: inherit; }
      .content {
      	margin-top: 50px;
      }
      .form-control, .form-control:focus {
      	background: transparent;
      	border: 1px solid #6d9c75;
      }
      .btn.submit {
      	float: right;
	    background: #07602c;
	    color: white;
      }
    </style>
    <title>Perizinan Disnaker DIY</title>
  </head>
	<body>
		<div class="container">
			<div class="header">
				<img class="logo" src="<?=get_image('logo-disnaker.png')?>">
				<div class="header-title">
					<h2>Pelayanan perizinan<br> Disnaker DIY</h2>
				</div>
			</div>
			<div class="content">
				<div class="card bg-transparent border-success">
					<div class="card-header">Form Registrasi</div>
					<div class="card-body">
						<?php if (validation_errors()) : ?>
							<div class="alert alert-danger" role="alert">
								<?= validation_errors() ?>
							</div>
						<?php endif; ?>
						<?php if (isset($status) && $status === 'sukses') : ?>
							<div class="alert alert-success" role="alert">
								<?= $message ?>
							</div>
						<?php elseif ( isset($status) && $status === 'gagal'): ?>
							<div class="alert alert-danger" role="alert">
								<?= $message ?>
							</div>
						<?php endif; ?>

					
						<form method="POST">
							<div class="form-group row">
								<label for="inputNIK" class="col-sm-2 col-form-label">NIK</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="nik" value="<?=isset($nik) ? $nik : ''?>" id="inputNIK" placeholder="NIK" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputNamaLengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="nama_lengkap" value="<?=isset($nama_lengkap) ? $nama_lengkap : ''?>" id="inputNamaLengkap" placeholder="Nama Lengkap" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" name="email" value="<?=isset($email) ? $email : ''?>" id="inputEmail" placeholder="Email" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputNoTlp" class="col-sm-2 col-form-label">No. Handphone</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="no_tlp" value="<?=isset($no_tlp) ? $no_tlp : ''?>" id="inputNoTlp" placeholder="No. Handphone" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="alamat" value="<?=isset($alamat) ? $alamat : ''?>" id="inputAlamat" placeholder="Alamat" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputWarga" class="col-sm-2 col-form-label">Kewarganegaraan</label>
								<div class="col-sm-10">
									<select class="form-control" id="inputWarga" name="kewarganegaraan" value="<?=isset($kewarganegaraan) ? $kewarganegaraan : ''?>">
										<option value="wni">WNI</option>
										<option value="wna">WNA</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="pekerjaan" value="<?=isset($pekerjaan) ? $pekerjaan : ''?>" id="inputPekerjaan" placeholder="Pekerjaan">
								</div>
							</div>
							<div class="form-group row">
								<label for="inputJabatan" class="col-sm-2 col-form-label">Jabatan</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="inputJabatan" name="jabatan" value="<?=isset($jabatan) ? $jabatan : ''?>" placeholder="Jabatan">
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" id="inputPassword3" name="password" value="<?=isset($password) ? $password : ''?>" placeholder="Password" required>
								</div>
							</div>
							<button type="submit" class="btn submit">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
	</body>
</html>