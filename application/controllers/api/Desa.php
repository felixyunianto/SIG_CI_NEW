<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use RestServer\Libraries\REST_Controller;

class Desa extends REST_Controller{
    function __construct($config = 'rest'){
        parent::__construct($config);
        $this->load->model('api/DesaModel');
    }

    function index_get(){
        $id_desa = $this->uri->segment(3);
        if(empty($id_desa)){
            $response = $this->DesaModel->get();
        }else{
            $data = $this->DesaModel->getById($id_komoditas);
            $response['error'] = false;
            $response['pesan'] = 'Successfully retrieved data';
            $response['data'] = $data->result();
        }

        $this->response($response);
    }
}
