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

    public function get_used_kode() {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('user', 'user.id = presensi.id_user');
        $this->db->where('telah_digunakan', 1);
        $this->db->order_by('waktu', 'DESC');
        $this->db->limit(3);
        return $this->db->get()->result();
    }

    public function get_unused_kode($index) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('telah_digunakan', 0);
        return $this->db->get()->result()[$index];
    }

    public function auto_generate_kode() {
        if ($this->db->get_where($this->table, ['telah_digunakan' => 0])->num_rows() < KODE_MAX_QUEUE) {
            $data = [
                'kode' => $this->generate_kode()
            ];
            
            $this->db->insert($this->table, $data);
            return KODE_AUTO_GENERATE_SUCCESS;
        } else {
            return KODE_AUTO_GENERATE_FAILED;
        }
    }

    private function generate_kode($length = 5) {
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$kode = '';
		$charactersLength = strlen($characters);

		for ($i = 0; $i < $length; $i++) {
			$kode .= $characters[rand(0, $charactersLength - 1)];
		}

		return $kode;
	}
}