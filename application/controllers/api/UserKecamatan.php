<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use RestServer\Libraries\REST_Controller;

class UserKecamatan extends REST_Controller{
    function __construct($config = 'rest'){
        parent::__construct($config);
        $this->load->model('api/UserKecamatanModel');
    }

    function index_get(){
        $kecamatan = $this->get('kecamatan');
        $response = [];        

        if(!$kecamatan){
            $data = $this->UserKecamatanModel->get();
        
            foreach($data as $key => $item){
                $tempCoord = [];
                foreach(json_decode($item['koordinat'])->koordinat[0] as $coord){
                    $tempCoord[] = [
                        'latitude' => $coord[0],
                        'longitude' => $coord[1],
                    ];
                }
                $response[] = [
                    'id' => $item['id'],
                    'kecamatan' => $item['kecamatan'],
                    'koordinat' => $tempCoord
                ];
            }
        }else{
            $data = $this->UserKecamatanModel->getDataById($kecamatan);
            $tempCoord = [];

            // var_dump($data);
            // die();
            foreach(json_decode($data[0]['koordinat'])->koordinat[0] as $coord){
                $tempCoord[] = [
                    'latitude' => $coord[0],
                    'longitude' => $coord[1],
                ];
            }
            $response[] = [
                'id' => $data[0]['id'],
                'kecamatan' => $data[0]['kecamatan'],
                'koordinat' => $tempCoord
            ];
        }
        

        $this->response([
            "data" => $response,
        ]);
    }
}