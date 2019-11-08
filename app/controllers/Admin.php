<?php

class Admin extends Controller {
	public function index() 
	{
		$data['judul'] = 'Admin';
		$data['user'] = $this->model('Admin_model')->getAllUser();
		$data['countUser'] = $this->model('Admin_model')->countUser();
		$data['countStatus'] = $this->model('Admin_model')->countStatus();
		$this->view('templates/header', $data);
		$this->view('admin/index', $data);
		$this->view('templates/footer');

		if ($_POST) {
			for ($i=0; $i < 10; $i++) { 
				if ($this->model('Presensi_model')->tambah($_POST[$i]) > 0) {
					echo "benar ";
				} else {
					echo "salah ";
				}
			}
		}
	}

	public function userlist()
	{
		$data['judul'] = 'User List';
		$data['user'] = $this->model('Admin_model')->getAllUser();
		$this->view('templates/header', $data);
		$this->view('admin/userlist', $data);
		$this->view('templates/footer');
	}

	public function generate()
	{
		$data['judul'] = 'Generate Code';
		$this->view('templates/header', $data);
				if ($_POST) {
					for ($i=0; $i < 10; $i++) { 
						if ($this->model('Presensi_model')->tambah($_POST[$i]) > 0) {
						}
					}
					echo "<p style='color: green; text-align: center; margin-left: 100px;'>kode berhasil tersimpan ke database </p>";
				}
		$this->view('admin/generate', $data);
		$this->view('templates/footer');
	}

}