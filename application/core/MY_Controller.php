<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
  public function cekLogin()
  {
    date_default_timezone_set('Asia/Jakarta');
    if (!$this->session->userdata('ai_anggota')) {

      if (!$this->session->userdata('ai_pengurus')) {
        redirect('Login_pengurus');
      }else {
        $this->load->model(array('M_universal','M_count'));
        $this->load->helper(array('H_universal'));
        $this->load->library(array(''));

        // $options = array(
        //   'table' => 'pesan',
        //   'select' => array('*', 'anggota.nama as nama_anggota','pengurus.nama as nama_pengurus',
        //                           'pesan.id as id_pesan' ),
        //   'where' => array('kepada'=> $this->session->userdata('ai_anggota')),
        //   'join' => array('pengurus' => 'pengurus.id = pesan.dari_pengurus',
        //                   'anggota' => 'anggota.id = pesan.dari_anggota'),
        //   'order' => array('dikirim_pukul' => 'DESC'),
        //   'limit' => 5,
        //   'setjoin' => 'left'
        // );
        // $data['cetak_pesan'] = $this->M_universal->index($options);
        //
        // $options = array(
        //   'table' => 'pesan',
        //   'where' => array('kepada'=> $this->session->userdata('ai_anggota')),
        //   'setjoin' => 'left'
        // );
        // $jumlah_pesan_belum_dibaca = $this->M_count->index($options);

        $this->data_table1 = array(
          'ai_pengurus' => $this->session->userdata('ai_pengurus'),
          'jabatan' => $this->session->userdata('jabatan'),
          'username' => $this->session->userdata('username'),
          'fullname' => $this->session->userdata('fullname'),
          'foto' => $this->session->userdata('foto'),
          // 'cetak_pesan' =>   $data['cetak_pesan'],
          // 'jumlah_pesan_belum_dibaca' => $jumlah_pesan_belum_dibaca,
          'css' => "model_table1",
          'js' => "model_table1"
        );

        $this->data_form1 = array(
          'ai_pengurus' => $this->session->userdata('ai_pengurus'),
          'jabatan' => $this->session->userdata('jabatan'),
          'username' => $this->session->userdata('username'),
          'fullname' => $this->session->userdata('fullname'),
          'foto' => $this->session->userdata('foto'),
          // 'cetak_pesan' =>   $data['cetak_pesan'],
          // 'jumlah_pesan_belum_dibaca' => $jumlah_pesan_belum_dibaca,
          'css' => "model_form1",
          'js' => "model_form1"
        );
      }
    }else {

      $this->load->model(array('M_universal','M_count'));
      $this->load->helper(array('H_universal'));
      $this->load->library(array(''));

      // $options = array(
      //   'table' => 'pesan',
      //   'select' => array('*', 'anggota.nama as nama_anggota','pengurus.nama as nama_pengurus',
      //                           'pesan.id as id_pesan' ),
      //   'where' => array('kepada'=> $this->session->userdata('ai_anggota')),
      //   'join' => array('pengurus' => 'pengurus.id = pesan.dari_pengurus',
      //                   'anggota' => 'anggota.id = pesan.dari_anggota'),
      //   'order' => array('dikirim_pukul' => 'DESC'),
      //   'limit' => 5,
      //   'setjoin' => 'left'
      // );
      // $data['cetak_pesan'] = $this->M_universal->index($options);
      //
      // $options = array(
      //   'table' => 'pesan',
      //   'where' => array('kepada'=> $this->session->userdata('ai_anggota')),
      //   'setjoin' => 'left'
      // );
      // $jumlah_pesan_belum_dibaca = $this->M_count->index($options);

      $this->data_table1 = array(
        'ai_anggota' => $this->session->userdata('ai_anggota'),
        'no_anggota' => $this->session->userdata('no_anggota'),
        'jabatan' => $this->session->userdata('jabatan'),
        'baru' => $this->session->userdata('baru'),
        'status' => $this->session->userdata('status'),
        'fullname' => $this->session->userdata('fullname'),
        'nickname' => $this->session->userdata('nickname'),
        // 'cetak_pesan' =>   $data['cetak_pesan'],
        // 'jumlah_pesan_belum_dibaca' => $jumlah_pesan_belum_dibaca,
        'css' => "model_table1",
        'js' => "model_table1"
      );



      $this->data_form1 = array(
        'ai_anggota' => $this->session->userdata('ai_anggota'),
        'no_anggota' => $this->session->userdata('no_anggota'),
        'jabatan' => $this->session->userdata('jabatan'),
        'baru' => $this->session->userdata('baru'),
        'status' => $this->session->userdata('status'),
        'fullname' => $this->session->userdata('fullname'),
        'nickname' => $this->session->userdata('nickname'),
        // 'cetak_pesan' =>   $data['cetak_pesan'],
        // 'jumlah_pesan_belum_dibaca' => $jumlah_pesan_belum_dibaca,
        'css' => "model_form1",
        'js' => "model_form1"
      );
    }
  }
}
