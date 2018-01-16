<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Masesta Admin</title>
	<!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/logincss.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/js/loginjs.js">
  <!-- Style login -->
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login_style.css"> -->
</head>
<body >
<!-- 	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<div class="account-wall">
					<div id="my-tab-content" class="tab-content">
						<div class="tab-pane active" id="login">
							<img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt="">
							<form class="form-signin" action="<?php echo base_url();?>index.php/admin/login" method="post">
								<input type="text" class="form-control" placeholder="Username" required autofocus name="username">
								<input type="password" class="form-control" placeholder="Password" required name="password">
								<input type="submit" name="submit" class="btn btn-lg btn-default btn-block" value="Sign In" />
							</form>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<div class="container">
	<div class="login-container">
            <div id="output"></div>
            <div class="avatar"><img src="https://lh5.googleusercontent.com/KuDsd3MZVGsvqksBM-WO9ed6ry_ZsJDn6GDJxa_CR2TVUkMDjVRVMeYKErUFwcrNTFEobASv7db31m6THZZV=w1366-h672-rw" width="160" height="70"></div>
            <div class="form-box">
                <form action="<?php echo base_url();?>index.php/admin/login" method="post">
                    <input name="username" type="text" placeholder="Username" required autofocus>
                    <input name="password" type="password" placeholder="password">
                    <button class="btn btn-info btn-block login" type="submit" name="submit" value="Sign In">Login</button>
                    <!-- <input type="submit" name="submit" class="btn btn-lg btn-default btn-block" value="Sign In" /> -->
                </form>
            </div>
        </div>
        
</div>
</body>
</html>