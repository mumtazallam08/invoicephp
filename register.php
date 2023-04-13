<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Invoice System Register</title>
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
			height: 40px;
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
		<form method="post" action="" style="height: 75vh;">
		<h1>Invoice System</h1>					
                <input  type="text" name="first_name" placeholder="First Name"  required>
                <input  type="text" name="last_name" placeholder="Last Name"  required>
                <input type="email" name="email"  placeholder="Email"  required>
				<input type="password" name="password" placeholder="Password"  required> 
				<input type="tel" name="mobile" placeholder="Mobile"  required>
                <input type="text" name="address" placeholder="Address" style="height: 80px;"  required> 
				<button type="submit" name="submit" class="btn-success">Register Now</button><br><br>
				<div class="link">Already yet signed up? <a href="index.php">Login Now</a></div>
		</form>
		<br>
	</div>		
</div>		
</div>
</body>
</html>
<?php  

$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "simpleinvoicephp";

$conn = mysqli_connect($sname, $uname, $password, $db_name);
if (isset($_POST['submit'])) {
	$first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$password=$_POST['password'];
    $address = $_POST['address'];
	$mobile = $_POST['mobile'];

    $select = mysqli_query($conn, "SELECT * FROM `invoice_user` WHERE email = '$email' AND password = '$password'") or die('query failed');

    if(mysqli_num_rows($select) > 0){
        echo "<script type='text/javascript'>alert('user already exist')</script>";
    }else{
        $insert = mysqli_query($conn, "INSERT INTO  `invoice_user`(`email`, `password`, `first_name`, `last_name`, `address`, `mobile`) VALUES ( '$email', '$password', '$first_name', '$last_name', '$address', '$mobile')") or die('query failed');
        if($insert){
            echo "<script type='text/javascript'>alert('Registration successfully')</script>";
            header('location:index.php');
         }else{
            $message[] = 'registeration failed!';
         }
      }
   }
?>