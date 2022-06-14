<?php defined('BASEPATH') OR exit('No direct script access allowed');

class LahanPetaniModel extends CI_Model {
    public function get(){
        $query = $this->db->get("tb_lahanpertanian");
        if($query->num_rows() > 0) {
            $response = [];
            $response['error'] = false;
            $response['message'] = 'Successfully retrieved data';
            $response['data']  = $query->result_array();
            return $response;
        }
        return false;
    }

    public function create(string $namapemilik, string $luas, string $meter, string $desa, string $kecamatan, string $latitude, string $longitude, string $foto){
        $data = [
            'namapemilik' => $namapemilik,
            'luas' => $luas,
            'meter' => $meter,
            'desa'	=> $desa,
            'kecamatan' => $kecamatan,
            'latitude' => $latitude,
            'longtitude' => $longitude,
            'foto' => $foto
        ];

        $insert = $this->db->insert('tb_lahanpertanian', $data);

        if ($insert) {
            $response = array();
            $response['error'] = false;
            $response['message'] = 'Successfully added data';
            return $response;
         }
         return false;
    }

    public function update(int $id_lahan, string $namapemilik, string $luas, string $meter, string $desa, string $kecamatan, string $latitude, string $longitude, string $foto){
        $data = [
            'namapemilik' => $namapemilik,
            'luas' => $luas,
            'meter' => $meter,
            'desa'	=> $desa,
            'kecamatan' => $kecamatan,
            'latitude' => $latitude,
            'longtitude' => $longitude,
            'foto' => $foto
        ];
        $this->db->where('id_lahan', $id_lahan);

        $update = $this->db->update('tb_lahanpertanian', $data);

        if ($update) {
            $response = array();
            $response['error'] = false;
            $response['message'] = 'Successfully updated data';
            return $response;
        } 

        return false;
        
    }

    public function destroy(int $id_lahan) {
        $this->db->where('id_lahan', $id_lahan);
        $delete = $this->db->delete('tb_lahanpertanian');

        if ($delete) {
            $response = array();
            $response['error'] = false;
            $response['message'] = 'Successfully deleted data';
            return $response;
        } 

        return false;
    }

    public function getDataById($id_lahan) {
        $this->db->where('id_lahan', $id_lahan);
        $lahan = $this->db->get('tb_lahanpertanian');
        
        return $lahan->result();
    }

    public function getDataForUser(){
        $this->db->where('status', 1);

        $query = $this->db->get("tb_lahanpertanian");

        if($query->num_rows() > 0) {
            $response = [];
            $response['error'] = false;
            $response['message'] = 'Successfully retrieved data';
            $response['data']  = $query->result_array();
            return $response;
        }
        return false;
    }

    public function getDataByDesaAndKecamatan(string $kecamatan, string $desa){
        $where = array(
            'status' => 1,
            'kecamatan' => $kecamatan,
            'desa' => $desa
        );
        $this-> db->where($where);

        $query = $this->db->get("tb_lahanpertanian");

        $data = $query->result_array();
        // $data['koordinat'] = $this->getKecamatan($kecamatan);


        $response = [];
        $response['error'] = false;
        $response['message'] = 'Successfully retrieved data';
        $response['data']  = $data;
        return $response;

    }

    public function getKecamatan(string $kecamatan){
        $this->db->where('kecamatan',$kecamatan);
        $query = $this->db->get("data_kecamatan");

        $data = $query->result_array();

        $response = [];
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
        

        return $response;
    }
}