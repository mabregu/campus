<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {
    public function index(){
        $this->load->view('header');
        $this->load->view('Chat/index');
        $this->load->view('footer');
    }
    
    public function process(){
        $this->load->view('Chat/process');
    }
}