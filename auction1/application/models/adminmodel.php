<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adminmodel extends CI_Model {
  public function count_sellers()
  {
    $numofsellers=$this->db->select('*')
                      ->from('users')
                      ->where('usertype',2)
                      ->get();
    return $numofsellers->num_rows();
  }
  public function count_customers()
  {
    $numofcustomers=$this->db->select('*')
                      ->from('users')
                      ->where('usertype',3)
                      ->get();
    return $numofcustomers->num_rows();
  }
  public function count_products()
  {
    $numofproducts=$this->db->select('*')
                      ->from('products')
                      ->get();
    return $numofproducts->num_rows();
  }
  public function count_reports()
  {
    $numofreports=$this->db->select('*')
                      ->from('reported_items')
                      ->get();
    return $numofreports->num_rows();
  }
  public function fetch_users()
  {
    $fetch_users=$this->db->select('*')
                      ->from('users')
                      ->get();

    return $fetch_users->result();

  }
  public function fetch_reporteditems()
  {
    $fetch_reporteditems=$this->db->select('*')
                      ->from('reported_items')
                      ->get();
    return $fetch_reporteditems->result();
  }
  public function fetch_comments()
  {
    $fetch_comments=$this->db->select('*')
                      ->from('seller_comments')
                      ->where('comment_by',1)
                      ->get();
                      return $fetch_comments->result();
  }
  public function changeStatus($id,$status,$comment,$comment_on)
  {
            $newS=['status'=>$status];
            $data=['comment'=>$comment,'comment_on'=>$comment_on];
              $this->db->where('ID',$id)
                        ->update('users',$newS);
              $this->db->where('comment_on',$id)
                        ->update('seller_comments',$data);
                      return true;
  }


    public function numofsellersproducts()
    {
        $numofsellersproducts=$this->db->select('upload_by, COUNT(product_id) as total')
                  ->group_by('upload_by')
                  ->get('products');
      return $numofsellersproducts->result();
    }
    public function numofAdposts()
    {
        $numofAdposts=$this->db->select('upload_by, COUNT(product_id) as total')
                  ->group_by('upload_by')
                  ->get('products');
      return $numofAdposts->result();
    }

    public function update_password($new_password)
    {
      $data = array('password' => $new_password);
      $id=$this->session->userdata('userID');
      $result=$this->db->where('ID',$id)
                        ->update('users',$data);
                        return $result;
    }

}
