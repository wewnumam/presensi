<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function login()
	{
		$this->template('users/login.php');
	}

    public function check()
    {
        echo '<pre>';
        print_r($this->input->post());
        echo '</pre>';
    }
}
