<?php defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model("History_m");
    }

    public function index() {
        $data['histories'] = $this->History_m->getAllData();	

		$this->template->load('template', 'history/history_data', $data);
    }


}