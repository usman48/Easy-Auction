
<!-- Footer -->
<footer class="bg3 p-t-75 p-b-32">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-lg-3 p-b-50">
				<h4 class="stext-301 cl0 p-b-30">
					Categories
				</h4>

				<ul>
					<li class="p-b-10">
						<a href="http://localhost/auction1/store" class="stext-107 cl7 hov-cl1 trans-04">
							Mobiles
						</a>
					</li>

					<li class="p-b-10">
						<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
							Electronics
						</a>
					</li>

					<li class="p-b-10">
						<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
							Wears
						</a>
					</li>

					<li class="p-b-10">
						<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
							Vehicles
						</a>
					</li>
				</ul>
			</div>


			<div class="col-sm-6 col-lg-3 p-b-50">
				<h4 class="stext-301 cl0 p-b-30">
					GET IN TOUCH
				</h4>

				<p class="stext-107 cl7 size-201">
					Any questions? Let us know in University of Lahore, Chenab Campus, Gujrat or call us on +923167228162,
					+923486278470
				</p>

				<div class="p-t-27">
					<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
						<i class="fa fa-facebook"></i>
					</a>

					<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
						<i class="fa fa-instagram"></i>
					</a>

					<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
						<i class="fa fa-pinterest-p"></i>
					</a>
				</div>
			</div>

			<div class="col-sm-6 col-lg-3 p-b-50">
				<h4 class="stext-301 cl0 p-b-30">
					Newsletter
				</h4>

				<form>
					<div class="wrap-input1 w-full p-b-4">
						<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
						<div class="focus-input1 trans-04"></div>
					</div>

					<div class="p-t-18">
						<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
							Subscribe
						</button>
					</div>
				</form>
			</div>
		</div>

	</div>
</footer>

								<div class="modal fade modal-info" id="modal-bid-report">
									<div class="modal-dialog modal-lg m-t-150">
										<div class="modal-content col-md-12 bg-light">
											<div class="container col-md-12">
												<div class="container ">
													<table class="table-shopping-cart">
														<tbody>

															<tr class="table_head">
																<th class="column-1">image</th>
																<th class="column-2">Name</th>
																<th class="column-3">Price</th>
																<th class="column-4">Seller Name</th>
																<th class="column-5">View Product</th>
															</tr>

															<?php $seller_name=0;

															foreach ($AllBids as $fb):
																if($fb->post_by==$name->ID){
																	foreach ($fetch_users as $fu) {
																		if ($fb->bid_by==$fu->ID) {
																			$seller_name=$fu->fullname;
																			$i++;

																		}
																	}

																	?>

																	<?php  foreach ($products as $product) :
																		if ($fb->new_id_product==$product->product_id) { ?>
																			<tr class="table_row">
																				<td class="column-1">
																					<div class="how-itemcart1">

																						<?php  foreach ($f_image as $image):
																							if ($fb->new_id_product==$image->post_id)
																							{ ?>
																								<img src="<?php echo base_url();?>uploads/shopkeepers_products/<?php echo $image->image;?>" alt="IMG">
																							<?php } endforeach; ?>
																						</div>
																					</td>
																					<td class="column-2"><?php echo $product->product_name; ?></td>
																					<td class="column-3"><?php echo "RS ".$product->product_price; ?></td>
																					<td  class="column-4"><?php echo $seller_name; ?></td>
																				<?php } endforeach;?>
																				<td class="column-5">
																					<a href="<?php echo base_url();?>store/p_detail/<?php echo $fb->new_id_product;?>/<?php echo $product->product_name;?>/<?php echo $product->product_company;?>"><button class="flex-c-m m-l-25 stext-106 c10 size-105 bg1 bor1 hov-btn1 trans-04">
																						View
																					</button></a>
																				</td>
																			</tr>
																		<?php } endforeach; ?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
													<!-- /.modal-content -->
												</div>
												<!-- /.modal-dialog -->
											</div>
<!--===============================================================================================-->
<script src="<?php echo base_url();?>assets/h_assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url();?>assets/h_assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url();?>assets/h_assets/vendor/bootstrap/js/popper.js"></script>
<script src="<?php echo base_url();?>assets/h_assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url();?>assets/h_assets/vendor/select2/select2.min.js"></script>
<script>
$(".js-select2").each(function(){
	$(this).select2({
		minimumResultsForSearch: 20,
		dropdownParent: $(this).next('.dropDownSelect2')
	});
})
</script>
<!--===============================================================================================-->
<script src="<?php echo base_url();?>assets/h_assets/vendor/daterangepicker/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/h_assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url();?>assets/h_assets/vendor/slick/slick.min.js"></script>
<script src="<?php echo base_url();?>assets/h_assets/js/slick-custom.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url();?>assets/h_assets/vendor/parallax100/parallax100.js"></script>
<script>
$('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script src="<?php echo base_url();?>assets/h_assets/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<script>
$('.gallery-lb').each(function() { // the containers for all your galleries
	$(this).magnificPopup({
		delegate: 'a', // the selector for gallery item
		type: 'image',
		gallery: {
			enabled:true
		},
		mainClass: 'mfp-fade'
	});
});
</script>
<!--===============================================================================================-->
<script src="<?php echo base_url();?>assets/h_assets/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url();?>assets/h_assets/vendor/sweetalert/sweetalert.min.js"></script>
<script src="<?php echo base_url();?>assets/h_assets/js/filter.js"></script>
<script>


/*---------------------------------------------*/

$('.js-addcart-detail').each(function(){
	var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
	$(this).on('click', function(){
		swal(nameProduct, "is Added to Cart !", "success");
	});
});

$('.js-addbid-detail').each(function(){
	$(this).on('click', function(){
		swal( "is Added to Bid !", "success");
	});
});

</script>
<!--===============================================================================================-->
<script src="<?php echo base_url();?>assets/h_assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
$('.js-pscroll').each(function(){
	$(this).css('position','relative');
	$(this).css('overflow','hidden');
	var ps = new PerfectScrollbar(this, {
		wheelSpeed: 1,
		scrollingThreshold: 1000,
		wheelPropagation: false,
	});

	$(window).on('resize', function(){
		ps.update();
	})
});
</script>
<!--===============================================================================================-->
<script src="<?php echo base_url();?>assets/h_assets/js/main.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/h_assets/js/TimeCircles.js"></script>
<script>
function myfunction(){
	var x=document.getElementById("existing");
	var y=document.getElementById("add");
	if (x.style.display==="block" && y.style.display==="none") {
		x.style.display="none";
		y.style.display="block";
	}
	else {
		x.style.display="block";
		y.style.display="none";
	}
}
</script>
<script>
function addComma(txt) {
	txt.value = txt.value.replace(",", "").replace(/(\d+)(\d{3})/, "$1,$2");
}
</script>
<script>
function validate(evt) {
	var theEvent = evt || window.event;

	// Handle paste
	if (theEvent.type === 'paste') {
		key = event.clipboardData.getData('text/plain');
	} else {
		// Handle key press
		var key = theEvent.keyCode || theEvent.which;
		key = String.fromCharCode(key);
	}
	var regex = /[0-9]|\./;
	if( !regex.test(key) ) {
		theEvent.returnValue = false;
		if(theEvent.preventDefault) theEvent.preventDefault();
	}
}
</script>
<script>
function check_quantity() {
	if (document.getElementById('rquantity').value >=
	document.getElementById('cquantity').value) {
		document.getElementById('addcart').disabled = true;
	} else {
		document.getElementById('addcart').disabled = false;
	}
}
</script>



</body>
</html>
