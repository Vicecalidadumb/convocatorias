<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grupos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('miscellaneous');
        $this->load->helper('security');
        $this->load->model('grupos_model');
        //validate_login($this->session->userdata('logged_in'));
        //recalculate_uploaded_documents();
    }

    public function index() {
        $data['title'] = 'Grupos';
        $data['content'] = 'grupos/index';

        $data['asignaturas'] = $this->grupos_model->get_asignaturas();
        $data['grupos'] = $this->grupos_model->get_grupos();
        $data['horarios'] = $this->grupos_model->get_horarios();

        $this->load->view('template/template_informe', $data);
    }

}
