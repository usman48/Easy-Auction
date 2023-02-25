<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class errors extends CI_Controller {
  public function index()
  {
    $this->load->view('errors/403');
  }
  public function suspended()
  {
    $this->load->view('errors/suspended');
  }
}
