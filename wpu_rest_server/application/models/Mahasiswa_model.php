<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
    public function getMahasiswa($id = null)
    {
        if ($id === null) {
            return $this->db->get('mahasiswa')->result_array(); // ambil semua
        } else {
            return $this->db->get_where('mahasiswa', ['id' => $id])->row_array(); // ambil satu
        }
    }
}
