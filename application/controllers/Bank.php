<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->cekLogin();

  }
  public function index()
  {
    redirect('Bank/list');
  }

  public function list()
  {
    $data = $this->data_table1;
    $options = array( 'table' => 'bank');
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/Bank/list';
    $this->load->view('backend', $data);
  }

  public function add()
  {
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'nama_bank' => $this->input->post('bank'),
        'pt_bank' => $this->input->post('pt'),
        'call_center_bank' => $this->input->post('call'),
      );
      $this->db->insert('bank', $data);
      $this->session->set_flashdata('PesanSukses', 'Baru Baru Berhasil Ditambah');
      redirect('Bank');
    }
    redirect('Bank');
  }

  public function edit($prim_kode)
  {
    $data = $this->data_table1;
    $options = array( 'table' => 'bank', 'where' => array('id_bank'=> $prim_kode));
    $data['cetak_detail1'] = $this->M_universal->index($options);
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'nama_bank' => $this->input->post('bank'),
        'pt_bank' => $this->input->post('pt'),
        'call_center_bank' => $this->input->post('call'),
      );
      $this->db->update('bank', $data, array('id_bank' => $prim_kode));
      $this->session->set_flashdata('PesanSukses', 'Data Bank Berhasil Dirubah');
      redirect('Bank');
    }
    $data['prim_kode'] = $prim_kode;
    $options = array( 'table' => 'bank');
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/Bank/edit';
    $this->load->view('backend', $data);
  }

  public function delete($prim_kode)
  {
    $this->db->delete('bank', array('id_bank' => $prim_kode));
    $this->session->set_flashdata('PesanSukses', 'Data Bank Berhasil Dihapus');
    redirect('Bank');
  }
}
