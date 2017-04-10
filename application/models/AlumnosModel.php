<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AlumnosModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAll() {
        $this->db->select('p.id id, a.nro_legajo legajo,p.nombre nombre, p.apellido apellido, c.descripcion carrera');
        $this->db->from('persona p');
        $this->db->join('alumnos a', 'a.id_persona=p.id');
        $this->db->join('carrera c', 'a.id_carrera=c.id');
        $rs = $this->db->get();
        $alumnos = $rs->result();
//        echo $this->db->last_query();
//        die;
        return $alumnos;
    }

    public function getById($id) {
        $this->db->select('*');
        $this->db->from('persona');
        $this->db->where('id', $id);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }

    public function guardarCambios($id = null, $dni, $nombre, $apellido, $id_usuario, $carrera) {
        $data_editar = array(
            'nombre' => $nombre,
            'apellido' => $apellido,
        );

        if ($id) {
            $this->db->where('id', $id);
            $this->db->update('persona', $data_editar);
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
                'nro_legajo' => $last_id . '-' . $carrera,
                'id_persona' => $last_id,
                'id_carrera' => $carrera
            );

            $this->db->insert('alumnos', $alumno);
        }
    }

    public function eliminar($id) {
        $this->db->where('id', $id);
        $this->db->delete('persona');
    }

}
