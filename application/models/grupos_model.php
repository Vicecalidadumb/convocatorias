<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grupos_model extends CI_Model {

    public function get_asignaturas() {
        $this->db_local = $this->load->database('umb_local', TRUE);

        $sql_string = "SELECT * FROM `asignaturas`";
        $sql_query = $this->db_local->query($sql_string);
        return $sql_query->result();
    }

    public function get_grupos() {
        $this->db_desarrollo = $this->load->database('umb_desarrollo', TRUE);

        $sql_string = "SELECT * FROM seccionmaterias WHERE seccionmaterias.PerSecuencia='2015-151'";
        $sql_query = $this->db_desarrollo->query($sql_string);
        return $sql_query->result();
    }

    public function get_horarios() {
        $this->db_desarrollo = $this->load->database('umb_desarrollo', TRUE);
        $sql_string = "SELECT
                            horariowork.CarrCod,
                            horariowork.PerSecuencia,
                            horariowork.MatCod,
                            horariowork.SecMatSeccion,
                            horariowork.HoraBloque,
                            horariowork.HoraDia,
                            horariobloques.HoraBloque,
                            horariobloques.Nombre,
                            horariodias.HoraDia,
                            horariodias.Nombre
                            FROM
                            horariowork
                            INNER JOIN horariobloques ON horariowork.HoraBloque = horariobloques.HoraBloque
                            INNER JOIN horariodias ON horariowork.HoraDia = horariodias.HoraDia
                            WHERE
                            horariowork.PerSecuencia='2015-151'
                            GROUP BY 
                            horariowork.MatCod,horariowork.SecMatSeccion
                            ";
        $sql_query = $this->db_desarrollo->query($sql_string);
        return $sql_query->result();
    }

}
