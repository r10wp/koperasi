<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->cekLogin();

  }
  public function index()
  {
    redirect('Pekerjaan/list');
  }

  public function list()
  {
    $data = $this->data_table1;
    $options = array( 'table' => 'pekerjaan');
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/Pekerjaan/list';
    $this->load->view('backend', $data);
  }

  public function add()
  {
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'nama_pekerjaan' => $this->input->post('nama'),
      );
      $this->db->insert('pekerjaan', $data);
      $this->session->set_flashdata('PesanSukses', 'Data Pekerjaan Baru Berhasil Ditambah');
      redirect('Pekerjaan');
    }
    redirect('Pekerjaan');
  }

  public function edit($prim_kode)
  {
    $data = $this->data_table1;
    $options = array( 'table' => 'pekerjaan', 'where' => array('id_pekerjaan'=> $prim_kode));
    $data['cetak_detail1'] = $this->M_universal->index($options);
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'nama_pekerjaan' => $this->input->post('nama'),
      );
      $this->db->update('pekerjaan', $data, array('id_pekerjaan' => $prim_kode));
      $this->session->set_flashdata('PesanSukses', 'Data Pekerjaan Berhasil Dirubah');
      redirect('Pekerjaan');
    }
    $data['prim_kode'] = $prim_kode;
    $options = array( 'table' => 'pekerjaan');
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/Pekerjaan/edit';
    $this->load->view('backend', $data);
  }

  public function delete($prim_kode)
  {
    $this->db->delete('pekerjaan', array('id_pekerjaan' => $prim_kode));
    $this->session->set_flashdata('PesanSukses', 'Data Jenis Keperluan Pinjaman Berhasil Dihapus');
    redirect('Pekerjaan');
  }
}
