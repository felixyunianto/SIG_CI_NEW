<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use RestServer\Libraries\REST_Controller;

class KomoditasLahan extends REST_Controller{
    function __construct($config = 'rest'){
        parent::__construct($config);
        $this->load->model('api/KomoditasLahanModel');
    }

    function index_get(){
        $id_komoditas = $this->uri->segment(3);
        if(empty($id_komoditas)){
            $response = $this->KomoditasLahanModel->get();
        }else{
            $data = $this->KomoditasLahanModel->getById($id_komoditas);
            $response['error'] = false;
            $response['pesan'] = 'Successfully retrieved data';
            $response['data'] = $data->result();
        }
        
        $this->response($response);
    }

    function index_post(){
        $namakomoditas = $_POST["namakomoditas"];
        $jumlah = $_POST["jumlah"];
        $awal = $_POST["awal"];
        $akhir = $_POST["akhir"];
        $desa = $_POST["desa"];
        $kecamatan = $_POST["kecamatan"];

        $response = $this->KomoditasLahanModel->create($namakomoditas, $jumlah, $awal, $akhir, $desa, $kecamatan);
        $this->response($response);
    }    

    function index_put() {
        $id_komoditas = $this->uri->segment(3);
        $namakomoditas = $this->put('namakomoditas');
        $jumlah = $this->put('jumlah');
        $awal = $this->put('awal');
        $akhir = $this->put('akhir');
        $desa = $this->put('desa');
        $kecamatan = $this->put('kecamatan');

        $response = $this->KomoditasLahanModel->update($id_komoditas,$namakomoditas, $jumlah, $awal, $akhir, $desa, $kecamatan);

        $this->response($response);
    }

    function index_delete(){
        $id_komoditas = $this->uri->segment(3);
        $response = $this->KomoditasLahanModel->destroy($id_komoditas);

        $this->response($response);
    }
}