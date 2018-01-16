<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Masesta Coffee</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="Big store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="<?php echo base_url();?>assets/user/template/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="<?php echo base_url();?>assets/user/template/css/style.css" rel='stylesheet' type='text/css' />
<!-- js -->
   <script src="<?php echo base_url();?>assets/user/template/js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?php echo base_url();?>assets/user/template/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/user/template/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<link href="<?php echo base_url();?>assets/user/template/css/font-awesome.css" rel="stylesheet"> 
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
<!--- start-rate---->
<script src="<?php echo base_url();?>assets/user/template/js/jstarbox.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/user/template/css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
		<script type="text/javascript">
			jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
					starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
					}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
					var val = Math.random();
					starbox.next().text(' '+val);
					return val;
					} 
				})
			});
		});
		</script>
<!---//End-rate---->

</head>
<body>
<div class="header">

		<div class="container">
			
			<div class="logo">
				<h1 ><a href="<?php echo base_url()?>index.php/user"><img src="https://lh3.googleusercontent.com/61l6M2izPfVYVsfB3yJ2VqKv86-hFCTL1Ej1qA-dYRw5NzUnSxMsCxWZAmegPl6hrvCriBcoRBuQ5nh3IYJY=w1304-h702-rw" width="320" height="120"></a></h1>
			</div>
			<div class="head-t">
				<ul class="card">
					<?php if ($this->session->userdata('logged_in') == TRUE){?>
						<li><a href="<?= base_url('index.php/user/history');?>" ><i class="fa fa-file-text-o" aria-hidden="true"></i>Order History</a></li>
						<li><a class="btn disabled"><i class="fa fa-user" aria-hidden="true"></i>Nama User</a></li>
						<li><a href="<?php echo base_url()?>index.php/user/logout" ><i class="fa fa-close" aria-hidden="true"></i>Log out</a></li>
					<?php } else {?>
						<li><a href="<?php echo base_url()?>index.php/user/login" ><i class="fa fa-user" aria-hidden="true"></i>Login</a></li>
						<li><a href="<?php echo base_url()?>index.php/user/register" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Register</a></li>
					<?php } ?>
				</ul>	
			</div>		

				<div class="nav-top">
					<nav class="navbar navbar-default">
					
					<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						

					</div> 
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav ">
							<li class=" active"><a href="<?php echo base_url();?>index.php/user" class="hyper "><span>Home</span></a></li>
							<li><a href="<?php echo base_url();?>index.php/user/contact" class="hyper"><span>Contact Us</span></a></li>
						</ul>
					</div>
					</nav>
					 <div class="cart" >
					 	<a href="<?php echo base_url();?>index.php/user/cart">
					 		<?php 
					 		$cartCount = 0;
					 		if (!empty($this->session->userdata('cart'))) {
					 			foreach ($this->session->userdata('cart') as $c) {
					 				$cartCount += $c['JUMLAH'];
					 			}
					 		}
					 		?>
						<span class="fa fa-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"><?= $cartCount ?></span></span></a>
					</div>
					<div class="clearfix"></div>
				</div>
					
				</div>			
</div>
  <!---->
    <script>window.jQuery || document.write('<script src="<?php echo base_url();?>assets/user/template/js/vendor/jquery-1.11.1.min.js"><\/script>')</script>
    <script src="<?php echo base_url();?>assets/user/template/js/jquery.vide.min.js"></script>

<!--content-->
	<?php
	if (isset($content_view)) {
	 	$this->load->view($content_view);
	 } 
	?>
<!--footer-->
<div class="footer">
	<div class="container">
		<div class="col-md-4 footer-grid">
			<h3>About Us</h3>
			<p>Kami adalah penyedia kopi bubuk premium dengan kualitas tinggi. Diolah langsung dari biji kopi dengan teknologi canggih, kami menawarkan sensasi khas yang asli.</p>
		</div>
		<div class="col-md-4 footer-grid ">
			<h3>Menu</h3>
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="contact.html">Contact</a></li>
			</ul>
		</div>
		<div class="col-md-4 footer-grid">
			<h3>My Account</h3>
			<ul>
				<?php if ($this->session->userdata('logged_in') == TRUE){?>
						<li><a href="<?= base_url('index.php/user/history');?>" >Order History</a></li>
						<li><a href="<?php echo base_url()?>index.php/user/logout" >Log out</a></li>
					<?php } else {?>
						<li><a href="<?php echo base_url()?>index.php/user/login" ><i class="fa fa-user" aria-hidden="true"></i>Login</a></li>
						<li><a href="<?php echo base_url()?>index.php/user/register" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Register</a></li>
					<?php } ?>
			</ul>
		</div>
		<div class="clearfix"></div>
			<div class="footer-bottom">
					<ul class="social-fo">
						<li><a href="facebook.com/MasestaCoffee" class=" face"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="https://www.instagram.com/masestacoffee/" class=" dri"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				<div class=" address">
					<div class="col-md-4 fo-grid1">
							<p><i class="fa fa-home" aria-hidden="true"></i>Perum Spring Hill Garden, Jl. Soka no. 21 Pakis, Malang 65164</p>
					</div>
					<div class="col-md-4 fo-grid1">
							<p><i class="fa fa-phone" aria-hidden="true"></i>+62 8233 155 6325 or +62 8124 966 5966</p>	
					</div>
					<div class="col-md-4 fo-grid1">
						<p><a href="mailto:masestacoffee@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i>masestacoffee@gmail.com</a></p>
					</div>
					<div class="clearfix"></div>
					
					</div>
			</div>
		<div class="copy-right">
			<p> &copy; All Rights Reserved </a></p>
		</div>
	</div>
</div>
<!-- //footer-->

<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<!-- for bootstrap working -->
		<script src="<?php echo base_url();?>assets/user/template/js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<script type='text/javascript' src="<?php echo base_url();?>assets/user/template/js/jquery.mycart.js"></script>
  <!-- <script type="text/javascript">
  $(function () {

    var goToCartIcon = function($addTocartBtn){
      var $cartIcon = $(".my-cart-icon");
      var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
      $addTocartBtn.prepend($image);
      var position = $cartIcon.position();
      $image.animate({
        top: position.top,
        left: position.left
      }, 500 , "linear", function() {
        $image.remove();
      });
    }

    $('.my-cart-btn').myCart({
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      affixCartIcon: true,
      checkoutCart: function(products) {
        $.each(products, function(){
          console.log(this);
        });
      },
      clickOnAddToCart: function($addTocart){
        goToCartIcon($addTocart);
      },
      getDiscountPrice: function(products) {
        var total = 0;
        $.each(products, function(){
          total += this.quantity * this.price;
        });
        return total * 1;
      }
    });

  });
  </script>
		 -->
</body>
</html>