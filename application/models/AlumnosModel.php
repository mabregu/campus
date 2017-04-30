<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AlumnosModel extends CI_Model {
	
	private $tabla = 'persona';
	private $vista = 'vista_alumnos';

    public function __construct() {
        parent::__construct();
    }

    public function getAll() {
        $this->db->select('id, legajo, nombre, apellido, carrera');
        $rs = $this->db->get($this->vista);
        $alumnos = $rs->result();
        return $alumnos;
    }

    public function getById($id) {
        $this->db->select('id,dni,nombre,apellido,id_usuario');
        $this->db->where('dni', $id);
        $rs = $this->db->get($this->tabla);
        $resultado = $rs->row();
        return $resultado;
    }

    public function guardarCambios($id = null, $dni, $nombre, $apellido, $id_usuario, $carrera) {
        $data_editar = array(
            'nombre' => $nombre,
            'apellido' => $apellido,
        );

        if(is_numeric($id)) {
            $this->db->where('id', $id);
            $this->db->update('persona', $data_editar);
            //echo $this->db->last_query();die;
        } else {
            $data_insert = array(
                'id' => $id,
                'dni' => $dni,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'id_usuario' => $id_usuario
            );
            $this->db->insert('persona', $data_insert);
            //ultimo registro insertado
            $query = $this->db->query('SELECT MAX(id) id FROM persona');

            $row = $query->row();

            if (isset($row)) {
                $last_id = $row->id;
            }

            $alumno = array(
                //el numero de legajo es una combinación entre el id de la persona+id de la carrera
                'nro_legajo' => $last_id . '-' . $carrera,
                'id_persona' => $last_id,
                'id_carrera' => $carrera
            );

            $this->db->insert('alumnos', $alumno);
            //echo $this->db->last_query();die;
        }
    }

    public function eliminar($id) {
        $this->db->where('id', $id);
        $this->db->delete('persona');
        //echo $this->db->last_query();die;
    }
}
