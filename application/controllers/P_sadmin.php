<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P_sadmin extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->cekLogin();
  }
  
  public function index()
  {
    $data = $this->data_table1;
    $data['content'] = 'Modul/P_sadmin/dashboard';
    $this->load->view('backend', $data);
  }




}
