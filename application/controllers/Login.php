<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public $data = array();
    public function __construct()
    {
        parent::__construct();
        $this->data['asset'] = base_url() . "assets/admin/";
    }

    public function index()
    {
        $this->load->view('style/admin_header', $this->data);
        $this->load->view('admin/login');
        $this->load->view('style/admin_footer', $this->data);
    }
}

/* End of file login.php */
