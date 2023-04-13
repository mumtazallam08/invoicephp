<?php 
session_start();
$loginError = '';
if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
	include 'Invoice.php';
	$invoice = new Invoice();
	$user = $invoice->loginUsers($_POST['email'], $_POST['pwd']); 
	if(!empty($user)) {
		$_SESSION['user'] = $user[0]['first_name']."".$user[0]['last_name'];
		$_SESSION['userid'] = $user[0]['id'];
		$_SESSION['email'] = $user[0]['email'];		
		$_SESSION['address'] = $user[0]['address'];
		$_SESSION['mobile'] = $user[0]['mobile'];
		header("Location:invoice_list.php");
	} else {
		$loginError = "Invalid email or password!";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Invoice System Login</title>
	<style>
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		.login-form{
			width: 100vw;
			height: 100vh;
			background-color: white;
			position: relative;
		}
		form{
			width: 30vw;
			height: 40vh;
			background-color: skyblue;
			position: absolute;
			left: 50%;
			top: 50%;
			transform: translate(-50%, -50%);
			border-radius: 10px;
			text-align: center;
			padding-top: 10px;
		}
		input{
			width: 90%;
			height: 50px;
			margin-top: 15px;
			border-radius: 5px;
			border: 0px;
			font-size: larger;
		}
		.btn-success{
			width: 90%;
			height: 45px;
			background-color: green;
			cursor: pointer;
			margin-top: 15px;
			border-radius: 5px;
			border: 0px;
			font-size: larger;
			color: #eee;
		}
	</style>
</head>
<body>
	<div class="login-form">	
		<form method="post" action="">
		<h1>Invoice System</h1>	
			<?php if ($loginError ) { ?>
				<div class="alert alert-warning"><?php echo $loginError; ?></div>
			<?php } ?>
				<input name="email" id="email" type="email" placeholder="Email"  required>
				<input type="password" name="pwd" placeholder="Password"  required>  
				<button type="submit" name="login" class="btn-success">Login</button><br><br>
				<div class="link">Not yet signed up? <a href="register.php">Register Now</a></div>
		</form>
	</div>		
</body>
</html>