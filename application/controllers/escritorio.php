<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Escritorio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('miscellaneous');
        $this->load->helper('security');
        validate_login($this->session->userdata('logged_in'));
        recalculate_uploaded_documents();
    }

    public function index() {
        $data['title'] = 'Universidad Manuela Beltran, Aplicativo de Cargue de Documentos.';
        $data['content'] = 'index';
        
            $data['template_config'] = array(
                'signin' => 0,
                'menu' => 1,
                'bootstrap-theme' => 0,
                'jquery' => 1,
                'validate' => 1,
                'bootstrapjs' => 1
            );        
        
        $this->load->view('template/template', $data);
    }

}
