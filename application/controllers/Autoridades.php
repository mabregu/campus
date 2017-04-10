<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Autoridades extends CI_Controller {

    public function Lista() {
        $this->load->model('AutoridadesModel', 'am', true);
        $datos['Autoridades'] = $this->am->getAll();
        $this->load->view('header');
        $this->load->view('Autoridades/listado', $datos);
        $this->load->view('footer');
    }

}
