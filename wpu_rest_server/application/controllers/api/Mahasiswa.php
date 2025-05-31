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
            return $this->response([
                'status' => false,
                'message' => 'ID harus disediakan'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }

        if ($this->Mahasiswa_model->deleteMahasiswa($id) > 0) {
            return $this->response([
                'status' => true,
                'id' => $id,
                'message' => 'Data berhasil dihapus'
            ], REST_Controller::HTTP_NO_CONTENT); // 204
        } else {
            return $this->response([
                'status' => false,
                'message' => 'ID tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND); // 404
        }
    }

    public function index_post()
    {
        $data = [
            'nama' => $this->post('nama'),
            'nrp' => $this->post('nrp'),
            'email' => $this->post('email'),
            'jurusan' => $this->post('jurusan')
        ];

        if ($this->Mahasiswa_model->createMahasiswa($data) > 0) {
            return $this->response([
                'status' => true,
                'message' => 'Data mahasiswa berhasil ditambahkan'
            ], REST_Controller::HTTP_CREATED); // 201
        } else {
            return $this->response([
                'status' => false,
                'message' => 'Gagal menambahkan data'
            ], REST_Controller::HTTP_BAD_REQUEST); // 400
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'nama' => $this->put('nama'),
            'nrp' => $this->put('nrp'),
            'email' => $this->put('email'),
            'jurusan' => $this->put('jurusan')
        ];

        if ($this->Mahasiswa_model->updateMahasiswa($data, $id) > 0) {
            return $this->response([
                'status' => true,
                'message' => 'Data berhasil diubah'
            ], REST_Controller::HTTP_OK);
        } else {
            return $this->response([
                'status' => false,
                'message' => 'Gagal mengubah data atau data tidak ditemukan'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
