<!DOCTYPE html>
<html lang="en">
<head>
	<link rel = "icon" type = "image/png" href = "<?php echo base_url();?>assets/h_assets/images/logo4.jpg">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/h_assets/images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/h_assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/h_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/h_assets/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/h_assets/fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/h_assets/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/h_assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/h_assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/h_assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/h_assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/h_assets/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/h_assets/vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/h_assets/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/h_assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/h_assets/css/main.css">
<!--============================================================================================
<style>
hr{
	height:1px;
	border:none;
	color:#333;
	background-color:#333;
}
</style>
</head>
<body class="animsition">

	<!-- Header -->
	<header  class="header-v2">
		<!-- Header desktop -->
		<div  class="container-menu-desktop trans-03">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop p-l-45 ">

					<!-- Logo desktop -->
					<a href="<?php echo base_url();?>store" class="logo">
						<img src="<?php echo base_url();?>assets/h_assets/images/logo1.jpg" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop" >
						<ul class="main-menu">
							<li class="menu">
								<a href="<?php echo base_url();?>store">Home</a>
							</li>

							<li>
								<a href="<?php echo base_url();?>store/customer_store">Customer Needs</a>
							</li>

						
              <?php if ($i==0): ?>
                <li>
									<?php $previous_url=$this->session->set_userdata('previous_url', current_url());?>
                  <a style="color:green;"  href="<?php echo base_url();?>user">Sign In</a>
                </li>
              <?php endif; ?>
              <?php if($i==1){ ?>
              <?php if ($name->usertype==1) {?>
                <li>

                  <a style="color:red;"  href="<?php echo base_url();?>user/logout">Logout</a>
                </li>
								<li>
									<a style="color:green;" href="<?php echo base_url();?>admin">Dashboard</a>
								</li>
                <?php } ?>
                <?php if ($name->usertype==2 ) {?>
                  <li>
    								<a style="color:green;" href="<?php echo base_url();?>seller">Dashboard</a>
    							</li>
                  <li>
                    <a style="color:red;" href="<?php echo base_url();?>user/logout">Logout</a>
                  </li>
                  <?php } ?>
                  <?php if ($name->usertype==3) {?>

                    <li>
                      <a style="color:red;" href="<?php echo base_url();?>user/logout">Logout</a>
                    </li>
                    <?php } ?>
						</ul>
					</div>
          <div class="wrap-icon-header flex-w flex-r-m h-full">
					<!-- Icon header -->
<?php if ($name->usertype==3) {?>

						<div class="flex-c-m h-full p-l-18 p-r-25">
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 ">
<?php
 								foreach ($needs as $need){
								$dt=new DateTime("now", new DateTimeZone('Asia/Karachi'));
								$date2=$need->date;

								$date1=$dt->format('Y-m-d H:i:s');
								if($date2>$date1)
								{
									$countBids=$countBids-1;
								} }	?>
									<a href="<?php echo base_url();?>store/cart"><div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="<?php echo $countBids; ?>" data-toggle="modal" data-target="#modal-bid-report">
										</a>



							</div>
						</div>
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 ">
								<a href="<?php echo base_url();?>store/cart"><div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="<?php echo $cart_notify; ?>">
									<i class="zmdi zmdi-shopping-cart"></i></a>
							</div>
						</div>


<?php } ?>
						<div class="flex-c-m h-full p-lr-19">
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11">
                  <?php if ($name->usertype==1){ ?>
                    <i  style="font-size:20px;"><a href="<?php echo base_url();?>admin"><?php echo $name->fullname;?></a></i>
                  <?php } else{ ?>
                      <i  style="font-size:30px;font-family:sans;"><a href="<?php echo base_url();?>store/profile/<?php echo $name->ID ?>"><?php echo $name->fullname;?></a></i>
                    <?php }} ?>


              <?php $x=0;$y=0;?>
							</div>

						</div>
					</div>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a><img src="<?php echo base_url();?>assets/h_assets/images/logo1.jpg" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
				<div class="flex-c-m h-full p-r-10">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
						<i class="zmdi zmdi-search"></i>
					</div>
				</div>

				<div class="flex-c-m h-full p-lr-10 bor5">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="<?php echo $cart_notify; ?>">
						<i class="zmdi zmdi-shopping-cart"></i>
					</div>
				</div>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="main-menu-m">
				<li>
					<a href="index.html">Home</a>
				</li>

				<li>
					<a href="product.html">Customer Needs</a>
				</li>
				<li>
					<a href="about.html">About</a>
				</li>

			</ul>
		</div>


	</header>
