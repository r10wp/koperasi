<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New_nasabah extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->cekLogin();
    // if ($this->session->userdata('LEVEL') != 1) {
    //   $url=base_url('');
    //   redirect($url);
    // }
  }

  public function pesan()
  {

  }

  public function thisLegal()
  {
    if ($this->session->userdata('status') == -2 && $this->session->userdata('baru') == 1) {
      redirect('New_nasabah');
    }
  }

  public function index()
  {
    $data = $this->data_table1;

    $options = array(
      'table' => 'anggota',
      'where' => array('anggota.id'=> $this->session->userdata('ai_anggota')),
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);

   $options = array(
      'table' => 'rekening_nasabah',
      'where' => array('id_pemilik_rekening'=> $this->session->userdata('ai_anggota')),
    );
    $data['check_rekening'] = $this->M_count->index($options);

    $options = array(
      'table' => 'pekerjaan_anggota',
      'where' => array('pekerjaan_anggota.id_anggota'=> $this->session->userdata('ai_anggota')),
      'join' => array('pekerjaan' => 'pekerjaan.id_pekerjaan = pekerjaan_anggota.id_pekerjaan_anggota'),
      'setjoin' => 'left',
    );
    $data['jumlah_pekerjaan_anggota'] = $this->M_count->index($options);

    $options = array(
      'table' => 'pekerjaan_suami',
      'where' => array('pekerjaan_suami.id_anggota'=> $this->session->userdata('ai_anggota')),
      'join' => array('pekerjaan' => 'pekerjaan.id_pekerjaan = pekerjaan_suami.id_pekerjaan_suami'),
      'setjoin' => 'left',
    );
    $data['jumlah_pekerjaan_suami'] = $this->M_count->index($options);

    $data['content'] = 'Modul/New_nasabah/dashboard';
    $this->load->view('backend', $data);
  }

  public function form1()
  {
    $data = $this->data_form1; $this->thisLegal();
    $options = array(
      'table' => 'anggota',
      'where' => array('anggota.id'=> $this->session->userdata('ai_anggota'))
    );
    $data['cetak_form1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/New_nasabah/form1';
    $this->load->view('backend', $data);
  }

  public function form1add1()
  {
    $this->thisLegal();
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $prim_kode = $this->session->userdata('ai_anggota');
      $data = array(
        'file_attach_ktp_istri' => $prim_kode.".jpg",
      );
      $this->upload_image('KTP/','ktp');
      $this->db->update('anggota', $data, array('id' => $prim_kode));
      $this->session->set_flashdata('PesanSukses', 'Upload KTP telah di lakukan');
      redirect('New_nasabah/form1');
    }
  }

  public function form1add2()
  {
    $this->thisLegal();
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $prim_kode = $this->session->userdata('ai_anggota');

      $data = array(
        'file_attach_ktp_suami' => $prim_kode.".jpg",
      );
      $this->upload_image('KTP2/','ktp2');
      $this->db->update('anggota', $data, array('id' => $prim_kode));
      $this->session->set_flashdata('PesanSukses', 'Upload KTP Suami telah di lakukan');
      redirect('New_nasabah/form1');
    }
  }
  public function form1add3()
  {
    $this->thisLegal();
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $prim_kode = $this->session->userdata('ai_anggota');

      $data = array(
        'file_attach_kartu_keluarga' => $prim_kode.".jpg",
      );
      $this->upload_image('KK/','kk');
      $this->db->update('anggota', $data, array('id' => $prim_kode));
      $this->session->set_flashdata('PesanSukses', 'Upload Kartu Keluarga telah di lakukan');
      redirect('New_nasabah/form1');
    }
  }
  public function form1add4()
  {
    $this->thisLegal();
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $prim_kode = $this->session->userdata('ai_anggota');

      $data = array(
        'file_attach_perjanjian' => $prim_kode.".pdf",
      );
      $this->upload_pdf('SURAT_PERJANJIAN/','sp');
      $this->db->update('anggota', $data, array('id' => $prim_kode));
      $this->session->set_flashdata('PesanSukses', 'Upload Surat Perjanjian Berhasil telah di lakukan');
      redirect('New_nasabah/form1');
    }
  }

  function upload_image($url,$field_name){
    //$this->thisLegal();
    $config['upload_path'] = './asset/'.$url;
    $config['allowed_types'] = 'jpg';
    $config['max_size'] = '1000';
    $config['max_width']  = '10240';
    $config['max_height']  = '7680';
    $config['file_name']  = $this->session->userdata('ai_anggota');
    $config['overwrite'] = TRUE;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    $this->upload->do_upload($field_name);
  }

  function upload_pdf($url,$field_name){
    //$this->thisLegal();
    $config['upload_path'] = './asset/'.$url;
    $config['allowed_types'] = 'pdf';
    $config['max_size'] = '1000';
    $config['file_name']  = $this->session->userdata('ai_anggota');
    $config['overwrite'] = TRUE;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    $this->upload->do_upload($field_name);
  }

  public function form2()
  {
    $data = $this->data_form1;$this->thisLegal();
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'nama_pendek'   =>  $this->input->post('nama_pendek'),
        'nama'          =>  $this->input->post('nama_lengkap'),
        'email'         =>  $this->input->post('email'),
        'telp_rumah'    =>  $this->input->post('telp_rumah'),
        'no_hp1'        =>  $this->input->post('no_hp1'),
        'no_hp2'        =>  $this->input->post('no_hp2'),
        'no_sim'        =>  $this->input->post('no_sim'),
        'pendidikan_terakhir' =>  $this->input->post('pendidikan'),
        'gelar'         =>  $this->input->post('gelar'),

        'id_kota_lahir'       =>  $this->input->post('kota_lahir'),
        'tgl_lahir'           =>  $this->input->post('tgl_lahir'),

        'id_kecamatan_tempat_tinggal' =>  $this->input->post('kec'),
        'alamat_lengkap'              =>  $this->input->post('alamat'),
        'gambar' => $this->session->userdata('ai_anggota').".jpg"
      );
      $this->upload_image('ANGGOTA/','gambar');
      $this->db->update('anggota', $data, array('id' => $this->session->userdata('ai_anggota')));
      $this->session->set_flashdata('PesanSukses', 'Data Form 1 berhasil di perbarui');
      redirect('New_nasabah/form2');
    }
    $options = array('table' => 'provinsi');
    $data['cetak_form1'] = $this->M_universal->index($options);
    $options = array('table' => 'kabupaten');
    $data['cetak_form2'] = $this->M_universal->index($options);
    $options = array(
      'table'   => 'anggota',
      'select'  => array('*','anggota.nama as nama_lengkap','kecamatan.nama as nama_kecamatan'),
      'where'   => array('anggota.id'=> $this->session->userdata('ai_anggota')),
      'join'    => array('kecamatan'=> 'kecamatan.id = anggota.id_kecamatan_tempat_tinggal'),
      'setjoin' => 'left',
      'limit'   => 1
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/New_nasabah/form2';
    $this->load->view('backend', $data);
  }

  public function form3()
  {
    $data = $this->data_form1;$this->thisLegal();

    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      redirect('New_nasabah/form32/'.$this->input->post('kec'));
    }

    $options = array('table' => 'provinsi');
    $data['cetak_form1'] = $this->M_universal->index($options);

    $options = array(
      'table'   => 'anggota',
      'select'  => array('*','anggota.nama as nama_ketua' ,'kelompok.nama as nama_kel', 'anggota.id_kecamatan_tempat_tinggal as kec_tinggal'
                            ,'kecamatan.nama as nama_kecamatan', 'anggota_ketua.nama as nama_ketua'),
      'where'   => array('anggota.id'=> $this->session->userdata('ai_anggota')),
      'join'    => array('kelompok' => 'kelompok.id = anggota.id_kelompok',
                        'anggota as anggota_ketua' => 'anggota_ketua.id = kelompok.id_penanggungjawab_kelompok',
                        'kecamatan' => 'kecamatan.id = kelompok.id_kecamatan'),
      'setjoin' => 'left'
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);

    $options = array(
      'table' => 'permintaan_kelompok',
      'where' => array('kode_anggota_peminta'=> $this->session->userdata('ai_anggota')),
      'join' => array('kelompok' => 'kelompok.id = permintaan_kelompok.kelompok_yang_dituju',
                      'anggota as anggota_ketua' => 'anggota_ketua.id = kelompok.id_penanggungjawab_kelompok'),
      'setjoin' => 'left'
    );
    $data['cetak_detail2'] = $this->M_universal->index($options);
    $data['kelompok_sedang_dipilih'] = $this->M_count->index($options);

    $data['content'] = 'Modul/New_nasabah/form3';
    $this->load->view('backend', $data);
  }

  public function form32($prim_kode)
  {
    $data = $this->data_form1;$this->thisLegal();
    $data['back'] = $prim_kode; //Kembali Ketempat saat Set Anggota
    $data['nama_kecamatan'] = "<br><small ><font color='red'>Belum Ada Kelompok di Daerah Tersebut !. Silahkan Cari Alternatif Daerah Lainnya.</font></small>";

    $options = array('table' => 'provinsi');
    $data['cetak_form1'] = $this->M_universal->index($options);

    $options = array(
      'table'   => 'kecamatan',
      'where'   => array('kelompok.status_terima' => '1'),
      'select'  => array('kecamatan.nama as nama_kec','kelompok.nama as nama_kel','kelompok.id as id_kel','anggota.nama as ketua','anggota.alamat_lengkap as alamat'),
      'join'    => array('kelompok' => 'kelompok.id_kecamatan = kecamatan.id','anggota' => 'anggota.id = kelompok.id_penanggungjawab_kelompok'),
      'where'   => array('kecamatan.id'=> $prim_kode),
    );
    $data['cetak_list1'] = $this->M_universal->index($options);

    $options = array(
      'table' => 'anggota',
      'select'  => array('*','anggota.nama as nama_ketua' ,'kelompok.nama as nama_kel'
                            ,'kecamatan.nama as nama_kecamatan', 'anggota_ketua.nama as nama_ketua'),
      'where' => array('anggota.id'=> $this->session->userdata('ai_anggota')),
      'join'  => array('kelompok' => 'kelompok.id = anggota.id_kelompok',
                        'anggota as anggota_ketua' => 'anggota_ketua.id = kelompok.id_penanggungjawab_kelompok',
                      'kecamatan' => 'kecamatan.id = kelompok.id_kecamatan'),
      'setjoin' => 'left'
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);

    $options = array(
      'table' => 'permintaan_kelompok',
      'where' => array('kode_anggota_peminta'=> $this->session->userdata('ai_anggota')),
      'join' => array('kelompok' => 'kelompok.id = permintaan_kelompok.kelompok_yang_dituju',
                      'anggota as anggota_ketua' => 'anggota_ketua.id = kelompok.id_penanggungjawab_kelompok'),
      'setjoin' => 'left'
    );
    $data['cetak_detail2'] = $this->M_universal->index($options);
    $data['kelompok_sedang_dipilih'] = $this->M_count->index($options);

    $data['content'] = 'Modul/New_nasabah/form3_2';
    $this->load->view('backend', $data);
  }

  public function form33($id_kelompok)
  {
    $data = $this->data_form1;$this->thisLegal();
    $options = array(
      'table'   => 'kelompok',
      'select'  => array('*','anggota.nama as nama_ketua','kelompok.id as id_kel' ,'kelompok.nama as nama_kel'
                            ,'kecamatan.id as id_kec', 'kecamatan.nama as nama_kecamatan','pengurus.nama as nama_pengurus'
                            ,'anggota.gambar as foto_ketua'),
      'where'   => array('kelompok.id'=> $id_kelompok),
      'join'    => array('anggota' => 'anggota.id = kelompok.id_penanggungjawab_kelompok',
                      'kecamatan' => 'kecamatan.id = kelompok.id_kecamatan',
                      'pengurus' => 'pengurus.id = kelompok.id_pengurus_pemverifikasi')
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);

    $options = array(
      'table' => 'anggota',
      'where' => array('anggota.id'=> $this->session->userdata('ai_anggota'))
    );
    $data['cetak_detail2'] = $this->M_universal->index($options);

    $options = array(
      'table'   => 'anggota',
      'select'  => array('*'),
      'where'   => array('id_kelompok'=> $id_kelompok),
    );
    $data['cetak_list1'] = $this->M_universal->index($options);

    $options = array(
      'table' => 'permintaan_kelompok',
      'where' => array('kode_anggota_peminta'=> $this->session->userdata('ai_anggota')),

    );
    $data['cetak_detail3'] = $this->M_universal->index($options);
    $data['kelompok_sedang_dipilih'] = $this->M_count->index($options);

    $data['content'] = 'Modul/New_nasabah/form3_3';
    $this->load->view('backend', $data);
  }

  public function setAnggota($id)
  {
    $this->thisLegal();
    $options = array(
      'table'   => 'permintaan_kelompok',
      'where'   => array('kode_anggota_peminta'=> $this->session->userdata('ai_anggota')),
    );
    $control1 = $this->M_count->index($options);
    if ($control1 == 0) {
      $data = array(
        'kode_anggota_peminta' => $this->session->userdata('ai_anggota'),
        'kelompok_yang_dituju' => $id,
      );
      $this->db->insert('permintaan_kelompok', $data);
    } else {
      $data = array(
        'kode_anggota_peminta' => $this->session->userdata('ai_anggota'),
        'kelompok_yang_dituju' => $id,
        'status_terima_dari_kelompok' => -1
      );
      $this->db->update('permintaan_kelompok', $data, array('kode_anggota_peminta' =>  $this->session->userdata('ai_anggota')));
    }


    $this->session->set_flashdata('PesanSukses', 'Kelompok yang baru berhasil ditetapkan');
    redirect('New_nasabah/form3/');
  }

  public function keluarKelompok($id)
  {
    $this->thisLegal();
    $data = array(
      'id_kelompok' => null,
    );
    $this->db->update('anggota', $data, array('id' => $this->session->userdata('ai_anggota')));
    $this->session->set_flashdata('PesanSukses', 'Berhasil Keluar Dari Kelompok');
    redirect('New_nasabah/form33/'.$id);
  }

  public function form4()
  {
    $this->thisLegal();
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
        $data_pekerjaan = []; $i=0;
        foreach ($this->input->post('pekerjaan') as $key) {
          $data_pekerjaan[$i] = $key;
          $i++;
        }

        if ($data_pekerjaan[0] == $data_pekerjaan[1]) {
          $this->session->set_flashdata('PesanError', 'Tidak dapat melakukan input data pekerjaan yang sama');
          redirect('New_nasabah/form4');
        }

        $data_pekerjaan_suami = []; $i=0;
        foreach ($this->input->post('pekerjaan_suami') as $key) {
          $data_pekerjaan_suami[$i] = $key;
          $i++;
        }

        if ($data_pekerjaan_suami[0] == $data_pekerjaan_suami[1]) {
          $this->session->set_flashdata('PesanError', 'Tidak dapat melakukan input data pekerjaan yang sama');
          redirect('New_nasabah/form4');
        }

        $this->db->delete('pekerjaan_anggota', array('id_anggota' => $this->session->userdata('ai_anggota')));
        $this->db->delete('pekerjaan_suami', array('id_anggota' => $this->session->userdata('ai_anggota')));

        for ($i=0; $i < 2; $i++) {
          $data = array(
            'id_pekerjaan_anggota' => $data_pekerjaan[$i],
            'id_anggota' => $this->session->userdata('ai_anggota')
          );
          $this->db->insert('pekerjaan_anggota', $data);

          $data = array(
            'id_pekerjaan_suami' => $data_pekerjaan_suami[$i],
            'id_anggota' => $this->session->userdata('ai_anggota')
          );
          $this->db->insert('pekerjaan_suami', $data);
        }
        $data = array(
          'penghasilan_per_bulan' => rupiahToInt($this->input->post('penghasilan_per_bulan')),
          'nama_suami' => $this->input->post('nama_suami'),
          'penghasilan_per_bulan_suami' => rupiahToInt($this->input->post('penghasilan_per_bulan_suami')),
          'jenis_usaha' => $this->input->post('jenis_usaha'),
          'modal_sendiri' => rupiahToInt($this->input->post('modal_sendiri')),
          'modal_luar' => rupiahToInt($this->input->post('modal_luar')),
          'omset_per_bulan' => rupiahToInt($this->input->post('omset_per_bulan')),
          'jumlah_tenaga_kerja' => $this->input->post('jumlah_tenaga_kerja'),
          'tempat_usaha' => $this->input->post('tempat_usaha'),
          'alamat_usaha' => $this->input->post('alamat_usaha'),
        );
        $this->db->update('anggota', $data, array('id' => $this->session->userdata('ai_anggota')));
        $this->session->set_flashdata('PesanSukses', 'Perubahan Data Form 4 Berhasil di Simpan');
        redirect('New_nasabah/form4');
    }
    $options = array(
      'table' => 'anggota',
      'where' => array('anggota.id'=> $this->session->userdata('ai_anggota')),
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);

    $options = array(
      'table' => 'pekerjaan_anggota',
      'where' => array('pekerjaan_anggota.id_anggota'=> $this->session->userdata('ai_anggota')),
      'join' => array('pekerjaan' => 'pekerjaan.id_pekerjaan = pekerjaan_anggota.id_pekerjaan_anggota'),
      'setjoin' => 'left',
    );
    $data['cetak_detail_pekerjaan_anggota'] = $this->M_universal->index($options);
    $data['check_jumlah_pekerjaan_anggota'] = $this->M_count->index($options);

    $options = array(
      'table' => 'pekerjaan_suami',
      'where' => array('pekerjaan_suami.id_anggota'=> $this->session->userdata('ai_anggota')),
      'join' => array('pekerjaan' => 'pekerjaan.id_pekerjaan = pekerjaan_suami.id_pekerjaan_suami'),
      'setjoin' => 'left',
    );
    $data['cetak_detail_pekerjaan_suami'] = $this->M_universal->index($options);
    $data['check_jumlah_pekerjaan_suami'] = $this->M_count->index($options);

    $data['pekerjaan'] = $this->M_universal->pekerjaan();
    $data['content'] = 'Modul/New_nasabah/form4';
    $this->load->view('backend', $data);
  }

  public function form5()
  {
    $this->thisLegal();
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'nama_ibu_kandung' => $this->input->post('nama_ibu_kandung'),
        'nama_kerabat_yang_dapat_dihubungi' => $this->input->post('nama_kerabat_yang_dapat_dihubungi'),
        'alamat_kerabat_yang_dapat_dihubungi' => $this->input->post('alamat_kerabat_yang_dapat_dihubungi'),
        'no_tlp_kerabat_yg_dpt_dihubungi' => $this->input->post('no_tlp_kerabat_yg_dpt_dihubungi'),
        'hp_kerabat_yg_dpt_dihubungi' => $this->input->post('hp_kerabat_yg_dpt_dihubungi'),
      );
      $this->db->update('anggota', $data, array('id' => $this->session->userdata('ai_anggota')));
      $this->session->set_flashdata('PesanSukses', 'Perubahan Data Form 5 Berhasil di Simpan');
      redirect('New_nasabah/form5');
    }
    $options = array(
      'table' => 'anggota',
      'where' => array('anggota.id'=> $this->session->userdata('ai_anggota'))
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/New_nasabah/form5';
    $this->load->view('backend', $data);
  }

  public function form6()
  {
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {



      $data = array(
        "id_ibu"  => $this->session->userdata('ai_anggota'),
        "status_anak"  => $this->input->post('status_anak'),
        "nama_anak"  => $this->input->post('nama_anak'),
        "nama_kota_lahir"  => $this->input->post('nama_kota_lahir'),
        "tanggal_lahir"  => $this->input->post('tanggal_lahir'),
        "pendidikan"  => $this->input->post('pendidikan'),
      );
      $this->db->insert('anak', $data);


      $this->session->set_flashdata('PesanSukses', 'Data Anak Berhasil Ditambahkan');
      redirect('New_nasabah/form6');
    }
    $options = array(
      'table' => 'anak',
      'where' => array('id_ibu'=> $this->session->userdata('ai_anggota')),
      // 'join' => array('pekerjaan_anak' => 'pekerjaan_anak.id_anak = anak.id' ,
      //                 'pekerjaan' => 'pekerjaan.id_pekerjaan = pekerjaan_anak.id_pekerjaan_anak'),
      // 'setjoin' => 'left'
    );
    $data['cetak_list1'] = $this->M_universal->index($options);

    $data['content'] = 'Modul/New_nasabah/form6';
    $this->load->view('backend', $data);
  }

  public function form62($prim_kode)
  {
    $data = $this->data_form1;$this->thisLegal();
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        "id_ibu"  => $this->session->userdata('ai_anggota'),
        "status_anak"  => $this->input->post('status_anak'),
        "nama_anak"  => $this->input->post('nama_anak'),
        "nama_kota_lahir"  => $this->input->post('nama_kota_lahir'),
        "tanggal_lahir"  => $this->input->post('tanggal_lahir'),
        "pendidikan"  => $this->input->post('pendidikan'),
      );

      $this->db->update('anak', $data, array('id' => $prim_kode));

      $this->session->set_flashdata('PesanSukses', 'Data Anak Berhasil Di Ubah');
      redirect('New_nasabah/form62/'.$prim_kode);
    }
    $options = array(
      'table' => 'anak',
      'where' => array('id_ibu'=> $this->session->userdata('ai_anggota'))
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $options = array(
      'table' => 'anak',
      'where' => array('id' => $prim_kode,'id_ibu'=> $this->session->userdata('ai_anggota'))
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);



    $data['content'] = 'Modul/New_nasabah/form6_2';
    $this->load->view('backend', $data);
  }

  public function form63($prim_kode)
  {
    $this->thisLegal();
    $this->db->delete('anak', array('id' => $prim_kode,'id_ibu'=> $this->session->userdata('ai_anggota')));
    $this->db->query('ALTER TABLE anak AUTO_INCREMENT=0');
    $this->session->set_flashdata('PesanSukses', 'Data Anak Berhasil Dihapus');
    redirect('New_nasabah/form6');
  }

  public function form7()
  {
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        "id_pemilik_rekening"  => $this->session->userdata('ai_anggota'),
        "no_rekening_nasabah"  => $this->input->post('no_rekening'),
        "id_bank_nasabah"  => $this->input->post('nama_bank'),
        "nama_pemilik_dalam_rekening"  => $this->input->post('nama_pemilik_rekening'),
      );
      $this->db->insert('rekening_nasabah', $data);
      $this->session->set_flashdata('PesanSukses', 'Data Rekening Berhasil Ditambahkan');
      redirect('New_nasabah/form7');
    }

    $data['cetak_list1'] = $this->M_universal->rekening_nasabah();
    $data['cetak_bank'] = $this->M_universal->list_bank();
    $data['content'] = 'Modul/New_nasabah/form7';
    $this->load->view('backend', $data);
  }

  public function form72($prim_kode)
  {
    $data = $this->data_form1;$this->thisLegal();
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        "id_pemilik_rekening"  => $this->session->userdata('ai_anggota'),
        "no_rekening_nasabah"  => $this->input->post('no_rekening'),
        "id_bank_nasabah"  => $this->input->post('nama_bank'),
        "nama_pemilik_dalam_rekening"  => $this->input->post('nama_pemilik_rekening'),
      );
      $this->db->update('rekening_nasabah', $data, array('id' => $prim_kode));
      $this->session->set_flashdata('PesanSukses', 'Data Rekening Berhasil Di Ubah');
      redirect('New_nasabah/form7');
    }

    $data['cetak_list1'] = $this->M_universal->rekening_nasabah();
    $data['cetak_bank'] = $this->M_universal->list_bank();
    $options = array(
      'table' => 'rekening_nasabah',
      'where' => array('id' => $prim_kode,'id_pemilik_rekening'=> $this->session->userdata('ai_anggota'))
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);

    $data['content'] = 'Modul/New_nasabah/form7_2';
    $this->load->view('backend', $data);
  }

  public function form73($prim_kode)
  {
    $this->thisLegal();
    $this->db->delete('rekening_nasabah', array('id' => $prim_kode,'id_pemilik_rekening'=> $this->session->userdata('ai_anggota')));
    $this->session->set_flashdata('PesanSukses', 'Data Anak Berhasil Dihapus');
    redirect('New_nasabah/form7');
  }

  public function form8()
  {
    $data = $this->data_form1;$this->thisLegal();
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $prim_kode = $this->session->userdata('ai_anggota');

      $data = array(
        'file_attach_bukti_pembayaran_simpanan_pokok_awal' => $prim_kode.".jpg",
      );
      $this->upload_image('BUKTI_SALDO_AWAL/','bukti_saldo_awal');
      $this->db->update('anggota', $data, array('id' => $prim_kode));
      $this->session->set_flashdata('PesanSukses', 'Bukti Setoran Saldo Awal Berhasil Di Upload');
      redirect('New_nasabah/form8');
    }

    $options = array(
      'table' => 'anggota',
      'where' => array('anggota.id'=> $this->session->userdata('ai_anggota'))
    );
    $data['cetak_form1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/New_nasabah/form8';
    $this->load->view('backend', $data);
  }

  public function form_submit()
  {
    $data = $this->data_form1;$this->thisLegal();
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(

      );

      $this->db->update('anak', $data, array('id' => $this->session->userdata('ai_anggota')));
      $this->session->set_flashdata('PesanSukses', 'Data Anak Berhasil Ditambahkan');
      redirect('New_nasabah');
    }
    $options = array(
      'table' => 'anggota',
      'where' => array('anggota.id'=> $this->session->userdata('ai_anggota'))
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);

    $data['content'] = 'Modul/New_nasabah/form_submit';
    $this->load->view('backend', $data);
  }

  public function download_sk()
  {
    $this->load->helper('download');
    force_download('./asset/DOC_KOPERASI/SK_KOPERASI.pdf', NULL);
  }

  public function download_sp()
  {
    $this->load->helper('download');
    force_download('./asset/DOC_KOPERASI/SP_KOPERASI.pdf', NULL);
  }

  public function form_submit2()
  {
    $this->thisLegal();
    $options = array(
      'table' => 'anggota',
      'where' => array('anggota.id'=> $this->session->userdata('ai_anggota'))
    );
    $data['cetak_set1'] = $this->M_universal->index($options);

    foreach ($data['cetak_set1']  as $set) {
      $salt = $set->salt;
      $set_old = $set->password;
    }

    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $password_old = $this->input->post('password_lama');
      $password_new = $this->input->post('password_baru');
      $salt;

      $set = $password_new.$salt;
      $check_old = $password_old.$salt;

      if(password_verify($check_old, $set_old)){
        $setpassword = password_hash($set , PASSWORD_BCRYPT);
        $data = array(
          'password' => $setpassword,
          'status_terima' => -2
        );
        $this->db->update('anggota', $data, array('id' => $this->session->userdata('ai_anggota')));
        $this->session->set_flashdata('PesanSukses', 'Data Telah Di Ajukan Untuk Menjadi Anggota Koperasi');
        redirect('New_nasabah');
      }else {
        $this->session->set_flashdata('PesanError', 'Password Lama Tidak Sama Dengan Yang  Di Input');
        redirect('New_nasabah/form_submit');
      };


    }

  }
}
