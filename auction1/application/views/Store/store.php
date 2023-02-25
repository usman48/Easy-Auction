<?php $this->load->view('includes/storeheader.php');?>
<head><title>Easy Auction</title></head>
	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1" >
				<div class="item-slick1" style="background-image: url(<?php echo base_url();?>assets/h_assets/images/slider4.jpg); height:700px;">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5" >
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span style="color:white;" class="ltext-101 cl2 respon2">
									A New Start
								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 style="color:white;" class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									Easy Auction
								</h2>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="<?php echo base_url(); ?>" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(<?php echo base_url();?>assets/h_assets/images/slider5.jpg);height:700px;">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span style="color:white;" class="ltext-101 cl2 respon2">
									Fulfill Customer Needs
								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
								<h2 style="color:white;" class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									Place Bids
								</h2>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								<a href="<?php echo base_url(); ?>" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


				<?php if (!empty($top_products)) {?>

					<!-- Top Products -->
					<section class="sec-relate-product bg0 p-t-45 p-b-105">
						<div class="container">
							<div class="p-b-45">
								<h3 class="ltext-106 cl5 txt-center">
									Top Products
								</h3>
							</div>
<hr>
							<!-- Slide2 -->
							<div class="wrap-slick2">
								<div class="slick2">
									<?php foreach ($top_products as $tp):
										foreach ($products as $product) {
											if ($product->product_id==$tp->product_id) { ?>

										<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
											<!-- Block2 -->
											<div class="block2">
												<div class="block2-pic hov-img0">
													<?php foreach ($f_image as $image):
														if ($tp->product_id==$image->post_id)
														{ ?>
															<a href="<?php echo base_url();?>store/p_detail/<?php echo $tp->product_id;?>/<?php echo $product->product_name;?>/<?php echo $product->product_company;?>">
																<img  style=" max-width: 400px; max-height:300px;" src="<?php echo base_url();?>uploads/shopkeepers_products/<?php echo $image->image;?>" alt="IMG-PRODUCT"></a>
															<?php } endforeach;?>
														</div>

														<div class="block2-txt flex-w flex-t p-t-14">
															<div class="block2-txt-child1 flex-col-l ">
																<a href="<?php echo base_url();?>store/p_detail/<?php echo $product->product_id;?>/<?php echo $product->product_name;?>/<?php echo $product->product_company;?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
																	<?php echo $product->product_name;?>
																</a>

																<span class="stext-105 cl3">
																	RS. <?php echo $product->product_price;?>
																</span>
															</div>
														</div>
													</div>
												</div>
											<?php } } endforeach;?>
										</div>
									</div><hr>
								</div>
							</section><?php } ?>


<!-- Top Seller's Products -->


	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					New Collection
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".mobiles">
						Mobiles
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".vehicles">
						Vehicles
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".wears">
						Wears
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".electronics">
						Electronics
					</button>

				</div>

				<div class="flex-w flex-c-m m-tb-10">

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>

				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>
						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" id="search" placeholder="Search">
					</div>
				</div>
			</div>

			<div class="row isotope-grid " id="parent">

				<?php foreach ($products as $product):
    if ($product->status==1) {
     ?>


				<div class="col-sm-3 col-md-3 col-lg-3 p-b-30 trans-02 box isotope-item  <?php echo $product->category;?>">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic">
							<?php foreach ($f_image as $image):
			if ($product->product_id==$image->post_id)
			 { ?>
							<a href="<?php echo base_url();?>store/p_detail/<?php echo $product->product_id;?>/<?php echo $product->product_name;?>/<?php echo $product->product_company;?>">
								<img  style=" max-width: 400px; max-height:300px;" src="<?php echo base_url();?>uploads/shopkeepers_products/<?php echo $image->image;?>" alt="IMG-PRODUCT"></a>
						<?php } endforeach;?>

						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="<?php echo base_url();?>store/p_detail/<?php echo $product->product_id;?>/<?php echo $product->product_name;?>/<?php echo $product->product_company;?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<p class="name"><?php echo $product->product_name;?></p>
								</a>
								<div class="block2-txt-child1 flex-col-1">
									<p class="comp"><?php echo $product->product_company;?></p>
								</div>

								<span class="stext-105 cl3">
									RS. <?php echo $product->product_price;?>
								</span>
							</div>
						</div>
					</div>
				</div>
<?php } endforeach;?>

			</div>

			<div class="flex-c-m flex-w w-full p-t-38">
					<?= $this->pagination->create_links(); ?>
			</div>
	</div>
	</section>
		<?php if (!empty($top_sellers)) {?>
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Top Seller
				</h3>
			</div>
<hr>
			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					<?php foreach ($top_sellers as $ts):
						foreach ($users as $user) {
							if ($ts->seller_id==$user->ID && $user->usertype==2) { ?>
						<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-pic hov-img0">
											<a href="<?php echo base_url();?>store/profile/<?php echo $user->ID;?>">
												<img style="background-color:#e5e6e8; max-width: 400px; max-height:300px;" src="<?php echo base_url();?>uploads/user_images/<?php echo $user->user_img; ?>" alt="IMG-PRODUCT">
											</a>
										</div>

										<div class="block2-txt flex-w flex-t p-t-14">
											<div class="block2-txt-child1 flex-col-l ">
												<a href="<?php echo base_url();?>store/profile/<?php echo $user->ID;?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
													<?php echo $user->fullname;?>
												</a>
											</div>
										</div>
									</div>
								</div>
							<?php } } endforeach;?>
						</div>
					</div><hr>
				</div>

			</section><?php } ?>




	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<?php $this->load->view('includes/storefooter.php');?>
