<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
    public function Usuarios(){
        $this->load->model('UsuariosModel', 'um', true);
        $datos['Usuarios'] = $this->um->getAll();
        $this->load->view('header');
        $this->load->view('Usuarios/usuarios',$datos);
        $this->load->view('footer');
    }
}