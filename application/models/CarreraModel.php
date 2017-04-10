<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CarreraModel extends CI_Model {

    private $table = 'carrera';

    public function __construct() {
        parent::__construct();
    }

    public function getCarreras() {
        $rs = $this->db->get($this->table);
        $carrera = $rs->result_array();
        return $carrera;
    }

    public function getMaterias($carrera) {
        $this->db->select('c.descripcion, m.descrip_mat as materia, m.cuatrimestre, m.año, c.abreviatura');
        $this->db->from('materias m');
        $this->db->join('carrera c', 'c.id=m.id_carrera');
        $this->db->where('c.id', $carrera);
        $this->db->order_by('m.cuatrimestre', 'asc');
        //$this->db->where('m.año', $año);
        $rs = $this->db->get();
        $resultado = $rs->result_array();
//        echo $this->db->last_query();
//        die;
        return $resultado;
    }
    
    public function getMateriasAño($carrera, $año) {
        $this->db->select('c.descripcion, m.descrip_mat as materia, m.cuatrimestre, m.año');
        $this->db->from('materias m');
        $this->db->join('carrera c', 'c.id=m.id_carrera');
        $this->db->where('c.id', $carrera);
        $this->db->order_by('m.cuatrimestre', 'asc');
        $this->db->where('m.año', $año);
        $rs = $this->db->get();
        $resultado = $rs->result_array();
//        echo $this->db->last_query();
//        die;
        return $resultado;
    }

}
