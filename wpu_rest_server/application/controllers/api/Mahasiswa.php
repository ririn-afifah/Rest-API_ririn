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

    public function index_delete()
    {
        $id = $this->delete('id');

        if ($id === null) {
            $this->response([
                'status' => false,
                'message' => 'Provide an ID!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }

        // Anda bisa menambahkan logika penghapusan data di sini
        // contoh:
        // if ($this->Mahasiswa_model->deleteMahasiswa($id)) {
        //     $this->response(['status' => true, 'id' => $id, 'message' => 'Deleted'], REST_Controller::HTTP_NO_CONTENT);
        // } else {
        //     $this->response(['status' => false, 'message' => 'ID not found'], REST_Controller::HTTP_BAD_REQUEST);
        // }
    }
}
