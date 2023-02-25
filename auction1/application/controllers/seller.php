<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class seller extends CI_Controller {
	public function index()
	{
		$usertype=$this->session->userdata('usertype');
		$sessiondata=$this->usermodel->getdatabysession();
		$numofsellersproducts=$this->adminmodel->numofsellersproducts();
		$numofbids=$this->sellermodel->numofbids();
		$numofreportedproducts=$this->sellermodel->numofreportedproducts();
		$numofoders=$this->sellermodel->numofoders();
		if($usertype==2)
		{
			$this->load->view('seller/dashboard',compact('sessiondata','numofsellersproducts','numofbids','numofreportedproducts','numofoders'));
		}
		else
		{
			redirect (errors);
		}
	}
	public function addpost()
	{
		$sessiondata=$this->usermodel->getdatabysession();
		$pdata=$this->input->post([
			'product_name',
			'product_price',
			'product_model',
			'product_company',
			'product_description',
			'quantity',
			'location',
			'status',
			'upload_date',
			'upload_by',
			'category'
		]);
		$this->sellermodel->addpost($pdata);
		$postID=$this->sellermodel->fetch_post_id();
		$bdata=$this->input->post(['bid_by','post_id','post_by']);
		$bdata['new_id_product']=$postID->product_id;
		$number_of_files = sizeof($_FILES['file_upload']['tmp_name']);
		$files = $_FILES['file_upload'];
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|gif';
		$config['upload_path'] = FCPATH.'uploads/shopkeepers_products/';
		for ($i=0; $i <$number_of_files ; $i++) {
			$_FILES['file_upload']['name'] = $files['name'][$i];
			$_FILES['file_upload']['type'] = $files['type'][$i];
			$_FILES['file_upload']['tmp_name'] = $files['tmp_name'][$i];
			$_FILES['file_upload']['error'] = $files['error'][$i];
			$_FILES['file_upload']['size'] = $files['size'][$i];
			$fimage=$_FILES['file_upload']['name'] = $files['name'][0];
			$this->upload->initialize($config);
			if ($this->upload->do_upload('file_upload')) {
				$imgdata=$this->upload->data();
				$insert[$i]['image']= $imgdata['file_name'];
				$insert[$i]['upload_by']= $sessiondata->ID;
				$insert[$i]['post_id']= $postID	->product_id;
			}
			else {
				$uploaderror=$this->upload->display_errors();
				$this->session->set_flashdata('msg',$uploaderror);
				$this->session->set_flashdata('msg_class','alert-warning');
				return redirect('seller');
			}
		}

			if ($bdata['post_id'] != NULL ){
				$result= $this->sellermodel->addbid($bdata);
				 	$this->session->set_flashdata('msg','Your New Product is Now Live :)');
	 				$this->session->set_flashdata('msg_class','alert-success');
			}
		if ($this->sellermodel->addimages($insert) && $this->sellermodel->addFimage($fimage,$sessiondata->ID,$postID->product_id))
		{
			$this->session->set_flashdata('msg','Your New Product is Now Live :)');
			$this->session->set_flashdata('msg_class','alert-success');
			if ($result) {
					return redirect('store');
			}
			else {
				return redirect('seller');
			}

		}
		else {
			$this->session->set_flashdata('msg','Something Went Wrong! Unable to Make Your Product Live :(');
			$this->session->set_flashdata('msg_class','alert-danger');

				return redirect('seller');

		}
	}
	public function profile()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype==2)
		{
			$sessiondata=$this->usermodel->getdatabysession();
			$this->load->view('seller/profile',compact('sessiondata'));
		}
		else
		{
			redirect (errors);
		}
	}
	public function live_products()
	{
		$usertype=$this->session->userdata('usertype');
		$sessiondata=$this->usermodel->getdatabysession();
		$products=$this->sellermodel->fetch_products();
		$pimages=$this->sellermodel->fetch_images();
		if($usertype==2)
		{
			$this->load->view('seller/live_products',compact('sessiondata','products','pimages'));
		}
		else
		{
			redirect (errors);
		}
	}

	public function new_orders()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype==2)
		{
			$sessiondata=$this->usermodel->getdatabysession();
			$fetch_orders=$this->sellermodel->fetch_orders();
			$fetch_users=$this->adminmodel->fetch_users();
			$products=$this->sellermodel->fetch_products();
			$pimages=$this->sellermodel->fetch_images();
			$this->load->view('seller/new_orders',compact('sessiondata','fetch_orders','fetch_users','products','pimages'));
		}
		else
		{
			redirect (errors);
		}

	}
	public function reported_products()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype==2)
		{
			$pimages=$this->sellermodel->fetch_images();
			$sessiondata=$this->usermodel->getdatabysession();
			$fetch_reporteditems=$this->adminmodel->fetch_reporteditems();
			$products=$this->sellermodel->fetch_products();
			$fetch_users=$this->adminmodel->fetch_users();
			$this->load->view('seller/reported_products',compact('pimages','sessiondata','products','fetch_reporteditems','fetch_users'));
		}
		else
		{
			redirect (errors);
		}
	}
	public function product_history()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype==2)
		{
			$sessiondata=$this->usermodel->getdatabysession();
			$products=$this->sellermodel->fetch_products();
			$pimages=$this->sellermodel->fetch_images();
			$this->load->view('seller/products_history',compact('sessiondata','products','pimages'));
		}
		else
		{
			redirect (errors);
		}

	}
	public function update_password()
		{
			$c_password=$this->input->post('c_password');
			$new_password=$this->input->post('new_password');
			$renew_password=$this->input->post('renew_password');
			$data=$this->usermodel->getdatabysession();

			if ($c_password==$data->password && $new_password==$renew_password)
			{
				if($this->adminmodel->update_password($new_password))
				{
					$this->session->set_flashdata('msg','Password Changed');
					$this->session->set_flashdata('msg_class','alert-success');
						return redirect('seller/profile');
						}
				else {
					$this->session->set_flashdata('msg','Password Not Changed');
					$this->session->set_flashdata('msg_class','alert-danger');
						return redirect('seller/profile');
				}

			}
		else {
					$this->session->set_flashdata('msg','Password Not Changed');
					$this->session->set_flashdata('msg_class','alert-danger');
						return redirect('seller/profile');
			}

	}
	public function updateproduct()
	{
		$previous_url = $this->session->userdata('previous_url');

		$product_id=$this->input->post('product_id');
		$product_price=$this->input->post('product_price');
		$quantity=$this->input->post('quantity');
		$product_description=$this->input->post('product_description');
		if($this->sellermodel->updateproduct($product_id,$product_price,$quantity,$product_description))
		{
			$this->session->set_flashdata('msg','Product info has been Updated');
			$this->session->set_flashdata('msg_class','alert-success');
			return redirect($previous_url);
		}
		else {
			$this->session->set_flashdata('msg','Something Went Wrong! Unable to Update Info');
			$this->session->set_flashdata('msg_class','alert-danger');
				return redirect($previous_url);
		}
	}
	public function update()
  {
    $user_phone=$this->input->post('user_phone');
    $user_address=$this->input->post('user_address');
    $ID=$this->input->post('ID');

    if ($this->usermodel->update($user_phone,$user_address,$ID))
    {
      $this->session->set_flashdata('msg','Details Changed');
          $this->session->set_flashdata('msg_class','alert-success');
            return redirect('seller/profile');
    }
    else {
          $this->session->set_flashdata('msg','Details Not Changed');
          $this->session->set_flashdata('msg_class','alert-danger');
            return redirect('seller/profile');
    }
  }
	public function updateStatus()
	{
		$product_id=$this->input->post('product_id');
		$status=$this->input->post('status');
		if ($this->sellermodel->updateStatus($product_id,$status))
			{
				$this->session->set_flashdata('msg','Product Status has been Updated');
				$this->session->set_flashdata('msg_class','alert-success');
				if ($status==1) {
					return redirect('seller/live_products');
				}
				else {
					return redirect('seller/product_history');
				}
			}
			else {
				$this->session->set_flashdata('msg','Something Went Wrong! Unable to Change Product Status');
				$this->session->set_flashdata('msg_class','alert-danger');
				if ($status==1) {
					return redirect('seller/live_products');
				}
				else {
					return redirect('seller/product_history');
				}
			}
		}
		public function updateOrderStatus()
		{
			$data=$this->input->post();
			$product_id=$this->input->post('product_id');
			$status=$this->input->post('status');
			$quantity_needed=$this->input->post('quantity_needed');

			if ($this->sellermodel->updateOrderStatus($product_id,$status))
				{
					$quantity=$this->sellermodel->updateQuantity($product_id);
					$newQ=$quantity->quantity-$quantity_needed;
					if ($newQ<0) {
						$newQ=0;
					}
					$this->sellermodel->updateNQ($product_id,$newQ);
					$this->session->set_flashdata('msg','Product is Updated');
					$this->session->set_flashdata('msg_class','alert-success');
						return redirect('seller/new_orders');
						}
				else {
					$this->session->set_flashdata('msg','Something Went Wrong! Unable to Update Record');
					$this->session->set_flashdata('msg_class','alert-danger');
						return redirect('seller/new_orders');
				}
			}
			public function updateReport()
			{
				$previous_url = $this->session->userdata('previous_url');
				 $id=$this->input->post('item_id');
				 $status=$this->input->post('status');
				 if ($status==0) {
				 		if ($this->sellermodel->updateStatus($id,$status) && $this->sellermodel->updateReport($id,$status)) {
							$this->session->set_flashdata('msg','Product is Updated');
	 					 $this->session->set_flashdata('msg_class','alert-success');
	 						return redirect($previous_url);
				 		}
						else {
							$this->session->set_flashdata('msg','Something Went Wrong! Unable to Update Record');
						 $this->session->set_flashdata('msg_class','alert-danger');
							 return redirect($previous_url);
						}
				 }
			else {
				 if ($this->sellermodel->updateReport($id,$status)) {
					 $this->session->set_flashdata('msg','Product is Updated');
					 $this->session->set_flashdata('msg_class','alert-success');
						 return redirect($previous_url);
				 }
				 else {
					 $this->session->set_flashdata('msg','Something Went Wrong! Unable to Update Record');
					 $this->session->set_flashdata('msg_class','alert-danger');
						return redirect($previous_url);
				 }
			 }
			}

	}
