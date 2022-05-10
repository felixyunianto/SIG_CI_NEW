<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use RestServer\Libraries\REST_Controller;

class Auth extends REST_Controller {
    public function __construct($config = 'rest'){
        parent::__construct($config);
    }
}