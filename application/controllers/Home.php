<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    /**
     * GET: /home/index
     * 
     * @return void
     */
    public function index(): void
    {
        $this->template('pages/home');
    }
    
    /**
     * GET: /home/alert
     * 
     * @return void
     */
    public function alert(): void
    {
        $this->template('pages/alert');
    }
}
