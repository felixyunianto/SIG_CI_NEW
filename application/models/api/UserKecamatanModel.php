<?php defined('BASEPATH') OR exit('No direct script access allowed');


class UserKecamatanModel extends CI_Model {
    public function get(){
        $query = $this->db->get("data_kecamatan");
        if($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function getDataById(string $kecamatan) {
        $this->db->where('kecamatan', $kecamatan);
        $lahan = $this->db->get('data_kecamatan');
        
        return $lahan->result_array();
    }
}