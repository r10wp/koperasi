  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P_anggota extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->cekLogin();

    if ($this->session->userdata('pengurus') && $this->session->userdata('pengurus') != 4) {
      redirect('My404');
    }
  }

  public function index()
  {
    $data = $this->data_table1;
    $data['content'] = 'Modul/P_anggota/dashboard';
    $data['cetak_total_nasabah'] = $this->db->query("SELECT id FROM anggota")->num_rows();
    $data['cetak_nasabah_aktif'] = $this->db->query("SELECT id FROM anggota WHERE status_terima < 2 AND status_terima <> 0 ")->num_rows();
    $data['cetak_nasabah_non_aktif'] = $this->db->query("SELECT id FROM anggota WHERE status_terima > -1 AND status_terima < 1  OR status_terima = 2")->num_rows();
    $data['cetak_nasabah_tetap'] = $this->db->query("SELECT id FROM anggota WHERE status_terima = 1")->num_rows();
    $data['cetak_calon_nasabah'] = $this->db->query("SELECT id FROM anggota WHERE nasabah_baru = 1 AND status_terima < 1")->num_rows();
    $data['cetak_berhenti'] = $this->db->query("SELECT id FROM anggota WHERE status_terima = 2")->num_rows();
    $data['cetak_diblokir'] = $this->db->query("SELECT id FROM anggota WHERE status_terima = 0")->num_rows();
    $data['cetak_ditolak'] = $this->db->query("SELECT id FROM anggota WHERE status_terima = -1")->num_rows();
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
    $data['content'] = 'Modul/P_anggota/nasabah_baru_list';
    $this->load->view('backend', $data);
  }

  public function nasabahTetapList()
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'anggota',
      'select' => array('*','anggota.nama as nama_anggota','anggota.id as id_anggota'
                          ,'kelompok.nama as nama_kel','kecamatan.nama as nama_kec'),
      'where' => array('nasabah_baru' => 0,'status_terima' => 1),
      'join' => array('kelompok' => 'kelompok.id = anggota.id_kelompok',
                      'pengurus' => 'pengurus.id = anggota.id_pemverifikasi_anggota_baru',
                      'kecamatan' => 'kecamatan.id = anggota.id_kecamatan_tempat_tinggal'),
      'setjoin' => 'left',
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_anggota/nasabah_tetap_list';
    $this->load->view('backend', $data);
  }



  public function nasabahBlackList()
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'anggota',
      'select' => array('*','anggota.nama as nama_anggota','anggota.id as id_anggota'
                          ,'kelompok.nama as nama_kel','kecamatan.nama as nama_kec'),
      'where' => array('status_terima' => 0),
      'join' => array('kelompok' => 'kelompok.id = anggota.id_kelompok',
                      'pengurus' => 'pengurus.id = anggota.id_pemverifikasi_anggota_baru',
                      'kecamatan' => 'kecamatan.id = anggota.id_kecamatan_tempat_tinggal'),
      'setjoin' => 'left',
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_anggota/nasabah_black_list';
    $this->load->view('backend', $data);
  }

  public function nasabahMantanList()
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'anggota',
      'select' => array('*','anggota.nama as nama_anggota','anggota.id as id_anggota'
                          ,'kelompok.nama as nama_kel','kecamatan.nama as nama_kec'),
      'where' => array('status_terima' => 2),
      'join' => array('kelompok' => 'kelompok.id = anggota.id_kelompok',
                      'pengurus' => 'pengurus.id = anggota.id_pemverifikasi_anggota_baru',
                      'kecamatan' => 'kecamatan.id = anggota.id_kecamatan_tempat_tinggal'),
      'setjoin' => 'left',
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_anggota/nasabah_mantan_list';
    $this->load->view('backend', $data);
  }

  public function suspend($kode_nasabah)
  {
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'status_terima' => 0,
      );
      $this->db->update('anggota', $data, array('id' => $kode_nasabah));

      $no = $this->input->post('no_hp1');
      $pesan = $this->input->post('pesan_blokir');
      kirim_sms($no, $pesan);
      $this->session->set_flashdata('PesanSukses', 'Nasabah Berhasil Di Blokir');
      redirect('P_anggota/nasabahBlackList');
    }

    $data['prim_kode'] = $kode_nasabah;
    $options = array(
      'table' => 'anggota',
      'select' => array('*'),
      'where' => array('anggota.id' => $kode_nasabah),
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);

    $data['content'] = 'Modul/P_anggota/nasabah_suspend';
    $this->load->view('backend', $data);
  }

  public function kembalikan_akun($kode_nasabah)
  {
    $data = array(
      'status_terima' => 1,
    );
    $this->db->update('anggota', $data, array('id' => $kode_nasabah));
    $this->session->set_flashdata('PesanSukses', 'Nasabah Berhasil Di Kembalikan Akun');
    redirect('P_anggota/nasabahTetapList');
  }

  public function checkBerkasNasabah($kode_nasabah)
  {
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $hp = $this->input->post('hp');

      if ($this->input->post('yesno') == 1) {
        $data = array(
          'nomor_anggota' => $this->input->post('no_baru'),
          'saldo_pokok' => rupiahToInt($this->input->post('set_saldo_pokok_acc')),
          'tgl_verifikasi' => date('Y-m-d H:i:s'),
          'tgl_bergabung' => date('Y-m-d H:i:s'),
          'status_terima' => 1,
          'nasabah_baru' => 0,
          'idjabatan_anggota' => 1
        );
        $this->db->update('anggota', $data, array('id' => $kode_nasabah));
        kirim_sms($hp ,'Anda telah diterima menjadi anggota koperasi. Silahkan login menggunakan nomor '.$this->input->post('no_baru') );
        $this->session->set_flashdata('PesanSukses', 'Nasabah Telah Dijadikan Anggota Tetap');
        redirect('P_anggota/nasabahTetapList');
      } else {
        $data = array(
          'status_terima' => -1,
          'tgl_verifikasi' => date('Y-m-d H:i:s'),
          'keterangan_tolak' => $this->input->post('keterangan_tolak')
        );
        $this->db->update('anggota', $data, array('id' => $kode_nasabah));
        kirim_sms($hp ,'Pengajuan ditolak silahkan cek ulang berkas di sistem informasi koperasi');
        $this->session->set_flashdata('PesanSukses', 'Nasabah Sudah Ditolak');
        redirect('P_anggota/nasabahTetapList');
      }

    }
    $data['prim_kode'] = $kode_nasabah;
    $options = array(
      'table' => 'anggota',
      'select' => array('*'),
      'where' => array('anggota.id' => $kode_nasabah),
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);

    $options = array('table' => 'anggota', 'select' => array('*'));
    $data['nasabah_ke'] = $this->M_count->index($options);

    $data['content'] = 'Modul/P_anggota/nasabah_baru_acc';
    $this->load->view('backend', $data);
  }

  public function kelompokTambah()
  {
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        'id_penanggungjawab_kelompok' => $this->input->post('id_ketua'),
        'id_kecamatan' => $this->input->post('id_kecamatan'),
        'id_pengurus_pemverifikasi' => $this->session->userdata('ai_pengurus'),
        'nama' => $this->input->post('nama_kelompok'),
        'tgl_berdiri' => date('Y-m-d H:i:s'),
        'deskripsi_kelompok ' => $this->input->post('deskripsi')
      );
      $this->db->insert('kelompok', $data);
      $this->session->set_flashdata('PesanSukses', 'Kelompok Berhasil Di Tambah ');
      redirect('P_anggota/kelompokList');

    }
    $options = array('table' => 'provinsi');
    $data['cetak_form1'] = $this->M_universal->index($options);

    $options = array('table' => 'kabupaten');
    $data['cetak_form2'] = $this->M_universal->index($options);

    $options = array('table' => 'anggota',  'where'   => array('idjabatan_anggota' => 1 ),
    );
    $data['cetak_form3'] = $this->M_universal->index($options);

    $options = array(
      'table'   => 'anggota',
      'select'  => array('*','anggota.nama as nama_lengkap','kecamatan.nama as nama_kecamatan'),
      'join'    => array('kecamatan'=> 'kecamatan.id = anggota.id_kecamatan_tempat_tinggal'),
      'setjoin' => 'left',
      'limit'   => 1
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);

    $data['content'] = 'Modul/P_anggota/kelompok_add';
    $this->load->view('backend', $data);
  }





  public function kelompokEdit($prim_kode)
  {
    $data = $this->data_form1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $data = array(
        // 'id_penanggungjawab_kelompok' => $this->input->post('id_ketua'),
        // 'id_kecamatan' => $this->input->post('id_kecamatan'),
        'id_pengurus_pemverifikasi' => $this->session->userdata('ai_pengurus'),
        'nama' => $this->input->post('nama_kelompok'),
        // 'tgl_berdiri' => date('Y-m-d H:i:s'),
        'deskripsi_kelompok ' => $this->input->post('deskripsi')
      );
      $this->db->update('kelompok', $data, array('id' => $prim_kode));
      $this->session->set_flashdata('PesanSukses', 'Kelompok Berhasil Di Tambah ');
      redirect('P_anggota/kelompokList');
    }
    $options = array('table' => 'provinsi');
    $data['cetak_form1'] = $this->M_universal->index($options);

    $options = array('table' => 'kabupaten');
    $data['cetak_form2'] = $this->M_universal->index($options);

    $options = array('table' => 'anggota',  'where'   => array('idjabatan_anggota' => 1 ),);
    $data['cetak_form3'] = $this->M_universal->index($options);

    $options = array(
      'table'   => 'kelompok',
      'select'  => array('*','kelompok.nama as nama_kel','anggota.nama as nama_lengkap','kecamatan.nama as nama_kecamatan'),
      'join'    => array(
                    'anggota'=> 'anggota.id = kelompok.id_penanggungjawab_kelompok',
                    'kecamatan'=> 'kecamatan.id = kelompok.id_kecamatan'),
      'setjoin' => 'left',
      'limit'   => 1
    );
    $data['cetak_detail2'] = $this->M_universal->index($options);

    $options = array(
      'table'   => 'anggota',
      'select'  => array('*','anggota.nama as nama_lengkap','kecamatan.nama as nama_kecamatan'),
      'join'    => array('kecamatan'=> 'kecamatan.id = anggota.id_kecamatan_tempat_tinggal'),
      'setjoin' => 'left',
      'limit'   => 1
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);

    $data['prim_kode'] = $prim_kode;
    $data['content'] = 'Modul/P_anggota/kelompok_edit';
    $this->load->view('backend', $data);
  }

  public function kelompokList()
  {
    $data = $this->data_table1;

    $options = array(
      'table'   => 'kelompok',
      'select'  => array('*','kelompok.nama as nama_kel','anggota.nama as nama_lengkap','kecamatan.nama as nama_kecamatan'),
      'join'    => array('kecamatan'=> 'kecamatan.id = kelompok.id_kecamatan',
                         'anggota'=> 'anggota.id = kelompok.id_penanggungjawab_kelompok'),
      'setjoin' => 'left',

    );
    $data['cetak_list1'] = $this->M_universal->index($options);

    $data['content'] = 'Modul/P_anggota/kelompok_list';
    $this->load->view('backend', $data);
  }

  public function hapus_kelompok($prim_kode)
  {
    $this->db->delete('kelompok', array('id' => $prim_kode));
    $this->session->set_flashdata('PesanSukses', 'Data Kelompok Berhasil Dihapus');
    redirect('P_anggota/kelompokList');
  }

  public function undurList()
  {
    $data = $this->data_table1;
    $options = array(
      'table' => 'permintaan_berhenti',
      'select' => array('*'),
      'join' => array('anggota' => 'anggota.id = permintaan_berhenti.id_anggota'),
      'setjoin' => 'left',
    );
    $data['cetak_list1'] = $this->M_universal->index($options);
    $data['content'] = 'Modul/P_anggota/undur_list';
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

  public function undur_acc($id_pengunduran, $id_anggota)
  {
    $data = $this->data_table1;
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
      $terima = $this->input->post('yesno') ;

      if ($terima == 0 ) {
        $data = array(
          'id_petugas' => $this->session->userdata('ai_pengurus'),
          'tgl_verifikasi' => date('Y-m-d H:i:s'),
          'status' => 0,
          'keterangan_tolak_petugas' => $this->input->post('keterangan_tolak')
        );
        $this->db->update('permintaan_berhenti', $data, array('ai_berhenti' => $id_pengunduran));
        $this->session->set_flashdata('PesanSukses', 'Nasabah Ditolak Untuk Keluar');
        redirect('P_anggota/undurList');
      }else{
        $data = array(
          'id_petugas' => $this->session->userdata('ai_pengurus'),
          'tgl_verifikasi' => date('Y-m-d H:i:s'),
          'status' => -1,
        );
        $this->db->update('permintaan_berhenti', $data, array('ai_berhenti' => $id_pengunduran));
        $this->session->set_flashdata('PesanSukses', 'Nasabah Di Izinkan Untuk Keluar');
        redirect('P_anggota/undurList');
      }

      $this->session->set_flashdata('PesanSukses', 'Nasabah Telah Dijadikan Anggta Tetap');
      redirect('P_admin/nasabahTetapList');
    }
    $options = array(
      'table' => 'permintaan_berhenti',
      'select' => array('*'),
      'where' => array('ai_berhenti' => $id_pengunduran),
      'join' => array('anggota' => 'anggota.id = permintaan_berhenti.id_anggota'),
      'setjoin' => 'left',
    );
    $data['cetak_detail1'] = $this->M_universal->index($options);
    $data['prim_kode'] = $id_anggota;
    $data['content'] = 'Modul/P_anggota/undur_acc';
    $this->load->view('backend', $data);
  }
}
