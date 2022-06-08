<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {
    public function checkEmail($email){
        $this->db->where('email', $email);
        $data =  $this->db->get('users');

        return $data->result_array();
    }

    public function updateTokenReset(int $id, string $token){
        $data = [
            'reset_password' => $token
        ];

        $this->db->where('id', $id);

        $update = $this->db->update('users', $data);

        if($update){
            return true;
        }

        return false;
    }

    public function resetPassword($token, $password){
        $data = [
            'password' => md5($password),
            'reset_password' => null
        ];

        $this->db->where('reset_password', $token);

        $update = $this->db->update('users', $data);

        if($update){
            return true;
        }

        return false;
    }

    public function validateToken(string $token){
        $this->db->where('reset_password', $token);
        $data = $this->db->get('users');

        return $data->result_array();
    }

}
