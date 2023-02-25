<?php $this->load->view('includes/header');?>
<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url();?>assets/dist/img/user.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <a href="<?php echo base_url('supplier/profile')?>"><strong style="font-size:15px;"><p><?php echo $name->fullname;?></p></strong></a>
      </div>
    </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
          <a href="<?php echo base_url();?>supplier">
            <i class="fa fa-pie-chart"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url();?>supplier/live_products">
            <i class="fa fa-edit"></i> <span>Live Products</span>
          </a>
        </li>
        <li>
        <a href="<?php echo base_url();?>supplier/product_history">
          <i class="fa fa-edit"></i> <span>Products History</span>
        </a>
      </li>
        <li>
          <a href="<?php echo base_url();?>supplier/new_orders">
            <i class="fa fa-truck"></i> <span>New Orders</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url();?>supplier/feedbacks">
            <i class="fa fa-comment-o"></i> <span>Feedbacks</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url();?>supplier/reported_products">
            <i class="fa fa-warning"></i> <span>Reported Products</span>
          </a>
        </li>
        </ul>
      </section>
      </aside>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Shopkeeper
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
              <span class="info-box-number">10</span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Bids</span>
              <span class="info-box-number">40</span>
            </div>
          </div>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Sold Products</span>
              <span class="info-box-number">760</span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">New Orders</span>
              <span class="info-box-number">2,000</span>
            </div>
          </div>
        </div>
      </div>
      <div class="box box-primary">
              <div class="box-header with-border">
                <h2 class="box-title">Add Product</h2>
              </div>
              <?php echo form_open('supplier/addpost','role="form"'); ?>
                <div class="box-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group col-lg-6">
                    <label for="exampleInputEmail1">Product Name</label>
                    <?php echo form_input(['type'=>'Text','name'=>'product_name','class'=>'form-control','placeholder'=>'e.g Iphone X']);?>
                      </div>
                      <div class="form-group col-lg-6">
                    <label for="exampleInputPassword1">Price</label>
                    <?php echo form_input(['type'=>'text','name'=>'product_price','class'=>'form-control','placeholder'=>'e.g 2,000 Rs'])?>
                      </div>
                      <div class="form-group col-lg-6">
                    <label>Category</label>
                    <?php
                    $option=array(
                      '1' =>'Mobiles',
                      '2' =>'Wears',
                      '3' =>'Electronics',
                      '4' =>'Vehicles',
                    );
                    echo form_dropdown('category',$option,'1','class="form-control"');
                    ?>
                      </div>
                      <div class="form-group col-lg-6">
                    <label>Quantity</label>
                    <?php
                    $option=array(
                      '1' =>'1',
                      '2' =>'2',
                      '3' =>'3',
                      '4' =>'4',
                      '5' =>'5',
                      '6' =>'6',
                      '7' =>'7',
                      '8' =>'8',
                      '9' =>'9',
                    );
                    echo form_dropdown('quantity',$option,'1','class="form-control"');
                    ?>
                      </div>
                    </div>
                <div class="col-lg-12" >
                  <div class="form-group col-lg-6">
                    <div class="form-group">
                      <label>Product Description</label>
                      <?php echo form_textarea(['class'=>'form-control','name'=>'product_description','rows'=>'4','placeholder'=>'Enter Product Details']);?>
                    </div>
                  </div>
                </div>
              </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group col-lg-6 ">
                    <label for="exampleInputFile">Add Images</label>
                    <input name="image[]" type="file" multiple="multiple"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="box-footer col-lg-6">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </div>
                <input type="hidden" name="upload_by" value="<?php echo $name->ID ?>"/>
              </div>
          <?php echo form_close(); ?>
        </div>
    </section>
  </div>
<?php $this->load->view('includes/footer');?>
