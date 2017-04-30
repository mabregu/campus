<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Alumnos extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('AlumnosModel', 'am', true);
    }

    public function Lista() {
        $datos['Alumnos'] = $this->am->getAll();
        $this->load->view('header');
        $this->load->view('Alumnos/listado', $datos);
        $this->load->view('footer');
    }

    public function verAlumno($id = null) {
        $data = array();
        if ($id) {
            $informe = $this->am->obtener_por_id($id);
            $data['id'] = $informe->id;
            $data['titulo'] = $informe->titulo;
            $data['descripcion'] = $informe->descripcion;
            $data['prioridad'] = $informe->prioridad;
        } else {
            $data['id'] = null;
            $data['titulo'] = null;
            $data['descripcion'] = null;
            $data['prioridad'] = null;
        }
        $this->load->view('header');
        $this->load->view('informes/guardar', $data);
        $this->load->view('footer');
    }

    public function guardarCambios($id = null) {
        if ($this->input->post()) {
            $dni = $this->input->post('dni');
            $nombre = $this->input->post('name');
            $apellido = $this->input->post('ape');
            $carrera = $this->input->post('carr');
            
            if(!is_numeric($id)){$this->validar($dni,$nombre,$apellido);}
            
            $this->am->guardarCambios($id, $dni, $nombre, $apellido, $id_usuario = 0, $carrera);
            $data['status'] = TRUE;
            echo json_encode($data);

        } else {
            $data['status'] = FALSE;
            echo json_encode($data);exit();
        }
    }
//validar que los datos del alta esten ok
    public function validar($dni,$nombre,$apellido) {
        if ($dni=='' || $nombre=='' || $apellido=='' || $apellido==null || $dni==null || $nombre==null) {
            $data['status'] = FALSE;
            echo json_encode($data);exit();
        } else {
            $data['persona'] = $this->am->getById($dni);
            if($data['persona']) {
				echo json_encode(array("status" => FALSE,"existe" => TRUE));exit();
				//echo json_encode($data);exit();
			}
        }
    }

    public function eliminar($id) {
        $this->am->eliminar($id);
        redirect('index.php/Alumnos/Lista');
    }

}

/*
 * Fin controlador Alumnos.php
 */
