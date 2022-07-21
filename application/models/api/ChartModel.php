<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ChartModel extends CI_Model {
    public function getDataChart(string $kecamatan, string $awal, string $akhir, string $jenis_statistik) {
        $this->db->where('kecamatan', $kecamatan);
        $this->db->where('awal >=', $awal);
        $this->db->where('awal <=', $akhir);

        $this->db->select('namakomoditas, SUM(jumlah) as total');
        $this->db->group_by('namakomoditas'); 
        $this->db->order_by('total', 'desc'); 


        if($jenis_statistik  === "Produksi"){
            return $this->db->get('ds_produksi');
        }else if($jenis_statistik  === "Provitas"){
            return $this->db->get('ds_provitas');
        }else if($jenis_statistik  === "Luas Panen"){
            return $this->db->get('ds_luaspanen');
        }else{
            return $this->db->get('ds_luastambahtanam');
        }
    }

    public function getKomoditasByKecamtan(string $kecamatan, string $jenis_komoditas){
        $this->db->where('namakomoditas', $jenis_komoditas);
        $this->db->where('kecamatan', $kecamatan);

        return $this->db->get('tb_komoditas')->result_array();
    }
}