<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class storemodel extends CI_Model {

  public function fetch_fimage()
  {
    $result=$this->db->select('*')
    ->get('featured_images');
    return $result->result();
  }
  public function fetch_cimages()
  {
    $pimages=$this->db->select('*')
    ->get('customer_uploads');
    return $pimages->result();
  }
  public function fetch_cfimage()
  {
    $result=$this->db->select('*')
    ->get('customer_fimages');
    return $result->result();
  }

  public function fetch_Relatedproducts($product_name,$company_name)
  {
    $this->db->select("*");
    $this->db->from('products');
    $this->db->like('product_name',$product_name);
    $this->db->or_like('product_company',$company_name);
    $relatedproducts= $this->db->get();
    return $relatedproducts->result();
  }
  public function fetch_RelatedNeeds($product_name,$company_name)
  {
    $this->db->select("*");
    $this->db->from('customer_needs');
    $this->db->like('product_name',$product_name);
    $this->db->or_like('product_company',$company_name);
    $relatedproducts= $this->db->get();
    return $relatedproducts->result();
  }
  public function fetch_bids()
  {
    $bidresult=$this->db->select('*')

    ->get('bids');
    // echo "<pre>";
    // echo print_r($bidresult->result());
    // exit;
    return $bidresult->result();

  }
  public function fetch_products($limit,$offset)
  {
    $fetch_products=$this->db->select('*')
    ->from('products')
    ->order_by('product_id',"DESC")
    ->limit($limit,$offset)
    ->get();
    return $fetch_products->result();
  }
  public function fetch_needs($limit,$offset)
  {
    $fetch_needs=$this->db->select('*')
    ->from('customer_needs')
    ->order_by('product_id',"DESC")
    ->limit($limit,$offset)
    ->get();
    return $fetch_needs->result();
  }
  public function fetch_cneeds()
  {
    $fetch_needs=$this->db->select('*')
    ->from('customer_needs')
    ->get();
    return $fetch_needs->result();
  }
  public function fetch_products_rows()
  {
    $fetch_products=$this->db->select('*')
    ->from('products')
    ->get();
    return $fetch_products->num_rows();
  }
  public function fetch_needs_rows()
  {
    $fetch_needs=$this->db->select('*')
    ->from('customer_needs')
    ->get();
    return $fetch_needs->num_rows();
  }
  public function addpost($pdata)
  {
    $result=$this->db->insert('customer_needs',$pdata);
    return $result;
  }
  public function fetch_post_id()
  {
    $last_row = $this->db->order_by('product_id',"desc")
    ->limit(1)
    ->get('customer_needs');
    return $last_row->row();

  }
  public function addCFimage($Fimage,$upload_by,$post_id)
  {
    $data = array(
      'upload_by' => $upload_by ,
      'post_id' => $post_id ,
      'image'=> $Fimage
    );
    $result=$this->db->insert('customer_fimages',$data);
    return $result;
  }
  public function addCimages($insert)
  {
    $result=$this->db->insert_batch('customer_uploads',$insert);
    return $result;
  }
  public function bidbyexisting($result)
  {

    $query = $this->db->get_where('bids', array('new_id_product' => $result['new_id_product'],'post_id'=>$result['post_id']));
    $count=$query->num_rows();
    if ($count==0) {
      $this->db->insert('bids',$result);
    }

  }
  public function report_product($data)
  {
    $result=$this->db->insert('reported_items',$data);
    return $result;
  }
  public function top_products()
  {
    $top_products=$this->db->select('product_id, COUNT(product_id) as total')
    ->group_by('product_id')
    ->order_by('total','DESC')
    ->where('order_status',2)
    ->get('orders');
    return $top_products->result();
  }
  public function top_sellers()
  {
    $top_sellers=$this->db->select('seller_id, COUNT(seller_id) as total')
    ->group_by('seller_id')
    ->order_by('total','DESC')
    ->where('order_status',2)
    ->get('orders');
    return $top_sellers->result();
  }
  public function addtocart($pid,$q,$user_id,$status)
  {
    $data=[
      'p_id' => $pid,
      'quantity' => $q,
      'user_id' => $user_id,
      'status' => $status,
    ];
    $result=$this->db->insert('cart',$data);
  }
  public function cart()
  {
    $cart_items=$this->db->select('*')
    ->from('cart')
    ->get();
    return $cart_items->result();
  }
  public function cart_x($cart_id)
  {
    $this->db->delete('cart',['cart_id'=>$cart_id]);
  }

  public function same_cart($p_id,$user_id)
  {
    $result=$this->db->select()
    ->from('cart')
    ->where(['p_id'=>$p_id,'user_id'=>$user_id,'status' => 1])
    ->get();
    if ($result->num_rows()==1)
    {
      return $result->row();
    }
    else
    {
      return 0;
    }

  }
  public function cart_notify($id)
  {
    $result=$this->db->select()
    ->from('cart')
    ->where(['user_id'=>$id,'status' => 1])
    ->get();
    return $result->num_rows();


  }
  public function update_cart($p_id,$user_id,$new_quantity)
  {

    $data=[

      'quantity' => $new_quantity,
      'status' => 1,
    ];
    $this->db->where(['p_id'=>$p_id,'user_id'=>$user_id])
    ->update('cart',$data);
  }
  public function order($user_id)
  {
    $r=$this->db->select()
    ->from('cart')
    ->where('user_id',$user_id)
    ->get();
    return $r->result();
  }
  public function add_order($order_by,$product_id,$quantity,$shipping_address,$phone_number)
  {
    $seller=$this->db->select('upload_by')
    ->from('products')
    ->where('product_id',$product_id)
    ->get();
    $seller_id=$seller->row()->upload_by;
    $data=[
      'order_by' => $order_by,
      'product_id' => $product_id,
      'seller_id' => $seller_id,
      'order_status' => 1,
      'quantity' => $quantity,
      'order_time' => date('Y-M-d H:i:s'),
      'shipping_address' => $shipping_address,
      'phone_number'=>$phone_number,
    ];
    $result=$this->db->insert('orders',$data);
  }
  public function update_status($product_id)
  {
    $data=array('status' => 0);
    $this->db->where('p_id',$product_id)
    ->update('cart',$data);
  }
  public function deletepost($id)
  {
    $this->db->where('product_id',$id)
    ->delete('customer_needs');
  }
  public function countBids($id)
  {
    $result=$this->db->select()
    ->from('bids')
    ->where('post_by',$id)
    ->get();
    return $result->num_rows();

  }
  public function AllBids($id)
  {
    $result=$this->db->select()
    ->from('bids')
    ->where('post_by',$id)
    ->get();
    return $result->result();

  }
}
