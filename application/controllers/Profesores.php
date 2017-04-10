<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Profesores extends CI_Controller {

    public function Lista() {
        $this->load->model('ProfesoresModel', 'am', true);
        $datos['Profesores'] = $this->am->getAll();
        $this->load->view('header');
        $this->load->view('Profesores/listado', $datos);
        $this->load->view('footer');
    }
    
    public function guardarCambios($id = null) {
        if ($this->input->post()) {
            $dni = $this->input->post('dni');
            $nombre = $this->input->post('nom');
            $apellido = $this->input->post('ape');
            $this->load->model('ProfesoresModel');
            $this->ProfesoresModel->guardarCambios($id, $dni, $nombre, $apellido, $id_usuario=0);
        } else {
            $this->Lista();
        }
    }
    
    public function eliminar($id) {
        $this->load->model('ProfesoresModel');
        $this->ProfesoresModel->eliminar($id);
        redirect('index.php/Profesores/Lista');
    }

}
