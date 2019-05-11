<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class my404 extends CI_Controller {
  public function __construct() {
     parent::__construct();
  }
  public function index()
  {
      $this->output->set_status_header('404');
      $data['content'] = 'This is my 404 page'; // View name
      $this->load->view('errors/error2',$data);//loading in my template
  }
}
?>
