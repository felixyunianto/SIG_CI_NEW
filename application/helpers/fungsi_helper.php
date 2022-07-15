<?php



function check_already_login() {
    $ci =& get_instance();
    $user_session = $ci->session->userdata('user_id');
    if($user_session) {
        redirect('dashboard');
    }
}

function check_not_login() {
    $ci =& get_instance();
    $user_session = $ci->session->userdata('user_id');
    if(!$user_session) {
        redirect('auth/login');
    }
}

function createHistory(string $description){
    $current_date = date('Y-m-d H:i:s');
    $ci =& get_instance();
    $user_session = $ci->session->userdata('user_id');
    $name = $ci->session->userdata("name");

    $params['date'] = $current_date;
    $params['user_id'] = $user_session;
    $params['name'] = $name;
    $params['description'] = $description;
    $ci->db->insert('histories', $params);
}