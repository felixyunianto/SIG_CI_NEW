<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("Produksi_m");
        $this->load->model("Provitas_m");
        $this->load->model("Luaspanen_m");
        $this->load->model("Luastambahtanam_m");
        $this->load->model("api/ChartModel");
    }

    public function getChartProduksi(){
        $awal = $this->input->get('awal');
        $akhir = $this->input->get('akhir');
        
        $response = $this->Produksi_m->getChartData($awal, $akhir);

        echo json_encode($response->result_array());
    }


    public function getChartProvitas(){
        $awal = $this->input->get('awal');
        $akhir = $this->input->get('akhir');
        
        $response = $this->Provitas_m->getChartData($awal, $akhir);

        echo json_encode($response->result_array());
    }

    public function getChartLuaspanen(){
        $awal = $this->input->get('awal');
        $akhir = $this->input->get('akhir');
        
        $response = $this->Luaspanen_m->getChartData($awal, $akhir);

        echo json_encode($response->result_array());
    }

    public function getChartLuasTambahTanam(){
        $awal = $this->input->get('awal');
        $akhir = $this->input->get('akhir');
        
        $response = $this->Luastambahtanam_m->getChartData($awal, $akhir);

        echo json_encode($response->result_array());
    }

    public function getChartComodity() {
        $kecamatan = $this->input->get('kecamatan');
        $jenis_komoditas = $this->input->get('jenis_komoditas');
        $jenis_statistik = $this->input->get('jenis_statistik');
        $awal = $this->input->get('awal');
        $akhir = $this->input->get('akhir');

        $response['message'] = 'Successfully get data';
        $response['error'] = false;
        $response['data']['chart'] = $this->ChartModel->getDataChart($kecamatan, $awal, $akhir, $jenis_statistik)->result_array();
        $response['data']['comodities'] = $this->ChartModel->getKomoditasByKecamtan($kecamatan, $jenis_komoditas);
        echo json_encode($response);

        
    }
}

?>