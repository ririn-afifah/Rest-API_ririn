<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
    // Method ambil data mahasiswa
    public function getMahasiswa($id = null)
    {
        if ($id === null) {
            return $this->db->get('mahasiswa')->result_array(); // ambil semua data
        } else {
            return $this->db->get_where('mahasiswa', ['id' => $id])->row_array(); // ambil berdasarkan ID
        }
    }

    // Method hapus data mahasiswa
    public function deleteMahasiswa($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('mahasiswa');
        return $this->db->affected_rows(); // return jumlah baris yang terhapus
    }
}
