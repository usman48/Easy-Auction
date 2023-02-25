<?php $this->load->view('includes/header');?>
<head><title>Profile-Easy Auction</title></head>
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


          <li >
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
            <i class="fa fa-warning"></i> <span>Reprted Products</span>
          </a>
        </li>


        </ul>


    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Seller Profile</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Seller profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">

          <?php if($msg=$this->session->flashdata('msg')):

          $msg_class=$this->session->flashdata('msg_class') ?>

          <div class="row">
            <div class="col-md-12">
              <center>
              <div class="alert <?php echo $msg_class; ?>">
                <center>
                  <strong>
                    <?php echo $msg; ?>
                  </strong>
                </center>
              </div>
              </center>
            </div>
          </div>
      

        <?php endif; ?>

                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-aqua-active">
                      <h3 class="widget-user-username"><?php echo $sessiondata->fullname; ?></h3>
                    </div>
                    <div class="widget-user-image">
                      <img class="img-circle" src="<?php echo base_url();?>uploads/user_images/<?php echo $sessiondata->user_img;?>" alt="No Image">
                    </div>
                    <div class="box-footer">

                      <!-- /.row -->
                    </div>
                  </div>
                  <!-- /.widget-user -->
                </div>



              </div>

          <div class="row">


          <div class="col-md-5">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>


            <?php echo form_open('seller/update'); ?>
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
              <h3 class="box-title">Change Password</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php echo form_open('seller/update_password'); ?>
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


      </section>

      </div>
<?php $this->load->view('includes/footer');?>
