<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ProfesoresModel extends CI_Model {

    private $table = 'persona';

    public function __construct() {
        parent::__construct();
    }

    public function getAll() {
        $this->db->select('p.id id, a.nro_legajo legajo,nombre, apellido, a.id_persona');
        $this->db->from('persona p');
        $this->db->join('profesores a', 'a.id_persona=p.id');
        $rs = $this->db->get();
        $profesores = $rs->result();
        /* echo $this->db->last_query();
          die; */
        return $profesores;
    }

    public function getById($id) {
        $this->db->select('*');
        $this->db->from('persona');
        $this->db->where('id', $id);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }

    public function guardarCambios($id = null, $dni, $nombre, $apellido, $id_usuario) {
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
                'nro_legajo' => $last_id . '-' . $data_insert['dni'],
                'id_persona' => $last_id
            );

            $this->db->insert('profesores', $alumno);
        }
    }

    public function eliminar($id) {
        $this->db->where('id', $id);
        $this->db->delete('persona');
    }

}
