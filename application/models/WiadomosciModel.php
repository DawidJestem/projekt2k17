<?php
class WiadomosciModel extends CI_Model {
  public function __construct() {
    $this->load->database();
  }

  public function sprawdz() {
    if(!$this->session->userdata('zalogowany')) redirect(site_url());
  }

  public function wczytajRozmowy() {
    $id=$this->session->userdata('id');
    $this->db->where("idUzytkownika='$id' or idUzytkownika1='$id'");
    return $this->db->get('rozmowy')->result_array();
  }

  public function wczytajWiadomosci($id) {
    $idU=$this->session->userdata('id');
    $this->db->where("(idUzytkownika='$id' and idUzytkownika1='$idU') or (idUzytkownika='$idU' and idUzytkownika1='$id')");
    $rozmowy=$this->db->get('rozmowy')->row_array();
    if(!$rozmowy) {
      $this->db->insert('rozmowy',array('idUzytkownika'=>$idU,'idUzytkownika1'=>$id));
      $idRozmowy=$this->db->insert_id();

    }
    else $idRozmowy=$rozmowy['id'];
    return $this->db->get_where('wiadomosci',array('idRozmowy'=>$idRozmowy))->result_array();
  }

  public function wyslijWiadomosc($id) {
    $idU=$this->session->userdata('id');
    $this->db->where("(idUzytkownika='$id' and idUzytkownika1='$idU') or (idUzytkownika='$idU' and idUzytkownika1='$id')");
    $rozmowy=$this->db->get('rozmowy')->row_array();
    $insert=array(
      'idRozmowy'=>$rozmowy['id'],
      'idUzytkownika'=>$this->session->userdata('id'),
      'tresc'=>$this->input->post('tresc'),
      'data'=>date('Y-m-d H:i:s')
    );
    if($this->db->insert('wiadomosci',$insert))   $this->session->set_flashdata('komunikat','Wysłano wiadomość');
    else $this->session->set_flashdata('komunikat','Nie udało się wysłać wiadomości');
  }
}
