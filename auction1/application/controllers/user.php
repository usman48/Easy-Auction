<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class user extends CI_Controller {
  public function index()
  {
    $usertype=$this->session->userdata('usertype');
    if($usertype==1)
    {
      redirect (admin);
    }

    elseif($usertype==2 || $usertype==3)
    {
      redirect (store);
    }
    else {
      $this->load->view('login');
    }
  }
  public function register()
  {
    $this->load->view('reg_page');
  }
  public function user_registration()
  {
    $config=[
      'upload_path' => './uploads/user_images/',
      'allowed_types' => 'gif|jpg|png',
    ];


    $this->load->library('upload');
    $this->upload->initialize($config);
    $data=$this->input->post(['fullname','email','password','usertype','status','reg_date']);
    $email=$this->input->post('email');
    $usertype=$this->input->post('usertype');
    $checkemail=$this->usermodel->checkemail($email);

    if ($checkemail==true)
    {

        $this->upload->do_upload('user_img');
        $dataimg=$this->upload->data();
        $img_name=$dataimg['file_name'];
        $data['user_img']=$img_name;
        if($this->usermodel->add_user($data))
        {
          $this->session->set_flashdata('msg','User Registered');
          $this->session->set_flashdata('color','green');
          $this->load->view('login');
        }
        else
        {
          $this->session->set_flashdata('msg','Unable to Register');
          $this->session->set_flashdata('color','red');
          $this->load->view('login');
        }

    }
      else
      {
        $this->session->set_flashdata('msg','User Already Registered');
        $this->session->set_flashdata('color','red');
        $this->load->view('login');
      }

    }

    public function user_login()
    {
      $previous_url = $this->session->userdata('previous_url');
      $email=$this->input->post('email');
      $password=$this->input->post('password');

      if($this->usermodel->login($email,$password))
      {
        $result=$this->usermodel->user_type($email,$password);
        $utype=$result->usertype;
        $status=$result->status;
        $userID=$result->ID;
        if (($utype==2 || $utype==3) && $status==0) {
          $this->session->set_flashdata('msg','Account Suspended');
          $this->session->set_flashdata('color','orange');
          $this->load->view('login');
        }
        else {
          $sessiondata=array(
            'email'=>$email,
            'usertype'=>$utype,
            'userID'=>$userID,
          );
          $this->session->set_userdata($sessiondata);
          if($utype==1){
            return redirect($previous_url);
          }
          elseif($utype==2){
            return redirect($previous_url);
          }
          elseif ($utype==3){
            return redirect($previous_url);
          }
        }
      }
      else
      {
        $this->session->set_flashdata('msg','Pasword/Email Does Not Match');
        $this->session->set_flashdata('color','red');
        $this->load->view('login');
      }
    }
    public function logout()
    {
      $this->session->unset_userdata('email');
      $this->session->unset_userdata('usertype');
      return redirect(store);
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

  }
