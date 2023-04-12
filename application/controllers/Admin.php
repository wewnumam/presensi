<?php

class Admin extends CI_Controller {
	public function __construct() {
        parent::__construct();
		if ($this->input->cookie('id_user', TRUE) != 1) redirect('/input');
    }
	
	public function index() {
		echo $this->input->cookie('id_user', TRUE);
	}

	public function display() {
		
	}
}
