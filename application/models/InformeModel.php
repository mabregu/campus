<?php

class InformeModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function guardar($titulo, $descripcion, $prioridad, $id = null) {
        $data = array(
            'titulo' => $titulo,
            'descripcion' => $descripcion,
            'prioridad' => $prioridad
        );
        if ($id) {
            $this->db->where('id', $id);
            $this->db->update('informes', $data);
        } else {
            $this->db->insert('informes', $data);
        }
    }

    public function eliminar($id) {
        $this->db->where('id', $id);
        $this->db->delete('informes');
    }

    public function obtener_por_id($id) {
        $this->db->select('id, titulo, descripcion, prioridad');
        $this->db->from('informes');
        $this->db->where('id', $id);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }

    public function obtener_todos() {
        $this->db->select('id, titulo, descripcion, prioridad');
        $this->db->from('informes');
        $this->db->order_by('prioridad, titulo', 'asc');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

}
