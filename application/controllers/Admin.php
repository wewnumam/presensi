<?php

class Admin extends CI_Controller {
	public function __construct() {
        parent::__construct();
		if ($this->input->cookie('id_user', TRUE) != 1) redirect('/input');
		$this->load->database();
		$this->load->model('Presensi');
		$this->load->model('Counter');
    }
	
	public function index() {
		$this->Presensi->auto_generate_kode();
		$this->Counter->increment_counter();
		if ($this->Counter->get_counter() > KODE_MAX_QUEUE - 1) $this->Counter->reset_counter();

		$this->load->view('header');
		$this->load->view('admin/index', [
			'kode' => $this->Presensi->get_unused_kode($this->Counter->get_counter())->kode,
			'data' => $this->Presensi->get_used_kode()
		]);
		$this->load->view('footer');
	}
}
