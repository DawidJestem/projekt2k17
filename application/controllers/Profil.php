<?php
class Profil extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('aukcjeModel');
    $this->load->model('profilModel');
  }

  public function index() {
    $this->profilModel->sprawdz();
    $data['tytul']='Mój profil';
    $this->load->view('szablon/start',$data);
    $this->load->view('szablon/menu');
    $this->load->view('profil/index');
    $this->load->view('szablon/koniec');
  }

  public function wyloguj() {
    $this->profilModel->wyloguj();
    redirect(site_url());
  }

  public function usun($id=false) {
    if(!$id) show_404();
    $this->profilModel->sprawdz();
    if(!$this->profilModel->jestWlascicielem($id)) redirect('profil');
    $this->profilModel->usun($id);
    redirect('profil/aukcje');
  }

  public function dodaj() {
    $this->profilModel->sprawdz();
    $this->form_validation->set_rules('kategoria','Rodzaj','required');
    $this->form_validation->set_rules('tytul','Tytuł','trim|required');
    $this->form_validation->set_rules('opis','Opis','trim|required');
    $this->form_validation->set_rules('koniec','Koniec aukcji','trim|required');
    $this->form_validation->set_rules('cena','Cena','required|greater_than_equal_to[0.01]');
    $this->form_validation->set_rules('minimalna','Cena','required|greater_than_equal_to[1]');
    $this->form_validation->set_rules('spadek','Cena','required|greater_than_equal_to[1]');
    $data['tytul']='Dodaj aukcję';
    if($this->form_validation->run()) {
      if($this->profilModel->dodajAukcje()) redirect('profil/aukcje');
      else redirect('profil/dodaj');
    }
    else {
      $this->load->view('szablon/start',$data);
      $this->load->view('szablon/menu');
      $this->load->view('profil/dodaj');
      $this->load->view('szablon/koniec');
    }
  }

  public function aukcje() {
    $this->profilModel->sprawdz();
    $data['aukcje']=$this->profilModel->wczytajAukcje();
    $data['tytul']='Moje aukcje';
    $data['usuwanie']=true;
    $this->load->view('szablon/start',$data);
    $this->load->view('szablon/menu');
    $this->load->view('profil/lista');
    $this->load->view('szablon/koniec');
  }

  public function historia() {
    $this->profilModel->sprawdz();
    $data['aukcje']=$this->profilModel->wczytajHistorie();
    $data['tytul']='Historia';
    $data['usuwanie']=false;
    $this->load->view('szablon/start',$data);
    $this->load->view('szablon/menu');
    $this->load->view('profil/lista');
    $this->load->view('szablon/koniec');
  }

  public function powiadomienie($id) {
    $powiadomienie=$this->db->get_where('powiadomienia',array('id'=>$id))->row_array();
    if($id) {
      $where=array('id'=>$id,'idUzytkownika'=>$this->session->userdata('id'));
      $this->db->delete('powiadomienia',$where);
    }
    redirect('aukcje/szczegoly/'.$powiadomienie['idAukcji']);
  }
}
