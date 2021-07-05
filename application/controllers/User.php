<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('UserModel');
    }

    /**
     * POST|GET: /user/login
     * 
     * @return void
     */
    public function login(): void
    {
        $post = $this->input->post();
        
        // POST: user/login
        if ($post !== null) {
            // Removing flash session message
            $this->session->unset_userdata(['msg']);
            
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            
            // Form validation
            if ($this->form_validation->run()) {
                // User verifiaction
                if ($this->UserModel->isRealUser($post['username'], $post['password'])) {
                    $user = $this->UserModel->findByUsername($post['username']);
                    
                    $this->session->set_userdata([
                        'id' => $user->id,
                        'username' => $user->username,
                        'role' => $user->role,
                        'logged_in' => true
                    ]);
                    
                    // Role check
                    if ($user->role == 'admin') redirect('admin');
                    redirect('');
                }
                
                // User verification failed message
                $this->session->set_flashdata(["msg" => "Username or Password is not valid"]);
            }
        }
        
        // GET: user/login
        $this->template('users/login');
    }
    
    /**
     * GET: /user/logout
     * 
     * @return void
     */
    public function logout(): void
    {
        $this->session->unset_userdata(['id', 'username', 'role', 'logged_in']);
        $this->session->sess_destroy();
        redirect('');
    }
}
