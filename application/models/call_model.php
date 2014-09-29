<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Call_model extends CI_Model {

    public function get_conv($conv) {
        $sql_string = "SELECT *
                      FROM 
                            {$this->db->dbprefix('convocatorias')} c,
                            {$this->db->dbprefix('configuracion')} co
                      WHERE
                      c.CONVOCATORIA_ID = co.CONVOCATORIA_ID
                      AND '".date("Y-m-d H:i:s")."' BETWEEN FECHA_INICIO_INS AND FECHA_FINAL_INS
                      AND c.CONVOCATORIA_ID = '$conv' LIMIT 1";
        $sql_query = $this->db->query($sql_string);
        return $sql_query->result();
    }

}