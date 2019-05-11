<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kabupaten extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('M_universal'));
    $this->checklogin();

    // if ($this->session->userdata('LEVEL') != 1) {
    //   $url=base_url('');
    //   redirect($url);
    // }
  }
  public function index()
  {
    redirect('Kelompok/list');
  }


  public function list()
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'kelompok',
      'select' => array('*','kecamatan.id as id','kecamatan.nama as nama','provinsi.id as id_provinsi','provinsi.nama as provinsi'),
      'join' => array('provinsi' => 'provinsi.id = kabupaten.id_provinsi'));
    $data['cetak_list1'] = $this->M_universal->index($options);
    $options = array('table' => 'provinsi');
    $data['cetak_form1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/Kabupaten/list';
    $this->load->view('backend', $data);
  }

  public function add()
  {
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'id_provinsi' => $this->input->post('id_provinsi'),
        'nama' => $this->input->post('nama_kabupaten'),
      );
      $this->db->insert('kabupaten', $data);
      $this->session->set_flashdata('PesanSukses', 'Kabupaten Baru Berhasil Ditambah');
      redirect('Kabupaten/list');
    }
    redirect('Kabupaten');
  }

  public function edit($prim_kode)
  {
    $data = $this->data_table1;
    $data['prim_kode'] = $prim_kode;
    $options = array(
      'table' => 'kabupaten',
      'select' => array('kabupaten.id as id','kabupaten.nama as nama','provinsi.id as id_provinsi','provinsi.nama as provinsi'),
      'join' => array('provinsi' => 'provinsi.id = kabupaten.id_provinsi'),
      'where' => array('kabupaten.id'=> $prim_kode)
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'id_provinsi' => $this->input->post('id_provinsi'),
        'nama' => $this->input->post('nama_kabupaten'),
      );
      $this->db->update('kabupaten', $data, array('id' => $prim_kode));
      $this->session->set_flashdata('PesanSukses', 'Data Kabupaten Berhasil Dirubah');
      redirect('Kabupaten/list');
    }
    $options = array(
      'table' => 'kabupaten',
      'select' => array('kabupaten.id as id','kabupaten.nama as nama','provinsi.id as id_provinsi','provinsi.nama as provinsi'),
      'join' => array('provinsi' => 'provinsi.id = kabupaten.id_provinsi'));
    $data['cetak_list1'] = $this->M_universal->index($options);
    $options = array('table' => 'provinsi');
    $data['cetak_form1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/Kabupaten/edit';
    $this->load->view('backend', $data);
  }

  public function delete($prim_kode)
  {
    $this->db->delete('kabupaten', array('id' => $prim_kode));
    $this->session->set_flashdata('PesanSukses', 'Data Kabupaten Berhasil Dihapus');
    redirect('Kabupaten');
  }

}
