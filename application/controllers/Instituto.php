<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Instituto extends CI_Controller {

    public function Index() {
        $this->load->view('header');
        $this->load->view('Instituto/bienvenido');
        $this->load->view('footer');
    }

    public function Charlas() {
        $this->load->view('header');
        $this->load->view('Instituto/charlas');
        $this->load->view('footer');
    }
    
    public function Convenios() {
        $this->load->view('header');
        $this->load->view('Instituto/convenios');
        $this->load->view('footer');
    }
    
    public function Calendario() {
        $this->load->view('header');
        $this->load->view('Instituto/calendario');
        $this->load->view('footer');
    }

}
