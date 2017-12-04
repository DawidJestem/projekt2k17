<?php
class AukcjeModel extends CI_Model {
  public function __construct() {
    $this->load->database();
  }

  public function wczytajKategorie($id=false) {
    if($id) return $this->db->get_where('kategorie',array('id'=>$id))->result_array();
    else return $this->db->get('kategorie')->result_array();
  }

  public function wczytajAukcje($id) {
    return $this->db->get_where('aukcje',array('id'=>$id))->row_array();
  }

  public function wczytajWszystkieAukcje($id=false) {
    $this->db->order_by('koniec');
    if($id) return $this->db->get_where('aukcje',array('idKategorii'=>$id,'aktywna'=>true))->result_array();
    else return $this->db->get_where('aukcje',array('aktywna'=>true))->result_array();
  }

  public function czyAktywna($id) {
    return $this->db->get_where('aukcje',array('id'=>$id,'aktywna'=>true))->row_array();
  }

  public function kup($id) {
    $aukcja=$this->db->get_where('aukcje',array('id'=>$id))->row_array();
    $powiadomienia=array(
      'idUzytkownika'=>$aukcja['idUzytkownika'],
      'idAukcji'=>$id
    );
    $this->db->trans_start();
    $this->db->insert('powiadomienia',$powiadomienia);
    $set=array(
      'idProwadzacego'=>$this->session->userdata('id'),
      'aktywna'=>false
    );
    $where=array('id'=>$id);
    $this->db->where('idKategorii!=1 and idKategorii!=2');
    $this->db->update('aukcje',$set,$where);
    $this->db->trans_complete();
    if($this->db->trans_status()) {
      $this->session->set_flashdata('komunikat','Udało Ci się wygrać aukcję. Skontaktuj się ze sprzedającym w celu ustalenia dalszych działań.');
      return true;
    }
    else {
      $this->session->set_flashdata('komunikat','Nie udało się wygrać aukcji bądź wystąpił błąd. Spróbuj ponownie.');
      return false;
    }
  }

  public function podbij($id) {
    $aukcja=$this->db->get_where('aukcje',array('id'=>$id))->row_array();
    $powiadomienia=array(
      array(
        'idUzytkownika'=>$aukcja['idUzytkownika'],
        'idAukcji'=>$id
      ),
      array(
        'idUzytkownika'=>$aukcja['idProwadzacego'],
        'idAukcji'=>$id
      )
    );
    $this->db->trans_start();
    $this->db->insert_batch('powiadomienia',$powiadomienia);
    $set=array(
      'idProwadzacego'=>$this->session->userdata('id'),
      'cena'=>$this->input->post('cena')
    );
    $where=array('id'=>$id);
    $this->db->where("idKategorii!='3'");
    $this->db->update('aukcje',$set,$where);
    $this->db->trans_complete();
    if($this->db->trans_status()) {
      $this->session->set_flashdata('komunikat','Podbito cenę na aukcji.');
      return true;
    }
    else {
      $this->session->set_flashdata('komunikat','Błąd. Spróbuj ponownie.');
      return false;
    }
  }

  public function napiszWiadomosc($id) {
    $tab=array(
      'idNadawcy'=>$this->session->userdata('id'),
      'idOdbiorcy'=>$id,
      'tresc'=>$this->input->post('wiadomosc'),
      'data'=>date('Y-m-d H:i:s')
    );

    if($this->db->insert('wiadomosci',$tab)) $this->session->set_flashdata('komunikat','Wiadomość wysłana.');
    else $this->session->set_flashdata('komunikat','Nie udało się wysłać wiadomości. Spróbuj ponownie.');
  }
}
