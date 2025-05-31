<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
    public function getMahasiswa($id = null)
    {
        if ($id === null) {
            return $this->db->get('mahasiswa')->result_array();
        } else {
            return $this->db->get_where('mahasiswa', ['id' => $id])->row_array();
        }
    }

    public function deleteMahasiswa($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('mahasiswa');
        return $this->db->affected_rows(); // return jumlah baris yang dihapus
    }

    public function createMahasiswa($data)
    {
        $this->db->insert('mahasiswa', $data);
        return $this->db->affected_rows(); // return 1 jika berhasil
    }

    public function updateMahasiswa($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('mahasiswa', $data);
        return $this->db->affected_rows(); // return 1 jika berhasil
    }
}
