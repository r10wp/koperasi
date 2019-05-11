<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_pengurus extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('M_universal'));
    $this->load->helper(array('H_universal'));
    $this->load->library(array('Form_validation'));
    $this->load->helper(array('form', 'url'));
  }


  public function index()
  {
    if($this->M_universal->logged_id_pengurus())
    {
      redirect('Home');
    }else{
      $this->load->view('LoginPengurus');
    }
  }

}
