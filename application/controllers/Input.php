<?php

class Input extends CI_Controller {
	public function __construct() {
        parent::__construct();
		$this->load->database();
		$this->load->model('User');
		$this->load->model('Presensi');
    }

	public function index() {
		if ($_POST != null) {
			$data = $_POST;
			$data['password'] = md5($_POST['password']);
			$this->confirm_view($data);
		}
		
		else if ($_GET != null) {
			if ($_GET['kode'] != null) {
				if ($_GET['kode'] == 'admin') {
					$cookie_data = array(
						'name'   => 'id_user',
						'value'  => 1,
						'expire' => '3600'
					);
					$this->input->set_cookie($cookie_data);
					redirect('/admin');
				} else if (get_cookie('id_user') != null) {
					$user = $this->User->get_user_by_id(get_cookie('id_user'));
					$data['nim'] = $user->nim;
					$data['password'] = $user->password;
					$this->confirm_view($data);
				} 
				else {
					$this->auth_view();
				}
			} else {
				$this->index_view();
			}
		} 
		
		else {
			$this->index_view();
		}
	}

	private function index_view() {
		$this->load->view('header');
		$this->load->view('input/index');
		$this->load->view('footer');
	}

	private function denied_view($message = null) {
		$this->load->view('header');
		$this->load->view('input/denied', ['message' => $message]);
		$this->load->view('footer');
	}

	private function auth_view($message = null) {
		if ($this->Presensi->check_kode($_GET['kode']) == KODE_AVAILABLE) {
			$this->load->view('header');
			$this->load->view('input/auth', ['message' => $message]);
			$this->load->view('footer');
		} else if ($this->Presensi->check_kode($_GET['kode']) == KODE_NOT_FOUND) {
			$this->denied_view("GAGAL: Kode tidak ditemukan.");
		} else if ($this->Presensi->check_kode($_GET['kode']) == KODE_USED) {
			$this->denied_view("DITOLAK: Kode telah digunakan.");
		} 
	}
	
	private function confirm_view($data) {
		if ($this->User->auth($data) == USER_AVAILABLE) {
			$user = $this->User->get_user_by_nim($data['nim']);
			$cookie_data = array(
				'name'   => 'id_user',
				'value'  => $user->id,
				'expire' => '3600'
			);
			$this->input->set_cookie($cookie_data);
			$this->load->view('header');
			$this->load->view('input/confirm', ['data' => $user]);
			$this->load->view('footer');
		} else if ($this->User->auth($data) == USER_UNKNOWN) {
			$this->auth_view("GAGAL: NIM tidak ditemukan.");
		} else if ($this->User->auth($data) == USER_WRONG_PASSWORD) {
			$this->auth_view("DITOLAK: Password salah.");
		} 
	}

	public function assign() {
		if ($_POST == null || get_cookie('id_user') == null) redirect('/input');

		if ($this->Presensi->assign(get_cookie('id_user'), $_POST['kode']) == KODE_ASSIGN_SUCCESS) {
			$data = $this->Presensi->get_user_presensi(get_cookie('id_user'), $_POST['kode']);
			$this->load->view('header');
			$this->load->view('input/success', ['data' => $data]);
			$this->load->view('footer');
		} else if ($this->Presensi->assign(get_cookie('id_user'), $_POST['kode']) == KODE_NOT_FOUND) {
			$this->denied_view("GAGAL: Kode tidak ditemukan.");
		} else if ($this->Presensi->assign(get_cookie('id_user'), $_POST['kode']) == KODE_USED) {
			$this->denied_view("DITOLAK: Kode telah digunakan.");
		} 
	}

	public function logout() {
		delete_cookie('id_user');
		redirect('input');
	}
}
