<?php
class RejestracjaModel extends CI_Model {
  public function __construct() {
    $this->load->database();
  }

  public function jestZalogowany() {
    if($this->session->userdata('zalogowany')) return true;
    else return false;
  }

  public function dodajUzytkownika() {
    $tab=array(
      'id'=>null,
      'imie'=>$this->input->post('imie'),
      'nazwisko'=>$this->input->post('nazwisko'),
      'login'=>$this->input->post('login'),
      'haslo'=>md5($this->input->post('haslo1'))
    );
    if($this->db->insert('uzytkownicy',$tab)) $this->session->set_flashdata('komunikat','Konto utworzone. Przejdź do panelu logowania i zaloguj się.');
    else $this->session->set_flashdata('komunikat','Błąd. Konto nie zostało utworzone.');
  }
}
