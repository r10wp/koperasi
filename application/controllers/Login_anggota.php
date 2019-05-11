<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_anggota extends CI_Controller {
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
    if($this->M_universal->logged_id_anggota() != null)
    {
      if ($this->session->userdata('jabatan') == 1 && $this->session->userdata('baru') == 0){
        redirect('Nasabah');
      }elseif ($this->session->userdata('jabatan') == 2 && $this->session->userdata('baru') == 0) {
        redirect('Nasabah');
      }elseif ($this->session->userdata('baru') == 1) {
        redirect('New_nasabah');
      }
    }else{
      $this->load->view('LoginAnggota');
    }
  }


  public function daftarbaru()
  {
    $this->load->view('LoginPendaftaranAnggota');
  }

  public function baru()
  {
    $this->load->view('loginCalonAnggota');
  }


  public function add()
  {
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $send = $this->input->post('send');
      $ktp = $this->input->post('ktp');
      $password_post = $this->input->post('pass');

      $cekEmail = $this->M_universal->checkDuplicateEntry('anggota', 'email' , $send);
      $cekNomor = $this->M_universal->checkDuplicateEntry('anggota', 'no_hp1' , $send);
      $cekKTP = $this->M_universal->checkDuplicateEntry('anggota', 'no_ktp' , $ktp);

      if($cekEmail > 0){
        $this->session->set_flashdata('PesanError', 'Email Sudah Pernah terdaftar');
        redirect('Login_anggota/daftarbaru');
      }
      if ($cekNomor > 0) {
        $this->session->set_flashdata('PesanError', 'Nomor Telephone Sudah Pernah terdaftar');
        redirect('Login_anggota/daftarbaru');
      }
      if ($cekKTP > 0) {
        $this->session->set_flashdata('PesanError', 'KTP Sudah Pernah terdaftar');
        redirect('Login_anggota/daftarbaru');
      }

      $password = sufflekata(8);
      $salt = sufflekata(10);
      $userkode = sufflekata(6);
      $set = $password_post.$salt;
      $setpassword = password_hash($set , PASSWORD_BCRYPT);

      $options = array( //Menentukan Besaran Saldo
        'table' => 'data_koperasi',
        'where' => array('no' => 7),
      );
      $data_koperasi = $this->M_universal->index($options);
      foreach ($data_koperasi as $set_wajib_bayar_data) {
         $wajib_bayar = $set_wajib_bayar_data->isi;
      }

      if (is_numeric($send)) {
        $send = str_replace("+62","0",substr($send,0,16));
        $data = array(
          'nomor_anggota' => $userkode,
          'salt' => $salt,
          'password' => $setpassword,
          'no_ktp' => $this->input->post('ktp'),
          'no_hp1' => $send,
          'jumlah_pokok_harus_dibayar' => $wajib_bayar
        );
        $gateway = "SMS";
        kirim_sms($send,'Konfirmasi pendaftaran koperasi diterima. Silahkan login dengan username : '. $userkode. ' dan password yang sudah masukkan sebelumnya');
      }else {
        $this->load->library('email');
        $data = array(
          'nomor_anggota' => $userkode,
          'salt' => $salt,
          'password' => $setpassword,
          'no_ktp' => $this->input->post('ktp'),
          'email' => $send,
          'jumlah_pokok_harus_dibayar' => $wajib_bayar
        );
        $gateway = "E-MAIL";

        $config = array();
  			$config['charset'] = 'utf-8';
  			$config['useragent'] = 'Codeigniter';
  			$config['protocol']= "smtp";
  			$config['mailtype']= "html";
  			$config['smtp_host']= "ssl://smtp.gmail.com";
  			$config['smtp_port']= 465;
  			$config['smtp_timeout']= "5";
  			$config['smtp_user']= "tugasakhirta2018@gmail.com";
  			$config['smtp_pass']= "?1a2b3c4d5e";
  			$config['crlf']="\r\n";
  			$config['newline']="\r\n";

  			$config['wordwrap'] = TRUE;
  			$dataEmail['userkode'] = $userkode;
        $dataEmail['password'] = $password;

  			$this->email->initialize($config);
  			$this->email->from('Koperasi Dharma Bakti');
  			$this->email->to($send);
  			$this->email->subject('Permintaan Pendaftaran Anggota');
  			//$message = $this->load->view('AppSupport/pesan_kirim_password',$dataEmail,TRUE);
  			$this->email->message("User Kode : ".$userkode);

  			$this->email->send();
      }

      $this->db->insert('anggota', $data);
      $this->session->set_flashdata('PesanSukses', 'Pendaftaran Berhasil. Silahkan Buka ' .$gateway. ' Anda untuk mengetahui username anda. Hubungi Admin Jika dalam 10 menit tidak menerima konfirmasi');
      redirect('Login_anggota');
    }

  }

  public function logout()
  {
    $this->session->sess_destroy();
    $url=base_url('');
    redirect($url);
  }


}
