<?php $this->load->view('includes/storeheader.php');?>
<head><title>Profile</title></head>
<!-- Product -->
<section class="sec-product bg0 p-t-50 p-b-50">
	<div class="container">
		<div class="p-b-32">
			<h3 class="ltext-105 cl5 txt-center respon1">
				<?php foreach($fetch_users as $user):
					if($user->ID==$s_id){ $utype=$user->usertype; ?>
			<?php echo $user->fullname ?>
			</h3>
		</div>


		<div class="row isotope-grid" style="position: relative; height: 2595.75px;">


					<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item" style="position: absolute; left: 0%; top: 0px;">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0 p-b-35">
								<img src="<?php echo base_url();?>uploads/user_images/<?php echo $user->user_img;?>" alt="IMG-PRODUCT">

							</div>
						</div>
					</div>

					<div class="bor6 col-sm-6 col-md-9 col-lg-9 p-b-35 isotope-item" style="position: absolute; left: 33.2599%; top: 0px;">
						<!-- Block2 -->
						<div class="block2 p-t-14 p-lr-15">

							<div class="row">
							<div class="col-md-5">
							<div class="box box-primary">
								<div class="box-header with-border">
									<?php $msg=$this->session->flashdata('msg');
									$color=$this->session->flashdata('color');
									?>
									<h3 class="box-title" style="color:<?php echo $color; ?>">About Me - <?php echo $msg ?></h3>
								</div>
								<br>


								<?php echo form_open('store/update'); ?>
								<div class="box-body">
									<strong><i class="fa fa-phone margin-r-5"></i> Contact No.</strong>
									<input class="form-control" type="text" name="user_phone" maxlength="11" onkeypress="validate(event)" value="<?php echo $sessiondata->user_phone;?>" required >
									<br>
									<strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>
									<input class="form-control" type="text" name="user_address" value="<?php echo $sessiondata->user_address;?>" required>
									<br>
									<strong><i class="fa fa-calendar margin-r-5"></i> Joined On</strong>
									<input class="form-control" type="text" name="reg_date" value="<?php echo $sessiondata->reg_date;?>" disabled >
									<br>
									<input type="hidden" name="ID" value="<?php echo $sessiondata->ID; ?>">
									<button class="btn pull-right btn-primary" type="submit">Update</button>
								</div>
								<?php echo form_close(); ?>
							</div>
							<!-- /.box -->
							</div>
							<div class="col-md-7">
							<div class="box box-primary">
								<div class="box-header with-border">
									<?php $msgs=$this->session->flashdata('msgs');
									$color=$this->session->flashdata('colors');
									?>
									<h3 class="box-title" style="color:<?php echo $color; ?>">Change Password - <?php echo $msgs ?></h3>
								</div>
								<br>
								<!-- /.box-header -->
								<div class="box-body">
									<?php echo form_open('store/update_password'); ?>
									<strong><i class="margin-r-5"></i>Current Password</strong>
									<input class="form-control" type="password" name="c_password" value=""><br>

									<strong><i class="margin-r-5"></i> New Password</strong>

									<input class="form-control" type="password" minlength="8" name="new_password" value=""><br>

									<strong><i class="margin-r-5"></i>Re-type New Password</strong>

									<input class="form-control" type="password" minlength="8" name="renew_password" value=""><br>

									<button class="btn pull-right btn-primary" type="submit">Update</button>
									<?php echo form_close(); ?>

								</div>
								<!-- /.box-body -->
							</div>
							<!-- /.box -->
							</div>
							</div>

						</div>
					</div>
				<?php } endforeach;?>
			</div>
		</div>
	</section>


	<section class="sec-product bg0 p-all-60">
		<div class="container">
			<div class="row isotope-grid m=t-30" style="position: relative; height: 2595.75px;">
				<?php if ($utype==2):  ?>

				<?php foreach($products as $p):
					if($p->upload_by==$s_id) { ?>
						<?php foreach($f_image as $f):
							if($f->id==$p->product_id) { ?>
								<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item" style="position: absolute; left: 66.63%; top: 0px;">
									<!-- Block2 -->
									<div class="block2">
										<div class="block2-pic hov-img0">
											<a href="<?php echo base_url();?>store/p_detail/<?php echo $p->product_id;?>/<?php echo $p->product_name;?>/<?php echo $p->product_company;?>">
											<img style=" max-width: 400px; max-height:300px;" src="<?php echo base_url();?>uploads/shopkeepers_products/<?php echo $f->image;?>" alt="IMG-PRODUCT"></a>
										</div>
										<div class="block2-txt flex-w flex-t p-t-14">
											<div class="block2-txt-child1 flex-col-l ">
												<a href="<?php echo base_url();?>store/n_detail/<?php echo $p->product_id;?>/<?php echo $p->product_name;?>/<?php echo $p->product_company;?>">
													<?php echo $p->product_name;?>
												</a>
												<span class="stext-105 cl3">
													Rs. <?php echo $p->product_price;?>
												</span>
											</div>
										</div>
									</div>
								</div>
							<?php } endforeach;?>
						<?php } endforeach;?>
						<?php endif; ?>
						<?php if ($utype==3): ?>
						<?php foreach($needs as $n):
							if($n->upload_by==$s_id) { ?>
								<?php foreach($cf_image as $f):
									if($f->id==$n->product_id) { ?>
										<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item" style="position: absolute; left: 66.63%; top: 0px;">
											<!-- Block2 -->
											<div class="block2">
												<div class="block2-pic">
													<a href="<?php echo base_url();?>store/n_detail/<?php echo $n->product_id;?>/<?php echo $n->product_name;?>/<?php echo $n->product_company;?>">
													<img style=" width:270px; height:300px;" src="<?php echo base_url();?>uploads/customers_needs/<?php echo $f->image;?>" alt="IMG-PRODUCT">
												</a>
												</div>
												<div class="block2-txt flex-w flex-t p-t-14">
													<div class="block2-txt-child1 flex-col-l ">
														<span>
														<a href="<?php echo base_url();?>store/n_detail/<?php echo $n->product_id;?>/<?php echo $n->product_name;?>/<?php echo $n->product_company;?>">
															<?php echo $n->product_name;?>
														</a>&ensp;&ensp;&ensp;&ensp;
														<?php $this->session->set_userdata('previous_url', current_url());
                                                            if($sessiondata->ID==$n->upload_by){
                                                            ?>
														<a style="color:red;"  href="<?php echo base_url('store/deletepost/'.$n->product_id)?>">Delete</a>
                                                            <?php }?>
													</span>
														<span class="stext-105 cl3">
															Rs. <?php echo $n->product_price;?>
														</span>
													</div>
												</div>
											</div>
										</div>
									<?php } endforeach;?>
								<?php } endforeach;?>
								<?php endif; ?>
					</div>
				</div>
			</section>
			<?php $this->load->view('includes/storefooter.php');?>
