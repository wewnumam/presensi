<?php

class UserModel extends CI_Model {
    
    /**
     * Table name
     * 
     * @var string
     */
    private $table = 'users';
    
    /**
     * Get all data
     * 
     * @return array
     */
    public function findAll(): array
    {
        return $this->db->get($this->table)->result();
    }
    
    /**
     * Find data using username
     * 
     * @param string $username
     * @return object
     */
    public function findByUsername($username): object
    {
        return $this->db->get_where($this->table, ['username' => $username])->first_row();
    }
    
    /**
     * Count all data
     * 
     * @return int
     */
    public function countAll(): int
    {
        return $this->db->get($this->table)->num_rows();
    }
    
    /**
     * User authentication
     * 
     * @return bool
     */
    public function isRealUser($username, $password): bool
    {
        $user = $this->db->get_where($this->table, ['username' => $username])->first_row();
        if ($user !== null) {
            if (password_verify($password, $user->password)) {
                return true;
            }
        }
        return false;
    }
    
    public function edit($id): void 
    {
//        $this->db->where('id', $id);
//        $this->db->update($this->table, ['password' => password_hash('admin', PASSWORD_DEFAULT)]);
    }
}
