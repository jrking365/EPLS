<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

    private $_utilisateur;
    private $_student;
    private $_child;

    public function index() {
        if ($this->session->userdata('utilisateur') == NULL) {
            header('Location: ' . base_url());
        }
        $this->_utilisateur = unserialize($this->session->userdata('utilisateur'));

        $data["levels"] = Level::all();

        //loading views
        $this->load->view('page_header', array('utilisateur' => $this->_utilisateur));
        $this->load->view('student/menu', $data);
        $this->load->view('page_footer');
        $this->load->view('student/jsMenu');
    }

    public function getStudent($level) {
        if ($this->session->userdata('utilisateur') == NULL) {
            header('Location: ' . base_url());
        }
        $this->_utilisateur = unserialize($this->session->userdata('utilisateur'));

        $data['students'] = Student::where('level_id', '=', $level)->get();
        $data['level'] = Level::find($level);
        //on va y revenir car on doit afficher le nom de l'eleve 
        $this->load->view("student/getStudents", $data);
        $this->load->view('student/ajouterEtudiant');
        $this->load->view('student/jsMenu');
    }
    
    public function createStudent(){
        
    }

    private function valeur($child) {
        $status=0;//definir sa valeur plustard
        $valeurs = array(
          "child_id"=>$child,
            "category"=>  $this->input->post("category"),
            "status"=>$status,
            "matricule"=>  $this->generateMatricule(),
            "level_id"=>  $this->getLevelID($this->input->post("level"))
        );
        return $valeurs;
        
    }
    
    private function getLevelID($title){
        $level = Level::where("title","=",$title)->get()[0];
        $id = $level->id;
        return $id;
    }

    /**
     * fonction qui génere le matricule sous la forme
     * EPLSAAnumero (numero sur quatre characteres)
     * exemple EPLS170001 ou année est 2017 (17) et numero est 0001
     * @return string matricule
     */
    public function generateMatricule() {
        $last = Student::orderBy('id', 'desc')->take(1)->get();
        if ($last->isEmpty()) { //si c'est vide ça veut dire qu'il est le premier
            $mat = "EPLS" . date('y') . "0001";
            return $mat;
        } else {
            $m = strval($last[0]->matricule); //on recupere le mat du last
            $num = substr($m, -4); //on a notre numero mais avec les 0 devant
            $arr = str_split($num);
            if ($arr[0] == 0) {
                do {
                    array_splice($arr, 0, 1);
                } while ($arr[0] == 0);
            }
            $numeroMatricule = intval(implode($arr));
            $numeroMatricule++;
            $numeroMatricule = sprintf('%04u', $numeroMatricule);
            $matricule = "EPLS" . date("y") . $numeroMatricule;
            $matricule = strval($matricule);
            return $matricule;
        }
    }

}
