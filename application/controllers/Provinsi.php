<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi extends MY_Controller {
  public function __construct()
  {
    parent::__construct();  
    $this->cekLogin();

  }
  public function index()
  {
    redirect('Provinsi/list');
  }

  public function list()
  {
    $data = $this->data_table1;
    $options = array( 'table' => 'provinsi');
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/Provinsi/list';
    $this->load->view('backend', $data);
  }

  public function add()
  {
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'nama' => $this->input->post('nama_provinsi'),
      );
      $this->db->insert('provinsi', $data);
      $this->session->set_flashdata('PesanSukses', 'Provinsi Baru Berhasil Ditambah');
      redirect('Provinsi/list');
    }
    $data['content'] = 'Modul/Provinsi/add';
    $this->load->view('backend', $data);
  }

  public function edit($prim_kode)
  {
    $data = $this->data_table1;
    $options = array( 'table' => 'provinsi', 'where' => array('id'=> $prim_kode));
    $data['cetak_detail1'] = $this->M_universal->index($options);
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'nama' => $this->input->post('nama_provinsi'),
      );
      $this->db->update('provinsi', $data, array('id' => $prim_kode));
      $this->session->set_flashdata('PesanSukses', 'Data Provinsi Berhasil Dirubah');
      redirect('Provinsi/list');
    }
    $data['prim_kode'] = $prim_kode;
    $options = array( 'table' => 'provinsi');
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/Provinsi/edit';
    $this->load->view('backend', $data);
  }

  public function delete($prim_kode)
  {
    $this->db->delete('provinsi', array('id' => $prim_kode));
    $this->session->set_flashdata('PesanSukses', 'Data Provinsi Berhasil Dihapus');
    redirect('Provinsi/list');
  }

}
