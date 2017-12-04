<?php
class Rejestracja extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('rejestracjaModel');
  }

  public function index() {
    if($this->rejestracjaModel->jestZalogowany()) redirect(site_url());
    $this->form_validation->set_rules('imie','Imie','trim|required|alpha');
    $this->form_validation->set_rules('nazwisko','Nazwisko','trim|required|alpha');
    $this->form_validation->set_rules('login','Login','trim|required|is_unique[uzytkownicy.login]');
    $this->form_validation->set_rules('haslo1','Hasło','trim|required');
    $this->form_validation->set_rules('haslo2','Powtórz hasło','trim|required|matches[haslo1]');
    if($this->form_validation->run()) {
      $this->rejestracjaModel->dodajUzytkownika();
      redirect('rejestracja');
    }
    $data['tytul']='Rejestracja';
    $this->load->view('szablon/start',$data);
    $this->load->view('szablon/menu');
    $this->load->view('rejestracja/index');
    $this->load->view('szablon/komunikat');
    $this->load->view('szablon/koniec');
  }
}
