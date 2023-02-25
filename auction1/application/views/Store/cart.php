<?php $this->load->view('includes/storeheader.php');?>
<head><title>Shopping Cart</title></head>
<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>
		<span class="stext-109 cl4">
			Shopping Cart
		</span>
	</div>
</div>


<?php $seller_id=0;?>
<!-- Shoping Cart -->
<div class="bg0 p-t-75">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-10- m-lr-auto m-b-50">

				<div class="m-l-25 m-r--38 m-lr-0-xl">

					<h3 class="mtext-109 cl2 p-b-20">
						Cart Details
					</h3>
					<div class="wrap-table-shopping-cart">
						<table class="table-shopping-cart">
							<tr class="table_head">
								<th class="column-1">Image</th>
								<th class="column-2">Product Name</th>
								<th class="column-3">Price</th>
								<th class="column-4">Quantity</th>
								<th class="column-5">Total</th>
								<th class="column-6"></th>
							</tr>
							<?php $gtotal=0;
							$j=0; ?>
							<?php foreach($cart as $c):
								if($c->status==1){
									if($c->user_id==$name->ID) { ?>


										<?php foreach($products as $p):
											if($p->product_id==$c->p_id) {

												$p_name=$p->product_name;
												$p_price=$p->product_price;
												$quantity=$c->quantity;
												//$seller_id[$j]=$p->upload_by;
												$i=0;
												$items[$i]=$c->p_id;
												$i++;
												//$j++;
												?>

												<tr class="table_row">

													<?php foreach($f_image as $f):
														if($f->id==$p->product_id) {

															$image=$f->image;?>
															<td class="column-1">
																<div class="how-itemcart1">
																	<img src="<?php echo base_url();?>uploads/shopkeepers_products/<?php echo $image;?>" alt="IMG">
																</div>
															</td>
														<?php } endforeach;?>

														<td class="column-2"><?php echo $p_name;?></td>
														<td class="column-3">Rs. <?php echo $p_price;?></td>
														<td class="column-4"><?php echo $quantity;?></td>
														<td class="column-5">Rs. <?php $p=str_replace(',','',$p_price);$q=str_replace(',','',$quantity);
														$total=(int)$p*(int)$q; echo $total;?></td>
														<?php $gtotal=$gtotal+$total;?>

														<td class="column-6">
															<?php echo form_open('store/cart_x');?>
															<input type="hidden" value="<?php echo $c->cart_id;?>" name="cart_id">
															<button  class="how-pagination1 trans-03 active-pagination1 m-l-65" data-toggle="modal" data-target="#cart">X
															</button>
															<?php echo form_close();?>
														</td>
													</tr>

												<?php } endforeach;?>
											<?php } } endforeach;?>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="container">
					<div class="row">
						<div class="col-sm-10 col-lg-7 col-xl-10 m-lr-auto m-b-50">

							<?php echo form_open('store/order','class="bg0 p-t-50 p-b-85"');?>
							<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
								<h4 class="mtext-109 cl2 p-b-30">
									Cart Totals
								</h4>



								<div class="flex-w flex-t p-t-15 p-b-30">
									<div class="size-208 w-full-ssm">
										<span class="stext-110 cl2">
											Shipping:
										</span>
									</div>

									<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
										<p class="stext-111 cl6 p-t-2">
											<b>3-5 Business days with Cash On Delivery.</b>
										</p>

										<div class="p-t-15">
											<span class="stext-112 cl8">
												Shipping Address:
											</span>

											<div class="bor8 bg0 m-b-12 m-t-20">
												<input class="stext-111 cl8  size-111 p-lr-15" type="text" name="city" placeholder="City Name" required>
											</div>


											<div class="bor8 bg0 m-b-12">
												<input class="stext-111 cl8  size-111 p-lr-15" type="text" name="street" placeholder="Street Name" required>
											</div>

											<div class="bor8 bg0 m-b-12">
												<input class="stext-111 cl8  size-111 p-lr-15" type="text" name="house" placeholder="House No." required>
											</div>
											<div class="bor8 bg0 m-b-22">
												<input class="stext-111 cl8  size-111 p-lr-15" type="text" name="phone_number" placeholder="Phone No." required>
											</div>

										</div>
									</div>
								</div>

								<div class="flex-w flex-t p-t-27 p-b-33">
									<div class="size-208">
										<span class="mtext-101 cl2">
											Total:
										</span>
									</div>

									<div class="size-209 p-t-1">
										<span class="mtext-110 cl2">
											Rs. <?php echo $gtotal;?>
										</span>
									</div>
								</div>
								<input type="hidden" value="<?php echo $name->ID ;?>" name="order_by">

								<input type="hidden" value="<?php echo $seller_id;?>" name="seller_id[]">


								<button type="submit" class="flex-c-m stext-102 cl0 size-115 bg3 bor14 hov-btn3 p-lr-15
								m-l-265 trans-04 pointer">
								Place Order
							</button>
							<?php echo form_close();?>
						</div>
					</div>
				</div>
			</div>

			<?php $this->load->view('includes/storefooter.php');?>
