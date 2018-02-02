<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teachers extends CI_Controller {

    private $_utilisateur = array();
    private $_employees = array();
    private $_teachers = array();

    public function index() {
        if ($this->session->userdata('utilisateur') == NULL) {
            header('Location: ' . base_url());
        }
        $this->_utilisateur = unserialize($this->session->userdata('utilisateur'));

        //les grades
        $data["grades"] = TeacherGrade::all();
        $data["levels"] = TeachingLevel::all();

        //loading views

        $this->load->view('page_header', array('utilisateur' => $this->_utilisateur));
        $this->load->view('teacher/menu', $data);
        $this->load->view('page_footer');
        $this->load->view('teacher/js');
        $this->load->view('teacher/ajouter', $data);
    }

    public function parametre() {
        if ($this->session->userdata('utilisateur') == NULL) {
            header('Location: ' . base_url());
        }
        $this->_utilisateur = unserialize($this->session->userdata('utilisateur'));
        
        $data['grades'] = TeacherGrade::all();
        $data['levels'] = TeachingLevel::all();

        $this->load->view('page_header', array('utilisateur' => $this->_utilisateur));
        $this->load->view('teacher/parametre',$data);
        $this->load->view('page_footer');
    }

    public function generalList() {
        if ($this->session->userdata('utilisateur') == NULL) {
            header('Location: ' . base_url());
        }
        $this->_utilisateur = unserialize($this->session->userdata('utilisateur'));

        $data["teachers"] = Teacher::join('employee', 'teacher.employee_id', '=', 'employee.id')
                ->join('adult', 'employee.person_id', '=', 'adult.id')
                ->join('position', 'employee.position_id', '=', 'position.id')
                ->join('teacher_grade', 'teacher.grade_id', '=', 'teacher_grade.id')
                ->join('Teaching_level', 'teacher.certified_teaching_level_id', '=', 'Teaching_level.id')
                ->where('employee.status', '!=', 0)
                ->where('teacher.status', '!=', 0)
                ->select('employee.id as idE', 'adult.firstname', 'adult.name', 'adult.gender'
                        , 'Teaching_level.title as level', 'teacher_grade.title as grade', 'teacher.status')
                ->getQuery()
                ->get();

        $this->load->view('teacher/listeGenerale', $data);
        //$this->load->view('')
    }

    public function listByGrade($grade) {
        if ($this->session->userdata('utilisateur') == NULL) {
            header('Location: ' . base_url());
        }
        $this->_utilisateur = unserialize($this->session->userdata('utilisateur'));
        $data["byGrade"] = TeacherGrade::find($grade);
        $data["teachers"] = Teacher::join('employee', 'teacher.employee_id', '=', 'employee.id')
                ->join('adult', 'employee.person_id', '=', 'adult.id')
                ->join('position', 'employee.position_id', '=', 'position.id')
                ->join('teacher_grade', 'teacher.grade_id', '=', 'teacher_grade.id')
                ->join('Teaching_level', 'teacher.certified_teaching_level_id', '=', 'Teaching_level.id')
                ->where('employee.status', '!=', 0)
                ->where('teacher.status', '!=', 0)
                ->where('teacher.grade_id', '=', $grade)
                ->select('employee.id as idE', 'adult.firstname', 'adult.name', 'adult.gender'
                        , 'Teaching_level.title as level', 'teacher_grade.title as grade', 'teacher.status')
                ->getQuery()
                ->get();

        $this->load->view('teacher/listeByGrade', $data);
    }

    public function listByLevel($level) {
        if ($this->session->userdata('utilisateur') == NULL) {
            header('Location: ' . base_url());
        }
        $this->_utilisateur = unserialize($this->session->userdata('utilisateur'));


        $data["byLevel"] = TeachingLevel::find($level);
        $data["teachers"] = Teacher::join('employee', 'teacher.employee_id', '=', 'employee.id')
                ->join('adult', 'employee.person_id', '=', 'adult.id')
                ->join('position', 'employee.position_id', '=', 'position.id')
                ->join('teacher_grade', 'teacher.grade_id', '=', 'teacher_grade.id')
                ->join('Teaching_level', 'teacher.certified_teaching_level_id', '=', 'Teaching_level.id')
                ->where('employee.status', '!=', 0)
                ->where('teacher.status', '!=', 0)
                ->where('teacher.certified_teaching_level_id', '=', $level)
                ->select('employee.id as idE', 'adult.firstname', 'adult.name', 'adult.gender'
                        , 'Teaching_level.title as level', 'teacher_grade.title as grade', 'teacher.status')
                ->getQuery()
                ->get();

        $this->load->view('teacher/listeByLevel', $data);
    }

    /**
     * fonction qui cherche les employes qui ne sont pas des enseignants
     * on pourra ajouter des conditions en fonction de la position plustard
     */
    public function searchEmp() {
        $this->_employees = Employee::join('adult', 'employee.person_id', '=', 'adult.id')
                ->join('position', 'employee.position_id', '=', 'position.id')
                ->leftjoin('teacher', 'teacher.employee_id', '=', 'employee.id')
                ->where('teacher.id', '=', NULL)
                ->select('adult.name as name')
                ->getQuery()
                ->get();
        echo json_encode($this->_employees);
    }

    public function add() {
        if ($this->session->userdata('utilisateur') == NULL) {
            header('Location: ' . base_url());
        }
        $this->_utilisateur = unserialize($this->session->userdata('utilisateur'));
        $this->verifieCHamp();
        $val = $this->valeurTeacher();

        $this->_teachers = Teacher::create($val);

        header("Location:" . base_url() . "Teachers");
    }
    
    public function addGrade(){
        if ($this->session->userdata('utilisateur') == NULL) {
            header('Location: ' . base_url());
        }
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('grade', 'le titre du  grade', 'required|trim|min_length[3]', array(
            'required' => 'le %s est obligatoire',
            'min_length'=>'le %s doit avoir au moins 3 caraactères'
        ));
        $this->form_validation->run();
       $val = ["title"=>  $this->input->post("grade")];
       
       try{
           $grade = TeacherGrade::create($val);
           header("Location:".base_url()."Teachers/parametre");
       } catch (Illuminate\Database\QueryException $exc) {

       }
        
    }
    
    public function addLevel(){
        if ($this->session->userdata('utilisateur') == NULL) {
            header('Location: ' . base_url());
        }
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('level', 'le titre du  niveau', 'required|trim|min_length[3]', array(
            'required' => 'le %s est obligatoire',
            'min_length'=>'le %s doit avoir au moins 3 caraactères'
        ));
        $this->form_validation->run();
       $val = ["title"=>  $this->input->post("level")];
       var_dump($val);
       
       try{
           $level = TeachingLevel::create($val);
           header("Location:".base_url()."Teachers/parametre");
       } catch (Illuminate\Database\QueryException $exc) {
           echo 'erreur';
       }
        
    }

    private function valeurTeacher() {
        $adult = Adult::where('name', '=', $this->input->post('employe'))->get()[0];
        $employe = Employee::where('person_id', '=', $adult->id)->get()[0];
        $statu = 1;
        $valeurs = array(
            "employee_id" => $employe->id,
            "grade_id" => intval($this->input->post('grade')),
            "certified_teaching_level_id" => intval($this->input->post('niveau')),
            "status" => intval($statu)
        );
        //var_dump($valeurs);
        return $valeurs;
    }

    private function verifieCHamp() {
        //set error delimiter permet d'encadrer l'erreur
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('employe', 'Nom de l\'employe', 'required|trim', array(
            'required' => 'le %s est obligatoire'
        ));
        $this->form_validation->set_rules('grade', 'le grade de l\'enseignant', 'required|trim', array(
            'required' => 'le %s est obligatoire'
        ));
        $this->form_validation->set_rules('niveau', 'le niveau d\'enseingement', 'required|trim', array(
            'required' => 'le %s est obligatoire'
        ));
    }

}
