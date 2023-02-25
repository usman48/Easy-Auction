<?php $this->load->view('includes/header');?>
<head>
  <title>Reported Items</title>
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
  <li>
    <a href="<?php echo base_url();?>admin">
      <i class="fa fa-pie-chart"></i> <span>Dashboard</span>
    </a>
  </li>
  <li>
    <a href="<?php echo base_url();?>admin/Seller">
      <i class="fa fa-user"></i> <span>Manage Sellers</span>
    </a>
  </li>
  <li>
    <a href="<?php echo base_url();?>admin/manage_customer">
      <i class="fa fa-user"></i> <span>Manage Customer</span>
    </a>
  </li>
  <li class="active">
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
      <small>Reported Items</small>
    </h1>
    <br>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Reported Items</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Reported Items</h3>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-striped" id="example1">
            <thead>
              <tr>
                <th>Post ID</th>
                <th>Uploader Name</th>
                <th>Reported By</th>
                <th>Product/Ad</th>
                <th>Status</th>
                <th>Comments</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($fetch_reporteditems as $ri):?>

              <tr>
                  <?php echo form_open('seller/updateReport'); ?>
                <td><?php echo $ri->ID;?></td>
                <td>
                  <?php foreach ($fetch_users as $fu): ?>
                  <?php if ($fu->ID==$ri->uploaded_by)
                  {
                    echo $fu->fullname;
                  }
                  ?>
                  <?php endforeach; ?>
                </td>
                <td>
                  <?php foreach ($fetch_users as $fu): ?>
                  <?php if ($fu->ID==$ri->reported_by)
                  {
                    echo $fu->fullname;
                  }
                  ?>
                  <?php endforeach; ?>
                </td>

                <td>
                  <?php if ($ri->item_type==2){
                    echo '<span class="label label-warning">Seller Product</span>';
                  }
                    else {
                      echo '<span class="label label-warning">Customer Ad</span>';
                    }
                  ?>
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
                <td><?php echo $ri->comments;?></td>
                <input type="hidden" name="item_id" value="<?php echo $ri->item_id; ?>">
                <?php $this->session->set_userdata('previous_url', current_url());?>
                <td>
                  <?php if ($ri->status==0){ ?>
                    <button type="submit" class="btn btn-danger fa fa-close" disabled></button>

                <?php }else{ ?>
                <button type="submit" class="btn btn-danger fa fa-close" name="status" value="0" data-toggle= "tooltip" title="Remove Product"></button>
              <?php } ?>
              </td>
              <?php echo form_close(); ?>
              </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
              <th>Post ID</th>
              <th>Uploader Name</th>
              <th>Reported By</th>
              <th>Product/Ad</th>
              <th>Comments</th>
            </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>
<div class="modal fade" id="user_detail">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Customer Detail</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('','role="form"'); ?>

          <div class="box-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group col-lg-6">
                  <label for="exampleInputEmail1">Product Name</label>
                  <label class="form-control">Product Name</label>
                </div>
                <div class="form-group col-lg-6">
                  <label for="exampleInputPassword1">Seller Name</label>
                  <label class="form-control">Seller Name</label>
                </div>
                <div class="row">
                  <div class="col-lg-12" >
                    <div class="form-group col-lg-6">
                      <div class="form-group">
                        <label>Report By</label>
                        <label class="form-control">Report By</label>
                      </div>
                    </div>
                    <div class="form-group col-lg-6">
                      <div class="form-group">
                        <label>No of Reports</label>
                        <textarea class="form-control">Report</textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php echo form_close(); ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Back</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view('includes/footer');?>
