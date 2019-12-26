<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mesin extends CI_Controller{

  public $data = array();
  public function __construct()
  {
    parent::__construct();
    $this->data['asset'] = base_url()."assets/front/";
  }

  function index()
	{
    $this->load->view('style/front_header', $this->data);
		$this->load->view('mesin/mesin.php');
    $this->load->view('style/front_footer', $this->data);
  }

}
