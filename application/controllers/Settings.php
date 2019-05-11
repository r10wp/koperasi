<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->cekLogin();
  }

  public function data_koperasi()
  {
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data1 = array('isi' => $this->input->post('1'));
      $data2 = array('isi' => $this->input->post('2'));
      $data3 = array('isi' => $this->input->post('3'));
      $data4 = array('isi' => $this->input->post('4'));
      $data5 = array('isi' => $this->input->post('5'));
      $data6 = array('isi' => $this->input->post('6'));


      $this->db->update('data_koperasi', $data1, array('no' => 1));
      $this->db->update('data_koperasi', $data2, array('no' => 2));
      $this->db->update('data_koperasi', $data3, array('no' => 3));
      $this->db->update('data_koperasi', $data4, array('no' => 4));
      $this->db->update('data_koperasi', $data5, array('no' => 5));
      $this->db->update('data_koperasi', $data6, array('no' => 6));


      $this->session->set_flashdata('PesanSukses', 'Data Koperasi Berhasil di Rubah');
      redirect('Settings/data_koperasi');
    }
    $options = array(
      'table' => 'data_koperasi',
    );
    $data['cetak_detail'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/Settings/informasi_koperasi';
    $this->load->view('backend', $data);
  }

  public function ketetapan_koperasi()
  {
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data7 = array('isi' => rupiahToInt($this->input->post('7')));
      $this->db->update('data_koperasi', $data7, array('no' => 7));

      $data8 = array('isi' => rupiahToInt($this->input->post('8')));
      $this->db->update('data_koperasi', $data8, array('no' => 8));

      $this->session->set_flashdata('PesanSukses', 'Data Koperasi Berhasil di Rubah');
      redirect('Settings/ketetapan_koperasi');
    }
    $options = array(
      'table' => 'data_koperasi',
    );
    $data['cetak_detail'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/Settings/ketetapan_informasi';
    $this->load->view('backend', $data);
  }





}
