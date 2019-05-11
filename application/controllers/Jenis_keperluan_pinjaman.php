<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_keperluan_pinjaman extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->cekLogin();

  }
  public function index()
  {
    redirect('Jenis_keperluan_pinjaman/list');
  }

  public function list()
  {
    $data = $this->data_table1;
    $options = array( 'table' => 'jenis_keperluan_pinjaman');
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/Jenis_keperluan_pinjaman/list';
    $this->load->view('backend', $data);
  }

  public function add()
  {
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'jenis' => $this->input->post('jenis'),
        'keterangan' => $this->input->post('keterangan'),
      );
      $this->db->insert('jenis_keperluan_pinjaman', $data);
      $this->session->set_flashdata('PesanSukses', 'Keperluan Pinjam Baru Berhasil Ditambah');
      redirect('Jenis_keperluan_pinjaman');
    }
    redirect('Jenis_keperluan_pinjaman');
  }

  public function edit($prim_kode)
  {
    $data = $this->data_table1;
    $options = array( 'table' => 'jenis_keperluan_pinjaman', 'where' => array('id'=> $prim_kode));
    $data['cetak_detail1'] = $this->M_universal->index($options);
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'jenis' => $this->input->post('jenis'),
        'keterangan' => $this->input->post('keterangan'),
      );
      $this->db->update('jenis_keperluan_pinjaman', $data, array('id' => $prim_kode));
      $this->session->set_flashdata('PesanSukses', 'Data Keperluan Pinjam Berhasil Dirubah');
      redirect('Jenis_keperluan_pinjaman');
    }
    $data['prim_kode'] = $prim_kode;
    $options = array( 'table' => 'jenis_keperluan_pinjaman');
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/Jenis_keperluan_pinjaman/edit';
    $this->load->view('backend', $data);
  }

  public function delete($prim_kode)
  {
    $this->db->delete('jenis_keperluan_pinjaman', array('id' => $prim_kode));
    $this->session->set_flashdata('PesanSukses', 'Data Jenis Keperluan Pinjaman Berhasil Dihapus');
    redirect('Jenis_keperluan_pinjaman');
  }
}
