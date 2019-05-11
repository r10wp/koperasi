<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nasabah extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->cekLogin();



    // if ($this->session->userdata('LEVEL') != 1) {
    //   $url=base_url('');
    //   redirect($url);
    // }
  }

  public function index()
  {
    $data = $this->data_table1;
    $i = $this->session->userdata('ai_anggota');
    $m = date("m");
    $options = array('table' => 'anggota',
      'where' => array('anggota.id'=> $this->session->userdata('ai_anggota'))
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);

    $data['cetak_hutang'] = $this->db->query(
      "SELECT SUM(total_pinjaman_diberikan_setelah_bunga) as total
      FROM pinjaman WHERE id_anggota_peminjam = $i AND status_lunas = 0")
      ->row()->total;

    $data['cetak_penarikan'] = $this->db->query(
      "SELECT SUM(total_dana_diberikan) as total
      FROM ambil_simpanan WHERE id_anggota = $i AND status_ambil = 1
      AND MONTH (tgl_pencairan_dana) = MONTH(CURRENT_DATE) AND YEAR (tgl_pencairan_dana) = YEAR(CURRENT_DATE) ")->row()->total;

    $data['cetak_hutang_terbayar'] = $this->db->query(
      "SELECT SUM(terbayar) as total
      FROM pinjaman WHERE id_anggota_peminjam = $i AND status_lunas = 0
      ")->row()->total;

    $data['cetak_simpanan'] = $this->db->query(
      "SELECT SUM(total_setoran) as total
      FROM simpan WHERE id_pelaku_simpan = $i AND status_simpan = 1
      AND MONTH(tgl_lakukan_simpan) = MONTH(CURRENT_DATE) AND YEAR(tgl_lakukan_simpan) = YEAR(CURRENT_DATE)")->row()->total;

    $options = array(
      'table' => 'simpan',
      'select' => array('*'),
      'where' => array('id_pelaku_simpan' => $this->session->userdata('ai_anggota')),
      'order' => array('tgl_lakukan_simpan' => 'DESC'),
      'limit' => 1
    );
    $data['tampil_simpanan_terakhir'] = $this->M_universal->index($options);

    $options = array(
      'table' => 'ambil_simpanan',
      'select' => array('*'),
      'where' => array('id_anggota' => $this->session->userdata('ai_anggota')),
      'order' => array('tgl_pengajuan' => 'DESC'),
      'limit' => 1
    );
    $data['tampil_ambil_terakhir'] = $this->M_universal->index($options);
    $options = array(
      'table' => 'pinjaman',
      'select' => array('*'),
      'where' => array('id_anggota_peminjam' => $this->session->userdata('ai_anggota')),
      'order' => array('tgl_pinjaman' => 'DESC'),
      'limit' => 1
    );
    $data['tampil_pinjaman_terakhir'] = $this->M_universal->index($options);
    // $options = array(
    //   'table' => 'pesan',
    //   'select' => array('*'),
    //   'where' => array('dari_anggota' => $this->session->userdata('ai_anggota')),
    //   'join' => array('anggota'=>'anggota.id = pesan.kepada'),
    // );
    // $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/Nasabah/dashboard';
    $this->load->view('backend', $data);
  }

  public function setorSimpananNasabah()
  {
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $code1 = hash("crc32" , 'S3-'.$this->session->userdata('no_anggota'));
      $code2 = hash("crc32b" , date('Ymdhis'));
      $code = $code1.$code2; // Cara Memebuat kode Setoron

      $data = array(
        'id' => $code,
        'id_pelaku_simpan' => $this->session->userdata('ai_anggota'),
        'jenis_simpanan' => '3',
        'no_rek_asal' => $this->input->post('rek_pengguna'),
        'no_rek_tujuan' => $this->input->post('rek_id'),
        'tgl_lakukan_simpan' => date('Y-m-d H:i:s'),
        'tgl_jatuh_tempo_bayar' => date('Y-m-d H:i:s', strtotime('+7 days')),
        'total_setoran' => rupiahToInt($this->input->post('jumlah_setor'))
      );
      $this->db->insert('simpan', $data);
      $this->session->set_flashdata('PesanSukses', 'Setor Simpanan Berhasil Dilakukan. Proses Selanjutnya adalah Upload Bukti Simpan');
      redirect('Nasabah/upload_setoran/'.$code);
    }

    $data['cetak_detail1'] = $this->M_universal->data_diri_nasabah();

    $data['cetak_form1'] = $this->M_universal->rekening_koperasi_aktif(); // Cetak No Rekening
    $data['cetak_form2'] = $this->M_universal->rekening_nasabah(); // Cetak No Rekening

    $data['content'] = 'Modul/Nasabah/simpanan_setor';
    $this->load->view('backend', $data);
  }

  public function upload_setoran($kode_setor)
  {
    $data = $this->data_form1;
    $options = array(
      'table' => 'simpan',
      'where' => array('simpan.id'=> $kode_setor),
      'limit' => 1
    );
    $data['handling1'] = $this->M_universal->index($options);
    $data['handling2'] = $this->M_count->index($options); // Handling Pemisah Wajib atau Sukarela
    foreach ($data['handling1'] as $handle1) {
      $jenis_simpan = $handle1->jenis_simpanan;
    }
    if ($jenis_simpan == 2) {
      redirect('Nasabah/bayarSetoranWajibset/'.$kode_setor);
    }
    if ($data['handling2'] == null) {
      redirect("My404");
    }
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'file_attach_bukti_simpan' => $kode_setor.".jpg",
        'status_simpan' => -1
      );
      $this->upload_bukti_simpan('BUKTI_SIMPANAN/','bs',$kode_setor);
      $this->db->update('simpan', $data, array('id' => $kode_setor));
      $this->session->set_flashdata('PesanSukses', 'Upload Setoran Berhasil');
      redirect('Nasabah/upload_setoran/'.$kode_setor);
    }
    $options = array(
      'table' => 'simpan',
      'select' => array('*', 'anggota.nama as nama_anggota', 'pengurus.nama as nama_pengurus','simpan.id as kode_simpan',
                        'bank_nas.nama_bank as nama_bank_nasabah','bank_kop.nama_bank as nama_bank_koperasi'),
      'where' => array('simpan.id'=> $kode_setor),
      'join' => array('anggota'=>'anggota.id = simpan.id_pelaku_simpan',
                      'pengurus'=>'pengurus.id = simpan.id_verifikator',
                      'rekening_koperasi'  => 'rekening_koperasi.id = simpan.no_rek_tujuan',
                      'rekening_nasabah' => 'rekening_nasabah.id = simpan.no_rek_asal',
                      'bank as bank_nas' => 'bank_nas.id_bank = rekening_nasabah.id_bank_nasabah',
                      'bank as bank_kop' => 'bank_kop.id_bank = rekening_koperasi.id_bank_koperasi',

                    ),
      'setjoin' => 'left'
    );

    $data['cetak_detail1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/Nasabah/simpanan_upload_bukti_bayar';
    $this->load->view('backend', $data);
  }

  public function listSimpanan()
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'simpan',
      'select' => array('*','simpan.id as kode_simpan'),
      'where' => array('anggota.id'=> $this->session->userdata('ai_anggota')),
      'join' => array('anggota'=>'anggota.id = simpan.id_pelaku_simpan',
                      'pengurus'=>'pengurus.id = simpan.id_verifikator'),
      'setjoin' => 'left'
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/Nasabah/simpanan_list';
    $this->load->view('backend', $data);
  }



  public function bayarSetoranWajib()
  {
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $code = $this->input->post('kode_simpan');
      if (rupiahToInt($this->input->post('jumlah_setor')) < $this->input->post('min_setor')) {
        $this->session->set_flashdata('PesanError', 'Gagal melakukan setoran wajib karena jumlah setoran tidak sesuai ketentuan');
        redirect('Nasabah/bayarSetoranWajibset/'.$code);
      }

      $data = array(
        'id' => $code,
        'total_setoran' => rupiahToInt($this->input->post('jumlah_setor')),
        'tgl_lakukan_simpan' => date('Y-m-d H:i:s'),
        'status_simpan' => -1,
        'no_rek_asal' => $this->input->post('rek_pengguna'),
        'no_rek_tujuan' => $this->input->post('rek_id'),
        'file_attach_bukti_simpan' => $code.".jpg",
        'keterangan' => $this->input->post('keterangan')
      );
      $this->upload_bukti_simpan('BUKTI_SIMPANAN/','bs',$code);
      $this->db->update('simpan', $data, array('id' => $code));
      $this->session->set_flashdata('PesanSukses', 'Upload Setoran Berhasil');
      redirect('Nasabah/bayarSetoranWajib');
    }
    $options = array(
      'table' => 'simpan',
      'select' => array('*','simpan.id as kode_simpan','simpan.id as kode_simpanan','bank_nas.nama_bank as nama_bank_nasabah','bank_kop.nama_bank as nama_bank_koperasi'),
      'where' => array('anggota.id'=> $this->session->userdata('ai_anggota'), 'YEAR(tgl_wajib_setor)'=> date('Y'), 'MONTH(tgl_wajib_setor)' => date('m'), 'jenis_simpanan' => 2),
      'join' => array('anggota'=>'anggota.id = simpan.id_pelaku_simpan',
                      'rekening_koperasi'  => 'rekening_koperasi.id = simpan.no_rek_tujuan',
                      'rekening_nasabah' => 'rekening_nasabah.id = simpan.no_rek_asal',
                      'bank as bank_nas' => 'bank_nas.id_bank = rekening_nasabah.id_bank_nasabah',
                      'bank as bank_kop' => 'bank_kop.id_bank = rekening_koperasi.id_bank_koperasi',
                      ),
      'limit' => 1,
      'setjoin' => 'left'
    );


    $data['cetak_detail1'] = $this->M_universal->index($options);
    $data['cetak_count1'] = $this->M_count->index($options);

    $data['cetak_form1'] = $this->M_universal->rekening_nasabah(); //Rekening nasabahCari
    $data['cetak_form2'] = $this->M_universal->rekening_koperasi_aktif();
    $data['cetak_form3'] = $this->M_universal->settings();

    $data['content'] = 'Modul/Nasabah/simpanan_wajib_bayar_bulan';
    $this->load->view('backend', $data);
  }

  public function bayarSetoranWajibset($kode_bayar){
    $data = $this->data_form1;
    $options = array(
      'table' => 'simpan',
      'select' => array('*','simpan.id as kode_simpan','simpan.id as kode_simpanan','bank_nas.nama_bank as nama_bank_nasabah','bank_kop.nama_bank as nama_bank_koperasi',),
      'where' => array('anggota.id'=> $this->session->userdata('ai_anggota'), 'simpan.id'=> $kode_bayar),
      'join' => array('anggota'=>'anggota.id = simpan.id_pelaku_simpan',
                      'rekening_koperasi'  => 'rekening_koperasi.id = simpan.no_rek_tujuan',
                      'rekening_nasabah' => 'rekening_nasabah.id = simpan.no_rek_asal',
                      'bank as bank_nas' => 'bank_nas.id_bank = rekening_nasabah.id_bank_nasabah',
                      'bank as bank_kop' => 'bank_kop.id_bank = rekening_koperasi.id_bank_koperasi',
                      ),
      'setjoin' => 'left'
    );
    $data['cetak_count1'] = $this->M_count->index($options);
    $data['cetak_detail1'] = $this->M_universal->index($options);

    $data['cetak_form1'] = $this->M_universal->rekening_nasabah(); //Rekening nasabahCari
    $data['cetak_form2'] = $this->M_universal->rekening_koperasi_aktif();
    $data['cetak_form3'] = $this->M_universal->settings();

    $data['content'] = 'Modul/Nasabah/simpanan_wajib_bayar_bulan';
    $this->load->view('backend', $data);
  }

  function upload_bukti_simpan($url,$field_name,$kode_setor){
    $config['upload_path'] = './asset/'.$url;
    $config['allowed_types'] = 'jpg';
    $config['max_size'] = '10000';
    $config['max_width']  = '10240';
    $config['max_height']  = '7680';
    $config['file_name']  = $kode_setor;
    $config['overwrite'] = TRUE;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    $this->upload->do_upload($field_name);
  }

  function upload_bukti_undur($url,$field_name,$kode_setor){
    $config['upload_path'] = './asset/'.$url;
    $config['allowed_types'] = 'pdf';
    $config['max_size'] = '10000';
    $config['max_width']  = '10240';
    $config['max_height']  = '7680';
    $config['file_name']  = $kode_setor;
    $config['overwrite'] = TRUE;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    $this->upload->do_upload($field_name);
  }

  function upload_bukti_dokumen($url,$field_name,$doc){
    $config['upload_path'] = './asset/'.$url;
    $config['allowed_types'] = 'pdf';
    $config['file_name']  = $doc;
    $config['overwrite'] = TRUE;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    $this->upload->do_upload($field_name);
  }


  public function ambilSimpanan()
  {
    $data = $this->data_table1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $total_ambil = rupiahToInt2($this->input->post('total_ambil'));
      $nomor = $this->input->post('no_hp');

      if ($total_ambil > $this->input->post('batas_ambil')) {
        $this->session->set_flashdata('PesanError', 'Jumlah penarikan melebihi saldo');
        redirect('Nasabah/ambilSimpanan/');
      }elseif($total_ambil > $this->input->post('batas_ambil')-10000) {
        $this->session->set_flashdata('PesanError', 'Jumlah saldo minimal tidak tercukupi');
        redirect('Nasabah/ambilSimpanan/');
      }

      $code1 = hash("crc32" , $this->session->userdata('no_anggota'));
      $code2 = hash("crc32b" , date('Ymdhis'));
      $code = $code1.$code2;
      $v_code = suffleangka(4);
      $data = array(
        'kode' => $code,
        'v_code' => $v_code,
        'akhir_vcode' => date("Y-m-d H:i:s", strtotime("+3 minutes")),
        'id_anggota'=> $this->session->userdata('ai_anggota'),
        'jenis_ambil_simpanan' => 3,
        'tgl_pengajuan' => date('Y-m-d H:i:s'),
        'total_dana_diajukan' => $total_ambil,
        'no_rek_transfer_ke_nasabah' =>  $this->input->post('id_rekening')
      );
      kirim_sms($nomor,'Konfirmasi kode unik pengambilan dana. Kode Anda : '. $v_code.'. Jangan memberikan kode ini kepada siapapun bahkan termasuk ke pihak koperasi sekalipun.');
      $this->db->insert('ambil_simpanan', $data);
      $this->session->set_flashdata('PesanSukses', 'Masukkan Kode Verifikasi');
      redirect('Nasabah/ambil_detail/'.$code);
    }

    $data['cetak_detail1'] = $this->M_universal->data_diri_nasabah();
    $data['cetak_form1'] = $this->M_universal->rekening_nasabah();
    $data['content'] = 'Modul/Nasabah/simpanan_ambil';
    $this->load->view('backend', $data);
  }

  public function ambil_detail($kode_simpan)
  {
    $data = $this->data_table1;

    $options = array(
      'table' => 'ambil_simpanan',
      'select' => array('*'),
      'where' => array('anggota.id'=> $this->session->userdata('ai_anggota'), 'kode' => $kode_simpan),
      'join' => array('anggota' => 'anggota.id = ambil_simpanan.id_anggota',
                      'rekening_nasabah' => 'rekening_nasabah.id = ambil_simpanan.no_rek_transfer_ke_nasabah',
                      'bank' => 'bank.id_bank = rekening_nasabah.id_bank_nasabah'),
      'setjoin' => 'left'
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/Nasabah/simpanan_ambil_detail';
    $this->load->view('backend', $data);
  }

  public function verifikasi_vcode($kode_ambil)
  {
    $data = $this->data_table1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $checkcode = $this->db->get_where('ambil_simpanan', array('kode' => $kode_ambil,'id_anggota'=> $this->session->userdata('ai_anggota')), 1);

      if ($checkcode->num_rows() == 1) {
        $vkode =  $this->input->post('v_code1').$this->input->post('v_code2').$this->input->post('v_code3').$this->input->post('v_code4');
        $vercode = $this->db->get_where('ambil_simpanan', array('kode' => $kode_ambil,'v_code' => $vkode), 1);
        echo $vercode->num_rows();
        if ($vercode->num_rows() == 1) {
          $data = array(
            'status_ambil' => -1,
          );
          $this->db->update('ambil_simpanan', $data, array('kode' => $kode_ambil));
          $this->session->set_flashdata('PesanSukses', 'Kode Diterima');
          redirect('Nasabah/ambil_detail/'.$kode_ambil);
        }else {
          $this->session->set_flashdata('PesanError', 'Kode Tidak Sama');
          redirect('Nasabah/ambil_detail/'.$kode_ambil);
        }
      }
    }
  }

  public function listAmbilSimpanan()
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'ambil_simpanan',
      'select' => array('*'),
      'where' => array('anggota.id'=> $this->session->userdata('ai_anggota')),
      'join' => array('anggota' => 'anggota.id = ambil_simpanan.id_anggota',
                      'pengurus'=> 'pengurus.id = ambil_simpanan.id_pemberi_persetujuan',
                      'pengurus'=> 'pengurus.id = ambil_simpanan.id_pencair_dana'),
      'setjoin' => 'left'
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/Nasabah/simpanan_ambil_list';
    $this->load->view('backend', $data);
  }

  public function detail($prim_kode)
  {
    $data = $this->data_form1;
    $options = array(
      'table' => 'anggota as anggota_utama',
      'select' => array('*',  'anggota_utama.nama as nama_lengkap','kelompok.nama as nama_kelompok',
                              'anggota_utama.gambar as gambar','kabupaten.nama as tempat_lahir',
                              'kecamatan.nama as nama_kec'),
      'where' => array('anggota_utama.id' => $prim_kode),
      'join' => array('kelompok' => 'kelompok.id = anggota_utama.id_kelompok',
                      'pengurus' => 'pengurus.id = anggota_utama.id_pemverifikasi_anggota_baru',
                      'kabupaten' => 'kabupaten.id = anggota_utama.id_kota_lahir',
                      'kecamatan' => 'kecamatan.id = anggota_utama.id_kecamatan_tempat_tinggal'
                    ),
      'setjoin' => 'left',
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);

    foreach ($data['cetak_detail1'] as $detail1) {
      $id_kelompok = $detail1->id_kelompok;
    }
    if ($id_kelompok != null) {
      $options = array(
        'table' => 'kelompok',
        'select' => array('*', 'anggota.nama as nama_ketua'),
        'where' => array('kelompok.id' => $id_kelompok),
        'join' => array('anggota' => 'anggota.id = kelompok.id_penanggungjawab_kelompok',)
      );
      $data['cetak_detail2'] = $this->M_universal->index($options);
      $data['cetak_set'] = 1;
    } else {
      $data['cetak_set'] = 0;
    }

    $options = array(
      'table' => 'anak',
      'select' => array('*'),
      'where' => array('id_ibu' => $prim_kode),
      // 'join' => array('anak' => 'anak.id=pekerjaan_anak.id_anak',
      //                 'pekerjaan' => 'pekerjaan.id_pekerjaan = pekerjaan_anak.id_pekerjaan_anak')
    );
    $data['cetak_detail3'] = $this->M_universal->index($options);
    $data['punyaAnak'] = $this->M_count->index($options);

    $options = array(
      'table' => 'anak',
      'select' => array('*'),
      'where' => array('id_ibu' => $prim_kode),
    );
    $data['cetak_detail5'] = $this->M_universal->index($options);
    $options = array(
      'table' => 'rekening_nasabah',
      'select' => array('*'),
      'where' => array('id_pemilik_rekening' => $prim_kode),
      'join' => array('bank' => 'bank.id_bank = rekening_nasabah.id_bank_nasabah ')
    );
    $data['cetak_detail4'] = $this->M_universal->index($options);

    $options = array(
      'table' => 'pekerjaan_anggota',
      'where' => array('pekerjaan_anggota.id_anggota'=> $prim_kode),
      'join' => array('pekerjaan' => 'pekerjaan.id_pekerjaan = pekerjaan_anggota.id_pekerjaan_anggota'),
      'setjoin' => 'left',
    );
    $data['pekerjaan_anggota'] = $this->M_universal->index($options);

    $options = array(
      'table' => 'pekerjaan_suami',
      'where' => array('pekerjaan_suami.id_anggota'=> $prim_kode),
      'join' => array('pekerjaan' => 'pekerjaan.id_pekerjaan = pekerjaan_suami.id_pekerjaan_suami'),
      'setjoin' => 'left',
    );
    $data['pekerjaan_suami'] = $this->M_universal->index($options);

    $data['content'] = 'Modul/Nasabah/nasabah_detail';
    $this->load->view('backend', $data);

  }

  public function ajukanPinjaman()
  {
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $code1 = hash("crc32" , 'P-'.$this->session->userdata('no_anggota'));
      $code2 = hash("crc32b" , date('Ymdhis'));
      $code = $code1.$code2; // Cara Memebuat kode pinjam
      $max = rupiahToInt($this->input->post('batas_max'));
      $min = rupiahToInt($this->input->post('batas_min'));

      if (rupiahToInt($this->input->post('jumlah_pinjam')) > $max || rupiahToInt($this->input->post('jumlah_pinjam')) < $min) {
        $this->session->set_flashdata('PesanError', 'Sesuaikan jenis pinjaman dengan maksimal dan minimal jumlah pinjaman.');
        redirect('Nasabah/ajukanPinjaman');
      }

      $data = array(
        'kode' => $code,
        'idjenis_pinjaman' => $this->input->post('id_pinjam'),
        'idjenis_keperluan_pinjaman' => $this->input->post('jenis_keperluan_pinjaman'),
        'id_anggota_peminjam' => $this->session->userdata('ai_anggota'),
        'id_rekening_pencairan_nasabah' => $this->input->post('bank_nasabah'),
        'tgl_pinjaman' => date('Y-m-d H:i:s'),
        'jumlah_pinjaman_diajukan' => rupiahToInt($this->input->post('jumlah_pinjam')),
        'total_pinjaman_diberikan_setelah_bunga' => rupiahToInt($this->input->post('jumlah_dana_bunga')),
        'keterangan_pinjaman' => $this->input->post('keterangan_pinjam')
      );
      $this->db->insert('pinjaman', $data);
      $this->session->set_flashdata('PesanSukses', 'Pinjaman Telah Diajukan. Pengajuan Pinjaman Akan Segera Di Proses');
      redirect('Nasabah/listPinjaman/');
    }

    $options = array(
      'table' => 'anggota',
      'where' => array('anggota.id'=> $this->session->userdata('ai_anggota'))
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);

    $options = array(
      'table' => 'jenis_pinjaman',
    );
    $data['cetak_form1'] = $this->M_universal->index($options); // Jenis Pinjaman

    $options = array(
      'table' => 'jenis_keperluan_pinjaman',
    );
    $data['cetak_form3'] = $this->M_universal->index($options); // Cetak Jenis Keperluan Pinjaman

    $options = array(
      'table' => 'pinjaman',
      'select' => array('*'),
      'where' => array('id_anggota_peminjam'=> $this->session->userdata('ai_anggota'),
                       'status_lunas' => 0 ,
                       'status_pinjam' => 1 ,),
      'setjoin' => 'left'
    );
    $data['cetak_tunggakan'] = $this->M_count->index($options);

    $i = $this->session->userdata('ai_anggota');
    $data['cetak_hutang_terbayar'] = $this->db->query(
      "SELECT SUM(terbayar) as total
      FROM pinjaman WHERE id_anggota_peminjam = $i AND status_lunas = 0 AND status_pinjam = 1
      ")->row()->total;

    $data['cetak_hutang'] = $this->db->query(
      "SELECT SUM(total_pinjaman_diberikan_setelah_bunga) as total
      FROM pinjaman WHERE id_anggota_peminjam = $i AND status_lunas = 0 AND status_pinjam = 1
      ")->row()->total;

    $data['cetak_form4'] = $this->M_universal->rekening_nasabah();

    $data['content'] = 'Modul/Nasabah/pinjaman_buat';
    $this->load->view('backend', $data);
  }

  public function listPinjaman()
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'pinjaman',
      'select' => array('*','jenis_pinjaman.nama as nama_pinjaman','kode as kode_pinjam'),
      'where' => array('anggota.id'=> $this->session->userdata('ai_anggota')),
      'join' => array('anggota' => 'anggota.id = pinjaman.id_anggota_peminjam',
                      'pengurus'=> 'pengurus.id = pinjaman.id_persetujuan_bagian_informasi',
                      'pengurus'=> 'pengurus.id = pinjaman.id_pencair_dana',
                      'jenis_pinjaman'=> 'jenis_pinjaman.id = pinjaman.idjenis_pinjaman'),
      'setjoin' => 'left'
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/Nasabah/pinjaman_list';
    $this->load->view('backend', $data);
  }

  public function pinjamanDetail($kode_pinjam)
  {
    $data = $this->data_table1;

    $options = array(
      'table' => 'pinjaman',
      'select' => array('*'),
      'where' => array('anggota.id'=> $this->session->userdata('ai_anggota'), 'kode' => $kode_pinjam),
      'join' => array('anggota' => 'anggota.id = pinjaman.id_anggota_peminjam',
                      'pengurus'=> 'pengurus.id = pinjaman.id_persetujuan_bagian_informasi',
                      'pengurus'=> 'pengurus.id = pinjaman.id_pencair_dana',
                      'jenis_pinjaman'=> 'jenis_pinjaman.id = pinjaman.idjenis_pinjaman'),
      'setjoin' => 'left',

    );
    $data['cetak_detail1'] = $this->M_universal->index($options);

    $options = array(
      'table' => 'pembayaran',
      'select' => array('*'),
      'where' => array('anggota.id'=> $this->session->userdata('ai_anggota'), 'kode_pinjaman' => $kode_pinjam),
      'join' => array('pinjaman' => 'pinjaman.kode = pembayaran.kode_pinjaman',
                      'anggota' => 'anggota.id = pinjaman.id_anggota_peminjam',
                      'pengurus'=> 'pengurus.id = pinjaman.id_persetujuan_bagian_informasi',
                      'pengurus'=> 'pengurus.id = pinjaman.id_pencair_dana',
                      'jenis_pinjaman'=> 'jenis_pinjaman.id = pinjaman.idjenis_pinjaman'),
      'setjoin' => 'left',
      'order' => array('angsuran_asli' => 'DESC') ,
    );
    $data['cetak_list1'] = $this->M_universal->index($options);

    $data['bunga_dan_pinjaman'] = $this->db->query('SELECT SUM(angsuran_asli) FROM pembayaran WHERE kode_pinjaman = "7d682a49f0b4ea1"');
    $data['content'] = 'Modul/Nasabah/pinjaman_detail';
    $this->load->view('backend', $data);
  }

  public function bayarPinjaman($kode_bayar)
  {
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'total_harus_semua' => rupiahToInt($this->input->post('jumlah_setor')),
        'tgl_pembayaran' => date('Y-m-d H:i:s'),
        'status_bayar' => -1,
        'denda' =>  rupiahToInt($this->input->post('denda')),
        'rekening_tujuan' => $this->input->post('id_rekening'),
        'rekening_dari_nasabah' => $this->input->post('id_rekening_nasabah'),
        'file_attach_bukti_pembayaran' => $kode_bayar.".jpg",
      );
      $this->upload_bukti_simpan('BUKTI_BAYAR_CICILAN/','bc',$kode_bayar);
      $this->db->update('pembayaran', $data, array('kode_bayar' => $kode_bayar));
      $this->session->set_flashdata('PesanSukses', 'Upload Bukti Pembayaran Berhasil');
      redirect('Nasabah/pinjamanDetail/'.$this->input->post('kode_pinjam'));
    }
    $options = array(
      'table' => 'pembayaran',
      'select' => array('*',                      'bank_nas.nama_bank as nama_bank_nasabah','bank_kop.nama_bank as nama_bank_koperasi',),
      'where' => array('anggota.id'=> $this->session->userdata('ai_anggota'), 'kode_bayar' => $kode_bayar),
      'join' => array('pinjaman' => 'pinjaman.kode = pembayaran.kode_pinjaman',
                      'anggota' => 'anggota.id = pinjaman.id_anggota_peminjam',
                      'pengurus'=> 'pengurus.id = pinjaman.id_pencair_dana',
                      'jenis_pinjaman'=> 'jenis_pinjaman.id = pinjaman.idjenis_pinjaman',

                      'rekening_koperasi'  => 'rekening_koperasi.id = pembayaran.rekening_tujuan',
                      'rekening_nasabah' => 'rekening_nasabah.id = pembayaran.rekening_dari_nasabah',
                      'bank as bank_nas' => 'bank_nas.id_bank = rekening_nasabah.id_bank_nasabah',
                      'bank as bank_kop' => 'bank_kop.id_bank = rekening_koperasi.id_bank_koperasi'
                    ),
      'setjoin' => 'left'
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);

    $data['cetak_form2'] = $this->M_universal->rekening_koperasi_aktif(); //Tetapkan Rekening Tujuan
    $data['cetak_form1'] = $this->M_universal->rekening_nasabah(); //Tetapkan Rekening nasabah
    $data['content'] = 'Modul/Nasabah/pinjaman_bayar';
    $this->load->view('backend', $data);
  }

  public function listPermintaanAnggotaKelompok()
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'permintaan_kelompok',
      'select' => array('*','anggota.id as id_anggota'),
      'where' => array('id_penanggungjawab_kelompok'=> $this->session->userdata('ai_anggota')),
      'join' => array('kelompok' => 'kelompok.id = permintaan_kelompok.kelompok_yang_dituju',
                      'anggota' => 'anggota.id = permintaan_kelompok.kode_anggota_peminta'),
      // 'setjoin' => 'left'
    );
    $data['cetak_list1'] = $this->M_universal->index($options);

    $data['content'] = 'Modul/Nasabah/permintaan_anggota_kelompok_list';
    $this->load->view('backend', $data);
  }

  public function detailKelompok()
  {
    $data = $this->data_form1;
    $options = array(
      'table'   => 'kelompok',
      'select'  => array('*','anggota.nama as nama_ketua','kelompok.id as id_kel' ,'kelompok.nama as nama_kel'
                            ,'kecamatan.id as id_kec', 'kecamatan.nama as nama_kecamatan','pengurus.nama as nama_pengurus'
                            ,'anggota.gambar as foto_ketua'),
      'where'   => array('kelompok.id_penanggungjawab_kelompok'=> $this->session->userdata('ai_anggota')),
      'join'    => array('anggota' => 'anggota.id = kelompok.id_penanggungjawab_kelompok',
                      'kecamatan' => 'kecamatan.id = kelompok.id_kecamatan',
                      'pengurus' => 'pengurus.id = kelompok.id_pengurus_pemverifikasi'),
      'setjoin' => 'left'
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);
    // echo $this->M_count->index($options);

    $options = array(
      'table' => 'anggota',
      'where' => array('anggota.id'=> $this->session->userdata('ai_anggota'))
    );
    $data['cetak_detail2'] = $this->M_universal->index($options);

    $options = array(
      'table'   => 'anggota',
      'select'  => array('*'),
      'where'   => array('id_kelompok'=>  1),
    );
    $data['cetak_list1'] = $this->M_universal->index($options);

    $options = array(
      'table' => 'permintaan_kelompok',
      'where' => array('kode_anggota_peminta'=> $this->session->userdata('ai_anggota')),

    );
    $data['cetak_detail3'] = $this->M_universal->index($options);
    $data['kelompok_sedang_dipilih'] = $this->M_count->index($options);


    $data['content'] = 'Modul/Nasabah/detail_kelompok';
    $this->load->view('backend', $data);
  }

  public function terimaAnggota($id_permintaan,$id_anggota,$id_kelompok)
  {
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      if ($this->input->post("status_terima") == 0) {
        // $data = array(
        //   'status_terima_dari_kelompok' => 0,
        // );
        // $this->db->update('permintaan_kelompok', $data, array('id_permintaan' => $id_permintaan));

        $data = array(
          'status_terima_dari_kelompok' => 0,
          'kelompok_yang_dituju' => null,
          'berkas_permintaan' => $id_permintaan.".pdf"
        );
        $this->upload_bukti_simpan('BUKTI_PERSETUJUAN_KELOMPOK/','bpk',$id_permintaan);
        $this->db->update('permintaan_kelompok', $data, array('id_permintaan' => $id_permintaan));
        $this->session->set_flashdata('PesanSukses', 'Calon Anggota Baru Telah Disetujui Untuk Bergabung');
        redirect('Nasabah/listPermintaanAnggotaKelompok');
      }else {
        $data = array(
          'id_kelompok' => $id_kelompok,
        );
        $this->db->update('anggota', $data, array('id' => $id_anggota));

        $data = array(
          'status_terima_dari_kelompok' => 1,
          'berkas_permintaan' => $id_permintaan.".pdf"
        );
        $this->upload_bukti_simpan('BUKTI_PERSETUJUAN_KELOMPOK/','bpk',$id_permintaan);
        $this->db->update('permintaan_kelompok', $data, array('id_permintaan' => $id_permintaan));

        $this->session->set_flashdata('PesanSukses', 'Calon Anggota Baru Telah Disetujui Untuk Bergabung');
        redirect('Nasabah/listPermintaanAnggotaKelompok');
      }

    }
    $data['id_anggota'] = $id_anggota;

    $options = array(
      'table' => 'anggota',
      'where' => array('id'=> $id_anggota),
      'setjoin' => 'left'
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);

    $options = array(
      'table' => 'permintaan_kelompok',
      'where' => array('id_permintaan'=> $id_permintaan),
      'setjoin' => 'left'
    );
    $data['cetak_detail2'] = $this->M_universal->index($options);

    $data['kode1']=$id_permintaan;
    $data['kode2']=$id_anggota;
    $data['kode3']=$id_kelompok;
    $data['content'] = 'Modul/Nasabah/permintaan_anggota_form';
    $this->load->view('backend', $data);
  }

  public function listTunggakanKelompok()
  {
    $data = $this->data_table1;

    $options = array(
      'table' => 'anggota',
      'select' => array('*'),
      'where' => array('id'=> $this->session->userdata('ai_anggota'),
    ),

    );
    $check_kel = $this->M_universal->index($options);

    foreach ($check_kel as $kel) {
      $set = $kel->id_kelompok;
    }

    $options = array(
      'table' => 'pinjaman',
      'select' => array('*','anggota.nama as nama_nasabah'),
      'where' => array('id_kelompok'=> $set,
                       'status_lunas' => 0 ,
                       'status_pinjam' => 1 ,),
      'join' => array('anggota' => 'anggota.id = pinjaman.id_anggota_peminjam',),
      'setjoin' => 'left'
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/Nasabah/tunggakan_kelompok_list';
    $this->load->view('backend', $data);
  }

  public function pengunduranDiri()
  {
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'id_anggota' => $this->session->userdata('ai_anggota'),
        'status' => -2,
        'rekening_pencairan_tujuan' => $this->input->post('id_rekening'),
        'alasan_berhenti' => clear_input($this->input->post("alasan_keluar")),
        'berkas_persetujuan_berhenti' => $this->session->userdata('ai_anggota').".pdf",
      );
      $this->db->insert("permintaan_berhenti",$data);
      $this->upload_bukti_undur('BUKTI_PERSETUJUAN_PENGUNDURAN/','berkas_undur',$this->session->userdata('ai_anggota').".pdf");
      $this->session->set_flashdata('PesanSukses', 'Pengunduran Diri Telah Diajukan');
      redirect('Nasabah');
    }

    $data['cetak_detail1'] = $this->M_universal->data_diri_nasabah();

    $options = array(
      'table' => 'pinjaman',
      'select' => array('*'),
      'where' => array('id_anggota_peminjam'=> $this->session->userdata('ai_anggota'),
                       'status_lunas' => 0 ,
                       'status_pinjam' => 1 ,),
      'setjoin' => 'left'
    );
    $data['cetak_tunggakan'] = $this->M_count->index($options);

    $options = array(
      'table' => 'permintaan_berhenti',
      'where' => array('id_anggota'=> $this->session->userdata('ai_anggota')),

    );
    $data['check_status'] = $this->M_count->index($options);

    $data['cetak_rekening'] = $this->M_universal->rekening_nasabah();
    $data['content'] = 'Modul/Nasabah/pengunduran_form';
    $this->load->view('backend', $data);
  }

  public function jadwalkan_pertemuan()
  {
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      if($this->input->post('pesan') == null){
        $pesan =  "";
      }else {
        $pesan = ". Catatan Tambahan : ".$this->input->post('pesan').".";
      }
      $header_pesan = "Tanggal : ". $this->input->post('tgl_pertemuan').
                      " pukul : ".$this->input->post('jam_pertemuan1')." s.d ".$this->input->post('jam_pertemuan2')
                      .$pesan;

      $options = array(
        'table' => 'anggota',
        'select' => array('id_kelompok'),
        'where' => array('id'=> $this->session->userdata('ai_anggota')),
      );
      $data_set1 = $this->M_universal->index($options);
      foreach ($data_set1  as $set1) {
        $set1 =  $set1->id_kelompok;
      }

      $options = array(
        'table' => 'anggota',
        'where' => array('id_kelompok'=> $set1),
      );
      $data_set2 = $this->M_universal->index($options);

      foreach ($data_set2 as $set2) {
        if ($this->session->userdata('ai_anggota') != $set2->id) {
          $data = array(
            'kepada' => $set2->id,
            'judul' => $this->input->post('tujuan_pertemuan'),
            'isi' => $header_pesan,
            'dari_anggota' => $this->session->userdata('ai_anggota'),
            'dikirim_pukul' => date('Y-m-d H:i:s'),
          );
          $this->db->insert('pesan', $data);
        }
      }
      $this->session->set_flashdata('PesanSukses', 'Jadwal Pertemuan Sudah Tersebar');
      redirect('Nasabah/jadwalkan_pertemuan');
    }
    $data['content'] = 'Modul/Nasabah/pertemuan_form';
    $this->load->view('backend', $data);
  }

  public function delete_pinjaman($prim_kode)
  {
    $this->db->delete('pinjaman', array('kode' => $prim_kode));
    $this->session->set_flashdata('PesanSukses', 'Data Pinjaman Berhasil Dihapus');
    redirect('Nasabah/listPinjaman');
  }



}
