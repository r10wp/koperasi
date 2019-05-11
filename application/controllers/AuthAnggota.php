<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthAnggota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('M_universal','M_count'));
		$this->load->helper(array('H_universal'));
	}

	public function index()
	{

			$nomorditemukan = 0;
			$username = $this->input->post("username");
			$pass = $this->input->post('password');

			$options = array(
				'table' => 'anggota',
				'select' => array('nomor_anggota','salt','password','status_terima'),
				'where' => array('nomor_anggota'=> $username),
				'limit' => 1
			);

			$checknomor = $this->M_universal->index($options);
			foreach ($checknomor as $nomor) {
				$setnomor = $nomor->nomor_anggota;
				$setsalt = $nomor->salt;
				$setpassword = $nomor->password;
				$setstatus = $nomor->status_terima;
				$nomorditemukan = 1;
			}


			if ($nomorditemukan != 1) {
					$this->session->set_flashdata('PesanError', 'Pengguna Tidak Ditemukan');
					redirect('Login_anggota');
			}

			$set = $pass.$setsalt;

			if (password_verify($set , $setpassword)) {

				if ($setstatus == -4) {
						$this->session->set_flashdata('PesanError', 'Nomor Anggota '.$username.' telah di blokir / di non-aktifkan. <br> Silahkan Hubungi Administrator Untuk Melakukan Konfirmasi. Pengembalian Akun');
						redirect('Login_anggota');
				}

				if ($setstatus == 0) {
						$this->session->set_flashdata('PesanError', 'Nomor Anggota '.$username.' telah di mati');
						redirect('Login_anggota');
				}

				if ($setstatus == 2) {
						$this->session->set_flashdata('PesanError', 'Anggota telah berhenti dari koperasi');
						redirect('Login_anggota');
				}

				$options = array(
					'table' => 'anggota',
					'where' => array('nomor_anggota'=> $username),
					'limit' => 1
				);
				$setUser = $this->M_universal->index($options);
				foreach ($setUser as $session_of_user) {
					$session_data = array(
						'ai_anggota' => $session_of_user->id,
						'no_anggota' => $session_of_user->nomor_anggota,
						'jabatan' => $session_of_user->idjabatan_anggota,
						'baru' => $session_of_user->nasabah_baru,
						'status' => $session_of_user->status_terima,
						'fullname' => $session_of_user->nama,
						'nickname' => $session_of_user->nama_pendek,
					);
					$baru = $session_of_user->nasabah_baru;
					$this->session->set_userdata($session_data);
				}
				if ($baru == 1) {
					redirect('New_nasabah');
				} else {
					redirect('Nasabah');
				}

			} else {
				$this->session->set_flashdata('PesanError', 'Password yang di Input Salah');
				redirect('Login_anggota');
			}

	}

	public function logout()
	{
		$this->session->sess_destroy();
		$url=base_url('');
		redirect($url);
	}

	public function forgetPassword()
	{
    $this->load->library('email');

		$email = $this->input->post('email');
		$options = array(
			'table' => 'anggota',
			'where' => array('email'=> $email),
			'limit' => 1
		);
		$checkemail = $this->M_count->index($options);
		if ($checkemail != 1) {
			$this->session->set_flashdata('PesanError', 'Email Tidak Ditemukan');
			redirect('Login_anggota');
		} else {
			$code1 = hash("crc32" , $email);
			$code2 = hash("crc32b" , date('Ymdhis'));
			$code = $code1.$code2;
			$data = array('forget_password' => md5($code));

			$this->db->update('anggota', $data, array('email' => $email));

			$config = array();
			$config['charset'] = 'utf-8';
			$config['useragent'] = 'Codeigniter';
			$config['protocol']= "smtp";
			$config['mailtype']= "html";
			$config['smtp_host']= "ssl://smtp.gmail.com";
			$config['smtp_port']= 465;
			$config['smtp_timeout']= "5";
			$config['smtp_user']= "tugasakhirta2018@gmail.com";
			$config['smtp_pass']= "?1a2b3c4d5e";
			$config['crlf']="\r\n";
			$config['newline']="\r\n";

			$config['wordwrap'] = TRUE;
			$data['url'] = base_url()."AuthAnggota/forgetPasswordConfirm/".md5($code);
			$this->email->initialize($config);
			$this->email->from('Koperasi Dharma Bakti');
			$this->email->to($email);
			$this->email->subject('Permintaan Reset Password');
			$message=$this->load->view('AppSupport/email_reset_password_template',$data,TRUE);
			$this->email->message($message);

			if($this->email->send()){
				$this->session->set_flashdata('PesanSukses', 'Konfirmasi Reset Password Berhasil. Silahkan Buka Email Untuk Melakukan Perubahan Password');
				redirect('Login_anggota');
			}
			else{
				$this->session->set_flashdata('PesanError', 'Periksa Koneksi Jaringan dan Pengaturan Email');
				redirect('Login_anggota');
			}
		}
	}

	public function forgetPasswordConfirm($code)
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$salt = sufflekata(10);
			$password = $this->input->post('password');

			$set = $password.$salt;
			$setpassword = password_hash($set , PASSWORD_BCRYPT);

			$data = array('salt' => $salt, 'password' => $setpassword, 'forget_password' => null);

			$this->db->update('anggota', $data, array('forget_password' => $code));
			$this->session->set_flashdata('PesanSukses', 'Password Berhasil Dirubah');
			redirect('Login_anggota');
		}

		$data['code'] = $code;
		$options = array(
			'table' => 'anggota',
			'where' => array('forget_password' => $code),
			'limit' => 1
		);
		$checkcode = $this->M_count->index($options);

		if ($checkcode != 1) {
			show_error('Periksa Kembali Data Anda', 500 ,$heading = 'Data Request Tidak Valid');
		} else {
			$this->load->view('Modul/Settings/reset_password', $data);
		}
	}
}
