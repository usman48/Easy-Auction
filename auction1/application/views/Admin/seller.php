<?php $this->load->view('includes/header');?>
<head>
  <title>Manage Sellers</title>
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
      <li class="active">
        <a href="<?php echo base_url();?>admin/Seller">
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
      <small>Manage Sellers</small>
    </h1>

    <br>

    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Seller Detail</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-info">
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
      <div class="box-header with-border">
        <h3 class="box-title">Seller Detail</h3>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <?php echo form_open('admin/changeStatus');?>
          <table class="table table-striped" id="example1">

            <thead>
              <tr>
                <th>Seller ID</th>
                <th>Seller Name</th>
                <th>Account Status</th>
                <th>Comments</th>
                <th class="notexport">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($fetch_users as $fu):
                if ($fu->usertype==2) {
                ?>
                <tr>
                  <td><?php echo $fu->ID?></td>
                  <td><?php echo $fu->fullname?></td>
                  <td>
                    <?php
                    if ($fu->status==1) {
                      echo "<span class='label label-success'>Live</span>";
                    }
                    else{
                      echo "<span class='label label-danger'>Suspended</span>";
                    }
                    ?>
                  </td>
                  <td>
                    <?php
                    foreach ($fetch_comments as $fc):
                      if ($fc->comment_on==$fu->ID) {
                        echo $fc->comment;
                      }
                    endforeach;
                    ?>
                  </td>
                  <td>
                    <?php echo form_open('admin/changeStatus')?>
                    <button type="button" class="btn btn-info fa fa-bars"  data-toggle="modal" data-target="#<?php echo $fu->ID?>"></button>
                    <input type="hidden" value="<?php echo $fu->ID?>" name="ID"/>
                    <input type="hidden" value="<?php echo $fu->usertype?>" name="usertype"/>
                    <input type="hidden" value="<?php echo $fu->ID?>" name="comment_on"/>
                    <?php if ($fu->status == 1){
                      echo '<button class="btn btn-success fa fa-check" disabled ></button>';
                      echo '<button style="margin-left:1%;" name="status" value="0" type="submit" class="btn btn-danger fa fa-close" data-toggle= "tooltip" title="Suspend Account" ></button>';
                    }
                    else {
                      echo '<button name="status" value="1" type="submit" class="btn btn-success fa fa-check" data-toggle= "tooltip" title="Remove Suspension"></button>';
                      echo '<button style="margin-left:1%;" class="btn btn-danger fa fa-close" disabled></button>';
                    }
                   echo form_close()?>
                  </td>
                </tr>
              <?php
            }
            endforeach; ?>
            </tbody>
            <tfoot>
              <tr>
                <th>Seller ID</th>
                <th>Seller Name</th>
                <th>Account Status</th>
                <th>Comments</th>
                <th class="notexport">Actions</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>
<?php foreach ($fetch_users as $fu):?>
  <div class="modal fade" id="<?php echo $fu->ID ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Seller Detail</h4>
          </div>
          <div class="modal-body">
            <?php echo form_open('','role="form"'); ?>
            <div class="box-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group col-lg-6">
                    <label for="exampleInputEmail1">Seller Name</label>
                    <label class="form-control">
                      <?php echo $fu->fullname;  ?>
                    </label>
                  </div>
                  <div class="form-group col-lg-6">
                    <div class="form-group">
                      <label>Seller Contact Email</label>
                      <label class="form-control">
                          <?php echo $fu->email;  ?>
                      </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12" >
                      <div class="form-group col-lg-6">
                        <label for="exampleInputPassword1">Seller Address</label>
                        <label class="form-control"><?php echo $fu->user_address?></label>
                      </div>
                      <div class="form-group col-lg-6">
                        <div class="form-group">
                          <label>Total Number of Products</label>
                          <label class="form-control">
                            <?php foreach($numofsellersproducts as $nosp):
                              if ($nosp->upload_by==$fu->ID){
                                echo $nosp->total;
                              }
                            endforeach; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12" >
                      <div class="form-group col-lg-6">
                        <div class="form-group">
                          <label>Seller Contact Number</label>
                          <label class="form-control"><?php echo $fu->user_phone ?></label>
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
  <?php endforeach; ?>
  <?php $this->load->view('includes/footer');?>
