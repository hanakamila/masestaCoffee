<div class="container">
		<div class="row aboutUs">
			<div class="col-md-12 ">
				<h3>Konfirmasi Pemesanan</h3>
			</div>
		</div>
	</div>
    
    <!--contact start-->
    
    <div id="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-xs-12 forma">
					<form>
						<div style="overflow-x:auto;">
  							<table>
  							<tr>
  								<td><b>Nama Kopi</b></td>
  								<td><b>Jumlah</b></td>
  								<td><b>Ubah Pemesanan</b></td>
  							</tr>
  							<?php if (!empty($cart)) {
  								foreach ($cart as $c) { ?>
  								<tr>
	  								<td><?= $c['NAMA_KOPI']; ?></td>
	  								<td><?= $c['JUMLAH']; ?></td>
	  								<td>
	               						 <a type="button" href="#" class="btn btn-danger ">
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
						</div>

						<div class="cBtn col-xs-12">
							<ul>
								<li class="send"><a href="#"><i class="fa fa-check"></i>Pesan</a></li>
							</ul>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="line7">
			<div class="container">
				<div class="row footer">
					<div class="col-md-12">
						<div class="fr">
						<div style="display: inline-block;">
						</div>
						</div>
					</div>
					<div class="soc col-md-12">
					</div>
				</div>
			</div>
		</div>
		<div class="lineBlack">
			<div class="container">
				<div class="row downLine">
					<div class="col-md-12 text-right">
						<!--input  id="searchPattern" type="search" name="pattern" value="Search the Site" onblur="if(this.value=='') {this.value='Search the Site'; }" onfocus="if(this.value =='Search the Site' ) this.value='';this.style.fontStyle='normal';" style="font-style: normal;"/-->
						<input  id="searchPattern" type="search" placeholder="Search the Site"/><i class="glyphicon glyphicon-search" style="font-size: 13px; color:#a5a5a5;" id="iS"></i>
					</div>
					<div class="col-md-6 text-left copy">
						<p>Copyright &copy; 2018. All Rights Reserved.</p>
					</div>
					<div class="col-md-6 text-right dm">
						<ul id="downMenu">
							<li class="active"><a href="#home">Home</a></li>
							<li><a href="#about">About</a></li>
							<li><a href="#project1">Projects</a></li>
							<li><a href="#news">News</a></li>
							<li class="last"><a href="#contact">Contact</a></li>
							<!--li><a href="#features">Features</a></li-->
						</ul>
					</div>
				</div>
			</div>
		</div>
    </div>		