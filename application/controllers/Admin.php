<?php

class Admin extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        
        // Page permission
        if ($this->session->userdata('logged_in') == null) redirect('user/login');
        if ($this->session->userdata('role') != 'admin') redirect('home/alert');
        
        $this->load->database();
        $this->load->model('UserModel');
        $this->load->model('LogModel');
    }
    
    /**
     * GET: /admin/index
     * 
     * @return void
     */
    public function index(): void
    {
        $data['user_count'] = $this->UserModel->countAll();
        $data['log_count'] = $this->LogModel->countAll();
        $data['unused_code_count'] = $this->LogModel->countUnusedCode();
        $data['used_code_count'] = $this->LogModel->countUsedCode();
        $this->admin('admin/index', $data);
    }
}
