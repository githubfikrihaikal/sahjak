<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public $data = array();
  public function __construct()
  {
    parent::__construct();
    $this->data['asset'] = base_url() . "assets/admin/";
    if (isset($_POST['userid'])) {
      $_SESSION['loggedin'] = $_POST;
    } else if (isset($_SESSION['loggedin'])) {
      true;
    } else {
      redirect('login', 'refresh');
    }
    // die(print_r($_SESSION['loggedin']));
  }

  function index()
  {
    $this->load->view('style/admin_header', $this->data);
    $this->load->view('admin/home', $this->data);
    $this->load->view('style/admin_footer', $this->data);
  }

  function pegawai()
  {
    $this->load->view('style/admin_header', $this->data);
    $this->load->view('admin/pegawai', $this->data);
    $this->load->view('style/admin_footer', $this->data);
  }

  function manajer()
  {
    $this->load->view('style/admin_header', $this->data);
    $this->load->view('admin/manajer', $this->data);
    $this->load->view('style/admin_footer', $this->data);
  }

  function layanan()
  {
    $this->load->view('style/admin_header', $this->data);
    if($_SESSION['loggedin']['role'] == 'pegawai'){
      if($_SESSION['loggedin']['kodepj'] == '0'){
        echo "<script>alert('anda belum di set menjadi pj')</script>"; 
        redirect('admin', 'refresh');
       }else{
         redirect('admin/detail_layanan/'.$_SESSION['loggedin']['kodepj'], 'refresh');
//         $this->load->view('admin/detail_layanan/'.$_SESSION['loggedin']['kodepj'], $this->data);
       }
    }else{
      $this->load->view('admin/layanan', $this->data);
    }
    $this->load->view('style/admin_footer', $this->data);
  }
  function loket()
  {
    $this->load->view('style/admin_header', $this->data);
    if($_SESSION['loggedin']['role'] == 'pegawai'){
      if($_SESSION['loggedin']['kodepj'] == '0'){
        echo "<script>alert('anda belum di set menjadi pj')</script>"; 
        redirect('admin', 'refresh');
       }else{
         redirect('admin/detail_layanan/'.$_SESSION['loggedin']['kodepj'], 'refresh');
//         $this->load->view('admin/detail_layanan/'.$_SESSION['loggedin']['kodepj'], $this->data);
       }
    }else{
      $this->load->view('admin/loket', $this->data);
    }
    $this->load->view('style/admin_footer', $this->data);
  }

  function detail_layanan()
  {
    $this->load->view('style/admin_header', $this->data);
    if($_SESSION['loggedin']['role'] == 'pegawai'){
      if($_SESSION['loggedin']['kodepj'] == '0'){
       echo "<script>alert('anda belum di set menjadi pj')</script>"; 
       redirect('admin', 'refresh');
      }else{
        $this->load->view('admin/detail_layanan');
      }
    }else{
      $this->load->view('admin/detail_layanan', $this->data);
    }
    $this->load->view('style/admin_footer', $this->data);
  }

  function blank()
  {
    $this->load->view('style/admin_header', $this->data);
    $this->load->view('admin/blank', $this->data);
    $this->load->view('style/admin_footer', $this->data);
  }
  function logout()
  {
    
    unset($_SESSION['loggedin']);
    redirect('', 'refresh');
    
  }
}
