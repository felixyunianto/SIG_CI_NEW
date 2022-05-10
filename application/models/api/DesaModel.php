<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DesaModel extends CI_Model {
    public function get(){
        $query = $this->db->get("data_desa");
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
        $data =  $this->db->get('data_desa');

        return $data;
    }

}
