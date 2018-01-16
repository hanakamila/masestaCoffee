<div style="background-image: url(<?php echo base_url();?>assets/user/template/images/bann.jpg);">
    <div class="container">
		<div class="banner-info">
			<h3>Your Premium Coffee on the Go</h3>	
			<div class="search-form">
				<form action="#" method="post">
					<input type="text" placeholder="Search..." name="Search...">
					<input type="submit" value=" " >
				</form>
			</div>		
		</div>	
    </div>
</div>

    <script>window.jQuery || document.write('<script src="<?php echo base_url();?>assets/user/template/js/vendor/jquery-1.11.1.min.js"><\/script>')</script>
    <script src="<?php echo base_url();?>assets/user/template/js/jquery.vide.min.js"></script>

<div class="product">
		<div class="container">
			<div class="spec ">
				<h3>Check Out Our Products</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
			</div>
				<div class=" con-w3l">
					<?php foreach ($produk as $p) { ?>
						<div class="col-md-3 pro-1">
								<div class="col-m">
								<a href="<?php echo base_url()?>index.php/user/detail" data-toggle="modal" data-target="#<?= $p->KD_KOPI; ?>" class="offer-img">
										<img src="<?php echo base_url().'upload/'.$p->FOTO;?>" class="img-responsive" alt="">
									</a>
									<div class="mid-1">
										<div class="women">
											<h6><a href="<?php echo base_url()?>index.php/user/detail"><?= $p->NAMA_KOPI; ?></a></h6>							
										</div>
										<div class="mid-2">
											<p ><em class="item_price">Rp <?= $p->HARGA; ?></em></p>
											  <div class="block">
												<div class="starbox small ghosting"> </div>
											</div>
											<div class="clearfix"></div>
										</div>
											<div class="add add-2">
												<a href="<?= base_url('user/addToCart/').$p->KD_KOPI; ?>">
											  <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="product 1" data-summary="summary 1" data-price="6.00" data-quantity="1" data-image="images/of16.png">Add to Cart</button>
											  </a>
										</div>
									</div>
								</div>
							</div>
					<?php } ?>
							<div class="clearfix"></div>
						 </div>
		</div>
	</div>