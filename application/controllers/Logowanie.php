<?php
class Logowanie extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('logowanieModel');
  }

  public function index() {
    if($this->logowanieModel->jestZalogowany()) redirect(site_url());
    $this->form_validation->set_rules('login','Login','trim|required');
    $this->form_validation->set_rules('haslo','Hasło','trim|required');
    if($this->form_validation->run()) {
      $this->logowanieModel->zaloguj();
      redirect('logowanie');
    }
    $data['tytul']='Logowanie';
    $this->load->view('szablon/start',$data);
    $this->load->view('szablon/menu');
    $this->load->view('logowanie/index');
    $this->load->view('szablon/komunikat');
    $this->load->view('szablon/koniec');
  }
}
