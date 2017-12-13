<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    private $_utilisateur = array();
    /**
     * Ici voici la page de connexion à l'application ou il ya gestion des mots
     * de passes et des utilisateurs et autres ...
     */
    public function index() {
        
        // les lignes suivantes donnent les conditions sur les champs du formulaire de connexion 
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('login', 'Le Login', 'required|min_length[4]');
        $this->form_validation->set_rules('motpasse', 'Le mot passe', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('connexion');
        } else {
            
            $res = $this->existe_connexion($this->chargerObjet());
            
            if($res){
                echo ' Réussite !!! ';
                $this->session->set_userdata('utilisateur', serialize($this->_utilisateur));
                header('Location: accueil');
            }else{
                $data = array('error' => 'Login or password error');
                $this->load->view('connexion', $data);
            }
            
            
        }
    }
    
    private function chargerObjet(){
        $obj = new Utilisateur(array(
            'login' =>  $this->input->post('login'),
            'motpasse' =>  $this->input->post('motpasse')
        ));
        
        return $obj;
    }
    
    private function existe_connexion($obj){
        $resultat = Utilisateur::where('login', '=', $obj->login)->where('motpasse', '=', $obj->motpasse)->get();
        
        if( sizeof($resultat) == 1){
            $this->_utilisateur = $resultat[0];
            return TRUE;
        }else{
            $this->_utilisateur = array();
            return FALSE;
        }
      
    }

}
