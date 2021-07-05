<?php

class Logs extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        
        // Page permission
        if ($this->session->userdata('logged_in') == null) redirect('user/login');
        if ($this->session->userdata('role') != 'admin') redirect('home/alert');
        
        $this->load->database();
        $this->load->model('LogModel');
    }
    
    /**
     * GET: /logs/index
     * 
     * @return void
     */
    public function index(): void
    {
        $this->template('logs/index');
    }
    
    /**
     * GET: /logs/load
     * 
     * @return void
     */
    public function load(): void
    {
        $logs = $this->LogModel->getUnusedCode();
        $rand = array_rand($logs, 1);
        
        header('Content-Type: application/json');
        header("Refresh: 2;url='" . base_url('logs/load') .  "'");
        echo json_encode(['data' => $logs[$rand]->code]);
    }
    
    /**
     * POST: /logs/generate
     * 
     * @return string
     */
    public function generate(): string
    {
        $post = $this->input->post();
        
        // Data availability check
        if ($post != null) {
            $this->form_validation->set_rules('amount', 'Amount', 'required|is_natural_no_zero');
            
            // Form validation
            if ($this->form_validation->run()) {
                
                // Inserting data to data base
                if ($this->LogModel->create($post['amount'])) {
                    return print 'Inserting ' . $post['amount'] . ' codes successfully';
                }
                return print 'Failed to insert codes';
            }
            return print 'Amount is not valid';
        } 
        return print 'No data received';
    }
}
