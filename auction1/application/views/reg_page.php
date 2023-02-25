<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/login_assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login_assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login_assets/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login_assets/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login_assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login_assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login_assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login_assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login_assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login_assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<?php $msg=$this->session->flashdata('msg');
	$color=$this->session->flashdata('color');
	?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-10 p-b-20">
					<span class="login100-form-title p-b-50">
						Register Yourself
					</span>

					<span  style="color:<?php echo $color; ?>;font-size:30px;" class="login100-form-title p-b-15">
						<?php echo $msg; ?>
					</span>
					<span class="login100-form-avatar">
						<img src="<?php echo base_url();?>uploads/user_images/user.png" alt="AVATAR">
					</span>
						<?php echo form_open_multipart('user/user_registration','class="login100-form validate-form"'); ?>
					<div class="wrap-input100 validate-input m-t-30 m-b-35" data-validate = "Enter Fullname">
						<input class="input100" type="text" name="fullname">
						<span class="focus-input100" data-placeholder="Fullname"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-30" data-validate="Enter Email">
						<input class="input100" type="email" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-30" data-validate="Enter Password">
						<input class="input100" type="password" name="password" id="password" minlength=8 onchange='check_pass();' >
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-30" data-validate="Re-type Password">
						<input class="input100" type="password" name="confirm-password" id="confirm-password" onchange='check_pass();'>
						<span class="focus-input100" data-placeholder="Re-type Password"></span>
					</div>
					<div class="input100 validate-input m-b-30" data-validate="User Type">
							<select style="height: 40px;" class="input100 pull-right" name="usertype" required>
								<option value="">Please Select Your Role</option>
								<option value="2">Seller</option>
								<option value="3">Customer/Buyer</option>
							</select>
					</div>
					<input type="file" name="user_img" class="input100 m-b-15" value="0">
					<input type="hidden" name="status" value="1"/>
					<input type="hidden" name="reg_date" value="<?php echo date('Y-m-d') ?>" />
					<div  class="container">
						<button style="background-color:black;" type="submit" id="submit" value="upload"  class="login100-form-btn">
							Register
						</button>
					</div>
					<?php echo form_close(); ?>
					<ul class="login-more p-t-50">
						<li>
							<span class="txt1">
								Already have an account?
							</span>

							<a href="<?php echo base_url();?>user" class="txt2">
								Sign in Here
							</a>
						</li>
					</ul>
			</div>
		</div>
	</div>

<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login_assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login_assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login_assets/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>assets/login_assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login_assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login_assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url();?>assets/login_assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login_assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login_assets/js/main.js"></script>
<script>
function check_pass() {
    if (document.getElementById('password').value ==
            document.getElementById('confirm-password').value) {
        document.getElementById('submit').disabled = false;
    } else {
        document.getElementById('submit').disabled = true;
    }
}
</script>
</body>
</html>
