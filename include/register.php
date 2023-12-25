<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Log in</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
		*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	border: 0;
	outline: 0;
	}

	body{
		display: flex;
		align-items: center;
		justify-content: center;
		height: 100vh;
		background: url(bg.svg);
		background-size: cover;
		/*background-position: center;*/
		animation: animasi 15s alternate infinite;
	}

	.box-login{
		width: 400px;
		height: min-content;
		padding: 40px;
		background-color: #fff;
		text-align: center;
		border-radius: 3px;
		box-shadow: rgba(0, 0, 0, .7);
		
	}

	@keyframes animasi{
		50%{
			background-position: 50%;
		}
	}

	.box-login h2 {
		font-size: 2.2rem;
		color: #333;
	}
	.box-login p {
		font-size: 1.2rem;
		color: #222;
		margin-top: 5px;
	}
    p.alert-register{
    color: red;
    margin-top: 15px;
    margin-bottom: 0px;
	}
	form{
		text-align: left;
		margin-top: 30px;
	}
	.box-form{
		margin: 18px 0;
	}

	.box-form label {
		font-size: 1.1rem;
		display: block;
	}
	.box-form i{
		position: absolute;
		font-size: 23px;
		transform: translateX(10px) translateY(12px);
		color: #333;
	}

	.box-form input{
		width: 100%;
		height: 38px;
		border: 2px solid rgba(0, 0, 0, .3);
		padding: 10px 0px 10px 40px;
		margin-top: 5px;
		border-radius: 3px;
		transition: .3s;
		cursor: pointer;
	}
	.box-form input:focus{
		border: 2px solid darkblue;
		box-shadow:0 0 12px rgba(0, 0, 255, .3);
	}
	form .box-form input:valid{
		background-color: #fefefe;
	}

	.forgot {
		text-decoration: none;
		color: darkblue;
	}
	.forgot:hover{
		color: lightblue;
	}

	input[type=submit]{
		width: 100%;
		margin-top: 20px;
		height: 39px;
		background: linear-gradient(0deg,darkblue,blue);
		border-radius: 5px;
		font-size: 1rem;
		color: #fff;
	
	}

	button{
		width: 100%;
		margin-top: 20px;
		height: 39px;
		background: linear-gradient(0deg,darkblue,blue);
		border-radius: 5px;
		font-size: 1rem;
		color: #fff;
	}
	/*@media (max-width=390px){
		.box-login{
			width: 200px;
			height: min-content;
		}
	}*/
	</style>
</head>
<body>
	<div class="box-login">
		<h2>QuNews</h2>
		<p>Register to your QuNews account</p>
        <?php if(!empty($_GET['notif'])){?>
            <?php if($_GET['notif']=="tambahnamakosong"){?>
                <p class="alert-register">Maaf Nama Tidak Boleh Kosong</p>
            <?php } else if($_GET['notif']=="tambahemailkosong"){?>
                <p class="alert-register">Maaf Email Tidak Boleh Kosong</p>
            <?php } else if($_GET['notif']=="tambahpasskosong"){?>
                <p class="alert-register">Maaf Password Tidak Boleh Kosong</p>
            <?php } ?>
        <?php }?>
		<form action="konfirmasiregister.php" method="post">
            <div class="box-form">
				<label for="foto">Foto</label>
				<i class="fa-solid fa-image"></i>
                <input type="file" class="upload-foto" name="foto" id="customFile">
			</div>
            <div class="box-form">
				<label for="nama">Nama</label>
				<i class="fa-solid fa-user"></i>
				<input type="text" name="nama" class="email" id="nama" value="" placeholder="Your Name">
			</div>
			<div class="box-form">
				<label for="email">E-mail</label>
				<i class="fa-solid fa-user"></i>
				<input type="text" name="email" class="email" id="email" value="" placeholder="Your Email">
			</div>
			<div class="box-form">
				<label for="password">Password</label
				>
				<i class="fa-sharp fa-solid fa-lock"></i>
				<input type="password" name="password" class="email" id="password" value="" placeholder="Your Password">
			</div>

            <h4>Already have an account?<a href="loginuser.php" class="forgot"> Log In</a></h4>
			<!-- <a href="#" class="forgot">Forgot your password?</a> -->
			<!-- <a href="portalberita.html"><input type="submit"  name="login" value="Log in"></a> -->
			<button type="submit">Register</button>
<!-- 		
			<button>Log In</button>
		 -->
		</form>
	</div>
</body>
</html>