<?php

class Wiadomosci extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('wiadomosciModel');
    }

    public function index()
    {
        $this->wiadomosciModel->sprawdz();
        $data['rozmowy'] = $this->wiadomosciModel->wczytajRozmowy();
        $data['tytul'] = 'Wiadomości';
        $this->load->view('szablon/start', $data);
        $this->load->view('szablon/menu');
        $this->load->view('wiadomosci/index');
        $this->load->view('szablon/komunikat');
        $this->load->view('szablon/koniec');
    }

    public function rozmowa($id = false)
    {
        if (!$id) show_404();
        $this->wiadomosciModel->sprawdz();
        $this->form_validation->set_rules('tresc', 'Wiadomość', 'trim|required');
        if ($this->form_validation->run()) {
            $this->wiadomosciModel->wyslijWiadomosc($id);
            redirect('wiadomosci/rozmowa/' . $id);
        }
        $data['wiadomosci'] = $this->wiadomosciModel->wczytajWiadomosci($id);
        $data['rozmowy'] = $this->wiadomosciModel->wczytajRozmowy();
        $data['id'] = $id;
        $data['tytul'] = 'Rozmowa';
        $this->load->view('szablon/start', $data);
        $this->load->view('szablon/menu');
        $this->load->view('wiadomosci/rozmowa');
        $this->load->view('szablon/komunikat');
        $this->load->view('szablon/koniec');
    }
}
