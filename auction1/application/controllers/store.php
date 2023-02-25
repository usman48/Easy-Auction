<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class store extends CI_Controller {
	public function index()
	{
		$i=0;
		if($name=$this->usermodel->getdatabysession()){
			$i=1;
		}
		$config = [
			'base_url' => base_url('store/'),
			'per_page' => 8,
			'total_rows' => $this->storemodel->fetch_products_rows(),
			'uri_segment'=> 0,
			'use_page_numbers'=>TRUE,
			'page_query_string'=>TRUE,
			'full_tag_open' => "<ul class='row'>",
      'full_tag_close' =>	"</ul>",
			'next_tag_open'=> "<li class='flex-c-m how-pagination1 trans-04 m-all-7'>",
			'next_tag_close'=>	"</li>",
			'prev_tag_open'=>	"<li class='flex-c-m how-pagination1 trans-04 m-all-7' >",
			'prev_tag_close'=> "</li>",
			'num_tag_open'=> "<li class='flex-c-m how-pagination1 trans-04 m-all-7' >",
			'num_tag_close'=> "</li>",
			'last_tag_open'=> "<li class='flex-c-m how-pagination1 trans-04 m-all-7'>",
			'last_tag_close'=> "</li>",
			'cur_tag_open'=>"<li class='flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1'><a>",
			'cur_tag_close'=>"</a></li>"
		];
		$this->pagination->initialize($config);
		$cart_notify=$this->storemodel->cart_notify($this->session->userdata('userID'));
		$countBids=$this->storemodel->countBids($this->session->userdata('userID'));
		$AllBids=$this->storemodel->AllBids($this->session->userdata('userID'));
		$f_image=$this->storemodel->fetch_fimage();
		$top_products=$this->storemodel->top_products();
		$needs=$this->storemodel->fetch_cneeds();
		$top_sellers=$this->storemodel->top_sellers();
		$fetch_users=$this->adminmodel->fetch_users();
		$fetch_bids=$this->storemodel->fetch_bids();
		$products=$this->storemodel->fetch_products( $config['per_page'],$config['uri_segment']);

		$this->load->view('Store/store',compact('cart_notify','needs','name','i','products','f_image','top_products','top_sellers','fetch_users','countBids','fetch_bids','AllBids'));
	}
	public function customer_store()
	{
		$i=0;
		if($name=$this->usermodel->getdatabysession()){
			$i=1;
		}
		$config = [
			'base_url' => base_url('store/customer_store/'),
			'per_page' => 8,
			'total_rows' => $this->storemodel->fetch_needs_rows(),
			'uri_segment'=> 0,
			'use_page_numbers'=>TRUE,
			'page_query_string'=>TRUE,
			'full_tag_open' => "<ul class='row'>",
      'full_tag_close' =>	"</ul>",
			'next_tag_open'=> "<li class='flex-c-m how-pagination1 trans-04 m-all-7'>",
			'next_tag_close'=>	"</li>",
			'prev_tag_open'=>	"<li class='flex-c-m how-pagination1 trans-04 m-all-7' >",
			'prev_tag_close'=> "</li>",
			'num_tag_open'=> "<li class='flex-c-m how-pagination1 trans-04 m-all-7' >",
			'num_tag_close'=> "</li>",
			'cur_tag_open'=>"<li class='flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1'><a>",
			'cur_tag_close'=>"</a></li>"
		];
		$this->pagination->initialize($config);
		$f_image=$this->storemodel->fetch_cfimage();
		$countBids=$this->storemodel->countBids($this->session->userdata('userID'));
		$AllBids=$this->storemodel->AllBids($this->session->userdata('userID'));
		$cart_notify=$this->storemodel->cart_notify($this->session->userdata('userID'));
		$needs=$this->storemodel->fetch_needs( $config['per_page'],$config['uri_segment']);
		$fetch_bids=$this->storemodel->fetch_bids();
		$this->load->view('Store/customer_store',compact('cart_notify','AllBids','name','i','needs','f_image','countBids','fetch_bids'));
	}
	public function p_detail($p_id,$product_name,$company_name)
	{
		$i=0;
		if($name=$this->usermodel->getdatabysession()){
			$i=1;
		}
		$products=$this->sellermodel->fetch_products();
		$cart_notify=$this->storemodel->cart_notify($this->session->userdata('userID'));
		$countBids=$this->storemodel->countBids($this->session->userdata('userID'));
		$AllBids=$this->storemodel->AllBids($this->session->userdata('userID'));
		$pimages=$this->sellermodel->fetch_images();
		$f_image=$this->storemodel->fetch_fimage();
		$fetch_Relatedproducts=$this->storemodel->fetch_Relatedproducts($product_name,$company_name);
		$fetch_users=$this->adminmodel->fetch_users();
		$fetch_bids=$this->storemodel->fetch_bids();
		$needs=$this->storemodel->fetch_cneeds();
		$this->load->view('Store/product_detail',compact('cart_notify','needs','AllBids','countBids','name','i','p_id','products','pimages','fetch_users','f_image','fetch_Relatedproducts','fetch_bids','company_name'));
	}
	public function n_detail($p_id,$product_name,$company_name)
	{
		$i=0;
		if($name=$this->usermodel->getdatabysession()){
			$i=1;
		}
		$products=$this->sellermodel->fetch_products();
		$needs=$this->storemodel->fetch_cneeds();
		$pimages=$this->storemodel->fetch_cimages();
		$countBids=$this->storemodel->countBids($this->session->userdata('userID'));
		$AllBids=$this->storemodel->AllBids($this->session->userdata('userID'));
		$f_image=$this->storemodel->fetch_fimage();
		$cart_notify=$this->storemodel->cart_notify($this->session->userdata('userID'));
		$fetch_RelatedNeeds=$this->storemodel->fetch_RelatedNeeds($product_name,$company_name);
		$fetch_Relatedproducts=$this->storemodel->fetch_Relatedproducts($product_name,$company_name);
		$fetch_users=$this->adminmodel->fetch_users();
		$fetch_bids=$this->storemodel->fetch_bids();
		$this->load->view('Store/need_detail',compact('cart_notify','AllBids','countBids','products','name','i','p_id','needs','pimages','fetch_users','f_image','fetch_RelatedNeeds','fetch_bids','fetch_Relatedproducts'));
	}

	public function cart()
	{
		$r=$this->session->userdata('usertype');
		if($r==3)
		{
			$i=0;
			if($name=$this->usermodel->getdatabysession()){
				$i=1;
            }
            $f_image=$this->storemodel->fetch_fimage();
            $products=$this->sellermodel->fetch_products();
						$cart_notify=$this->storemodel->cart_notify($this->session->userdata('userID'));
						$countBids=$this->storemodel->countBids($this->session->userdata('userID'));
						$AllBids=$this->storemodel->AllBids($this->session->userdata('userID'));
						$needs=$this->storemodel->fetch_cneeds();
            $cart=$this->storemodel->cart();
			$this->load->view('Store/cart',compact('cart_notify','AllBids','countBids','name','i','cart','products','f_image','needs'));
		}
	}

	public function contact()
	{
		$i=0;
		if($name=$this->usermodel->getdatabysession()){
			$i=1;
		}

		$this->load->view('Store/contact',compact('name','i'));
	}
	public function about()
	{
		$i=0;
		if($name=$this->usermodel->getdatabysession()){
			$i=1;
		}
		$this->load->view('Store/about',compact('name','i'));
	}
	public function ad_form()
	{
		$i=0;
		if($name=$this->usermodel->getdatabysession()){
			$i=1;
		}
		$products=$this->sellermodel->fetch_products();
		$pimages=$this->sellermodel->fetch_images();
		$f_image=$this->storemodel->fetch_fimage();
		$countBids=$this->storemodel->countBids($this->session->userdata('userID'));
		$cart_notify=$this->storemodel->cart_notify($this->session->userdata('userID'));
		$AllBids=$this->storemodel->AllBids($this->session->userdata('userID'));
		$fetch_users=$this->adminmodel->fetch_users();
		$fetch_bids=$this->storemodel->fetch_bids();
		$this->load->view('Store/ad_form',compact('cart_notify','AllBids','countBids','name','i','products','pimages','fetch_users','f_image','fetch_bids'));
	}

	public function profile($s_id)
	{
		$i=0;
		if($name=$this->usermodel->getdatabysession()){
			$i=1;
		}
		$sessiondata=$this->usermodel->getdatabysession();
		$needs=$this->storemodel->fetch_cneeds();
		$cf_image=$this->storemodel->fetch_cfimage();
		$countBids=$this->storemodel->countBids($this->session->userdata('userID'));
		$f_image=$this->storemodel->fetch_fimage();
		$products=$this->sellermodel->fetch_products();
		$cart_notify=$this->storemodel->cart_notify($this->session->userdata('userID'));
		$AllBids=$this->storemodel->AllBids($this->session->userdata('userID'));
		$fetch_users=$this->adminmodel->fetch_users();
		$this->load->view('Store/profile',compact('cart_notify','AllBids','countBids','s_id','fetch_users','products','f_image','i','name','cf_image','needs','sessiondata'));
	}
	public function update_password()
		{
			$previous_url = $this->session->userdata('previous_url');
			$c_password=$this->input->post('c_password');
			$new_password=$this->input->post('new_password');
			$renew_password=$this->input->post('renew_password');
			$data=$this->usermodel->getdatabysession();

			if ($c_password==$data->password && $new_password==$renew_password)
			{
				if($this->adminmodel->update_password($new_password))
				{
					$this->session->set_flashdata('msgs','Password Changed');
					$this->session->set_flashdata('colors','green');
						return redirect($previous_url);
						}
				else {
					$this->session->set_flashdata('msgs','Password Not Changed');
					$this->session->set_flashdata('colors','red');
						return redirect($previous_url);
				}

			}
		else {
					$this->session->set_flashdata('msgs','Password Not Changed');
					$this->session->set_flashdata('colors','red');
						return redirect($previous_url);
			}

	}
	public function update()
  {
		$previous_url = $this->session->userdata('previous_url');
    $user_phone=$this->input->post('user_phone');
    $user_address=$this->input->post('user_address');
    $ID=$this->input->post('ID');

    if ($this->usermodel->update($user_phone,$user_address,$ID))
    {
      $this->session->set_flashdata('msg','Details Changed');
          $this->session->set_flashdata('color','green');
          return redirect($previous_url);
    }
    else {
          $this->session->set_flashdata('msg','Details Not Changed');
          $this->session->set_flashdata('color','red');
            return redirect($previous_url);
    }
  }
	public function bidbyexisting()
	{
		$previous_url = $this->session->userdata('previous_url');
		$result=$this->input->post();
		$this->storemodel->bidbyexisting($result);
		sleep(1);
			return redirect($previous_url);
	}
 public function report_product()
 {
	 $previous_url = $this->session->userdata('previous_url');

 		$data=$this->input->post();
			if ($this->storemodel->report_product($data)) {
				return redirect($previous_url);
			}
			return redirect($previous_url);
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
				'category',
				'date'
			]);

			$this->storemodel->addpost($pdata);
			$postID=$this->storemodel->fetch_post_id();
			$bdata=$this->input->post(['bid_by','post_id','post_by']);
			$bdata['new_id_product']=$postID->product_id;
			$number_of_files = sizeof($_FILES['file_upload']['tmp_name']);
			$files = $_FILES['file_upload'];


			for ($i=0; $i <$number_of_files ; $i++) {
				$config = array();
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|gif';
				$config['upload_path'] = FCPATH.'uploads/customers_needs/';
				$_FILES['file_upload']['name'] = $files['name'][$i];
				$_FILES['file_upload']['type'] = $files['type'][$i];
				$_FILES['file_upload']['tmp_name'] = $files['tmp_name'][$i];
				$_FILES['file_upload']['error'] = $files['error'][$i];
				$_FILES['file_upload']['size'] = $files['size'][$i];
				$this->upload->initialize($config);
				$cfimage=$_FILES['file_upload']['name'] = $files['name'][0];
				if ($this->upload->do_upload('file_upload')) {
					$imgdata=$this->upload->data();

					$insert[$i]['image']= $imgdata['file_name'];
					$insert[$i]['upload_by']= $sessiondata->ID;
					$insert[$i]['post_id']= $postID	->product_id;
				}
			}

				if ($bdata['post_id'] != NULL ){
					$result= $this->sellermodel->addbid($bdata);
					 $this->session->set_flashdata('msg','Your New Product is Now Live :)');
		 			$this->session->set_flashdata('msg_class','alert-success');
				}
			if ($this->storemodel->addCimages($insert) && $this->storemodel->addCFimage($cfimage,$sessiondata->ID,$postID->product_id))
			{
				$this->session->set_flashdata('msg','Your New Product is Now Live :)');
				$this->session->set_flashdata('msg_class','alert-success');
				if ($result) {
						return redirect('store');
				}
				else {
					return redirect('store/customer_store');
				}

			}
			else {
				$this->session->set_flashdata('msg','Something Went Wrong! Unable to Make Your Product Live :(');
				$this->session->set_flashdata('msg_class','alert-danger');

					return redirect('seller');

			}
		}
		public function user_cart()
    {
        $previous_url=$this->session->userdata('previous_url');

        $pid=$this->input->post('p_id');
        $q=$this->input->post('quantity');
        $user_id=$this->session->userdata('userID');
        $status=1;

        $check=$this->storemodel->same_cart($pid,$user_id);
        if($check==NULL)
        {
            $this->storemodel->addtocart($pid,$q,$user_id,$status);
            sleep(1);
            return redirect($previous_url);

        }
        if($check!=array())
        {
            $old_quantity=$check->quantity;
            $new_quantity=(int)$old_quantity+(int)$q;
            $this->storemodel->update_cart($pid,$user_id,$new_quantity);
            sleep(1);
            return redirect($previous_url);
        }


    }
    public function order()
    {
        $user_id=$this->input->post('order_by');

        $seller_id[]=$this->input->post('seller_id[]');
        $city=$this->input->post('city');
        $street=$this->input->post('street');
        $house=$this->input->post('house');
				$phone=$this->input->post('phone_number');
        $address=$city." ".$street." ".$house;
        $batch=$this->storemodel->order($user_id);
        foreach($batch as $b)
        {
        $order_by=$user_id;
        $product_id=$b->p_id;
        $quantity=$b->quantity;
        $status=$b->status;
        $shipping_address=$address;
				$phone_number=$phone;

        $this->storemodel->update_status($product_id);
        $this->storemodel->add_order($order_by,$product_id,$quantity,$shipping_address,$phone_number);
			}
			return redirect($previous_url);
    }
    public function cart_x()
    {
        $cart_id=$this->input->post('cart_id');
        $this->storemodel->cart_x($cart_id);
        return redirect('store/cart');
    }
		public function deletepost($id)
		{
			$previous_url=$this->session->userdata('previous_url');
			$this->storemodel->deletepost($id);
			return redirect($previous_url);
		}
		}
