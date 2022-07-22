<?php defined('BASEPATH') OR exit('No direct script access allowed');

class KomoditasLahanModel extends CI_Model {
    public function get(){
        $query = $this->db->get("tb_komoditas");
        if($query->num_rows() > 0) {
            $response = [];
            $response['error'] = false;
            $response['pesan'] = 'Successfully retrieved data';
            $response['data']  = $query->result_array();
            return $response;
        }
        return false;
    }

    public function create(string $namakomoditas, string $jumlah, string $awal, string $akhir,string $desa,string $kecamatan){
        $this->db->where('namakomoditas', $namakomoditas);
        $this->db->where('awal', $awal);
        $this->db->where('akhir', $akhir);
        $dataExist = $this->db->get('tb_komoditas');
        

        if(count($dataExist->result_array())) {
            $response['data'] = count($dataExist->result_array());
            $response['error'] = false;
            $response['pesan'] = 'Data dengan nama tersebut sudah ada';
            return $response;
        }else{
            $data = [
                'namakomoditas' => $namakomoditas,
                'jumlah' => $jumlah,
                'awal' => $awal,
                'akhir' => $akhir,
                'desa' => $desa,
                'kecamatan' => $kecamatan
            ];
            

            $insert = $this->db->insert('tb_komoditas', $data);

            if ($insert) {
                $response['data'] = $insert;
                $response['error'] = false;
                $response['pesan'] = 'Successfully added data';
                return $response;
             }
        }

        

        
       
         return false;
    }

    public function update(int $id_komoditas, string $namakomoditas, string $jumlah, string $awal, string $akhir,string $desa,string $kecamatan){
        $data = [
            'namakomoditas' => $namakomoditas,
            'jumlah' => $jumlah,
            'awal' => $awal,
            'akhir' => $akhir,
            'desa' => $desa,
            'kecamatan' => $kecamatan,
        ];

        $this->db->where('id_komoditas', $id_komoditas);

        $update = $this->db->update('tb_komoditas', $data);

        if ($update) {
            $response = array();
            $response['error'] = false;
            $response['pesan'] = 'Successfully updated data';
            return $response;
        } 

        return false;
    }

    public function destroy(int $id_komoditas){
        $this->db->where('id_komoditas', $id_komoditas);
        $delete = $this->db->delete('tb_komoditas');

        if ($delete) {
            $response = array();
            $response['error'] = false;
            $response['pesan'] = 'Successfully deleted data';
            return $response;
        } 

        return false;
    }

    public function getById (int $id_komoditas) {
        $this->db->where('id_komoditas', $id_komoditas);
        $data =  $this->db->get('tb_komoditas');

        return $data;
    }
    
}