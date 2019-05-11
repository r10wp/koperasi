<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengurus extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->cekLogin();
    // if ($this->session->userdata('jabatan') != 1) {
    //   $url=base_url('');
    //   redirect($url);
    // }
  }
  public function index()
  {
    redirect('Pengurus/list');
  }

  public function list()
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'pengurus'
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/Pengurus/list';
    $this->load->view('backend', $data);
  }

  public function add()
  {
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $password = sufflekata(6);
      $salt = sufflekata(10);
      $set = $password.$salt;
      $setpassword = password_hash($set , PASSWORD_BCRYPT);
      $data = array(
        'username' => $this->input->post('user'),
        'id_jabatan_pengurus' => $this->input->post('level'),
        'nama' => $this->input->post('nama'),
        'email_pengurus' => $this->input->post('email'),
        'no_hp_pengurus' => $this->input->post('no_hp'),
        'alamat' => $this->input->post('alamat'),
        'salt' => $salt,
        'foto' => $salt.".jpg",
        'password' => $setpassword,
        'gender' => $this->input->post('gender'),
      );
      $this->db->insert('pengurus', $data);
      $this->upload_foto_pengurus('PENGURUS/','foto', $salt.".jpg");
      kirim_sms($this->input->post('no_hp'),'Konfirmasi pendaftaran pengurus koperasi. Silahkan login dengan password : '. $password. '');
      $this->session->set_flashdata('PesanSukses', 'Pengurus Berhasil Ditambah');
      redirect('Pengurus/list');
    }
    $data['content'] = 'Modul/Pengurus/add';
    $this->load->view('backend', $data);
  }

  public function edit($prim_kode)
  {
    $data = $this->data_table1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'username' => $this->input->post('user'),
        'id_jabatan_pengurus' => $this->input->post('level'),
        'nama' => $this->input->post('nama'),
        'email_pengurus' => $this->input->post('email'),
        'no_hp_pengurus' => $this->input->post('no_hp'),
        'alamat' => $this->input->post('alamat'),
        'gender' => $this->input->post('gender'),
        'status_pengurus' => $this->input->post('status'),
      );
      $this->upload_foto_pengurus('PENGURUS/','foto', $this->input->post('foto_salt'));
      $this->db->update('pengurus', $data, array('id' => $prim_kode));
      $this->session->set_flashdata('PesanSukses', 'Data Pengurus Berhasil Dirubah');
      redirect('Pengurus/edit/'.$prim_kode);
    }
    $data['prim_kode'] = $prim_kode;
    $options = array(
      'table' => 'pengurus',
      'where' => array('id'=> $prim_kode)
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/Pengurus/edit';
    $this->load->view('backend', $data);
  }

  function upload_foto_pengurus($url,$field_name,$kode_setor){
    $config['upload_path'] = './asset/'.$url;
    $config['allowed_types'] = 'jpg';
    $config['max_size'] = '10000';
    $config['max_width']  = '10240';
    $config['max_height']  = '7680';
    $config['file_name']  = $kode_setor;
    $config['overwrite'] = TRUE;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    $this->upload->do_upload($field_name);
  }

  public function delete($prim_kode)
  {
    $this->db->delete('pengurus', array('id' => $prim_kode));
    $this->session->set_flashdata('PesanSukses', 'Data Pengurus Berhasil Dihapus');
    redirect('Pengurus');
  }

}
