<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P_admin extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->cekLogin();

  }
  public function index()
  {
    $data = $this->data_table1;
    $data['content'] = 'Modul/P_admin/dashboard';

    $data['cetak_simpanan2'] = $this->db->query(
      "SELECT SUM(total_setoran) as total
      FROM simpan WHERE status_simpan = 1 AND jenis_simpanan = 2
      AND MONTH(tgl_lakukan_simpan) = MONTH(CURRENT_DATE) AND YEAR(tgl_lakukan_simpan) = YEAR(CURRENT_DATE)")->row()->total;

    $data['cetak_simpanan3'] = $this->db->query(
      "SELECT SUM(total_setoran) as total
      FROM simpan WHERE status_simpan = 1 AND jenis_simpanan = 3
      AND MONTH(tgl_lakukan_simpan) = MONTH(CURRENT_DATE) AND YEAR(tgl_lakukan_simpan) = YEAR(CURRENT_DATE)")->row()->total;

    $data['cetak_pinjaman'] = $this->db->query(
      "SELECT SUM(total_pinjaman_diberikan_setelah_bunga) as total
      FROM pinjaman WHERE status_pinjam = 1 AND status_lunas = 0
      AND MONTH(tgl_pencairan_dana) = MONTH(CURRENT_DATE) AND YEAR(tgl_pencairan_dana) = YEAR(CURRENT_DATE)")->row()->total;

    $data['cetak_penarikan'] = $this->db->query(
      "SELECT SUM(total_dana_diberikan) as total
      FROM ambil_simpanan WHERE status_ambil = 1
      AND MONTH(tgl_pencairan_dana) = MONTH(CURRENT_DATE) AND YEAR(tgl_pencairan_dana) = YEAR(CURRENT_DATE)")->row()->total;

    $data['cetak_hutang_terbayar'] = $this->db->query(
      "SELECT SUM(total_harus_semua) as total
      FROM pembayaran WHERE status_bayar = 1
      AND MONTH(tgl_pembayaran) = MONTH(CURRENT_DATE) AND YEAR(tgl_pembayaran) = YEAR(CURRENT_DATE)")->row()->total;

    $data['aktivitas_simpan'] = $this->db->query(
      "SELECT id
      FROM simpan WHERE MONTH(tgl_lakukan_simpan) = MONTH(CURRENT_DATE) AND YEAR(tgl_lakukan_simpan) = YEAR(CURRENT_DATE)")->num_rows();
    $data['aktivitas_pinjam'] = $this->db->query(
      "SELECT kode
      FROM pinjaman WHERE MONTH(tgl_pencairan_dana) = MONTH(CURRENT_DATE) AND YEAR(tgl_pencairan_dana) = YEAR(CURRENT_DATE)")->num_rows();
    $data['aktivitas_ambil'] = $this->db->query(
      "SELECT kode
       FROM ambil_simpanan WHERE MONTH(tgl_pencairan_dana) = MONTH(CURRENT_DATE) AND YEAR(tgl_pencairan_dana) = YEAR(CURRENT_DATE)")->num_rows();
    $this->load->view('backend', $data);
  }


  public function simpananProses()
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'simpan',
      'select' => array('*', 'anggota.nama as nama_anggota', 'pengurus.nama as nama_pengurus','simpan.id as kode_simpan'),
      'join' => array('anggota' => 'anggota.id = simpan.id_pelaku_simpan',
                      'pengurus' => 'pengurus.id = simpan.id_verifikator'),
      'where' => array('status_simpan <' => 1),
      'setjoin' => 'left',
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_admin/simpanan_list';
    $this->load->view('backend', $data);
  }

  public function simpananBerhasil()
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'simpan',
      'select' => array('*', 'anggota.nama as nama_anggota', 'pengurus.nama as nama_pengurus','simpan.id as kode_simpan'),
      'join' => array('anggota' => 'anggota.id = simpan.id_pelaku_simpan',
                      'pengurus' => 'pengurus.id = simpan.id_verifikator'),
      'where' => array('status_simpan' => 1 ),
      'setjoin' => 'left',
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_admin/simpanan_list';
    $this->load->view('backend', $data);
  }

  public function aksiSimpan($kode_simpan)
  {
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $dana = rupiahToInt($this->input->post('total_setoran'));
      $no_anggota = $this->input->post('no_anggota');
      $terima = $this->input->post('status_simpan');

      if ($terima == 1) {
        $data = array(
          'status_simpan' => 1,
          'id_verifikator' => $this->session->userdata('ai_pengurus'),
          'tgl_verifikasi_simpanan' => date('Y-m-d H:i:s'),
          'keterangan' => $this->input->post('keterangan'),
          'tgl_jatuh_tempo_bayar' => $this->input->post('tjt'),
        );
        $this->db->update('simpan', $data, array('id' => $kode_simpan));
        if ($this->input->post('jenis_simpanan') == 2) {
          kirim_sms($this->input->post('kirim'), 'Transaksi wajib sebesar '.$dana.' telah masuk ke koperasi.');
          $this->db->query("UPDATE anggota SET saldo_wajib = saldo_wajib + '$dana' WHERE nomor_anggota = '$no_anggota'");
        } else {
          kirim_sms($this->input->post('kirim'), 'Transaksi wajib sebesar '.$dana.' telah masuk ke koperasi.');
          $this->db->query("UPDATE anggota SET saldo_sukarela = saldo_sukarela + '$dana' WHERE nomor_anggota = '$no_anggota'");
        }
        $this->session->set_flashdata('PesanSukses', 'Data Simpanan Berhasil Di Masukkan');
        redirect('P_admin/aksiSimpan/'.$kode_simpan);
      } else {
        $data = array(
          'status_simpan' => $terima,
          'id_verifikator' => $this->session->userdata('ai_pengurus'),
          'tgl_verifikasi_simpanan' => date('Y-m-d H:i:s'),
          'keterangan_tolak_simpanan' => $this->input->post('keterangan_tolak'),
          'keterangan' => $this->input->post('keterangan'),
          'tgl_jatuh_tempo_bayar' => $this->input->post('tjt'),
        );
        $this->db->update('simpan', $data, array('id' => $kode_simpan));
        kirim_sms($this->input->post('kirim'),'Transaksi Simpanan Gagal. Cek sistem informasi untuk keterangan lebih lanjut');
        $this->session->set_flashdata('PesanSukses', 'Simpanan Berhasil Ditangguhkan');
        redirect('P_admin/aksiSimpan/'.$kode_simpan);
      }
    }

    $options = array(
      'table' => 'simpan',
      'select' => array('*',  'anggota.nama as nama_anggota', 'pengurus.nama as nama_pengurus',
                              'simpan.id as kode_simpan','pengurus.id as id_pengurus', 'rekening_koperasi.id as id_bank',
                              'bank_nas.nama_bank as nama_bank_nasabah','bank_kop.nama_bank as nama_bank_koperasi'),
      'where' => array('simpan.id'=> $kode_simpan),
      'join' => array('anggota'=>'anggota.id = simpan.id_pelaku_simpan',
                      'pengurus'=>'pengurus.id = simpan.id_verifikator',
                      'rekening_koperasi'  => 'rekening_koperasi.id = simpan.no_rek_tujuan',
                      'rekening_nasabah'  => 'rekening_nasabah.id = simpan.no_rek_asal',
                      'bank as bank_nas' => 'bank_nas.id_bank = rekening_nasabah.id_bank_nasabah',
                      'bank as bank_kop' => 'bank_kop.id_bank = rekening_koperasi.id_bank_koperasi'),
      'setjoin' => 'left'
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);

    $options = array(
      'table' => 'rekening_koperasi'
    );
    $data['cetak_form1'] = $this->M_universal->index($options);

    $data['content'] = 'Modul/P_admin/simpanan_detail';
    $this->load->view('backend', $data);
  }

  public function ambilProses()
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'ambil_simpanan',
      'select' => array('*', 'anggota.nama as nama_anggota', 'pengurus.nama as nama_pengurus'),
      'where' => array('status_ambil <'=>'1'),
      'join' => array('anggota' => 'anggota.id = ambil_simpanan.id_anggota',
                      'pengurus' => 'pengurus.id = ambil_simpanan.id_pencair_dana'),
      'setjoin' => 'left',
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_admin/ambil_list';
    $this->load->view('backend', $data);
  }

  public function ambilBerhasil()
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'ambil_simpanan',
      'select' => array('*', 'anggota.nama as nama_anggota', 'pengurus.nama as nama_pengurus'),
      'where' => array('status_ambil'=>'1'),
      'join' => array('anggota' => 'anggota.id = ambil_simpanan.id_anggota',
                      'pengurus' => 'pengurus.id = ambil_simpanan.id_pencair_dana'),
      'setjoin' => 'left',
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_admin/ambil_list';
    $this->load->view('backend', $data);
  }

  public function aksiAmbil($kode_ambil)
  {
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $dana = rupiahToInt($this->input->post('dana'));
      $no_anggota = $this->input->post('no_anggota');
      $no = $this->input->post('kirim');
      $data = array(
        'no_rek_koperasi' => $this->input->post('rek_id'),
        'status_ambil' => 1,
        'total_dana_diberikan' => rupiahToInt($this->input->post('dana')),
        'id_pencair_dana' => $this->session->userdata('ai_pengurus'),
        'tgl_pencairan_dana' => date('Y-m-d H:i:s')
      );

      kirim_sms($no, 'Dana berhasil dicairkan. Silahkan cek rekening anda.');
      $this->db->update('ambil_simpanan', $data, array('kode' => $kode_ambil));
      $this->db->query("UPDATE anggota SET saldo_sukarela = saldo_sukarela - $dana WHERE nomor_anggota = '$no_anggota'");
      $this->session->set_flashdata('PesanSukses', 'Data Simpanan Sudah Di Cairkan');
      redirect('P_admin/aksiAmbil/'.$kode_ambil);
    }
    $data = $this->data_form1;
    $options = array(
      'table' => 'ambil_simpanan',
      'select' => array('*',  'anggota.nama as nama_anggota', 'pengurus.nama as nama_pengurus',
                              'ambil_simpanan.kode as kode_ambil', 'pengurus.id as id_pengurus',
                              'bank_nas.nama_bank as nama_bank_nasabah','bank_kop.nama_bank as nama_bank_koperasi'),
      'where' => array('ambil_simpanan.kode'=> $kode_ambil),
      'join' => array('anggota'=>'anggota.id = ambil_simpanan.id_anggota',
                      'pengurus'=>'pengurus.id = ambil_simpanan.id_pencair_dana',
                      'rekening_koperasi'  => 'rekening_koperasi.id = no_rek_koperasi',
                      'rekening_nasabah'  => 'rekening_nasabah.id =	no_rek_transfer_ke_nasabah',
                      'bank as bank_nas' => 'bank_nas.id_bank = rekening_nasabah.id_bank_nasabah',
                      'bank as bank_kop' => 'bank_kop.id_bank = rekening_koperasi.id_bank_koperasi'),
      'setjoin' => 'left'
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);

    $data['cetak_form1'] = $this->M_universal->rekening_koperasi();

    $data['content'] = 'Modul/P_admin/ambil_detail';
    $this->load->view('backend', $data);
  }



  public function detailSimpanan($kode_simpan)
  {
    $data = $this->data_form1;
    $options = array(
      'table' => 'simpan',
      'select' => array('*', 'anggota.nama as nama_anggota', 'pengurus.nama as nama_pengurus','simpan.id as kode_simpan', 'anggota.no_rekening as no_rekening_nasabah', 'pengurus.id as id_pengurus'),
      'join' => array('anggota' => 'anggota.id = simpan.id_pelaku_simpan',
                      'pengurus' => 'pengurus.id = simpan.id_verifikator',
                      'rekening_koperasi'  => 'rekening_koperasi.id = no_rek_tujuan'),
      'where' => array('simpan.id' => $kode_simpan),
      'setjoin' => 'left',
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_admin/simpanan_detail';
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

  public function nasabahTetapList()
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'anggota',
      'select' => array('*','anggota.nama as nama_anggota','anggota.id as id_anggota'),
      'where' => array('nasabah_baru' => 0),
      'join' => array('kelompok' => 'kelompok.id = anggota.id_kelompok',
                      'pengurus' => 'pengurus.id = anggota.id_pemverifikasi_anggota_baru'),
      'setjoin' => 'left',
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_admin/nasabah_tetap_list';
    $this->load->view('backend', $data);
  }

  public function nasabahBaruList()
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'anggota',
      'select' => array('*','anggota.nama as nama_anggota','anggota.id as id_anggota'),
      'where' => array('nasabah_baru' => 1),
      'join' => array('kelompok' => 'kelompok.id = anggota.id_kelompok',
                      'pengurus' => 'pengurus.id = anggota.id_pemverifikasi_anggota_baru'),
      'setjoin' => 'left',
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_admin/nasabah_baru_list';
    $this->load->view('backend', $data);
  }

  public function nasabahBlackList()
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'anggota',
      'select' => array('*', 'anggota.nama as nama_anggota','anggota.id as id_anggota'),
      'where' => array('nasabah_baru' => 0),
      'join' => array('kelompok' => 'kelompok.id = anggota.id_kelompok',
                      'pengurus' => 'pengurus.id = anggota.id_pemverifikasi_anggota_baru'),
      'setjoin' => 'left',
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_admin/nasabah_baru_list';
    $this->load->view('backend', $data);
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

    $data['content'] = 'Modul/P_admin/nasabah_baru_acc';
    $this->load->view('backend', $data);
  }

  public function eksekusiBerkasNasabah()
  {
    $data = array('a' => a, );
    redirect('Pengurus/checkBerkasNasabah/'.$kode_nasabah);
  }

  public function pinjamanAll()
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'pinjaman',
      'select' => array('*', 'anggota.nama as nama_anggota', 'pengurus.nama as nama_pengurus',
                              'jenis_pinjaman.nama as nama_pinjaman'  ),
      'where' => array('status_lunas' => 0, 'status_pinjam <=' => 1),
      'join' => array('anggota' => 'anggota.id = pinjaman.id_anggota_peminjam',
                      'pengurus' => 'pengurus.id = pinjaman.id_persetujuan_auditor',
                      'jenis_pinjaman' => 'jenis_pinjaman.id = pinjaman.idjenis_pinjaman',
                      'jenis_keperluan_pinjaman' => 'jenis_keperluan_pinjaman.id = pinjaman.idjenis_keperluan_pinjaman'),
      'setjoin' => 'left',
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_admin/pinjaman_list';
    $this->load->view('backend', $data);
  }

  public function pinjamanLunasList()
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'pinjaman',
      'select' => array('*', 'anggota.nama as nama_anggota', 'pengurus.nama as nama_pengurus',
                              'jenis_pinjaman.nama as nama_pinjaman'  ),
      'where' => array('status_lunas' => 1, ),
      'join' => array('anggota' => 'anggota.id = pinjaman.id_anggota_peminjam',
                      'pengurus' => 'pengurus.id = pinjaman.id_persetujuan_auditor',
                      'jenis_pinjaman' => 'jenis_pinjaman.id = pinjaman.idjenis_pinjaman',
                      'jenis_keperluan_pinjaman' => 'jenis_keperluan_pinjaman.id = pinjaman.idjenis_keperluan_pinjaman'),
      'setjoin' => 'left',
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_admin/pinjaman_lunas_list';
    $this->load->view('backend', $data);
  }

  public function accPinjam($kode_pinjam)
  {
    $data = $this->data_table1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {

      $jumlah_cicilan = $this->input->post('batas_angsuran');

      $tgl_tagihan_pinjam = date('Y-m-01',strtotime("+1 month"));// Mulai Tagihan Bulan Pertama
      $tgl_jatuh_tempo = date('Y-m-15',strtotime("+1 month"));// Mulai Tagihan Bulan Pertama
      $cicil = rupiahToInt($this->input->post('total_angsur'))/$jumlah_cicilan;
      $total_pinjam = rupiahToInt($this->input->post('total_angsur'));
      $state = 0;
      $total_angsur = 0;

      for ($i=1; $i < $jumlah_cicilan+1 ; $i++) {
        if ($state != 1) {
          $setcode1 = hash("crc32" , 'B-'.$this->session->userdata('no_anggota'));
          $setcode2 = hash("crc32b" , date('Ymdhis').sufflekata(2));
          $newcode = $setcode1.$setcode2.$i; // Cara Memebuat kode pembayaran

          $bunga_cicil = $total_pinjam*(1.5/100);
          $bayar_cicil = $cicil+$bunga_cicil;
          $total_angsur = $total_angsur+$bayar_cicil;

          $data2 = array(
            'kode_bayar' => $newcode,
            'kode_pinjaman' => $kode_pinjam,
            'tgl_tagihan_pinjam' => date('Y-m-d',strtotime("$tgl_tagihan_pinjam +$i month")),
            'tgl_jatuh_tempo' => date('Y-m-d',strtotime("$tgl_jatuh_tempo +$i month")),
            'angsuran_asli' => round($bayar_cicil),
          );
          $this->db->insert('pembayaran', $data2);
          $state = 1;
          $i++;
        }

        $setcode1 = hash("crc32" , 'B-'.$this->session->userdata('no_anggota'));
        $setcode2 = hash("crc32b" , date('Ymdhis').sufflekata(2));
        $newcode = $setcode1.$setcode2.($i+1); // Cara Memebuat kode pembayaran

        $total_pinjam = $total_pinjam-$cicil;
        $bunga_cicil = $total_pinjam*(1.5/100);
        $bayar_cicil = $cicil+$bunga_cicil;
        $total_angsur = $total_angsur+$bayar_cicil;
        $data2 = array(
          'kode_bayar' => $newcode,
          'kode_pinjaman' => $kode_pinjam,
          'tgl_tagihan_pinjam' => date('Y-m-d',strtotime("$tgl_tagihan_pinjam +$i month")),
          'tgl_jatuh_tempo' => date('Y-m-d',strtotime("$tgl_jatuh_tempo +$i month")),
          'angsuran_asli' => round($bayar_cicil),
        );
        $this->db->insert('pembayaran', $data2);
      }

      $data = array(
        'id_pencair_dana' => $this->session->userdata('ai_pengurus'),
        'no_rek_pencairan' => $this->input->post('rek_id'),
        'tgl_pencairan_dana' => date('Y-m-d h:i:s'),
        'status_pinjam' => 1,
        'total_pinjaman_diberikan_setelah_bunga' => $total_angsur,
        'status_lunas' => 0,
      );
      $this->db->update('pinjaman', $data, array('kode' => $kode_pinjam));
      kirim_sms($this->input->post('kirim'), 'Pinjaman sudah berhasil dicairkan. Silahkan cek rekening');
      $this->session->set_flashdata('PesanSukses', 'Data Pinjaman Sudah Diverfikasi');
      redirect('P_admin/accPinjam/'.$kode_pinjam);
    }
    $options = array(
      'table' => 'pinjaman',
      'select' => array('*',  'anggota.nama as nama_anggota', 'pengurus.nama as nama_pengurus',
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


    $data['content'] = 'Modul/P_admin/pinjaman_detail';
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
    $data['content'] = 'Modul/P_admin/bayar_list';
    $this->load->view('backend', $data);
  }

  public function accBayar($kode_bayar)
  {
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'status_bayar' => $this->input->post('status_terima'),
        'tgl_validasi_penerimaan_pembayaran' => date('Y-m-d H:i:s'),
        'id_penerima_dana' => $this->session->userdata('ai_pengurus')
      );
      $this->db->update('pembayaran', $data, array('kode_bayar' => $kode_bayar));

      if ($this->input->post('status_terima') == 1) {
        $kode = $this->input->post('kode_pinjam');
        $dana = $this->input->post('total_bayar');
        $this->db->query("UPDATE pinjaman SET terbayar = terbayar + $dana WHERE kode = '$kode'");
      }

      $kode_pinjam = $this->input->post('kode_pinjam');
      $options = array(
        'table' => 'pembayaran',
        'where' => array('kode_pinjaman'=> $kode_pinjam,'status_bayar'=>1),
      );
      $check_lunas = $this->M_count->index($options);

      $options = array(
        'table' => 'pembayaran',
        'where' => array('kode_pinjaman'=> $kode_pinjam),
      );
      $check_belum_lunas = $this->M_count->index($options);

      if ($check_lunas == $check_belum_lunas) {
        $this->db->query("UPDATE pinjaman SET status_lunas = 1 WHERE kode = '$kode'");
      }
      $this->session->set_flashdata('PesanSukses', 'Data Pembayaran Sudah Diverfikasi');
      redirect('P_admin/accBayar/'.$kode_bayar);
    }
    $options = array(
      'table' => 'pembayaran',
      'select' => array('*','anggota.nama as nama_anggota','jenis_pinjaman.nama as nama_jenis_pinjaman',
                        'pengurus.id as id_pengurus','pengurus.nama as nama_pengurus'),
      'where' => array('kode_bayar' => $kode_bayar),
      'join' => array('pinjaman' => 'pinjaman.kode = pembayaran.kode_pinjaman',
                      'anggota' => 'anggota.id = pinjaman.id_anggota_peminjam',
                      'pengurus'=> 'pengurus.id = pinjaman.id_pencair_dana',
                      'jenis_pinjaman'=> 'jenis_pinjaman.id = pinjaman.idjenis_pinjaman'),
      'setjoin' => 'left'
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);

    $data['content'] = 'Modul/P_admin/bayar_detail';
    $this->load->view('backend', $data);
  }


  public function undurList()
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'permintaan_berhenti',
      'select' => array('*'),
      'where' => array('status >' => -2, 'status <' => 0),
      'join' => array('anggota' => 'anggota.id = permintaan_berhenti.id_anggota'),
      'setjoin' => 'left',
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_admin/undur_list';
    $this->load->view('backend', $data);
  }

  public function undur_acc($id_pengunduran, $id_anggota)
  {
    $data = $this->data_table1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'id_pencairan_dana' => $this->session->userdata('ai_pengurus'),
        'tgl_dana_dicairkan' => date('Y-m-d H:i:s'),
        'status' => 1,
        'dana_yang_dicairkan' => $this->input->post('dana'),
      );
      $this->db->update('permintaan_berhenti', $data, array('ai_berhenti' => $id_pengunduran));

      $data = array(
        'tgl_keluar' => date('Y-m-d H:i:s'),
        'status_terima' => 2,
        'saldo_pokok' => 0,
        'saldo_wajib' => 0,
        'saldo_sukarela' => 0
      );
      $this->db->update('anggota', $data, array('id' => $id_anggota));
      $no = $this->input->post('hp');

      kirim_sms($no, 'Anda telah berhasil keluar dari koperasi. Semua dana telah dicairkan di rekening Anda.');

      $this->session->set_flashdata('PesanSukses', 'Nasabah diberhentikan dari anggota koperasi');
      redirect('P_admin/undurList');
    }

    $options = array(
      'table' => 'permintaan_berhenti',
      'select' => array('*', 'bank_nas.nama_bank as nama_bank_nasabah', 'bank_kop.nama_bank as nama_bank_koperasi'),
      'where' => array('ai_berhenti' => $id_pengunduran),
      'join' => array('anggota' => 'anggota.id = permintaan_berhenti.id_anggota',
                      'rekening_koperasi'  => 'rekening_koperasi.id = permintaan_berhenti.rekening_pencairan_dana_koperasi',
                      'rekening_nasabah'  => 'rekening_nasabah.id = permintaan_berhenti.rekening_pencairan_tujuan',
                      'bank as bank_nas' => 'bank_nas.id_bank = rekening_nasabah.id_bank_nasabah',
                      'bank as bank_kop' => 'bank_kop.id_bank = rekening_koperasi.id_bank_koperasi'),
      'setjoin' => 'left',
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);
    $data['prim_kode'] = $id_pengunduran;
    $data['prim_kode2'] = $id_anggota;
    $data['cetak_form2'] = $this->M_universal->rekening_koperasi();
    $data['content'] = 'Modul/P_admin/undur_acc';
    $this->load->view('backend', $data);
  }

  public function undurSelesai()
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'permintaan_berhenti',
      'select' => array('*'),
      'where' => array('status' => 1),
      'join' => array('anggota' => 'anggota.id = permintaan_berhenti.id_anggota'),
      'setjoin' => 'left',
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_admin/undur_selesai';
    $this->load->view('backend', $data);
  }
}
