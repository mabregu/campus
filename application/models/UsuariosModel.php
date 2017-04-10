<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsuariosModel extends CI_Model {

    private $table = 'usuario';

    public function __construct() {
        parent::__construct();
    }

    public function getAll() {
        $rs = $this->db->get($this->table);
        $users = $rs->result_array();
        //echo $this->db->last_query();die;
        return $users;
    }
    
    public function buscar($id) {
        $this->db->where('id', $id);
        $rs = $this->db->get($this->table);
        $users = $rs->result_array();
//        echo $this->db->last_query();die;
        return $users;
    }
    
    public function login($nick,$pass) {
        $this->db->select('u.nombreUsuario,u.password,p.nombre nombre,p.apellido apellido');
        //$this->db->from($this->table);
        $this->db->from('usuario u');
        $this->db->join('persona p', 'u.id=p.id_usuario');
        $this->db->where('nombreUsuario', $nick);
        $this->db->where('password', $pass);
        $rs = $this->db->get();
        $users = $rs->result_array();
//        echo $this->db->last_query();die;
        return $users;
    }

}