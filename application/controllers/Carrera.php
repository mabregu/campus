<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Carrera extends CI_Controller {

    public function Lista() {
        $this->load->model('CarreraModel', 'cm', true);
        $datos['Carrera'] = $this->cm->getCarreras();
        $this->load->view('header');
        $this->load->view('Carrera/listado', $datos);
        $this->load->view('footer');
    }
    
    public function ListarMaterias($id) {
        $this->load->model('CarreraModel', 'cm', true);
        $datos['Carrera'] = $this->cm->getMaterias($id);
        $this->load->view('header');
        $this->load->view('Carrera/listado', $datos);
        $this->load->view('footer');
    }
    
    public function ListarMateriasAnio($id, $año) {
        $this->load->model('CarreraModel', 'cm', true);
        $datos['Carrera'] = $this->cm->getMateriasAño($id, $año);
        $this->load->view('header');
        $this->load->view('Carrera/listado', $datos);
        $this->load->view('footer');
    }

}
