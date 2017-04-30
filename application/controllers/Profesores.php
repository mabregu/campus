<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Profesores extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('ProfesoresModel', 'pm', true);
    }

    public function Lista() {
        $datos['Profesores'] = $this->pm->getAll();
        $this->load->view('header');
        $this->load->view('Profesores/listado', $datos);
        $this->load->view('footer');
    }
    
    public function guardarCambios($id = null) {
        if ($this->input->post()) {
            $dni = $this->input->post('dni');
            $nombre = $this->input->post('nom');
            $apellido = $this->input->post('ape');
            
            if(!is_numeric($id)){$this->validar($dni,$nombre,$apellido);}            
            
            $this->pm->guardarCambios($id, $dni, $nombre, $apellido, $id_usuario=0);
        } else {
            $this->Lista();
        }
    }
    
    public function validar($dni,$nombre,$apellido) {
        if ($dni=='' || $nombre=='' || $apellido=='' || $apellido==null || $dni==null || $nombre==null) {
            $data['status'] = FALSE;
            echo json_encode($data);exit();
        } else {
            $data['persona'] = $this->am->getById($dni);
            if($data['persona']) {
				echo json_encode(array("status" => FALSE,"existe" => TRUE));exit();
			}
        }
    }
    
    public function eliminar($id) {
        $this->pm->eliminar($id);
        redirect('index.php/Profesores/Lista');
    }

}
