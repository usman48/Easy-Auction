<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sellermodel extends CI_Model {
  public function addpost($pdata)
  {
    $result=$this->db->insert('products',$pdata);
    return $result;
  }
  public function addbid($bdata)
  {
    $result=$this->db->insert('bids',$bdata);
    return $result;
  }
  public function addimages($insert)
  {
    $result=$this->db->insert_batch('uploads',$insert);
    return $result;
    }
    public function fetch_images()
    {
      $pimages=$this->db->select('*')
                        ->get('uploads');
                        return $pimages->result();
    }
    public function fetch_post_id()
    {
        $last_row = $this->db->order_by('product_id',"desc")
          ->limit(1)
          ->get('products');
          return $last_row->row();

    }

    public function fetch_products()
    {
      $fetch_products=$this->db->select('*')
                        ->from('products')
                        ->get();
      return $fetch_products->result();
    }

    public function updateproduct($product_id,$product_price,$quantity,$product_description)
    {
      $data = array(
        'product_price' =>$product_price,
        'quantity' => $quantity,
        'product_description' => $product_description
       );
       $result=$this->db->where('product_id',$product_id)
                        ->update('products',$data);
                        return $result;
    }
    public function numofbids()
    {
        $numofbids=$this->db->select('bid_by, COUNT(bid_id) as total')
                  ->group_by('bid_by')
                  ->get('bids');
      return $numofbids->result();
    }
    public function numofreportedproducts()
    {
        $numofreportedproducts=$this->db->select('uploaded_by, COUNT(id) as total')
                  ->group_by('uploaded_by')
                  ->where('status',1)
                  ->get('reported_items');
      return $numofreportedproducts->result();
    }
    public function numofoders()
    {
        $numofoders=$this->db->select('seller_id, COUNT(order_id) as total')
                  ->group_by('seller_id')
                  ->where('order_status',1)
                  ->get('orders');
      return $numofoders->result();
    }
    public function updateStatus($product_id,$status)
    {

        $data=array('status' => $status, );
      $result=$this->db->where('product_id',$product_id)
                        ->update('products',$data);
                        return $result;
    }
    public function fetch_orders()
    {
      $seller_id=$this->session->userdata('userID');
      $result=$this->db->select('*')
                        ->where('seller_id',$seller_id)
                        ->get('orders');
                        return $result->result();
    }
    public function updateOrderStatus($product_id,$status)
    {
      $data = array('order_status' =>$status);
      $result=$this->db->where('product_id',$product_id)
                        ->update('orders',$data);
                        return $result;
    }
    public function addFimage($Fimage,$upload_by,$post_id)
    {
      $data = array(
        'upload_by' => $upload_by ,
        'post_id' => $post_id ,
        'image'=> $Fimage
      );
      $result=$this->db->insert('featured_images',$data);
                        return $result;
    }
    public function updateReport($id,$status)
    {
      $array = array('status' => $status);
      $result=$this->db->where('item_id',$id)
                         ->update('reported_items',$array);
                         return $result;
    }
    public function updateQuantity($product_id)
    {
      $quantity=$this->db->select('quantity')
                  ->from('products')
                  ->get();
                  return $quantity->row();
    }
    public function updateNQ($product_id,$newQ)
    {
        $data=array(
          'quantity' => $newQ
        );
        $this->db->where('product_id',$product_id)
                  ->update('products',$data);
    }

}
