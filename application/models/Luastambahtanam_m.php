<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Luastambahtanam_m extends CI_Model {

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('ds_luastambahtanam');
        if($id != null) {
            $this->db->where('id_komoditas', $id);
        }
        $query = $this->db->get();
        return $query;

    }

    public function add($post)
    {
        $params['namakomoditas'] = $post['namakomoditas'];
        $params['jumlah'] = $post['jumlah'];
        $params['awal'] = $post['awal'];
        $params['akhir'] = $post['akhir'];
        $params['kecamatan'] = $post['kecamatan'];
        $this->db->insert('ds_luastambahtanam', $params);
    }

    public function edit($post)
    {
        $params['namakomoditas'] = $post['namakomoditas'];
        $params['jumlah'] = $post['jumlah'];
        $params['awal'] = $post['awal'];
        $params['akhir'] = $post['akhir'];
        $params['kecamatan'] = $post['kecamatan'];
        $this->db->where('id_komoditas', $post['id_komoditas']);
        $this->db->update('ds_luastambahtanam', $params);
    }

    public function delete($id)
	{
        $this->db->where('id_komoditas', $id);
        $this->db->delete('ds_luastambahtanam');
    }

    public function getChartData($awal = null, $akhir = null) {
        $firstDate = date('Y-m-01'); // hard-coded '01' for first day
        $lastDate  = date('Y-m-t');

        if($awal && $akhir){
            $this->db->where('awal >=', $awal);
            $this->db->where('akhir <=', $akhir);
        }else{
            $this->db->where('awal >=', $firstDate);
            $this->db->where('awal <=', $lastDate);
            $this->db->where('akhir >=', $firstDate);
            $this->db->where('akhir <=', $lastDate);
        }

        $this->db->select('namakomoditas, SUM(jumlah) as jumlah');
        $this->db->group_by('namakomoditas'); 
        $this->db->order_by('jumlah', 'desc'); 

        $response = $this->db->get("ds_luastambahtanam");
        return $response;
    }
}