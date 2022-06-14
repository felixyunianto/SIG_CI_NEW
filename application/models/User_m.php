<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('user');
        if($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params['fullname'] = $post['fullname'];
        $params['username'] = $post['username'];
        $params['password'] = sha1($post['password']); 
        $params['alamat'] = $post['alamat'];
        $params['email'] = $post['email'];
        $params['phone'] = $post['phone'];
        $this->db->insert('user', $params);
    }

    public function edit($post)
    {
        $params['fullname'] = $post['fullname'];
        $params['username'] = $post['username'];
        if(!empty($post['password'])) {
            $params['password'] = sha1($post['password']);
        }
        $params['alamat'] = $post['alamat'];
        $params['email'] = $post['email'];
        $params['phone'] = $post['phone'];
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);
    }

    public function delete($id)
	{
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }

    public function validateEmailOrUsername($username){
        $this->db->where('username', $username);
        $this->db->or_where('email', $username);

        $user = $this->db->get('user');

        if($user){
            return $user->result_array();
        }

        return false;
    }

    public function changepassword($email, $password){
        $data = [
            'password' => sha1($password),
        ];

        $this->db->where('email', $email);
        $update = $this->db->update('user', $data);

        if($update){
            return true;
        }

        return false;
        
    }

}