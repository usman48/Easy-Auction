<?php $this->load->view('includes/storeheader.php');?>
<head><title>Customer Needs</title></head>
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Customer Store
				</h3>
				<?php if ($i==1):
					if ($name->usertype==3) { ?>
						<a href="<?php echo base_url();?>store/ad_form" class="pull-right hov1 bor3 trans-08 m-r-32 m-tb-5 how-active" style="color:green; font-size:20px;">
							Add Post
						</a>

				<?php } endif; ?>

				<br><br><br><br>
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

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>
				</div>

			</div>

			<div class="row isotope-grid">
				<?php foreach ($needs as $need):
    if ($need->status==1) {
     ?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $need->category ?>">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<?php foreach ($f_image as $image):
        if ($need->product_id==$image->post_id)
         {

					  ?>

							<a href="<?php echo base_url();?>store/n_detail/<?php echo $need->product_id;?>/<?php echo $need->product_name;?>/<?php echo $need->product_company;?>">
								<img style=" width:270px; height:300px;" src="<?php echo base_url();?>uploads/customers_needs/<?php echo $image->image;?>" alt="IMG-PRODUCT"></a>
								<?php } endforeach;?>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="<?php echo base_url();?>store/n_detail/<?php echo $need->product_id;?>/<?php echo $need->product_name;?>/<?php echo $need->product_company;?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?php echo $need->product_name;?>
								</a>

								<span class="stext-105 cl3">
									RS. <?php echo $need->product_price;?>
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
		<br>
	</div>


<?php $this->load->view('includes/storefooter.php');?>
