<?php $this->load->view('includes/header');?>
<head>
  <title><?php echo $sessiondata->fullname?>-Easy Auction</title>
</head>
<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url();?>uploads/user_images/<?php echo $sessiondata->user_img;?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <a href="<?php echo base_url('seller/profile')?>"><strong style="font-size:15px;"><p><?php echo $sessiondata->fullname;?></p></strong></a>
      </div>
    </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
          <a href="<?php echo base_url();?>seller">
            <i class="fa fa-pie-chart"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url();?>seller/live_products">
            <i class="fa fa-edit"></i> <span>Live Products</span>
          </a>
        </li>
        <li>
        <a href="<?php echo base_url();?>seller/product_history">
          <i class="fa fa-edit"></i> <span>Products History</span>
        </a>
      </li>
        <li>
          <a href="<?php echo base_url();?>seller/new_orders">
            <i class="fa fa-truck"></i> <span>New Orders</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url();?>seller/reported_products">
            <i class="fa fa-warning"></i> <span>Reported Products</span>
          </a>
        </li>
        </ul>
      </section>
      </aside>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Seller
        <small>Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total Products</span>
              <span class="info-box-number">
                <?php
                foreach ($numofsellersproducts as $nosp):
                  if ($nosp->upload_by==$sessiondata->ID) {
                    echo $nosp->total;
                  }
                endforeach;
                ?>
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-plus"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Bids</span>
              <span class="info-box-number">
                <?php
                foreach ($numofbids as $nob):
                  if ($nob->bid_by==$sessiondata->ID) {
                    echo $nob->total;
                  }
                endforeach;
                ?>
              </span>
            </div>
          </div>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Reported Products</span>
              <span class="info-box-number">
                <?php
                foreach ($numofreportedproducts as $norp):
                  if ($norp->uploaded_by==$sessiondata->ID) {
                    echo $norp->total;
                  }
                endforeach;
                ?>
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">New Orders</span>
              <span class="info-box-number">
                <?php
                foreach ($numofoders as $nood):
                  if ($nood->seller_id==$sessiondata->ID) {
                    echo $nood->total;
                  }
                endforeach;
                ?>
              </span>
            </div>
          </div>
        </div>
      </div>
      <?php if($msg=$this->session->flashdata('msg')):
        $msg_class=$this->session->flashdata('msg_class') ?>
        <div class="row">
          <div class="col-xs-4">
            <div class="alert <?php echo $msg_class; ?>">
              <center>
                <strong>
                  <?php echo $msg; ?>
                </strong>
              </center>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <div class="box box-primary">
              <div class="box-header with-border">
                <h2 class="box-title">Add Product</h2>
              </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="box-footer col-lg-6">
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#add-product">+ Add Products</button>
                    </div>
                  </div>
                </div>

              </div>
    </section>
  </div>
  <div class="modal fade" id="add-product">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Product</h4>
          </div>
          <div class="modal-body">
            <?php echo form_open_multipart('seller/addpost','role="form"'); ?>
            <div class="box-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group col-lg-6">
                    <label for="exampleInputEmail1">Product Name</label>
                    <?php echo form_input(['type'=>'Text','name'=>'product_name','class'=>'form-control','placeholder'=>'e.g iPhone Xs','required'=>'true']);?>
                  </div>
                  <div class="form-group col-lg-6">
                    <label for="exampleInputEmail1">Product Company</label>
                    <?php echo form_input(['type'=>'Text','name'=>'product_company','class'=>'form-control','placeholder'=>'e.g Apple','required'=>'true']);?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group col-lg-6">
                    <label for="exampleInputPassword1">Product Model</label>
                    <?php echo form_input(['type'=>'text','name'=>'product_model','class'=>'form-control','placeholder'=>'e.g A320','required'=>'true'])?>
                  </div>
                  <div class="form-group col-lg-6">
                    <label for="exampleInputPassword1">Price</label>
                    <?php echo form_input(['type'=>'text','id'=>'txt','onkeyup'=>'addComma(this);','onkeypress'=>'validate(event)','name'=>'product_price','class'=>'form-control','placeholder'=>'e.g 150,000 Rs','required'=>'true'])?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                    <div class="form-group col-lg-6">
                    <label for="country">Category</label>
                    <div class="select-wrap">
                          <div class="icon"></div>
                          <select name="category" id="" class="form-control" required>
                            <option value="">Please Select</option>
                            <option value="mobiles">Mobiles</option>
                            <option value="wears">Wears</option>
                            <option value="electronics">Electronics</option>
                            <option value="vehicles">Vehicles</option>
                            <option value="Others">Others</option>
                          </select>
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="streetaddress">Quantity</label>
                      <input type="text" name="quantity" onkeyup ="addComma(this);" onkeypress='validate(event)' class="form-control" placeholder="e.g 10" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group col-md-6">
                      <label for="streetaddress">Location</label>
                      <input type="text" class="form-control" name="location" placeholder="e.g in Gujrat" required>
                    </div>
                  <div class="form-group col-md-6">
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
                </div>
              </div>
                  <div class="row">
                    <div class="col-lg-12" >
                      <div class="form-group col-lg-12">
                        <div class="form-group">
                          <label>Product Description</label>
                          <?php echo form_textarea(['class'=>'form-control','name'=>'product_description','rows'=>'4','placeholder'=>'Enter Product Details','required'=>'true']);?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="upload_date" value="<?php echo date('d-M-Y'); ?>"/>
                  <input type="hidden" name="upload_by" value="<?php echo $sessiondata->ID; ?>"/>
                  <input type="hidden" name="status" value="1"/>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <input type="submit" value="Upload" class="btn btn-primary">
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
<?php $this->load->view('includes/footer');?>
