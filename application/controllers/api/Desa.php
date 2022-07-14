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
        $id_kecamatan = $this->input->get('id_kecamatan', TRUE);

        if(empty($id_desa)){
            if(empty($id_kecamatan)){

                $response = $this->DesaModel->get();
            }else{
                $response['error'] = false;
                $response['pesan'] = 'Successfully retrieved data';
                $response['data'] = $this->DesaModel->getDesaByKecamatan($id_kecamatan)->result_array();
            }
        }else{
            $data = $this->DesaModel->getById($id_desa);
            $response['error'] = false;
            $response['pesan'] = 'Successfully retrieved data';
            $response['data'] = $data->result();
        }

        $this->response($response);
    }
}
