<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Filter extends CI_Controller{
    function __construct($config = 'rest'){
        parent::__construct($config);
        $this->load->model('api/KomoditasLahanModel');
    }

    function sortingKomoditasByDesa() {
        $namakomoditas = $this->input->get("namakomoditas");
        $awal = $this->input->get("awal");
        $akhir = $this->input->get("akhir");
        $data = $this->KomoditasLahanModel->sortingKomoditas($namakomoditas, $awal, $akhir);

        echo json_encode([
            "error" => false,
            'message' => "Success",
            "data" => $data
        ]);
    }
}