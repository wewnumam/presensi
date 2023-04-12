<?php

class Counter extends CI_Model {
    private $table = 'counter';

    public function get_counter() {
        $query = $this->db->get($this->table);
        return $query->row_array()['count'];
    }

    public function increment_counter() {
        $this->db->set('count', 'count + 1', FALSE);
        $this->db->update($this->table);
    }

    public function reset_counter() {
        $this->db->set('count', 0, FALSE);
        $this->db->update($this->table);
    }
}