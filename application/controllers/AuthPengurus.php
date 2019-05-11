<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthPengurus extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('M_universal'));
	}

	public function index()
	{
			$nomorditemukan = 0;
			$username = $this->input->post("username");
			$pass = $this->input->post('password');

			$options = array(
				'table' => 'pengurus',
				'select' => array('username','salt','password','status_pengurus'),
				'where' => array('username'=> $username),
				'limit' => 1
			);

			$checknomor = $this->M_universal->index($options);
			foreach ($checknomor as $nomor) {
				$setnomor = $nomor->username;
				$setsalt = $nomor->salt;
				$setpassword = $nomor->password;
				$setstatus = $nomor->status_pengurus;
				$nomorditemukan = 1;
			}

			if ($nomorditemukan != 1) {
					$this->session->set_flashdata('PesanError', 'Pengguna Tidak Ditemukan');
					redirect('Login_pengurus');
			}

			$set = $pass.$setsalt;

			if (password_verify($set , $setpassword)) {
				if ($setstatus == 0) {
						$this->session->set_flashdata('PesanError', 'Status Pengurus telah di non-aktifkan.');
						redirect('Login_pengurus');
				}

				$options = array(
					'table' => 'pengurus',
					'where' => array('username'=> $username),
					'limit' => 1
				);

				$setUser = $this->M_universal->index($options);
				foreach ($setUser as $session_of_user) {
					$session_data = array(
						'ai_pengurus' => $session_of_user->id,
						'username' => $session_of_user->username,
						'fullname' => $session_of_user->nama,
						'jabatan' => $session_of_user->id_jabatan_pengurus,
						'foto' => $session_of_user->foto,
					);
					$redirect = $session_of_user->id_jabatan_pengurus;
					$this->session->set_userdata($session_data);
				}

				if ($redirect == 1) {
					redirect('P_sadmin');
				}	elseif ($redirect == 2) {
					redirect('P_admin');
				}	elseif ($redirect == 3) {
					redirect('P_auditor');
				}	elseif ($redirect == 4) {
					redirect('P_anggota');
				} else {
					$this->session->sess_destroy();
					redirect('Login_pengurus');
				}

			} else {
				$this->session->set_flashdata('PesanError', 'Password yang di Input Salah');
				redirect('Login_pengurus');
			}

	}

	public function logout()
	{
		$this->session->sess_destroy();
		$url=base_url('');
		redirect($url);
	}


}
