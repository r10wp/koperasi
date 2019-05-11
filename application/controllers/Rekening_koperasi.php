<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening_koperasi extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->cekLogin();

  }
  public function index()
  {
    $data = $this->data_table1;
    $data['cetak_list1'] = $this->M_universal->rekening_koperasi();
    $data['cetak_bank'] = $this->M_universal->list_bank();
    $data['content'] = 'Modul/Rekening_koperasi/rekening';
    $this->load->view('backend', $data);
  }

  public function add()
  {
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'no_rekening' => $this->input->post('rekening'),
        'id_bank_koperasi' => $this->input->post('bank'),
        'nama_pemilik_rekening' => $this->input->post('pemilik')
      );
      $this->db->insert('rekening_koperasi', $data);
      $this->session->set_flashdata('PesanSukses', 'Rekening Koperasi Baru Berhasil Ditambah');
      redirect('Rekening_koperasi');
    }
    redirect('Rekening_koperasi');
  }

  public function edit($prim_kode)
  {
    $data = $this->data_table1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'no_rekening' => $this->input->post('rekening'),
        'id_bank_koperasi' => $this->input->post('bank'),
        'nama_pemilik_rekening' => $this->input->post('pemilik'),
        'status_rekening_koperasi' => $this->input->post('status')
      );
      $this->db->update('rekening_koperasi', $data, array('id' => $prim_kode));
      $this->session->set_flashdata('PesanSukses', 'Data Keperluan Pinjam Berhasil Dirubah');
      redirect('Rekening_koperasi');
    }
    $data['prim_kode'] = $prim_kode;
    $options = array( 'table' => 'Rekening_koperasi');
    $data['cetak_list1'] = $this->M_universal->rekening_koperasi($options);
    $options = array( 'table' => 'Rekening_koperasi','where' => array('id'=>$prim_kode));
    $data['cetak_detail1'] = $this->M_universal->index($options);
    $data['cetak_bank'] = $this->M_universal->list_bank();
    $data['content'] = 'Modul/Rekening_koperasi/rekening_edit';
    $this->load->view('backend', $data);
  }

  public function delete($prim_kode)
  {
    $this->db->delete('jenis_keperluan_pinjaman', array('id' => $prim_kode));
    $this->session->set_flashdata('PesanSukses', 'Data Jenis Keperluan Pinjaman Berhasil Dihapus');
    redirect('Jenis_keperluan_pinjaman');
  }
}
