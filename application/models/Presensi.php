<?php

class Presensi extends CI_Model {
    private $table = 'presensi';

    public function check_kode($kode) {
        if ($this->db->get_where($this->table, ['kode' => $kode])->num_rows() == 0) {
            return KODE_NOT_FOUND;
        }

        if ($this->db->get_where($this->table, ['kode' => $kode, 'telah_digunakan' => 1])->num_rows() > 0) {
            return KODE_USED;
        }

        return KODE_AVAILABLE;
    }

    public function assign($id_user, $kode) {
        if ($this->check_kode($kode) == KODE_AVAILABLE) {
            $data = [
                'id_user' => $id_user,
                'telah_digunakan' => true,
                'waktu' => round(microtime(true) * 1000)
            ];
    
            $this->db->where('kode', $kode);
            $this->db->update($this->table, $data);
            return KODE_ASSIGN_SUCCESS;
		} else if ($this->check_kode($kode) == KODE_NOT_FOUND) {
            return KODE_NOT_FOUND;
		} else if ($this->check_kode($kode) == KODE_USED) {
            return KODE_USED;
		} 
    }

    public function get_user_presensi($id_user, $kode) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('user', 'user.id = presensi.id_user');
        $this->db->where('id_user', $id_user);
        $this->db->where('kode', $kode);
        return $this->db->get()->result()[0];
    }
}