<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AutoridadesModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAll() {
        $this->db->select('a.cargo,nombre, apellido');
        $this->db->from('persona p');
        $this->db->join('autoridades a', 'a.id_persona=p.id');
        $rs = $this->db->get();
        $alumnos = $rs->result_array();
        /* echo $this->db->last_query();
          die; */
        return $alumnos;
    }

}
