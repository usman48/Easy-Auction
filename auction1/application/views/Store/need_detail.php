<?php $this->load->view('includes/storeheader.php');?>
<head><title>Post Detail</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
			 <script type="text/javascript" src="<?php echo base_url();?>assets/h_assets/js/TimeCircles.js"></script>
			 <link rel="stylesheet" href="<?php echo base_url();?>assets/h_assets/css/TimeCircles.css" />
</head>
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>
		<a href="product.html" class="stext-109 cl8 hov-cl1 trans-04">
			Men
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>
		<span class="stext-109 cl4">
			Customer Needs
		</span>
	</div>
</div>
<!-- Product Detail -->
<section class="sec-product-detail bg0 p-t-65 p-b-60">
	<?php foreach ($needs as $need):
		if ($need->product_id==$p_id) {?>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

								<div class="slick3 gallery-lb">
									<?php foreach ($pimages as $pimage):
										if ($p_id==$pimage->post_id) { ?>
											<div class="item-slick3" data-thumb="<?php echo base_url();?>uploads/customers_needs/<?php echo $pimage->image ?>">
												<div class="wrap-pic-w pos-relative">
													<img style="background-color:#e5e6e8;" src="<?php echo base_url();?>uploads/customers_needs/<?php echo $pimage->image ?>" alt="IMG-PRODUCT">

													<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo base_url();?>uploads/customers_needs/<?php echo $pimage->image ?>">
														<i class="fa fa-expand"></i>
													</a>
												</div>
											</div>

										<?php } endforeach;?>

									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6 col-lg-5 p-b-30">
							<div class="p-r-50 p-t-5 p-lr-0-lg">
								<a style="color:red;" class="pull-right" href="" data-toggle="modal" data-target="#modal-report">Report</a>
								<h4 class="mtext-105 cl2 js-name-detail p-b-5">
									<?php echo $p_name=$need->product_name;?>
								</h4>

								<p class="stext-102 cl3 p-b-20">
									<?php echo $need->product_company;?>
								</p>

								<span class="mtext-106 cl2">
									RS.
									<?php echo $need->product_price;
									$dt=new DateTime("now", new DateTimeZone('Asia/Karachi'));
  								$date2=$need->date;

									$date1=$dt->format('Y-m-d H:i:s');
  								if($date2>$date1)
									{
										echo '<div id="DateCountdown" data-date="'.$need->date.'" style="width: 500px; height: 125px; padding: 0px; box-sizing: border-box; background-color: #E0E8EF"></div>';
									}?>

								</span>

								<p class="stext-102 cl3 p-t-23">
									<?php echo $need->product_description;?>
								</p>

								<p class="stext-102 cl3 p-t-23">
									Quanitity Needed:&nbsp; <b>
										<?php  if ($need->quantity==0) {?>
											<b style="color:red;">Out of Stock</b>
										<?php } else{?>
											<?php echo $need->quantity;?></b>
										<?php } ?>
									</p>
									<?php foreach ($fetch_users as $user):
										if ($user->ID==$need->upload_by) {
											$s_name=$user->fullname;
											$s_id=$user->ID;
										}
									endforeach; ?>
									<p class="stext-102 cl3 p-t-23">
										Post By: &nbsp; <a href="<?php echo base_url();?>store/profile/<?php echo $s_id?>"><b><?php echo $s_name; ?></b></a>
									</p>

									<p class="stext-102 cl3 p-t-23">
										Date Added:&nbsp; <b><?php echo $need->upload_date;?></b>
									</p>

									<p class="stext-102 cl3 p-t-5">
										Location:&nbsp; <b><?php echo $need->location;?></b>
									</p>

									<!--  -->
									<div class="p-t-25">
										<div class="size-100 flex-w flex-m respon6-next m-t-20">
											<?php
											if ($i==1) {
												if($name->usertype==3 ){ ?>
													<button class="flex-c-m m-l-25 stext-101 cl0 size-101 bg5 bor1 hov-btn1 trans-04" data-toggle="modal" data-target="#modal-bid">
														Bid History
													</button>

												<?php }
												elseif ($name->usertype==2) { ?>
													<button class="flex-c-m m-l-25 stext-101 cl0 size-101 bg5 bor1 hov-btn1 trans-04" data-toggle="modal" data-target="#modal-addproduct">
														Add Bid
													</button>
													<button class="flex-c-m m-l-25 stext-101 cl0 size-101 bg5 bor1 hov-btn1 trans-04" data-toggle="modal" data-target="#modal-bid">
														Bid History
													</button>
												<?php }} else {  ?>
													<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 trans-04">
														Sign in Buy
													</button>
												<?php }} endforeach; ?>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</section>


					<!-- Related Products -->
					<section class="sec-relate-product bg0 p-t-45 p-b-105">
						<div class="container">
							<div class="p-b-45">
								<h3 class="ltext-106 cl5 txt-center">
									Related Customer's Needs
								</h3>
							</div>

							<!-- Slide2 -->
							<div class="wrap-slick2">
								<div class="slick2">
									<?php foreach ($fetch_RelatedNeeds as $need): if($p_id!=$need->product_id){ ?>
										<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
											<!-- Block2 -->
											<div class="block2">
												<div class="block2-pic hov-img0">
													<?php foreach ($f_image as $image):
														if ($need->product_id==$image->post_id)
														{ ?>
															<a href="<?php echo base_url();?>store/n_detail/<?php echo $need->product_id;?>/<?php echo $need->product_name;?>/<?php echo $need->product_company;?>">
																<img style="background-color:#e5e6e8; width:266px; height:300px;" src="<?php echo base_url();?>uploads/customers_needs/<?php echo $image->image;?>" alt="IMG-PRODUCT"></a>
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
									</div>
								</div>
							</section>


							<!-- Back to top -->
							<div class="btn-back-to-top" id="myBtn">
								<span class="symbol-btn-back-to-top">
									<i class="zmdi zmdi-chevron-up"></i>
								</span>
							</div>


							<div class="modal fade modal-info" id="modal-addproduct">

								<div class="modal-dialog modal-lg m-t-150 ">

									<div class="modal-content col-md-12 bg-light">
										<div class="modal-header"><h4>Place Your BID</h4></div>

										<section class="ftco-section col-md-12">
											<div class="container col-md-12">
												<div id="existing" style="display:block;">
													<?php echo form_open_multipart('store/bidbyexisting','class="billing-form"');?>
													<br>
													<h3  class="mb-4 billing-heading">Existing Product</h3>
													<select class="form-control" name="new_id_product" required>
														<option value=""> Please Select Product</option>
														<?php foreach ($fetch_Relatedproducts as $p):
															if ($this->session->userdata('userID')==$p->upload_by) {?>
																<option value="<?php echo $p->product_id;?>"><?php echo $p->product_name;?></option>
															<?php } endforeach; ?>
														</select>
														<input type="hidden"name="bid_by" value="<?php echo $this->session->userdata('userID')?>">
														<input type="hidden"name="post_id" value="<?php echo $p_id; ?>">
														<input type="hidden"name="post_by" value="<?php echo $s_id; ?>">
														<br><br>
														<div class="col-md-12" >
															<div class="form-group">
																<input type="submit" class="btn btn-primary col-md-2">
																<a class="pull-right" href="#existing" onclick="myfunction()">Add/Existing Product</a>
															</div>

														</div>
														<?php echo form_close();  ?>
													</div>
													<div id="add" style="display:none;">
														<?php echo form_open_multipart('seller/addpost','class="billing-form"');?>
														<input type="hidden" name="" value="<?php echo $p_id ?>">
														<br><br>
														<h3 class="mb-4 billing-heading">Add Product</h3>
														<div class="row align-items-end">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="firstname">Product Name</label>
																	<input type="text" class="form-control" name="product_name">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="lastname">Product Model</label>
																	<?php echo form_input(['type'=>'text','name'=>'product_model','class'=>'form-control','placeholder'=>'e.g A320','required'=>'true'])?>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="lastname">Product Company</label>
																	<?php echo form_input(['type'=>'Text','name'=>'product_company','class'=>'form-control','placeholder'=>'e.g Apple','required'=>'true']);?>
																</div>
															</div>

															<div class="col-md-6">
																<div class="form-group">
																	<label for="lastname">Price</label>
																	<input type="text" class="form-control" onkeypress='validate(event)' onkeyup ="addComma(this);"  name="product_price" placeholder="e.g 2,000 Rs">
																</div>
															</div>
															<div class="w-100"></div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="country">Category</label>
																	<div class="select-wrap">
																		<select name="category" id="" class="form-control">
																			<option value="">Please Select</option>
																			<option value="mobiles">Mobiles</option>
																			<option value="wears">Wears</option>
																			<option value="electronics">Electronics</option>
																			<option value="vehicles">Vehicles</option>
																			<option value="Others">Others</option>
																		</select>
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="country">Quantity</label>
																	<input type="text" name="quantity" onkeypress='validate(event)' onkeyup ="addComma(this);" class="form-control" placeholder="e.g 10" required>
																</div>
															</div>
															<div class="w-100"></div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="streetaddress">Location</label>
																	<input type="text" class="form-control" name="location" placeholder="e.g in Gujrat">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="streetaddress">Add Images</label>
																	<?php
																	echo form_upload(array(
																		'multiple'=>'',
																		'name'=>'file_upload[]',
																		'required'=>'true'
																	));
																	?>
																</div>
															</div>
															<div class="col-md-12" >
																<div class="form-group">
																	<label for="streetaddress">Product Description</label>
																	<textarea class="form-control" name="product_description" rows="5" placeholder="Write something about product"></textarea>
																</div>
															</div>
															<input type="hidden" name="upload_date" value="<?php echo date('d-M-Y'); ?>"/>
															<input type="hidden" name="upload_by" value="<?php echo $name->ID; ?>"/>
															<input type="hidden" name="bid_by" value="<?php echo $name->ID; ?>"/>
															<input type="hidden" name="post_by" value="<?php echo $s_id; ?>"/>
															<input type="hidden" name="post_id" value="<?php echo $p_id; ?>"/>
															<input type="hidden" name="status" value="1"/>
															<div class="col-md-12" >
																<div class="form-group">
																	<input type="submit" class="btn btn-primary col-md-3">
																	<a class="pull-right" href="#existing" onclick="myfunction()">Add/Existing Product</a>
																</div>
															</div>
														</div>
														<?php echo form_close();?>
													</div>
												</div>

											</section>
										</div>
										<!-- /.modal-content -->
									</div>
									<!-- /.modal-dialog -->
								</div>



								<div class="modal fade modal-info" id="modal-bid">
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
															foreach ($fetch_bids as $fb):
																if($fb->post_id==$p_id){
																	foreach ($fetch_users as $fu) {
																		if ($fb->bid_by==$fu->ID && $p_id==$fb->post_id) {
																			$seller_name=$fu->fullname;
																			$i++;

																		}
																	}?>
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




											<div class="modal fade modal-info" id="modal-report">
												<div class="modal-dialog modal-lg m-t-150">
													<div class="modal-content col-md-12 bg-light">
														<section class="ftco-section col-md-12">
															<div class="container col-md-12">

																<?php echo form_open('store/report_product');?>
																<br>
																<h3 class="mb-4 billing-heading">Report Product</h3>
																<div class="row align-items-end">


																	<div class="col-md-6">
																		<div class="form-group">
																			<label>Product Name</label>
																			<input type="text" class="form-control" value="<?php echo $p_name; ?>" name="productname" disabled>
																		</div>
																	</div>
																	<div class="col-md-6">
																		<div class="form-group">
																			<label>Seller Name</label>
																			<input type="text" class="form-control" value="<?php echo $s_name ?>" name="sellername" disabled>
																		</div>
																	</div>

																	<div class="col-md-12" >
																		<div class="form-group">
																			<label>Reason</label>
																			<textarea class="form-control col-lg-12" name="comments" rows="5"></textarea>
																		</div>
																	</div>
																	<input type="hidden" name="item_id" value="<?php echo $p_id ?>">
																	<input type="hidden" name="uploaded_by" value="<?php echo $s_id ?>">
																	<input type="hidden" name="reported_by" value="<?php echo $this->session->userdata('userID');?>">
																	<input type="hidden" name="reported_date" value="<?php echo date('d-m-Y') ?>">
																	<input type="hidden" name="item_type" value="2">
																	<input type="hidden" name="status" value="1">
																	<?php $this->session->set_userdata('previous_url', current_url());?>
																	<div class="col-md-6" >
																		<div class="form-group">
																			<input type="submit" class="btn btn-primary col-md-5">
																		</div>
																	</div>
																</div>
																<?php echo form_close();?>

															</div>
														</section> <!-- .section -->
													</div>
													<!-- /.modal-content -->
												</div>
											</div>
											<script>
									    $(function () {
									        $("#DateCountdown").TimeCircles();
									    });
									</script>

											<?php $this->load->view('includes/storefooter.php');?>
