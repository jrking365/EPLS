<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {
   
    
   public function index (){
       
       //loading views
       $this->load->view('landing/page_header_landing');
       $this->load->view('landing/body');
        $this->load->view('landing/page_footer_landing');
   } 
}