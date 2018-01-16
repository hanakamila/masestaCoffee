 <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >Login</h3>
		<h4><a href="<?php echo base_url();?>index.php/user">Home</a><label>/</label>Login</h4>
		<div class="clearfix"> </div>
	</div>
</div>
<!--login-->
<div class="login">
	
		<div class="main-agileits">
				<div class="form-w3agile">
					<h3>Login</h3>
					<form action="<?php echo base_url();?>user/dologin" method="post">
						<?php if (!empty($notif)) { ?>
									<div class="alert alert-danger"><?= $notif; ?></div>
								<?php } ?>
								<?php if (isset($_GET['to']) && $_GET['to'] != "") { ?>
									<input type="hidden" required name="to" value="<?= $_GET['to']; ?>">
								<?php } ?>
						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<input  type="text" value="Email" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" value="Password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
							<div class="clearfix"></div>
						</div>
						<input type="submit" name="submit" value="Login">
					</form>
				</div>
				<div class="forg">
					<a href="<?php echo base_url();?>index.php/user/register" class="forg-right">Register</a>
				<div class="clearfix"></div>
				</div>
			</div>
		</div>