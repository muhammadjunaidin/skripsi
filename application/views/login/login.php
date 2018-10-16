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
			.card-container.card {
				max-width: 400px;
				padding: 40px 40px;
				margin: auto;
				top: 0;
				transform: translate(0, 35%);
			}
			.btn {
				font-weight: 700;
				height: 36px;
				-moz-user-select: none;
				-webkit-user-select: none;
				user-select: none;
				cursor: default;
			}
			.card {
				background-color: #ffffff42;
				/* just in case there no content*/
				padding: 20px 25px 30px;
				/* shadows and rounded borders */
				-moz-border-radius: 2px;
				-webkit-border-radius: 2px;
				border-radius: 2px;
				-moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
				-webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
				box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			}
			.profile-img-card {
				width: 150px;
				margin: auto;
				display: block;
				-moz-border-radius: 50%;
				-webkit-border-radius: 50%;
				border-radius: 50%;
			}
			.btn.btn-signin {
				/*background-color: #4d90fe; */
				background-color: rgb(104, 145, 162);
				/* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
				padding: 0px;
				font-weight: 700;
				font-size: 14px;
				height: 36px;
				-moz-border-radius: 3px;
				-webkit-border-radius: 3px;
				border-radius: 3px;
				border: none;
				-o-transition: all 0.218s;
				-moz-transition: all 0.218s;
				-webkit-transition: all 0.218s;
				transition: all 0.218s;
			}
			input {
				margin-bottom: 10px;
			}
		</style>
		<title>Perizinan Disnaker DIY</title>
	</head>
	<body>
		<div class="container">
			<div class="card card-container">
				<!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
				<img id="profile-img" class="profile-img-card" src="<?=get_image('logo-disnaker.png')?>" />
				<p id="profile-name" class="profile-name-card"></p>
				<form class="form-signin">
					<span id="reauth-email" class="reauth-email"></span>
					<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
					<input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
					<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
				</form>
			</div>
			<!-- /card-container -->
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
	</body>
</html>