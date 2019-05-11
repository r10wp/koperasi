<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_pinjaman extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->cekLogin();
  }

  public function index()
  {
    redirect('Jenis_pinjaman/list');
  }

  public function list()
  {
    $data = $this->data_table1;
    $options = array( 'table' => 'jenis_pinjaman');
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/Jenis_pinjaman/list';
    $this->load->view('backend', $data);
  }

  public function add()
  {
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'nama' => $this->input->post('nama'),
        'bunga_pinjaman' => $this->input->post('bunga'),
        'batas_minimal_pinjaman' => rupiahToInt($this->input->post('min')),
        'batas_maksimal_pinjaman' => rupiahToInt($this->input->post('max')),
        'batas_jumlah_angsuran' => $this->input->post('angsur'),
        'denda_per_hari' => rupiahToInt($this->input->post('denda')),
        'keterangan' => $this->input->post('ket'),
      );
      $this->db->insert('jenis_pinjaman', $data);
      $this->session->set_flashdata('PesanSukses', 'Jenis Pinjaman Baru Berhasil Ditambah');
      redirect('Jenis_pinjaman');
    }
    redirect('Jenis_pinjaman');
  }

  public function edit($prim_kode)
  {
    $data = $this->data_table1;
    $options = array( 'table' => 'jenis_pinjaman', 'where' => array('id'=> $prim_kode));
    $data['cetak_detail1'] = $this->M_universal->index($options);
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'nama' => $this->input->post('nama'),
        'bunga_pinjaman' => $this->input->post('bunga'),
        'batas_minimal_pinjaman' => rupiahToInt($this->input->post('min')),
        'batas_maksimal_pinjaman' => rupiahToInt($this->input->post('max')),
        'batas_jumlah_angsuran' => $this->input->post('angsur'),
        'denda_per_hari' => rupiahToInt($this->input->post('denda')),
        'keterangan' => $this->input->post('ket'),
      );
      $this->db->update('jenis_pinjaman', $data, array('id' => $prim_kode));
      $this->session->set_flashdata('PesanSukses', 'Data Jenis Pinjaman Berhasil Dirubah');
      redirect('Jenis_pinjaman');
    }
    $data['prim_kode'] = $prim_kode;
    $options = array( 'table' => 'jenis_pinjaman');
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/Jenis_pinjaman/edit';
    $this->load->view('backend', $data);
  }

  public function delete($prim_kode)
  {
    $this->db->delete('jenis_pinjaman', array('id' => $prim_kode));
    $this->session->set_flashdata('PesanSukses', 'Data Jenis Pinjaman Berhasil Dihapus');
    redirect('Jenis_pinjaman');
  }
}
