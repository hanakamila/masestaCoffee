	</div>
		<div class="container">
			<div class="row wrap">
				<div class="col-md-12 gallery"> 
						<div class="camera_wrap camera_white_skin" id="camera_wrap_1">
							<div data-thumb="" data-src="<?php echo base_url();?>assets/user/images/slides/blank.gif">
								<div class="img-responsive camera_caption fadeFromBottom">
									<h2>Masesta Coffee</h2>
								</div>
							</div>
							<div data-thumb="" data-src="<?php echo base_url();?>assets/user/images/slides/blank.gif">
								<div class="img-responsive camera_caption fadeFromBottom">
									<h2>Kopi Berkualitas Tinggi</h2>
								</div>
							</div>
							<div data-thumb="" data-src="<?php echo base_url();?>assets/user/images/slides/blank.gif">
								<div class="img-responsive camera_caption fadeFromBottom">
									<h2>Diolah Dari Biji Kopi Premium</h2>
								</div>
							</div>
						</div><!-- #camera_wrap_1 -->
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row aboutUs">
			<div class="col-md-12 ">
				<h3>Produk Kami</h3>
			</div>
		</div>
	</div>

		<div class="portfolio_block columns3   pretty" data-animated="fadeIn">	
					<?php foreach ($produk as $p) { ?>
						<div class="element col-sm-4   gall branding">
						<a class="plS" href="<?php echo base_url().'upload/'.$p->FOTO;?>" rel="prettyPhoto[gallery2]">
							<img class="img-responsive picsGall" src="<?php echo base_url().'upload/'.$p->FOTO;?>" alt="pic1 Gallery"/>
						</a>
						<div class="view project_descr ">
							<h3><a href="#"><?= $p->NAMA_KOPI; ?></a></h3>
							<ul>
								<li><a href="<?= base_url('user/addToCart/').$p->KD_KOPI; ?>" class="subS"><i class="fa fa-shopping-cart"></i>Beli</a></li>
							</ul>
						</div>
					</div>
					<?php } ?>
			</div>
    
    <!--about start-->    
    
    <div id="about">
    	<div class="line2">
			<div class="container">
				<div class="row Fresh">
					<div class="col-md-4 Des">
						<i class="fa fa-heart"></i>
						<h4>Berkualitas Tinggi</h4>
						<p>Nulla consectetur ornare nibh, a auctor mauris scelerisque eu proin nec urna quis justo adipiscing auctor ut auctor. feugiat </p>
					</div>
					<div class="col-md-4 Ver">
						<i class="fa fa-cog"></i>
						<h4>Very Flexible</h4>
						<p>Nulla consectetur ornare nibh, a auctor mauris scelerisque eu proin nec urna quis justo adipiscing auctor ut auctor. feugiat </p>
					</div>
					<div class="col-md-4 Fully">
						<i class="fa fa-tablet"></i>
						<h4>Fully Responsive</h4>
						<p>Nulla consectetur ornare nibh, a auctor mauris scelerisque eu proin nec urna quis justo adipiscing auctor ut auctor. feugiat </p>
					</div>		
				</div>
			</div>
		</div>
 	
		<div class="container">
			<div class="row">
				<div class="col-md-12 hr1">
					<hr/>
				</div>
			</div>
		</div>		
		
		<div class="container">
			<div class="row aboutUs">
				<div class="col-md-12 ">
					<h3>Testimoni</h3>
				</div>
			</div>
		</div>
		
		<div style="position: relative;">
		
			<div class="container">
				<div class="row about">
					<div class="col-md-6">
						<div class="about1">
						<img class="pic1Ab" src="images/picAbout/aboutP1.png">
							<h3>Anna Smith, Company Inc.</h3>
							<p>Nulla consectetur ornare nibh, a auctor mauris scelerisque eu proin nec urna quis justo adipiscing auctor ut auctor feugiat fermentum quisque eget pharetra, felis et venenatis. aliquam, nulla nisi lobortis elit ac.</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="about2">
						<img class="pic2Ab" src="images/picAbout/aboutP2.png">
							<h3>John Doe, Company Inc.</h3>
							<p>Consectetur ornare nibh, a auctor mauris scelerisque eu proin nec urna quis justo, adipiscing auctor, ut auctor feugiat fermentum nec quisque eget pharetra, felis et venenatis aliquam, nulla nisi lobortis elit, ac luctus.</p>
						</div>
					</div>
				</div>
			</div>
		
			<div class="horL"></div>
		
			<div class="container">
				<div class="row about">
					<div class="col-md-6">
						<div class="about1">
						<img class="pic1Ab" src="images/picAbout/aboutP3.png">
							<h3>Tom Sawyer, Company Inc.</h3>
							<p>A auctor mauris scelerisque eu proin nec urna quis justo adipiscing auctor ut auctor feugiat fermentum quisque eget pharetra, felis et venenatis aliquam, nulla nisi lobortis elit, acnterdum ante feugiat vitae.</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="about2">
						<img class="pic2Ab" src="images/picAbout/aboutP4.png">
							<h3>Sarah White, Company Inc.</h3>
							<p>Ornare nibh a auctor, mauris scelerisque eu proin nec urna nec a quis justo adipiscing auctor ut auctor feugiat fermentum quisque eget pharetra felis et venenatis aliquam, nulla nisi lobortis elit, ac eleifend nisl ante nec lorem. </p>
						</div>
					</div>
				</div>
			</div>
		
		</div>
    </div>

    
    
    <!--contact start-->
    
    <div id="contact">
    	<div class="line5">					
			<div class="container">
				<div class="row Ama">
					<div class="col-md-12">
					<h3>Tetap Update!</h3>
					</div>

					<div class="soc col-md-12">
			<ul>
				<li class="soc2"><a href="#"></a></li>
				<li class="soc3"><a href="#"></a></li>
				<li class="soc5"><a href="#"></a></li>				
			</ul>
		</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-12 hr1">
					<hr/>
				</div>
			</div>
		</div>
		
		

		<div class="container">
			<div class="row">
				<div class="col-md-12 hr1">
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