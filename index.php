<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>VT Notes</title>
  <link rel="stylesheet" href="style.css">

</head>
<body>
<!-- partial:index.partial.html -->

<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main" style="background-color: #fff;">  	
		
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup" > 
				<div id="vn">
					<img  src="Logo Shape V.png" alt="V" style="float:left;width:42px;height:42px;">
				<img src="Logo Shape N.png" alt="N" style="float:left;width:42px;height:42px;">
				</div>
				
				<form method="post" action="index.php" >
					<?php include('errors.php') ?>
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="vtuno" placeholder="VTU No." value="<?php echo $vtuno; ?>" required="">
					<input type="email" name="email" value="<?php echo $email; ?>" placeholder="Email" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button type="submit" name="reg_user">Sign up</button>
				</form>
			</div>

			<div class="login">
				<form method="post" action="index.php" >
					<!-- <?php include('errors.php') ?> -->
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" name="vtuno" placeholder="VTU No." required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button type="submit" name="login_user">Login</button>
				</form>
			</div>
	</div>
</body>
</html>
<!-- partial -->
  
</body>
</html>
