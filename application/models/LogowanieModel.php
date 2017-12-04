<?php
class LogowanieModel extends CI_Model {
  public function __construct() {
    $this->load->database();
  }

  public function jestZalogowany() {
    if($this->session->userdata('zalogowany')) return true;
    else return false;
  }

  public function zaloguj() {
    $tab=array(
      'login'=>$this->input->post('login'),
      'haslo'=>md5($this->input->post('haslo'))
    );
    if(($wynik=$this->db->get_where('uzytkownicy',$tab)->row_array())) {
      $this->session->set_userdata(array(
        'zalogowany'=>true,
        'id'=>$wynik['id'],
        'login'=>$wynik['login'],
        'imie'=>$wynik['imie'],
        'nazwisko'=>$wynik['nazwisko']));
    }
    else $this->session->set_flashdata('komunikat','Złe dane.');
  }
}
