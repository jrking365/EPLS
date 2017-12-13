<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employes extends CI_Controller {

    private $_utilisateur;
    private $_employe;

    public function index() {
        //// vérifcation del'utilisateur
        if ($this->session->userdata('utilisateur') == NULL) {
            header('Location: ' . base_url());
        }

        //on charge toutes les regions.
        $data['regions'] = Region::all();
        $data['positions'] = Position::all();
        $this->_utilisateur = unserialize($this->session->userdata('utilisateur'));
        $this->load->view('page_header', array('utilisateur' => $this->_utilisateur));
        $this->load->view('employe/menu', $data);
        $this->load->view('employe/ajouter', $data);
       
        $this->load->view('page_footer');
        $this->load->view('employe/JsMenu');
         //for details 
        $this->load->view('employe/Details');
    }
    
    public function Details($id) {
        //// vérifcation del'utilisateur
        if ($this->session->userdata('utilisateur') == NULL) {
            header('Location: ' . base_url());
        }
        $emp = $this->informationsEmployee($id);
        
        echo json_encode($emp);
        
    }
    

    public function getVille() {
        $value = $this->input->post("value");
        //$value =1;
        try {
            $villes = City::where('region_id', '=', $value)->get();
            $option = "";
            foreach ($villes as $ville) {
                $option .="<option value='" . $ville->id . "'>" . $ville->name . "</option>";
            }
            echo $option;
        } catch (Illuminate\Database\QueryException $exc) {
            echo "<option>" . $exc->errorInfo[2] . "</option>";
        }
    }

    public function addEmploye() {
        //// vérifcation del'utilisateur
        if ($this->session->userdata('utilisateur') == NULL) {
            header('Location: ' . base_url());
        }
        $this->verifieChamp();
        $valA = $this->valeurAdult();

        $adult = Adult::create($valA);
        $valE = $this->valeurEmployee($adult->id);
        $emp = Employee::create($valE);
        // echo json_encode(array("status"=>TRUE));
        echo "<script> alert('enregistrement reussi');</script>";
        header("Location:" . base_url() . "Employes");
        //$this->index();
    }

    
    private function informationsEmployee($id){
        $employee = Employee::join('adult', 'employee.person_id', '=', 'adult.id')
                ->join('position', 'employee.position_id', '=', 'position.id')
                ->join('email','adult.email_id','=','email.id')
                ->join('emaildomain','email.domain_id','=','emaildomain.id')
                ->join('phone','adult.phone_id','=','phone.id')
                ->join('phoneareacode','phone.areablock_id','=','phoneareacode.id')
                ->join('address','adult.address_id','=','address.id')
                ->join('city','address.city_id','=','city.id')
                ->where('employee.id', '=', $id)
                ->select('employee.id as idE','employee.person_id as adult_id','employee.hiring_date',
                        'employee.status','employee.comment','position.title as position','adult.firstname',
                        'adult.name','adult.dob','adult.gender','email.localpart as email','emaildomain.domainname as domaine',
                        'phone.localtel','phoneareacode.areacode','address.civicnumber','address.street','address.postalcode','city.name as city')
                ->getQuery()
                ->get()[0];
        return $employee;
        
    }

    public function listGenerale() {
        //// vérifcation del'utilisateur
        if ($this->session->userdata('utilisateur') == NULL) {
            header('Location: ' . base_url());
        }

        $data['employees'] = Employee::join('adult', 'employee.person_id', '=', 'adult.id')
                ->join('position', 'employee.position_id', '=', 'position.id')
                ->where('employee.status', '!=', 0)
                ->select('employee.id as idE', 'adult.firstname', 'adult.name', 'adult.gender'
                        , 'employee.hiring_date', 'position.title as position', 'employee.status')
                ->getQuery()
                ->get();
        $employ = $data['employees'];




        //$this->load->view('page_header_css');
        $this->load->view('employe/listGenerale', $data);
        $this->load->view('page_footer_JS');
        $this->load->view('employe/JsMenu');
    }

    public function listByPosition($position) {
        //// vérifcation del'utilisateur
        if ($this->session->userdata('utilisateur') == NULL) {
            header('Location: ' . base_url());
        }
        $data["pos"] = Position::find($position);
         $data['employees'] = Employee::join('adult', 'employee.person_id', '=', 'adult.id')
                ->join('position', 'employee.position_id', '=', 'position.id')
                ->where('employee.status', '!=', 0)
                ->where('position.id','=',$position)
                ->select('employee.id as idE', 'adult.firstname', 'adult.name', 'adult.gender'
                        , 'employee.hiring_date', 'position.title as position', 'employee.status')
                ->getQuery()
                ->get();
        $employ = $data['employees'];




        //$this->load->view('page_header_css');
        $this->load->view('employe/listByPosition', $data);
        $this->load->view('page_footer_JS');
        $this->load->view('employe/JsMenu');
    }

    private function valeurAdult() {
        //doit recuperer les valeurs du formulaire
        $valeurs = array(
            'firstname' => $this->input->post('firstname'),
            'name' => $this->input->post('lastname'),
            'dob' => date("Y-m-d", strtotime($this->input->post('dob'))),
            'email_id' => $this->email(),
            'phone_id' => $this->phone(),
            'address_id' => $this->adresse(),
            'gender' => $this->input->post('gender'),
        );

        return $valeurs;
    }

    private function valeurEmployee($idA) {
        $position = $this->input->post('position');
        $password = $this->generate_password(8);
        var_dump($password);
        var_dump($position);
        $valeurs = array(
            "person_id" => $idA,
            "hiring_date" => date("Y-m-d", strtotime($this->input->post('hiring_date'))),
            "position_id" => $position,
            "status" => 1, //crée mais pas encore connecté et mDP
            "comment" => $this->input->post('comment'),
            "password" => $password//génere un mot de passe aléatoire de 8 caractères
        );

        return $valeurs;
    }

    private function adresse() {
        $city = City::where('id', '=', $this->input->post('city'))->get();
        //var_dump($this->input->post('city'));
        if ($city->isEmpty()) {
            echo '<script>la ville est vide ooooh</script>';
            //relancer sur la page d'accueil
        } else {
            $valeurs = array(
                'civicnumber' => $this->input->post('civicnumber'),
                'street' => $this->input->post('street'),
                'city_id' => $city[0]->id,
                'postalcode' => $this->input->post('postalcode')
            );
            //on crée l'adresse
            try {
                $add = Address::create($valeurs);
                return $add->id;
            } catch (Illuminate\Database\QueryException $exc) {
                //traitement sur l'erreur
            }
        }
    }

    private function phone() {
        $phone = $this->input->post('phone');
        $phone = explode(")", $phone);
        $area = str_replace("(", "", $phone[0]);
        $area = intval($area);
        $localtel = str_replace("-", "", $phone[1]);
        $localtel = intval($localtel);
        //on fait un select sur le phone area
        $phonearea = PhoneAreaCode::where('areacode', '=', $area)->get();

        if ($phonearea->isEmpty()) {
            echo "<script> alert('area code non determine')</script>";
            //redirige vers le formulaire
        } else {
            $phonearea = $phonearea[0];
            $valeurs = array(
                'areablock_id' => $phonearea->id,
                'localtel' => $localtel,
            );


            try {
                $telephone = Phone::create($valeurs);
                return $telephone->id;
            } catch (Illuminate\Database\QueryException $exc) {
                //on recupere lerreur et on traite
            }
        }
    }

    private function email() {
        $mail = $this->input->post('email');
        $mail = explode("@", $mail);
        $localpart = $mail[0];
        $domainName = $mail[1];

        $DN = EmailDomain::where('domainname', '=', $domainName)->get();
        if ($DN->isEmpty()) {
            try {
                $domaine = EmailDomain::create(array('domainname' => $domainName));
                $email = Email::create(array(
                            'localpart' => $localpart,
                            'domain_id' => $domaine->id
                ));
                return $email->id;
            } catch (Illuminate\Database\QueryException $exc) {
                //traitement de l'erreur ici
                echo "<script>alert('erreur lors de la sauvegarde');</script>";
            }
        } else {
            $DN = $DN[0];
            try {
                $newEmail = Email::create(array(
                            'localpart' => $localpart,
                            'domain_id' => $DN->id,
                ));

                return $newEmail->id;
            } catch (Exception $ex) {
                echo "<script>alert('erreur lors de la sauvegarde');</script>";
                //traitement de l'erreur ici
            }
        }
    }

    /**
     * verifie les champs entré dans le formulaire
     */
    private function verifieChamp() {
        //set error delimiter permet d'encadrer l'erreur
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('firstname', 'Prénom', 'required|min_length[3]|max_length[25]', array(
            'required' => 'le %s est obligatoire.'
        ));
        $this->form_validation->set_rules('lastname', 'Nom', 'required|min_length[3]|max_length[25]', array(
            'required' => 'le %s est obligatoire.'
        ));
        $this->form_validation->set_rules('dob', 'date de naissance', 'trim|required', array(
            'required' => 'la %s est obligatoire'
        ));
        $this->form_validation->set_rules('gender', 'sexe', 'trim|required|min_length[4]|max_length[8]', array(
            'required' => 'le %s est obligatoire',
            'min_length' => 'choisir un %s valide',
            'max_length' => 'choisir un %s valide',
        ));
        $this->form_validation->set_rules('email', 'l\'adresse email', 'trim|required', array(
            'required' => '%s est obligatoire'
        ));

        $this->form_validation->set_rules('city', 'ville', 'trim|required|min_length[4]', array(
            'required' => 'la %s est obligatoire'
        ));
        $this->form_validation->set_rules('street', 'Rue', 'trim|required', array(
            'required' => 'la %s est obligatoire'
        ));
        $this->form_validation->set_rules('civicnumber', 'Numéro civuque', 'required|numeric', array(
            'required' => 'le %s est obligatoire',
            'numeric' => 'le %s doit etre un nombre entier'
        ));
        $this->form_validation->set_rules('postalcode', 'Code Postal', 'required', array(
            'required' => 'le %s est obligatoire'
        ));
        $this->form_validation->set_rules('position', 'Poste', 'required', array(
            'required' => 'le %s est obligatoire'
        ));
        $this->form_validation->set_rules('hiring_date', 'date d\'embauche', 'trim|required', array(
            'required' => 'la %s est obligatoire'
        ));
        $this->form_validation->set_rules('comment', 'commentaire', 'trim|min_length[24]', array(
            'min_length' => 'le %s doit contenir au moins 24 caractères'
        ));
    }

    public function generate_password($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }
        return $str;
    }

}
