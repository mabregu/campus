<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Alumnos extends CI_Controller {

    public function Lista() {
        $this->load->model('AlumnosModel', 'am', true);
        $datos['Alumnos'] = $this->am->getAll();
        $this->load->view('header');
        $this->load->view('Alumnos/listado', $datos);
        $this->load->view('footer');
    }

    public function verAlumno($id = null) {
        $data = array();
        $this->load->model('AlumnosModel');
        if ($id) {
            $informe = $this->AlumnosModel->obtener_por_id($id);
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
        $this->validar();
        if ($this->input->post()) {
            $dni = $this->input->post('dni');
            $nombre = $this->input->post('nom');
            $apellido = $this->input->post('ape');
            $carrera = $this->input->post('carr');
            
            $this->load->model('AlumnosModel');
            $this->AlumnosModel->guardarCambios($id, $dni, $nombre, $apellido, $id_usuario = 0, $carrera);
            $data['status'] = TRUE;
            echo json_encode($data);

        } else {
            $data['status'] = FALSE;
            echo json_encode($data);exit();
        }
    }

    public function validar() {
        $this->form_validation->set_message('required', '%s es obligatorio.');
        $this->form_validation->set_message('numeric', '%s debe ser numérico.');
        $this->form_validation->set_rules('dni', 'DNI', 'required');
        $this->form_validation->set_rules('nom', 'Nombre', 'required');
        $this->form_validation->set_rules('ape', 'Apellido', 'required');
        $this->form_validation->set_rules('carr', 'Carrera', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['status'] = FALSE;
            echo json_encode($data);exit();
        } else {
            $data['status'] = TRUE;
            echo json_encode($data);
        }
    }

    public function eliminar($id) {
        $this->load->model('AlumnosModel');
        $this->AlumnosModel->eliminar($id);
        redirect('index.php/Alumnos/Lista');
    }

}
