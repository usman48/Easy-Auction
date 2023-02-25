<?php $this->load->view('includes/header');?>
<head>
  <title>New Orders-Easy Auction</title>
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
      <li>
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
      <li class="active">
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
  <!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Seller
      <small>New Orders</small>
    </h1>
    <br>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">New Orders</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-info">
      <div class="box-header with-border">
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
        <h3 class="box-title">New Orders</h3>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-striped" id="example1">
            <thead>
              <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Product Name / ID</th>
                <th>Order Status</th>
                <th>Quantity</th>
                <th>Order Date / Time</th>
                <th class="notexport">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($fetch_orders as $fo): ?>

                <tr>
                  <?php echo form_open('seller/updateOrderStatus','role="form"') ?>
                  <td><?php echo $fo->order_id?></td>
                  <td>
                    <?php
                    foreach ($fetch_users as $fu) {
                      if ($fu->ID == $fo->order_by) {
                        echo $fu->fullname;
                      }
                    }
                    ?>
                  </td>
                  <td>

                    <?php

                    foreach ($products as $p) {
                      if ($p->product_id == $fo->product_id) {
                        echo $p->product_name;
                        echo "&nbsp(";
                        echo $p->product_id;
                        echo ")";
                        $p_id=$p->product_id;

                      }
                    }
                    ?>
                    <input type="hidden" name="order_id" value="<?php echo $fo->order_id;?>">
                    <input type="hidden" name="product_id" value="<?php echo $p_id;?>">
                    <input type="hidden" name="quantity_needed" value="<?php echo $fo->quantity;?>">
                  </td>
                  <td>
                    <?php if ($fo->order_status==1) {
                      echo '<span class="label label-warning">Pending!</span>';
                    }
                    if ($fo->order_status==0) {
                      echo '<span class="label label-danger">Canceled!</span>';
                    }
                    if ($fo->order_status==2){
                      echo '<span class="label label-success">Shipped!</span>';
                    }
                    ?>
                  </td>
                  <td><?php echo $fo->quantity;?></td>
                  <td><?php echo $fo->order_time ?></td>
                  <td>
                    <button type="button" class="btn btn-info fa fa-bars" data-toggle="modal" data-target="#<?php echo $fo->order_id?>"></button>
                    <?php  if ($fo->order_status==2){
                      echo '<button type="button" class="btn btn-success fa fa-check" disabled></button>';
                      echo '<button type="button" style="margin-left:1%;" class="btn btn-danger fa fa-close" disabled></button>';
                    }
                    if ($fo->order_status==0){
                      echo '<button type="submit" class="btn btn-success fa fa-check" name="status" value="2" data-toggle= "tooltip" title="Ship Product"></button>';
                      echo '<button type="button" style="margin-left:1%;" class="btn btn-danger fa fa-close" disabled></button>';
                    }
                      if ($fo->order_status==1){
                        echo '<button type="submit" class="btn btn-success fa fa-check" name="status" value="2" data-toggle= "tooltip" title="Ship Product"></button>';
                        echo '<button type="submit" style="margin-left:1%;" class="btn btn-danger fa fa-close"  name="status" value="0" data-toggle= "tooltip" title="Cancel Order"></button>';
                      }
                      ?>
                    </td>

                    <?php echo form_close(); ?>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
</div>
<?php foreach ($fetch_orders as $fo): ?>
<div class="modal fade" id="<?php echo $fo->order_id?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Order Confirmation</h4>
        </div>
        <div class="modal-body">

          <div class="box-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group col-lg-6">
                  <label for="exampleInputEmail1">Customer Name</label>
                  <?php foreach ($fetch_users as $fu):
                    if ($fo->order_by==$fu->ID) {
                      $name=$fu->fullname;
                    ?>
              <?php } endforeach; ?>
              <input type="text" class="form-control" value="<?php echo $name ?>" disabled>
                </div>
                <div class="form-group col-lg-6">
                  <label for="exampleInputPassword1">Customer Contact Number</label>
                  <input type="text" name="customer_contactnum" class="form-control" value="<?php echo $fo->phone_number ?>" disabled>
                </div>
              </div>
            </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group col-lg-6">
                      <label for="exampleInputEmail1">Customer Address</label>
                    <?php echo form_textarea(['class'=>'form-control','name'=>'customer_address','rows'=>'4','value'=>$fo->shipping_address,'disabled'=>'true']);?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group col-lg-6">
                      <label for="exampleInputEmail1">Product Name</label>
                      <?php foreach ($products as $p):
                        if ($fo->product_id==$p->product_id) {
                          $p_name=$p->product_name;
                          $quantity=$p->quantity;
                        }
                        endforeach;
                      ?>
                    <input type="text" name="product_name" class="form-control" value="<?php echo $p_name; ?>" disabled>
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="exampleInputPassword1">Product Quantity</label>
                      <input type="text" name="quantity" class="form-control" value="<?php echo $fo->quantity; ?>" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group col-lg-12">
                      <?php foreach ($pimages as $images):?>
                      <?php if ($fo->product_id==$images->post_id) { ?>
                        <div class="col-sm-4">
                          <img class="img-responsive" src="<?php echo base_url()?>/uploads/shopkeepers_products/<?php echo $images->image ?>" alt="Photo">
                        </div>
                    <?php } ?>
                      <?php endforeach; ?>
                  </div>
                </div>
                </div>

              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
<?php $this->load->view('includes/footer');?>
