<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P_auditor extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->cekLogin();

  }
  public function index()
  {
    $data = $this->data_table1;
    $data['cetak_pengajuan'] = $this->db->query("SELECT kode FROM pinjaman WHERE status_pinjam = -2")->num_rows();
    $data['cetak_belum_lunas'] = $this->db->query("SELECT kode FROM pinjaman WHERE status_lunas = 0")->num_rows();
    $data['cetak_macet'] = $this->db->query(
      "SELECT kode_bayar FROM pembayaran LEFT JOIN pinjaman ON pinjaman.kode = pembayaran.kode_pinjaman
      WHERE status_pinjam = 1 AND status_lunas = 0 AND status_bayar != 1
      AND YEAR(tgl_jatuh_tempo) <= YEAR(CURRENT_DATE) AND MONTH(tgl_jatuh_tempo) <= MONTH(CURRENT_DATE)  AND DAY(tgl_jatuh_tempo) <= DAY(CURRENT_DATE)
      ")->num_rows();
    $data['cetak_lunas'] = $this->db->query("SELECT kode FROM pinjaman WHERE status_lunas = 1")->num_rows();

    $data['l1'] = $this->db->query("SELECT kode FROM pinjaman WHERE status_lunas = 1 AND
      YEAR(tgl_pencairan_dana) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(tgl_pencairan_dana) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) ")->num_rows();
    $data['l2'] = $this->db->query("SELECT kode FROM pinjaman WHERE status_lunas = 1 AND
      YEAR(tgl_pencairan_dana) = YEAR(CURRENT_DATE - INTERVAL 2 MONTH) AND MONTH(tgl_pencairan_dana) = MONTH(CURRENT_DATE - INTERVAL 2 MONTH)")->num_rows();
    $data['l3'] = $this->db->query("SELECT kode FROM pinjaman WHERE status_lunas = 1 AND
      YEAR(tgl_pencairan_dana) = YEAR(CURRENT_DATE - INTERVAL 3 MONTH) AND MONTH(tgl_pencairan_dana) = MONTH(CURRENT_DATE - INTERVAL 3 MONTH)")->num_rows();
    $data['l4'] = $this->db->query("SELECT kode FROM pinjaman WHERE status_lunas = 1 AND
      YEAR(tgl_pencairan_dana) = YEAR(CURRENT_DATE - INTERVAL 4 MONTH) AND MONTH(tgl_pencairan_dana) = MONTH(CURRENT_DATE - INTERVAL 4 MONTH)")->num_rows();
    $data['l5'] = $this->db->query("SELECT kode FROM pinjaman WHERE status_lunas = 1 AND
      YEAR(tgl_pencairan_dana) = YEAR(CURRENT_DATE - INTERVAL 5 MONTH) AND MONTH(tgl_pencairan_dana) = MONTH(CURRENT_DATE - INTERVAL 5 MONTH)")->num_rows();

    $data['bl1'] = $this->db->query("SELECT kode FROM pinjaman WHERE status_lunas = 0 AND
      YEAR(tgl_pencairan_dana) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(tgl_pencairan_dana) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) ")->num_rows();
    $data['bl2'] = $this->db->query("SELECT kode FROM pinjaman WHERE status_lunas = 0 AND
      YEAR(tgl_pencairan_dana) = YEAR(CURRENT_DATE - INTERVAL 2 MONTH) AND MONTH(tgl_pencairan_dana) = MONTH(CURRENT_DATE - INTERVAL 2 MONTH)")->num_rows();
    $data['bl3'] = $this->db->query("SELECT kode FROM pinjaman WHERE status_lunas = 0 AND
      YEAR(tgl_pencairan_dana) = YEAR(CURRENT_DATE - INTERVAL 3 MONTH) AND MONTH(tgl_pencairan_dana) = MONTH(CURRENT_DATE - INTERVAL 3 MONTH)")->num_rows();
    $data['bl4'] = $this->db->query("SELECT kode FROM pinjaman WHERE status_lunas = 0 AND
      YEAR(tgl_pencairan_dana) = YEAR(CURRENT_DATE - INTERVAL 4 MONTH) AND MONTH(tgl_pencairan_dana) = MONTH(CURRENT_DATE - INTERVAL 4 MONTH)")->num_rows();
    $data['bl5'] = $this->db->query("SELECT kode FROM pinjaman WHERE status_lunas = 0 AND
      YEAR(tgl_pencairan_dana) = YEAR(CURRENT_DATE - INTERVAL 5 MONTH) AND MONTH(tgl_pencairan_dana) = MONTH(CURRENT_DATE - INTERVAL 5 MONTH)")->num_rows();

    $data['content'] = 'Modul/P_auditor/dashboard';
    $this->load->view('backend', $data);
  }


  public function simpananCari2($day,$month,$year)
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'simpan',
      'select' => array('*', 'anggota.nama as nama_anggota', 'pengurus.nama as nama_pengurus','simpan.id as kode_simpan'),
      'join' => array('anggota' => 'anggota.id = simpan.id_pelaku_simpan',
                      'pengurus' => 'pengurus.id = simpan.id_verifikator'),
      'where' => array('DAY(tgl_lakukan_simpan)' => date('d') , 'MONTH(tgl_lakukan_simpan)' => date('m') , 'YEAR(tgl_lakukan_simpan)' => date('Y')),
      'setjoin' => 'left',
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_auditor/listSimpanan';
    $this->load->view('backend', $data);
  }



  public function detailSimpanan($kode_simpan)
  {
    $data = $this->data_form1;
    // if ($this->input->server('REQUEST_METHOD') == 'POST') {
    //   $data = array(
    //     'nama' => $this->input->post('nama_provinsi'),
    //   );
    //   $this->db->insert('provinsi', $data);
    //   $this->session->set_flashdata('PesanSukses', 'Provinsi Baru Berhasil Ditambah');
    //   redirect('Provinsi/list');
    // }
    $options = array(
      'table' => 'simpan',
      'select' => array('*', 'anggota.nama as nama_anggota', 'pengurus.nama as nama_pengurus','simpan.id as kode_simpan', 'pengurus.id as id_pengurus'),
      'join' => array('anggota' => 'anggota.id = simpan.id_pelaku_simpan',
                      'pengurus' => 'pengurus.id = simpan.id_verifikator',
                      'rekening_koperasi'  => 'rekening_koperasi.id = no_rek_tujuan'),
      'where' => array('simpan.id' => $kode_simpan),
      'setjoin' => 'left',
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_auditor/simpanan_detail';
    $this->load->view('backend', $data);
  }

  public function verifikasiSetoran($prim_kode)
  {
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      if ($this->input->post('ver') == 1) {
        $data = array(
          'id_verifikator' => $this->session->userdata('ai_pengurus'),
          'tgl_verifikasi_simpanan' => date('Y-m-d h:i:s'),
          'status_simpan' => 1
        );
      }else {
        $data = array(
          'id_verifikator' => $this->session->userdata('ai_pengurus'),
          'keterangan_tolak_simpanan' => $this->input->post('keterangan_tolak'),
          'tgl_verifikasi_simpanan' => date('Y-m-d h:i:s'),
          'status_simpan' => 0
        );
      }

      $this->db->update('simpan', $data, array('id' => $prim_kode));
      $this->session->set_flashdata('PesanSukses', 'Data Simpanan Sudah Diverfikasi');
      redirect('Pengurus/detailSimpanan/'.$prim_kode);
    }
  }




  public function checkBerkasNasabah($kode_nasabah)
  {
    $data = $this->data_form1;
    $data['prim_kode'] = $kode_nasabah;

    $options = array(
      'table' => 'anggota',
      'select' => array('*', 'anggota.nama as nama_lengkap'),
      'where' => array('anggota.id' => $kode_nasabah),
      // 'join' => array('kelompok' => 'kelompok.id = anggota.id_kelompok',
      //                 'pengurus' => 'pengurus.id = anggota.id_pemverifikasi_anggota_baru'),
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_auditor/nasabah_baru_acc';
    $this->load->view('backend', $data);
  }


  public function pinjamanList()
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'pinjaman',
      'select' => array('*', 'anggota.nama as nama_anggota', 'pengurus.nama as nama_pengurus',
                              'jenis_pinjaman.nama as nama_pinjaman'  ),
      'where' => array('status_lunas' => 0, 'status_pinjam <='=>1),
      'join' => array('anggota' => 'anggota.id = pinjaman.id_anggota_peminjam',
                      'pengurus' => 'pengurus.id = pinjaman.id_persetujuan_auditor',
                      'jenis_pinjaman' => 'jenis_pinjaman.id = pinjaman.idjenis_pinjaman',
                      'jenis_keperluan_pinjaman' => 'jenis_keperluan_pinjaman.id = pinjaman.idjenis_keperluan_pinjaman'),
      'setjoin' => 'left',
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_auditor/pinjaman_list';
    $this->load->view('backend', $data);
  }

  public function aksiPinjam($kode_pinjam)
  {
    if ($this->input->server('REQUEST_METHOD') == 'POST') {

      $terima = $this->input->post('ver');
      $dana = rupiahToInt($this->input->post('dana'));
      if ($dana == null || $dana == 0) {
        $dana == null;
      }else {
        $dana = rupiahToInt($this->input->post('dana'));
        $cicilan = $dana*($this->input->post('bunga')/100);
        $total = $dana+$cicilan;
      }
      if ($terima == -1) {
        $data = array(
          'jumlah_pinjaman_diberikan' => $dana,
          'status_pinjam' => -1,
          'id_persetujuan_auditor' => $this->session->userdata('ai_pengurus'),
          'tgl_persetujuan_auditor' => date('Y-m-d H:i:s')
        );

        $this->db->update('pinjaman', $data, array('kode' => $kode_pinjam));
        $this->session->set_flashdata('PesanSukses', 'Data Simpanan Sudah Di Cairkan');
      } else {
        $data = array(
          'jumlah_pinjaman_diberikan' => $dana,
          'status_pinjam' => 0,
          'id_persetujuan_auditor' => $this->session->userdata('ai_pengurus'),
          'tgl_persetujuan_auditor' => date('Y-m-d H:i:s'),
          'keterangan_tolak' => $this->input->post('keterangan_tolak')
        );

        $this->db->update('pinjaman', $data, array('kode' => $kode_pinjam));
        $this->session->set_flashdata('PesanSukses', 'Data Simpanan Sudah Di Cairkan');
      }
      redirect('P_auditor/aksiPinjam/'.$kode_pinjam);
    }
    $data = $this->data_form1;
    $options = array(
      'table' => 'pinjaman',
      'select' => array('*',  'anggota.nama as nama_anggota', 'pengurus.nama as nama_pengurus', 'anggota.id as id_anggota',
                              'pinjaman.kode as kode_ambil',
                              'pengurus.id as id_pengurus', 'jenis_pinjaman.nama as nama_jenis_pinjaman'),
      'where' => array('pinjaman.kode'=> $kode_pinjam),
      'join' => array('anggota'=>'anggota.id = pinjaman.id_anggota_peminjam',
                      'pengurus'=>'pengurus.id = pinjaman.id_persetujuan_auditor',
                      'jenis_pinjaman'=>'jenis_pinjaman.id = pinjaman.idjenis_pinjaman',
                      'jenis_keperluan_pinjaman'=>'jenis_keperluan_pinjaman.id = pinjaman.idjenis_keperluan_pinjaman',
                      'rekening_koperasi'  => 'rekening_koperasi.id = no_rek_pencairan'),
      'setjoin' => 'left'
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);

    $options = array(
      'table' => 'rekening_koperasi'
    );
    $data['cetak_form1'] = $this->M_universal->index($options);

    $data['content'] = 'Modul/P_auditor/pinjaman_detail';
    $this->load->view('backend', $data);
  }

  public function tunggakNasabah($kode_nasabah)
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'pinjaman',
      'select' => array('*', 'anggota.nama as nama_anggota', 'pengurus.nama as nama_pengurus'),
      'where' => array('id_anggota_peminjam' => $kode_nasabah,'status_lunas !=' => 1),
      'join' => array('anggota' => 'anggota.id = pinjaman.id_anggota_peminjam',
                      'pengurus' => 'pengurus.id = pinjaman.id_persetujuan_auditor'),
      'setjoin' => 'left',
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $options = array(
      'table' => 'simpan',
      'select' => array('*', 'anggota.nama as nama_anggota', 'pengurus.nama as nama_pengurus'),
      'where' => array('id_pelaku_simpan' => $kode_nasabah,'jenis_simpanan' => 2, 'status_simpan !=' => 1, 'status_simpan !=' => 0),
      'join' => array('anggota' => 'anggota.id = simpan.id_pelaku_simpan',
                      'pengurus' => 'pengurus.id = simpan.id_verifikator'),
      'setjoin' => 'left',
    );
    //'tgl_jatuh_tempo_bayar >=' => date('Y-m-d H:i:s')
    $data['cetak_list2'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_auditor/tunggak_nasabah_list';
    $this->load->view('backend', $data);
  }

  public function pinjamanTunggak()
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'pinjaman',
      'select' => array('*', 'anggota.nama as nama_anggota', 'pengurus.nama as nama_pengurus'),
      'where' => array('status_lunas !=' => 1),
      'join' => array('anggota' => 'anggota.id = pinjaman.id_anggota_peminjam',
                      'pengurus' => 'pengurus.id = pinjaman.id_persetujuan_auditor'),
      'setjoin' => 'left',
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_auditor/tunggak_pinjam_list';
    $this->load->view('backend', $data);
  }

  public function setoranTunggak()
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'simpan',
      'select' => array('*', 'anggota.nama as nama_anggota', 'pengurus.nama as nama_pengurus'),
      'where' => array('jenis_simpanan' => 2, 'status_simpan !=' => 1, 'status_simpan !=' => 0),
      'join' => array('anggota' => 'anggota.id = simpan.id_pelaku_simpan',
                      'pengurus' => 'pengurus.id = simpan.id_verifikator'),
      'setjoin' => 'left',
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_auditor/tunggak_wajib_list';
    $this->load->view('backend', $data);
  }

  public function listBayar($kode_pinjam)
  {
    $data = $this->data_table1;

    $options = array(
      'table' => 'pinjaman',
      'select' => array('*',  'anggota.nama as nama_anggota', 'pengurus.nama as nama_pengurus',
                              'pinjaman.kode as kode_ambil',
                              'pengurus.id as id_pengurus', 'jenis_pinjaman.nama as nama_jenis_pinjaman'),
      'where' => array('pinjaman.kode'=> $kode_pinjam),
      'join' => array('anggota'=>'anggota.id = pinjaman.id_anggota_peminjam',
                      'pengurus'=>'pengurus.id = pinjaman.id_persetujuan_auditor',
                      'jenis_pinjaman'=>'jenis_pinjaman.id = pinjaman.idjenis_pinjaman',
                      'jenis_keperluan_pinjaman'=>'jenis_keperluan_pinjaman.id = pinjaman.idjenis_keperluan_pinjaman',
                      'rekening_koperasi'  => 'rekening_koperasi.id = no_rek_pencairan'),
      'setjoin' => 'left'
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);

    $options = array(
      'table' => 'pembayaran',
      'select' => array('*', 'anggota.nama as nama_anggota', 'pengurus.nama as nama_pengurus',
                              'jenis_pinjaman.nama as nama_pinjaman'  ),
      'where' => array('kode_pinjaman' => $kode_pinjam),
      'join' => array('pinjaman' => 'pinjaman.kode = pembayaran.kode_pinjaman',
                      'anggota' => 'anggota.id = pinjaman.id_anggota_peminjam',
                      'pengurus' => 'pengurus.id = pembayaran.id_penerima_dana',
                      'jenis_pinjaman' => 'jenis_pinjaman.id = pinjaman.idjenis_pinjaman',
                      'jenis_keperluan_pinjaman' => 'jenis_keperluan_pinjaman.id = pinjaman.idjenis_keperluan_pinjaman'),
      'setjoin' => 'left',
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_auditor/bayar_list';
    $this->load->view('backend', $data);
  }

  public function peringatanPinjaman($kode_bayar, $no_hp){
    $options = array(
      'table' => 'pembayaran',
      'select' => array('*', 'anggota.nama as nama_anggota', 'pengurus.nama as nama_pengurus',
                              'jenis_pinjaman.nama as nama_pinjaman'  ),
      'where' => array('kode_pinjaman' => $kode_bayar),
      'join' => array('pinjaman' => 'pinjaman.kode = pembayaran.kode_pinjaman',
                      'anggota' => 'anggota.id = pinjaman.id_anggota_peminjam',
                      'pengurus' => 'pengurus.id = pembayaran.id_penerima_dana',
                      'jenis_pinjaman' => 'jenis_pinjaman.id = pinjaman.idjenis_pinjaman',
                      'jenis_keperluan_pinjaman' => 'jenis_keperluan_pinjaman.id = pinjaman.idjenis_keperluan_pinjaman'),
      'setjoin' => 'left',
    );
    $cetak_format1 = $this->M_universal->index($options);


  }

  public function checkPinjamanMonth()
  {
    $data = $this->data_table1;

    $options = array(
      'table' => 'pembayaran',
      'where' => array( 'MONTH(tgl_tagihan_pinjam)' => date('m'), 'YEAR(tgl_tagihan_pinjam)' => date('Y')),
      'join' => array('pinjaman' => 'pinjaman.kode = pembayaran.kode_pinjaman' ,
                      'anggota' => 'anggota.id = pinjaman.id_anggota_peminjam'),
      'setjoin' => 'left',
    );

    $data['cetak_list1'] = $this->M_universal->index($options);

    $data['content'] = 'Modul/P_auditor/check_pinjaman_bulan';
    $this->load->view('backend', $data);
  }

  public function checkPinjamanTerlewat()
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'pembayaran',
      'where' => array( 'MONTH(tgl_tagihan_pinjam) <' => date('m'), 'YEAR(tgl_tagihan_pinjam) <=' => date('Y')),
      'join' => array('pinjaman' => 'pinjaman.kode = pembayaran.kode_pinjaman' ,
                     'anggota' => 'anggota.id = pinjaman.id_anggota_peminjam'),
      'setjoin' => 'left',
    );

    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_auditor/check_pinjaman_lewat';
    $this->load->view('backend', $data);
  }

  public function jadwalkanJatuhTempo($kode_bayar)
  {
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'tgl_tagihan_pinjam' => jsdate_to_db1($this->input->post('tgl_tagihan_pinjam')),
        'tgl_jatuh_tempo' =>  jsdate_to_db1($this->input->post('tgl_jatuh_tempo'))
      );
      $this->db->update('pembayaran', $data, array('kode_bayar' => $kode_bayar));
      $this->session->set_flashdata('PesanSukses', 'Data Pembayaran Berhasil Di Rubah');
      redirect('P_auditor/jadwalkanJatuhTempo/'.$kode_bayar);
    }

    $options = array(
      'table' => 'pembayaran',
      'where' => array('kode_bayar' => $kode_bayar),
      'join' => array('pinjaman' => 'pinjaman.kode = pembayaran.kode_pinjaman' ,
                     'anggota' => 'anggota.id = pinjaman.id_anggota_peminjam'),
      'setjoin' => 'left',
    );

    $data['cetak_detail1'] = $this->M_universal->index($options);

    $data['kode_bayar'] = $kode_bayar;
    $data['content'] = 'Modul/P_auditor/jadwal_jatuh_tempo';
    $this->load->view('backend', $data);
  }

  public function ingatkanPembayaran($hp, $tgl_jatuh_tempo, $jumlah_bayar)
  {
    $pesan = "Anda belum melakukan pembayaran bulan " . date('F-Y'). ' sebesar '.$jumlah_bayar. ' sebelum tanggal '.halfnoTime(cutForDate($tgl_jatuh_tempo)).'.';
    kirim_sms($hp,$pesan);
    $this->session->set_flashdata('PesanSukses', 'Pesan berhasil terkirim');
    redirect('P_auditor/checkPinjamanMonth');
  }

  public function ingatkanPembayaranSimpan($hp, $tgl_jatuh_tempo)
  {
    $pesan = "Anda belum melakukan simpanan wajib bulan" . date('F-Y'). ' .Harap membayar sebelum tanggal '.halfnoTime(cutForDate($tgl_jatuh_tempo)).'.';
    kirim_sms($hp,$pesan);
    $this->session->set_flashdata('PesanSukses', 'Pesan berhasil terkirim');
    redirect('P_auditor/checkSetoranWajibMonth');
  }

  public function checkSetoranWajibMonth()
  {
    $data = $this->data_table1;

    $options = array(
      'table' => 'simpan',
      'where' => array( 'MONTH(tgl_Wajib_setor)' => date('m'), 'YEAR(tgl_Wajib_setor)' => date('Y'),'jenis_simpanan' => 2),
      'join' => array('anggota' => 'anggota.id = simpan.id_pelaku_simpan'),
      'setjoin' => 'left',
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_auditor/check_setoran_wajib_bulan';
    $this->load->view('backend', $data);
  }

  public function checkSetoranWajibLewat()
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'simpan',
      'where' => array( 'MONTH(tgl_wajib_setor) <' => date('m'), 'YEAR(tgl_Wajib_setor) <=' => date('Y'),'jenis_simpanan' => 2),
    );

    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_auditor/check_setoran_wajib_lewat';
    $this->load->view('backend', $data);
  }

  public function jadwalkanJatuhTempoSimpan($id)
  {
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'tgl_wajib_setor' => jsdate_to_db1($this->input->post('tgl_wajib_setor')),
        'tgl_jatuh_tempo_bayar' =>  jsdate_to_db1($this->input->post('tgl_jatuh_tempo_bayar'))
      );
      $this->db->update('simpan', $data, array('id' => $id));
      $this->session->set_flashdata('PesanSukses', 'Data Simpanan Berhasil Di Rubah');
      redirect('P_auditor/jadwalkanJatuhTempoSimpan/'.$id);
    }

    $options = array(
      'table' => 'simpan',
      'where' => array('simpan.id' => $id),
      'select' => array('*', 'simpan.id as id_simpan'),
      'join' => array('anggota' => 'anggota.id = simpan.id_pelaku_simpan') ,
      'setjoin' => 'left',
    );

    $data['cetak_detail1'] = $this->M_universal->index($options);
    $data['id'] = $id;
    $data['content'] = 'Modul/P_auditor/jadwal_jatuh_tempo_simpan';
    $this->load->view('backend', $data);

  }

  public function pinjamanLunas()
  {
      $data = $this->data_table1;
    $options = array(
      'table' => 'pinjaman',
      'select'=> array('*','anggota.nama as nama_anggota','jenis_pinjaman.nama as nama_pinjaman'),
      'where' => array('status_pinjam'=>1, 'status_lunas'=>1 ),
      'join' => array('anggota'=>'anggota.id=pinjaman.id_anggota_peminjam','jenis_pinjaman'=>'jenis_pinjaman.id=pinjaman.idjenis_pinjaman'),
    );

    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_auditor/pinjaman_lunas_list';
    $this->load->view('backend', $data);
  }

  public function accPinjam($kode_pinjam){
      $data = $this->data_table1;
      $options = array(
          'table' => 'pinjaman',
          'select' => array('*',  'anggota.id as id_anggota',' anggota.nama as nama_anggota', 'pengurus.nama as nama_pengurus',
              'pinjaman.kode as kode_ambil',
              'pengurus.id as id_pengurus', 'jenis_pinjaman.nama as nama_jenis_pinjaman',
              'bank_nas.nama_bank as nama_bank_nasabah', 'bank_kop.nama_bank as nama_bank_koperasi'),
              'where' => array('pinjaman.kode'=> $kode_pinjam),
              'join' => array('anggota'=>'anggota.id = pinjaman.id_anggota_peminjam',
              'pengurus'=>'pengurus.id = pinjaman.id_persetujuan_auditor',
              'jenis_pinjaman'=>'jenis_pinjaman.id = pinjaman.idjenis_pinjaman',
              'jenis_keperluan_pinjaman'=>'jenis_keperluan_pinjaman.id = pinjaman.idjenis_keperluan_pinjaman',
              'rekening_koperasi'  => 'rekening_koperasi.id = pinjaman.no_rek_pencairan',
              'rekening_nasabah'  => 'rekening_nasabah.id = pinjaman.id_rekening_pencairan_nasabah',
              'bank as bank_nas' => 'bank_nas.id_bank = rekening_nasabah.id_bank_nasabah',
              'bank as bank_kop' => 'bank_kop.id_bank = rekening_koperasi.id_bank_koperasi'),
          'setjoin' => 'left'
      );
      $data['cetak_detail1'] = $this->M_universal->index($options);


      $options = array(
          'table' => 'jenis_pinjaman',
      );
      $data['cetak_form1'] = $this->M_universal->index($options);

      $data['cetak_form2'] = $this->M_universal->rekening_koperasi();


      $data['content'] = 'Modul/P_auditor/pinjaman_detail';
      $this->load->view('backend', $data);
  }

  public function delete($prim_kode)
  {
    $this->db->delete('provinsi', array('id' => $prim_kode));
    $this->session->set_flashdata('PesanSukses', 'Data Provinsi Berhasil Dihapus');
    redirect('Provinsi/list');
  }

}
