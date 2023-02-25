<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class admin extends CI_Controller {

	public function index()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype==1)
		{
			$sessiondata=$this->usermodel->getdatabysession();
			$numofsellers=$this->adminmodel->count_sellers();
			$numofcustomers=$this->adminmodel->count_customers();
			$numofproducts=$this->adminmodel->count_products();
			$numofreports=$this->adminmodel->count_reports();
			$this->load->view('admin/dashboard',compact('sessiondata','numofsellers','numofcustomers','numofproducts','numofreports'));
		}
		else
		{
			redirect (errors);
		}
	}
	public function seller()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype==1)
		{
			$sessiondata=$this->usermodel->getdatabysession();
			$fetch_users=$this->adminmodel->fetch_users();
			$fetch_comments=$this->adminmodel->fetch_comments();
			$numofsellersproducts=$this->adminmodel->numofsellersproducts();
			$this->load->view('admin/seller',compact('sessiondata','fetch_users','fetch_comments','numofsellersproducts'));
		}
		else
		{
			redirect (errors);
		}
	}
	public function profile()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype==1)
		{
			$sessiondata=$this->usermodel->getdatabysession();
			$this->load->view('admin/profile',compact('sessiondata'));
		}
		else
		{
			redirect (errors);
		}
	}
	public function manage_customer()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype==1)
		{
			$sessiondata=$this->usermodel->getdatabysession();
			$fetch_users=$this->adminmodel->fetch_users();
			$numofAdposts=$this->adminmodel->numofAdposts();
			$fetch_comments=$this->adminmodel->fetch_comments();
			$this->load->view('admin/manage_customer',compact('sessiondata','fetch_users','numofAdposts','fetch_comments'));
		}
		else
		{
			redirect (errors);
		}
	}
	public function reported_items()
	{
		$usertype=$this->session->userdata('usertype');
		if($usertype==1)
		{
			$sessiondata=$this->usermodel->getdatabysession();
			$fetch_reporteditems=$this->adminmodel->fetch_reporteditems();
			$fetch_users=$this->adminmodel->fetch_users();
			$this->load->view('admin/reported_items',compact('sessiondata','fetch_reporteditems','fetch_users'));
		}
		else
		{
			redirect (errors);
		}
	}
	public function changeStatus()
	{
		$result=$this->input->post();
		$id=$this->input->post('ID');
		$status=$this->input->post('status');
		$usertype=$this->input->post('usertype');
		$comment_on=$this->input->post('comment_on');
		if ($status==1){
			$comment="No Voilation";
		}
		else
		{
			$comment="Account Suspended by Admin";
		}
		if ($this->adminmodel->changeStatus($id,$status,$comment,$comment_on))
		{
			$this->session->set_flashdata('msg','Account Status Changed Successfully');
			$this->session->set_flashdata('msg_class','alert-success');
			if ($usertype==2) {
				return redirect('admin/seller');
			}
			else {
				return redirect('admin/manage_customer');
			}
		}
		else {
			$this->session->set_flashdata('msg','Something Went Wrong! Status Not Changed');
			$this->session->set_flashdata('msg_class','alert-danger');
			if ($usertype==2) {
				return redirect('admin/seller');
			}
			else {
				return redirect('admin/manage_customer');
			}
		}
	}
	public function Email()
	{
		$config = array();
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = '';
		$config['smtp_user'] = '';
		$config['smtp_pass'] = '';
		$config['smtp_port'] = 25;
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$from_email = "usmanmjad076@gmail.com";
		$to_email = $this->input->post('email');
		$this->email->from($from_email, 'Identification');
		$this->email->to($to_email);
		$this->email->subject('Send Email Codeigniter');
		$this->email->message('The email send using codeigniter library');
		//Send mail
		if($this->email->send())
		echo "email_sent","Congragulation Email Send Successfully.";
		else
		echo "email_sent","You have encountered an error";
		$this->load->view('admin/dashboard');
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
						return redirect('admin/profile');
						}
				else {
					$this->session->set_flashdata('msg','Password Not Changed');
					$this->session->set_flashdata('msg_class','alert-danger');
						return redirect('admin/profile');
				}

			}
		else {
					$this->session->set_flashdata('msg','Password Not Changed');
					$this->session->set_flashdata('msg_class','alert-danger');
						return redirect('admin/profile');
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
            return redirect('admin/profile');
    }
    else {
          $this->session->set_flashdata('msg','Details Not Changed');
          $this->session->set_flashdata('msg_class','alert-danger');
            return redirect('admin/profile');
    }
  }

}
