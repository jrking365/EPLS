<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {

    private $_utilisateur = array();

    public function index() {
        //// vérifcation del'utilisateur
        if ($this->session->userdata('utilisateur') == NULL) {
            header('Location: ' . base_url());
        }

        $this->_utilisateur = unserialize($this->session->userdata('utilisateur'));

        $this->load->view('page_header', array('utilisateur' => $this->_utilisateur));
        $this->load->view('page');
        $this->load->view('page_footer');
    }

    public function deconnexion() {

        $this->session->unset_userdata('utilisateur');

        header('Location: ' . base_url());
    }

}
