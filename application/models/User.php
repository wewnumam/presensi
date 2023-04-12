<?php

class User extends CI_Model {
    private $table = 'user';

    public function auth($input) {
        if ($this->db->get_where($this->table, ['nim' => $input['nim']])->num_rows() == 0) {
            return USER_UNKNOWN;
        }

        if ($this->db->get_where($this->table, ['nim' => $input['nim'], 'password' => $input['password']])->num_rows() > 0) {
            return USER_AVAILABLE;
        } else {
            return USER_WRONG_PASSWORD;
        }
    }

    public function get_user_by_id($id) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id', $id);
        return $this->db->get()->result()[0];
    }

    public function get_user_by_nim($nim) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('nim', $nim);
        return $this->db->get()->result()[0];
    }
}