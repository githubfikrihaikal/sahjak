<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian extends CI_Controller{

  public $data = array();
  public function __construct()
  {
    parent::__construct();
    $this->data['asset'] = base_url()."assets/front/";
    if (isset($_POST['userid'])) {
      $_SESSION['loggedin'] = $_POST;
    } else if (isset($_SESSION['loggedin'])) {
      true;
    } else {
      redirect('login', 'refresh');
    }
  }

  function index()
	{
    $this->load->view('style/front_header', $this->data);
		$this->load->view('antrian/front.php');
    $this->load->view('style/front_footer', $this->data);
  }

}
