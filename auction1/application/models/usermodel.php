<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class usermodel extends CI_Model {
  public function add_user($data)
  {
    $result=$this->db->insert('users',$data);
    return $result;
  }
  public function fetch_id($email)
  {
      $id=$this->db->select('ID')
                  ->where(['email'=>$email])
                  ->from('users')
                  ->get();
                  return $id->row();
  }
  public function login($email,$password)
  {
    $result=$this->db->where(['email'=>$email,'password'=>$password])
                      ->from('users')
                      ->get();
    return $result->num_rows();
  }
  public function user_type($email,$password)
  {
    $type=$this->db->select('*')
              ->from('users')
              ->where(['email'=>$email,'password'=>$password])
              ->get();
        return $type->row();
  }
  public function getdatabysession()
  {
    $email=$this->session->userdata('email');
    $name=$this->db->select('*')
               ->from(['users'])
               ->where('email',$email)
               ->get();
    return $name->row();
  }
  public function update($user_phone,$user_address,$ID)
  {
    $new_data = array(
      'user_address' => $user_address,
      'user_phone' => $user_phone
      );
    $result=$this->db->where('ID',$ID)
            ->update('users',$new_data);
            return $result;

  }
  public function checkemail($email)
  {
    $result=$this->db->select('*')
                     ->from('users')
                     ->where('email',$email)
                     ->get();
    if ($result->num_rows() > 0)
    {
      return false;
    }
    else
    {
      return true;
    }
 }
}
