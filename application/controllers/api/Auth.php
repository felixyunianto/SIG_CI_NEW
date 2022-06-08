<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

// require APPPATH . '/libraries/REST_Controller.php';
// use RestServer\Libraries\REST_Controller;

class Auth extends CI_Controller {
    public function __construct($config = 'rest'){
        parent::__construct($config);
        $this->load->helper('url');
        $this->load->model('api/AuthModel');
    }

    public function sendEmailForgot(){
        $this->load->config('email');
        $this->load->library('email');

        $from = 'no-reply@myapp.com';


        $email = $this->input->post('to');

        $data = $this->AuthModel->checkEmail($email);

        if($data){
            $six_digit_random_number = random_int(100000, 999999);
            $this->email->from($from);
            $this->email->to($email);
            $this->email->subject('Reset Password SIG Pertanian');
            $this->email->message('<h3>Its code to change password</h3><p>Dont share it to another</p><h1>'.$six_digit_random_number.'</h1>');

            if ($this->email->send()) {
                $id = $data[0]['id'];
                $update = $this->AuthModel->updateTokenReset($data[0]['id'], $six_digit_random_number);
                if($update){
                    // $this->response("SUCCESS");
                    echo json_encode([
                        'message' => "Code telah dikirim ke email, cek email anda.",
                        "status" => true
                    ]);
                }

            } else {
                echo json_encode([
                    'message' => "Gagal",
                    "status" => false
                ]);
            }    
        }
    }

    public function validateToken() {
        $token = $this->input->post('token');

        $validate = $this->AuthModel->validateToken($token);

        if($validate){
            echo json_encode([
                'message' => 'Token benar',
                'status' => true
            ]);
        }else{
            echo json_encode([
                'message' => 'Token salah',
                'status' => false
            ]);
        }

        
    }

    public function resetPassword() {
        $password = $this->input->post('password');
        $cPassword = $this->input->post('cPassword');
        $token = $this->input->post('token');

        if($password != $cPassword){
            echo json_encode([
                'message' => 'Change password is failed',
                'status' => $password ."".$cPassword,
            ]);
        }
        else{
            $password = $this->input->post('password');
            $token = $this->input->post('token');
            $update = $this->AuthModel->resetPassword($token,$password);
            
            if($update){
                echo json_encode([
                    'message' => 'Change password is successful',
                    'status' => true,
                ]);
            }
        }
    }
}