   <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >Checkout</h3>
		<h4><a href="index.html">Home</a><label>/</label>Checkout</h4>
		<div class="clearfix"> </div>
	</div>
</div>

	<!-- contact -->
<div class="check-out">	 
	<div class="container">	 
			<div class="spec ">
				<h3>Checkout Form</h3>
					<div class="ser-t">
						<b></b>
						<span><i></i></span>
						<b class="line"></b>
					</div>
			</div>
			<form action="<?= base_url('user/order'); ?>" method="post">
		<div class="key">
			<i class="fa fa-user" aria-hidden="true"></i>
			<input  type="text" value="<?php echo $this->session->userdata('nama_user'); ?>" name="name" readonly>
			<div class="clearfix"></div>
		</div>
						<?php
						$kd_beli = 0; $total = 0;
						for ($i=0; $i < count($cart); $i++) { 
							$kd_beli += ($cart[$i]['KD_KOPI'] + $cart[$i]['KD_USER']) * $cart[$i]['JUMLAH'];
							$total += $cart[$i]['JUMLAH'] * $cart[$i]['HARGA'];
						}
						$kd_beli = date('ymd').$kd_beli.date('B');
						?>
						<div class="key">
							<i class="fa fa-barcode" aria-hidden="true"></i>
							<input  type="text" value="<?= $kd_beli; ?>" name="kd_beli" readonly>
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-calendar" aria-hidden="true"></i>
							<input  type="text" value="<?= date('d-m-Y'); ?>" name="tgl_beli" readonly>
							<div class="clearfix"></div>
						</div>
						<div class="key sr-only">
							<i class="fa fa-dollar" aria-hidden="true"></i>
							<input  type="text" value="<?= $total; ?>" name="total" readonly>
							<div class="clearfix"></div>
						</div>
		<table class="table ">
			<tr>
				<th class="t-head head-it ">Products</th>
				<th class="t-head">Price</th>
				<th class="t-head">Quantity</th>
				<th class="t-head">Total</th>
			</tr>
			<?php if (!empty($cart)) {
	  		foreach ($cart as $c) { ?>
	  		<tr class="cross">
				<td class="ring-in">
				<div class="sed">
					<h5><?= $c['NAMA_KOPI']; ?></h5>
				</div>
				</td>
				<td class="t-data"><?= $c['HARGA']; ?></td>
				<td class="t-data"><div class="quantity"> 
					<div class="quantity-select">            
						<div class="entry value-minus" aria-label="<?= $c['KD_KOPI']; ?>">&nbsp;</div>
							<div class="entry value"><span class="span-1"><?= $c['JUMLAH']; ?></span></div>									
						<div class="entry value-plus active" aria-label="<?= $c['KD_KOPI']; ?>">&nbsp;</div>
					</div></div>
				</td>
				<td class="t-data"><?= $c['HARGA']*$c['JUMLAH'] ?></td>
			</tr>
	  	<?php } ?>
	  	<tr>
				<td class="t-data" colspan="3" align="center">Total Harga</td>
				<td class="t-data"><?= $total; ?></td>
			</tr>
	 		<?php } else { ?>
	  		<tr>
		  		<td colspan="3">Cart Kosong</td>
		  	</tr>
	  	<?php } ?>
		</table>
		<div class="add add-2">
				<button type="submit" class="btn btn-danger my-cart-btn my-cart-b" data-image="images/of16.png">Go Checkout</button>
		</div>
		</form>
	</div>
</div>
		 				
	<!--quantity-->
			<script>
			$('.value-plus').on('click', function(){
				var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1, index = $(this).attr('aria-label');
				$.ajax({
					url: "<?= base_url('user/changeCart/'); ?>"+index+"/plus",
					type: 'GET'
				}).done(function(e){
					if (e == 1) {
						divUpd.text(newVal);
					}
				});
			});

			$('.value-minus').on('click', function(){
				var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1, index = $(this).attr('aria-label');
				if(newVal>=1) {
					$.ajax({
						url: "<?= base_url('user/changeCart/'); ?>"+index+"/minus",
						type: 'GET'
					}).done(function(e){
						if (e == 1) {
							divUpd.text(newVal);
						}
					});
				}
			});
			</script>
			<!--quantity-->