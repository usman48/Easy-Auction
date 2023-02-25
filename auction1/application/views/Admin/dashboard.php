<?php $this->load->view('includes/header');?>
<head>
  <title>Dashboard</title>
</head>
<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url();?>uploads/user_images/<?php echo $sessiondata->user_img;?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <a href="<?php echo base_url('admin/profile')?>"><strong style="font-size:15px;"><p><?php echo $sessiondata->fullname;?></p></strong></a>
      </div>
    </div>
<ul class="sidebar-menu" data-widget="tree">
  <li class="header">MAIN NAVIGATION</li>
  <li class="active">
    <a href="<?php echo base_url();?>admin">
      <i class="fa fa-pie-chart"></i> <span>Dashboard</span>
    </a>
  </li>
  <li>
    <a href="<?php echo base_url();?>admin/seller">
      <i class="fa fa-user"></i> <span>Manage Sellers</span>
    </a>
  </li>
  <li>
    <a href="<?php echo base_url();?>admin/manage_customer">
      <i class="fa fa-user"></i> <span>Manage Customer</span>
    </a>
  </li>
   <li>
    <a href="<?php echo base_url();?>admin/reported_items">
      <i class="fa fa-warning"></i> <span>Reported Items</span>
    </a>
  </li>
  </ul>
</section>
</aside>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Admin
        <small>Dashboard</small>
      </h1>
      <br>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Products/ Ad(s)</span>
              <span class="info-box-number"><?php echo $numofproducts ?></span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-android-contacts"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total Sellers</span>
              <span class="info-box-number"><?php echo $numofsellers ?></span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total Customers</span>
              <span class="info-box-number"><?php echo $numofcustomers ?></span>
            </div>
          </div>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-alert-circled"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Reported Items</span>
              <span class="info-box-number"><?php echo $numofreports ?></span>
            </div>
          </div>
        </div>
      </div>
      <div class="box box-info">
        <div class="box-header">
          <i class="fa fa-envelope"></i>

          <h3 class="box-title">Quick Email</h3>
        </div>
        <div class="box-body">
          <form action="#" method="post">
            <div class="form-group">
              <input type="email" class="form-control" name="emailto" placeholder="Email to:">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" placeholder="Subject">
            </div>
            <div>
              <textarea class="textarea" placeholder="Message"
                        style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
          </form>
        </div>
        <div class="box-footer clearfix">
          <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
            <i class="fa fa-arrow-circle-right"></i></button>
        </div>
      </div>
    </section>
  </div>
<?php $this->load->view('includes/footer');?>
