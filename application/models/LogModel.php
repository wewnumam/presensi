<?php

class LogModel extends CI_Model {
    /**
     * Table name
     * 
     * @var string
     */
    private $table = 'logs';

    /**
     * Count logs
     * 
     * @return int
     */
    public function countAll(): int
    {
        return $this->db->get($this->table)->num_rows();
    }
    
    /**
     * Count logs with status is 0
     * 
     * @return int
     */
    public function countUnusedCode(): int
    {
        return $this->db->get_where($this->table, ['status' => 0])->num_rows();
    }
    
    /**
     * Count logs with status is 1
     * 
     * @return int
     */
    public function countUsedCode(): int
    {
        return $this->db->get_where($this->table, ['status' => 1])->num_rows();
    }
    
    /**
     * Select logs with status is 0
     * 
     * @return array
     */
    public function getUnusedCode(): array
    {
        return $this->db->get_where($this->table, ['status' => 0])->result();
    }
    
    /**
     * Insert logs
     * 
     * @param int $amount
     * @return bool Description
     */
    public function create($amount): bool
    {
        for ($i = 0; $i < $amount; $i++) {
            $code = strtoupper(substr(uniqid(), 7));
            $this->db->insert($this->table, ['code' => $code]);
        }
        return true;
    }
}
