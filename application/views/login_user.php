<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Style login -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login_style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<div class="account-wall">
					<div id="my-tab-content" class="tab-content">
						<div class="tab-pane active" id="login">
							<img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt="">
							<form class="form-signin" action="<?php echo base_url();?>user/login" method="post">
								<?php if (!empty($notif)) { ?>
									<div class="alert alert-danger"><?= $notif; ?></div>
								<?php } ?>
								<?php if (isset($_GET['to']) && $_GET['to'] != "") { ?>
									<input type="hidden" required name="to" value="<?= $_GET['to']; ?>">
								<?php } ?>
								<input type="email" class="form-control" placeholder="Email" required autofocus name="email">
								<input type="password" class="form-control" placeholder="Password" required name="password">
								<input type="submit" name="submit" class="btn btn-lg btn-default btn-block" value="Sign In" />
							</form>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>