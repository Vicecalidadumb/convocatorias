<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ensayo extends CI_Controller {

    private $module_sigla;

    public function __construct() {
        parent::__construct();
        //DEFINIMOS EL NOMBRE DEL MODULO
        //$this->module_sigla = 'USU';
        $this->load->model('user_model');
        $this->load->model('register_model');
        $this->load->model('call_model');
        $this->load->helper('miscellaneous');
        //$this->load->library('My_RECAPTCHA');
    }

    public function index() {

        if ($this->session->userdata('logged_in') == FALSE) {
            echo "error session";
            $this->session->set_flashdata(array('message' => '<strong>Error</strong> Debe Iniciar una Sesion.', 'message_type' => 'danger'));
            //redirect('ingreso/ensayo', 'refresh');
        } else {
            
        }



        /*
         * 

          $id_user = $this->session->userdata('USUARIO_ID');
          $id_convocatoria = $this->session->userdata('CONVOCATORIA_ID');

          if ($id_user != '') {
          $data['user'] = $this->register_model->get_user_inscription($id_user, $id_convocatoria);
          $data['ofertas'] = $this->register_model->get_user_offers($data['user'][0]->INSCRIPCION_PIN);
          //echo '<pre>'.print_r($user,true).'</pre>';
          if (count($data['user']) > 0) {
          $data['title'] = 'Certificado de Registro';
          $data['content'] = 'register/view_certified';

          $data['template_config'] = array(
          'signin' => 0,
          'menu' => 1,
          'bootstrap-theme' => 0,
          'jquery' => 1,
          'validate' => 1,
          'bootstrapjs' => 1
          );

          if ($view_pdf == 1) {
          $this->load->library('My_PDF');
          $data['content'] = 'register/view_certified_pdf';
          //$DATA = $this->load->view('register/style_pdf', '',true);
          $DATA = $this->load->view('register/view_certified_pdf', $data, true);
          $DATA = utf8_decode($DATA);
          //echo $DATA;
          $path_file = 'certificado_de_registro_' . $data['user'][0]->USUARIO_NUMERODOCUMENTO . '.pdf';

          $html2pdf = new HTML2PDF('V', 'LETTER', 'fr', true, 'UTF-8', 0);
          //$html2pdf->setModeDebug();
          $html2pdf->pdf->SetDisplayMode('fullpage');
          $html2pdf->setDefaultFont('Arial');
          $html2pdf->writeHTML($DATA);
          $html2pdf->Output($path_file);
          echo $html2pdf;
          } else {
          $this->load->view('template/template', $data);
          }
          } else {
          $this->session->set_flashdata(array('message' => 'Error al cargar el certificado de inscripcion.', 'message_type' => 'danger'));
          redirect('', 'refresh');
          }
          } else {
          $this->session->set_flashdata(array('message' => 'Error al cargar el certificado de inscripcion.', 'message_type' => 'danger'));
          redirect('', 'refresh');
          }
         */
    }

}
