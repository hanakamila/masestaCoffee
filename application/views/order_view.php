   <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >Order</h3>
		<h4><a href="index.html">Home</a><label>/</label>Order</h4>
		<div class="clearfix"> </div>
	</div>
</div>

	<!-- contact -->
<div class="check-out">	 
	<div class="container">	 
			<div class="spec ">
				<h3>Order List</h3>
					<div class="ser-t">
						<b></b>
						<span><i></i></span>
						<b class="line"></b>
					</div>
			</div>
				
	<table class="table ">
		<tr>
			<th class="t-head head-it ">Products</th>
			<th class="t-head">Price</th>
			<th class="t-head">Quantity</th>
			<th class="t-head">Total</th>
			<th class="t-head"></th>
		</tr>
		<?php if (!empty($cart)) {
  		foreach ($cart as $c) { ?>
  		<tr class="cross">
			<td class="ring-in">
			<div class="sed">
				<h5><?= $c['NAMA_KOPI']; ?></h5>
			</div>
			<div class="clearfix"> </div>
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
			<td class="t-data">
	      <a type="button" href="<?= base_url('user/removeCart/').$c['KD_KOPI']; ?>" class="btn btn-danger ">
	        <i class="fa fa-trash"></i> Hapus
	      </a>
	  	</td>
		</tr>
  	<?php }
 		} else { ?>
  		<tr>
	  		<td colspan="3">Cart Kosong</td>
	  	</tr>
  	<?php } ?>
	</table>
	<div class="add add-2">
			<a href="<?php echo base_url();?>index.php/user/goOrder">
				<button class="btn btn-danger my-cart-btn my-cart-b" data-image="images/of16.png">Go Checkout</button>
			</a>
	</div>
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