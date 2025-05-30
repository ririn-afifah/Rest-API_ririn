<?php  
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Mahasiswa extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
    }

    // Ambil data (GET)
    public function index_get()
    {
        $id = $this->get('id');

        if ($id === null) {
            $mahasiswa = $this->Mahasiswa_model->getMahasiswa();
        } else {
            $mahasiswa = $this->Mahasiswa_model->getMahasiswa($id);
        }

        if ($mahasiswa) {
            $this->response([
                'status' => true,
                'data' => $mahasiswa
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    // Hapus data (DELETE)
    public function index_delete()
    {
        $id = $this->delete('id');

        if ($id === null) {
            $this->response([
                'status' => false,
                'message' => 'ID harus disediakan'
            ], REST_Controller::HTTP_BAD_REQUEST); // 400
            return;
        }

        if ($this->Mahasiswa_model->deleteMahasiswa($id) > 0) {
            // Data berhasil dihapus
            $this->response([
                'status' => true,
                'id' => $id,
                'message' => 'Data berhasil dihapus'
            ], REST_Controller::HTTP_NO_CONTENT); // 204
        } else {
            // ID tidak ditemukan
            $this->response([
                'status' => false,
                'message' => 'ID tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND); // 404
        }
    }
}
