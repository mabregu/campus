<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Form extends CI_Controller {

    public function index() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        //$this->form_validation->set_message('required', '%s es obligatorio.');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]', array('required' => '%s es obligatorio.', 'min_length' => '%s debe ser mayor a 4 caracteres.','max_length' => '%s debe ser menor a 13 caracteres.'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]', array('required' => '%s es obligatorio.', 'min_length' => '%s debe ser mayor a 7 caracteres.'));
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]', array('required' => '%s es obligatorio.', 'matches' => '%s no coincide con la password.'));
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', array('required' => '%s es obligatorio.', 'valid_email' => '%s formato incorrecto.'));

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pruebas/myform');
        } else {
            $this->load->view('pruebas/formsuccess');
        }
    }

}
