<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->cekLogin();
  }
  public function index()
  {
    redirect('Kecamatan/list');
  }


  public function list()
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'kecamatan',
      'select' => array('kecamatan.id as id','kecamatan.nama as nama','kabupaten.id as id_kab','kabupaten.nama as nama_kab','provinsi.id as id_provinsi','provinsi.nama as nama_prov'),
      'join' => array('kabupaten' => 'kabupaten.id = kecamatan.id_kabupaten','provinsi' => 'provinsi.id = kabupaten.id_provinsi')
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/Kecamatan/list';
    $this->load->view('backend', $data);
  }

  public function add()
  {
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'id_kabupaten' => $this->input->post('kabupaten'),
        'nama' => $this->input->post('kecamatan'),
      );
      $this->db->insert('kecamatan', $data);
      $this->session->set_flashdata('PesanSukses', 'Kecamatan Baru Berhasil Ditambah');
      redirect('Kecamatan');
    }
    $options = array('table' => 'provinsi');
    $data['cetak_form1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/Kecamatan/add';
    $this->load->view('backend', $data);
  }

  public function edit($prim_kode)
  {
    $data = $this->data_table1;
    $data['prim_kode'] = $prim_kode;
    $options = array(
      'table' => 'kecamatan',
      'select' => array('kecamatan.id as id','kecamatan.nama as nama','kabupaten.id as id_kab','kabupaten.nama as nama_kab','provinsi.id as id_provinsi','provinsi.nama as nama_prov'),
      'join' => array('kabupaten' => 'kabupaten.id = kecamatan.id_kabupaten','provinsi' => 'provinsi.id = kabupaten.id_provinsi'),
      'where' => array('kecamatan.id'=> $prim_kode)
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);
    foreach ($data['cetak_detail1'] as $key) {
      $setprov = $key->id_provinsi;
    }
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'id_kabupaten' => $this->input->post('kabupaten'),
        'nama' => $this->input->post('kecamatan'),
      );
      $this->db->update('kecamatan', $data, array('id' => $prim_kode));
      $this->session->set_flashdata('PesanSukses', 'Data Kecamatan Berhasil Dirubah');
      redirect('Kecamatan/list');
    }
    $options = array('table' => 'provinsi');
    $data['cetak_form1'] = $this->M_universal->index($options);
    $options = array(
      'table' => 'kabupaten',
      'select' => array('*'),
      'where' => array('kabupaten.id_provinsi'=> $setprov)
    );
    $data['cetak_form2'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/Kecamatan/edit';
    $this->load->view('backend', $data);
  }

  public function delete($prim_kode)
  {
    $this->db->delete('kecamatan', array('id' => $prim_kode));
    $this->session->set_flashdata('PesanSukses', 'Data Kecamatan Berhasil Dihapus');
    redirect('Kecamatan');
  }



}
