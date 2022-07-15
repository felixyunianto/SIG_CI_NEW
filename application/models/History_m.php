<?php defined('BASEPATH') OR exit('No direct script access allowed');

class History_m extends CI_Model {
    public function getAllData(int $id = null){
        $this->db->select('*');
        $this->db->from('histories');
        if($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}