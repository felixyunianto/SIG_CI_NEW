<?php defined('BASEPATH') OR exit('No direct script access allowed');

class KecamatanModel extends CI_Model {
    public function get(){
        $query = $this->db->get("data_kecamatan");
        if($query->num_rows() > 0) {
            $response = [];
            $response['error'] = false;
            $response['pesan'] = 'Successfully retrieved data';
            $response['data']  = $query->result_array();
            return $response;
        }
        return false;
    }

    public function getById (int $id_desa) {
        $this->db->where('id', $id_desa);
        $data =  $this->db->get('data_kecamatan');

        return $data;
    }

}
