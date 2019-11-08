<?php

class Home extends Controller {
	public function index() 
	{
		$data['judul'] = 'QR Code';
		$data['qrcode'] = $this->model('Presensi_model')->getQRCode();
		$this->view('templates/header', $data);
		$this->view('home/index', $data);
		$this->view('templates/footer');
	}
}