<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Dashboard extends Backend
{

  private $title = "Dashboard";

  public function __construct()
  {
    parent::__construct();
    $this->load->model("Core_model", "model");
    $this->load->model("Base_model", "base");
  }

  function index()
  {
    $data = [
      'title'   => 'Dashboard'
    ];
    $this->template->set_title("Dashboard", $data);
    $this->template->view("index", $data);
  }

  // public function data_grafik()
  // {
  //   $grafik = $this->base->data_grafik();
  //   echo $data = json_encode($grafik);
  // }

  public function data_grafik()
  {
      $year = $this->input->post('year');

      $grafik = $this->base->data_grafik($year);
      echo json_encode($grafik);
  }


  function test()
  {
    $get_controller = $this->userize->combo_controllerlist();
    echo json_encode($get_controller);
  }

  function folderSize($dir = null)
  {
    $dir = "./_temp/uploads/img/";
    $size = 0;

    foreach (glob(rtrim($dir, '/') . '/*', GLOB_NOSORT) as $each) {
      $size += is_file($each) ? filesize($each) : folderSize($each);
    }

    echo $size . "Kb";
  }
}
