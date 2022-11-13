<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Filter extends CI_Controller{
    function __construct($config = 'rest'){
        parent::__construct($config);
        $this->load->model('api/KomoditasLahanModel');
    }

    function sortingKomoditasByDesa() {
        $data = $this->KomoditasLahanModel->sortingKomoditas('padi', '2020-12-01', '2021-12-24');

        echo json_encode([
            "error" => false,
            'message' => "Success",
            "data" => $data
        ]);
    }
}