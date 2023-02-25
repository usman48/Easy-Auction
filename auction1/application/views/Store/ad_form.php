<?php $this->load->view('includes/storeheader.php');?>
<head><title>Ad Posting-Easy Auction</title>
<style>
label{
	font-weight: bold;
}
</style>
</head>
			<div class="containe m-t-50">
			<section class="ftco-section col-md-12">
      			<div class="container col-md-12">

                <?php echo form_open_multipart('store/addpost','class=billing-form') ?>
						<h3 class="mb-4 billing-heading">Add Required Product</h3>
	          				<div class="row align-items-end">
	          					<div class="col-md-6">
												<div class="form-group">
				                	<label for="firstname">I am Looking For</label>
				                  <input name="product_name" type="text" class="form-control" placeholder="e.g Iphone X" required>
				                </div>
	              				</div>
	              				<div class="col-md-6">
													<div class="form-group">
					                	<label for="firstname">Product Company</label>
					                  <input name="product_company" type="text" class="form-control" placeholder="e.g Apple" required>
					                </div>
                				</div>
												<div class="col-md-6">
				                  <div class="form-group">
				                    <label for="firstname">Product Model</label>
				                    <input name="product_model" type="text" class="form-control" placeholder="e.g Iphone X or A301" required>
				                  </div>
				                </div>
												<div class="col-md-6">
												 <div class="form-group">
													 <label for="lastname">Price Range</label>
													 <input type="text" onkeyup="addComma(this);" onkeypress="validate(event)" class="form-control" name="product_price" placeholder="Rs . 15,000" required>
												 </div>
												</div>
												<div class="col-md-6">
				                 <div class="form-group">
				                   <label for="lastname">Quantity</label>
				                   <input type="number"  class="form-control" name="quantity" placeholder="1" required min="1" max="1000">
				                 </div>
				                </div>
												<div class="col-md-6">
						            	<div class="form-group">
						            		<label for="country">Category</label>
						            		<div class="select-wrap">
						                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
						                  <select name="category" id="" class="form-control" required>
				                        <option value="">Please Select Option</option>
						                  	<option value="mobiles">Mobiles</option>
						                    <option value="wears">Wears</option>
						                    <option value="electronics">Electronics</option>
						                    <option value="vehicles">Vehicles</option>
						                  </select>
						                </div>
						            	</div>
						            </div>
												<div class="col-md-6">
						            	<div class="form-group">
					                	<label for="streetaddress">Address</label>
					                  <input type="text" name="location" class="form-control" placeholder="e.g in Gujrat" required>
					                </div>
						            </div>
						            <div class="col-md-6">
													<div class="row">
														<div class="col-md-4">
						            	<div class="form-group">
				                    <label for="streetaddress">Add Images</label>
					                  <input type="file" name="file_upload[]" multiple required>
													</div>
												</div>
												<div class="col-md-6">
														<label>Bid Timer (Hours)</label>
														<input type="datetime-local" name="date" class="form-control">
					                </div>
												</div>
						            </div>
				                <div class="col-md-12" >
				                  <div class="form-group">
				                  <label for="streetaddress">Product Features Description</label>
				                  <textarea class="form-control" name="product_description" rows="4" placeholder="Write something about product requirements" required></textarea>
				                  </div>
				                </div>
				                <div class="col-md-6" >
				                  <div class="form-group">
				                <input type="submit"  class="btn btn-primary col-md-5">
				                  </div>
				                </div>
				                <input type="hidden" name="upload_date" value="<?php echo date('d-M-Y'); ?>"/>
				                <input type="hidden" name="upload_by" value="<?php echo $name->ID; ?>"/>
				                <input type="hidden" name="status" value="1"/>
	            </div>
            <?php echo form_close();?>

      				</div>
    			</section> <!-- .section -->

    			</div>


<?php $this->load->view('includes/storefooter.php');?>
