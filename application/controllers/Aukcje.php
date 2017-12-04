<?php
class Aukcje extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('aukcjeModel');
  }

  public function index($id=false) {
    $data['kategoria']=$this->aukcjeModel->wczytajKategorie($id);
    $data['tytul']='Aukcje';
    if($data['kategoria']) {
      if(count($data['kategoria'])>1) {
        $data['tytul']='Aukcje';
        $data['id']=false;
      }
      else {
        $data['tytul'].=' - '.ucfirst($data['kategoria'][0]['nazwa']);
        $data['id']=$data['kategoria'][0]['id'];
      }
    }
    else {
      $data['tytul']='Aukcje';
      $data['id']=false;
    }
    $data['aukcje']=$this->aukcjeModel->wczytajWszystkieAukcje($data['id']);
    $this->load->view('szablon/start',$data);
    $this->load->view('szablon/menu');
    $this->load->view('aukcje/index');
    $this->load->view('szablon/koniec');
  }

  public function szczegoly($id=false) {
    if(!$id) show_404();
    if(!($data['aukcja']=$this->aukcjeModel->wczytajAukcje($id))) show_404();
    $data['tytul']=$data['aukcja']['tytul'];
    if($this->input->post('kup')) {
      if($this->aukcjeModel->czyAktywna($id)) {
        if($this->aukcjeModel->kup($id)) redirect('aukcje/szczegoly/'.$id);
      }
    }
    elseif($this->input->post('podbij')) {
      if($this->aukcjeModel->czyAktywna($id)) {
        if($this->aukcjeModel->podbij($id)) redirect('aukcje/szczegoly/'.$id);
      }
    }
    elseif($this->input->post('napisz')) {
      if($this->input->post('wiadomosc')!='') {
        $this->aukcjeModel->napiszWiadomosc($data['sprzedajacy']['id']);
      }
      else $this->session->set_flashdata('komunikat','Wiadomość nie może być pusta');
    }
    $this->load->view('szablon/start',$data);
    $this->load->view('szablon/menu');
    $this->load->view('aukcje/szczegoly');
    $this->load->view('szablon/komunikat');
    $this->load->view('szablon/koniec');
  }
}
