<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use RestServer\Libraries\REST_Controller;

class LahanPetani extends REST_Controller{
    function __construct($config = 'rest'){
        parent::__construct($config);
        $this->load->model('api/LahanPetaniModel');
        $this->load->helper('url', 'form');
        $this->load->helper("file");
    }

    function index_get(){
        $response = $this->LahanPetaniModel->get();

        $this->response($response);
    }

    

    public function index_post(){
        $id_lahan = $this->uri->segment(3);

        $namapemilik = $this->post('namapemilik');
        $luas = $this->post('luas');
        $meter = $this->post('meter');
        $desa = $this->post('desa');
        $kecamatan = $this->post('kecamatan');
        $latitude = $this->post('latitude');
        $longitude = $this->post('longitude');
        $foto = '';

        if(empty($id_lahan)){
            $config = array(
                'upload_path' => "./assets/uploads/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => TRUE,
                'max_size' => "2048000", // 2MB
                'max_height' => "768",
                'file_name'=> $new_name = time().'_'.$_FILES["foto"]['name'],
            );

            // Library Upload dari Codeigniter
            $this->load->library('upload', $config);

            // Perkondisian jika upload gagal
            if(!$this->upload->do_upload('foto')){
                $error = array('error' => $this->upload->display_errors());

                $this->response($error);
            }else{
                $data = array('image_metadata' => $this->upload->data());

                $namapemilik = $this->post('namapemilik');
                $luas = $this->post('luas');
                $meter = $this->post('meter');
                $desa = $this->post('desa');
                $kecamatan = $this->post('kecamatan');
                $latitude = $this->post('latitude');
                $longitude = $this->post('longitude');
                
                $foto = base_url().'assets/uploads/'.$data['image_metadata']['orig_name'];

                $response = $this->LahanPetaniModel->create($namapemilik, $luas, $meter, $desa, $kecamatan, $latitude, $longitude, $foto);

                $this->response($response);
            }
        }else{
            $find = $this->LahanPetaniModel->getDataById($id_lahan);
            
            if(empty($_FILES['foto'])){
                $response = $this->LahanPetaniModel->update($id_lahan, $namapemilik, $luas , $meter, $desa, $kecamatan, $latitude, $longitude, $find[0]->foto);
                    
                $this->response($response);
            }else{
                $config = array(
                    'upload_path' => "./assets/uploads/",
                    'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'overwrite' => TRUE,
                    'max_size' => "2048000", // 2MB
                    'max_height' => "768",
                    'file_name'=> $new_name = time().'_'.$_FILES["foto"]['name'],
                );
    
                // Library Upload dari Codeigniter
                $this->load->library('upload', $config);

                if(!$this->upload->do_upload('foto')){
                    $error = array('error' => $this->upload->display_errors());
    
                    $this->response($error);
                }else{
                    $data = array('image_metadata' => $this->upload->data());

                    //Menghapus file
                    unlink(substr($find[0]->foto, strlen(base_url())));
                    
                    $foto = base_url().'assets/uploads/'.$data['image_metadata']['orig_name'];
    
                    $response = $this->LahanPetaniModel->update($id_lahan, $namapemilik, $luas , $meter, $desa, $kecamatan, $latitude, $longitude, $foto);
                    
                    $this->response($response);
    
                }
            }
            
        }
    }

    function index_delete(){
        $id_lahan = $this->uri->segment(3);
        $find = $this->LahanPetaniModel->getDataById($id_lahan);
        if($find){
            unlink(substr($find[0]->foto, strlen(base_url())));
            $response = $this->LahanPetaniModel->destroy($id_lahan);

            $this->response($response);
        }else{
            $this->response(false);
        }
    }
    
}