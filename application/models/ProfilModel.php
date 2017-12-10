<?php
class ProfilModel extends CI_Model {
  public function __construct() {
    $this->load->database();
  }

  public function sprawdz() {
    if(!$this->session->userdata('zalogowany')) redirect(site_url());
  }

  public function wyloguj() {
    $tab=array('zalogowany','id','login','imie','nazwisko');
    $this->session->unset_userdata($tab);
    redirect(site_url());
  }

  public function wczytajKategorie($id=false) {
    if($id) return $this->db->get_where('kategorie',array('id'=>$id))->result_array();
    else return $this->db->get('kategorie')->result_array();
  }

  public function jestWlascicielem($id) {
    return $this->db->get_where('aukcje',array('id'=>$id,'idUzytkownika'=>$this->session->userdata('id')))->result_array();
  }

  public function wczytajAukcje() {
    return $this->db->get_where('aukcje',array('aktywna'=>true,'idUzytkownika'=>$this->session->userdata('id')))->result_array();
  }

  public function wczytajHistorie() {
    return $this->db->get_where('aukcje',array('idProwadzacego'=>$this->session->userdata('id')))->result_array();
  }

  public function usun($id) {
    $this->db->delete('aukcje',array('id'=>$id));
  }

  public function dodajAukcje() {
    $zdjecie=$_FILES['zdjecie'];
    $sciezka='zdjecia/'.$this->input->post('tytul').'_'.$this->session->userdata('id');
    $tmp=$zdjecie['tmp_name'];
    $name=$zdjecie['name'];
    $rozszerzenie=pathinfo($name,PATHINFO_EXTENSION);
    if(is_uploaded_file($tmp)) {
      $sciezka=$sciezka.'.'.$rozszerzenie;
      move_uploaded_file($tmp,$sciezka);
    }
    else $sciezka='';
    $insert=array(
      'idKategorii'=>$this->input->post('kategoria'),
      'idUzytkownika'=>$this->session->userdata('id'),
      'idProwadzacego'=>null,
      'tytul'=>$this->input->post('tytul'),
      'opis'=>$this->input->post('opis'),
      'koniec'=>$this->input->post('koniec').' 23:00:00',
      'aktywna'=>true,
      'cena'=>$this->input->post('cena'),
      'zdjecie'=>$sciezka,
      'minimalna'=>$this->input->post('minimalna'),
      'spadek'=>$this->input->post('spadek')
    );
    return $this->db->insert('aukcje',$insert);
  }
}
