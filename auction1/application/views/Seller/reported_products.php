<?php $this->load->view('includes/header');?>
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
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
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


        <li>
          <a href="<?php echo base_url();?>seller/new_orders">
            <i class="fa fa-truck"></i> <span>New Orders</span>
          </a>
        </li>



        <li class="active">
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
              <div class="col-xs-12">
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
          <h3 class="box-title">Reported Products</h3>
        </div>
        <div class="box-body">
          <div class="table-responsive">
                    <table class="table table-striped" id="example1">
                      <thead>
                      <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Status</th>
                        <th>Reason</th>
                        <th>Date</th>
                        <th class="notexport">Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($fetch_reporteditems as $ri):
                          if ($sessiondata->ID==$ri->uploaded_by) {
                          ?>
                      <tr>
                        <?php echo form_open('seller/updateReport'); ?>
                        <td><?php echo $ri->item_id; ?></td>
                        <td>
                          <?php foreach ($products as $fp): ?>
                          <?php if ($fp->product_id==$ri->item_id)
                          {
                            echo $fp->product_name;
                          }
                          ?>
                          <?php endforeach; ?>
                        </td>
                        <td>
                          <?php if ($ri->status==1): ?>
                              <span class="label label-warning">Action Pending!</span>
                          <?php endif; ?>
                        <?php if ($ri->status==0 ): ?>
                          <span class="label label-danger">Removed!</span>
                        <?php endif; ?>
                        <?php if ($ri->status==2 ): ?>
                          <span class="label label-success">Changes Done!</span>
                        <?php endif; ?>
                        </td>
                        <td><?php echo $ri->comments; ?></td>
                        <td><?php echo $ri->reported_date; ?></td>
                        <input type="hidden" name="item_id" value="<?php echo $ri->item_id; ?>">
                        <?php $this->session->set_userdata('previous_url', current_url());?>
                        <td>
                          <button type="button" class="btn btn-info fa fa-bars" data-toggle="modal" data-target="#<?php echo $ri->item_id;?>"></button>
                          <?php if ($ri->status==2 ): ?>
                        <button type="submit" class="btn btn-success fa fa-check"disabled></button>
                        <button type="submit" class="btn btn-danger fa fa-close"disabled></button>
                        <?php endif; ?>
                            <?php if ($ri->status==0 ): ?>
                              <button type="submit" class="btn btn-success fa fa-check"disabled></button>
                          <button type="submit" class="btn btn-danger fa fa-close"disabled></button>
                          <?php endif; ?>
                            <?php if ($ri->status==1 ): ?>
                            <button type="submit" class="btn btn-success fa fa-check" name="status" value="2" data-toggle= "tooltip" title="Live Product"></button>
                          <button type="submit" class="btn btn-danger fa fa-close" name="status" value="0" data-toggle= "tooltip" title="Remove Product"></button>
                          <?php endif; ?>
                        </td>

                        <?php echo form_close(); ?>
                      </tr>
                    <?php } endforeach; ?>
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
  <?php foreach ($fetch_reporteditems as $ri):
    if ($sessiondata->ID==$ri->uploaded_by) {
    ?>
  <div class="modal fade" id="<?php echo $ri->item_id;?>">

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Product</h4>
          </div>
          <div class="modal-body">
            <?php echo form_open('seller/updateproduct','role="form"'); ?>
            <div class="box-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group col-lg-12">
                    <?php foreach ($pimages as $images):?>
                    <?php if ($ri->item_id==$images->post_id) { ?>
                      <div class="col-sm-4">
                        <img class="img-responsive" src="<?php echo base_url()?>/uploads/shopkeepers_products/<?php echo $images->image ?>" alt="Photo">
                      </div>
                  <?php } ?>
                    <?php endforeach; ?>
                </div>
              </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group col-lg-6">
                    <label for="exampleInputEmail1">Product Name</label>
                    <?php foreach ($products as $product):
                      if ($product->product_id==$ri->item_id) { ?>
                  <input type="text" name="product_name" class="form-control" value="<?php echo $product->product_name;?>" disabled>
                  </div>
                  <div class="form-group col-lg-6">
                    <label for="exampleInputPassword1">Price</label>
                    <input type="text" name="product_price" class="form-control" value="<?php echo $product->product_price;?>">
                  </div>
                </div>
              </div>
                  <div class="row">
                    <div class="col-lg-12" >
                      <div class="form-group col-lg-6">
                        <label for="exampleInputPassword1">Quantity</label>
                        <input type="text" name="quantity" class="form-control" value="<?php echo $product->quantity;?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12" >
                      <div class="form-group col-lg-12">
                          <label>Product Description</label>
                          <?php echo form_textarea(['class'=>'form-control','name'=>'product_description','rows'=>'4','value'=>$product->product_description]);?>
                      </div>
                    </div>
                    <?php $this->session->set_userdata('previous_url', current_url());?>
                    <input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>">
                  </div>
                <?php } endforeach; ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
    <?php
    }
    endforeach; ?>
<?php $this->load->view('includes/footer');?>
