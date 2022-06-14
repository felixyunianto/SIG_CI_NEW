<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use RestServer\Libraries\REST_Controller;

class LahanPetaniUser extends REST_Controller{
    function __construct($config = 'rest'){
        parent::__construct($config);
        $this->load->model('api/LahanPetaniModel');
    }

    function index_get(){
        $id = $this->get('id');
        
        $desa = $this->get('desa');
        $kecamatan = $this->get('kecamatan');

        if($id) {
            $response = [
                "error" => false,
                "message" => "Get detail success",
                "data" => $this->LahanPetaniModel->getDataById($id)
            ];
        }else{
            if($kecamatan && $desa){
                $response = $this->LahanPetaniModel->getDataByDesaAndKecamatan($kecamatan, $desa);  
            }else{
                $response = $this->LahanPetaniModel->getDataForUser();
            }
        }

        $this->response($response);
    }


}