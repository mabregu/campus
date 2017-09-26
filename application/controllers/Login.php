<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        $this->load->view('Login/login');
    }

    public function Usuarios() {
        $user = $this->input->post('user_name');
        $pass = $this->input->post('password');
        $this->load->model('UsuariosModel', 'um', true);
        $datos['Usuarios'] = $this->um->login($user, $pass);
        $name = $datos['Usuarios'][0]['nombre'].' '.$datos['Usuarios'][0]['apellido'];
        $this->Sesion($user, $pass, $name);
        if ($datos['Usuarios']) {
            echo json_encode(array("status" => TRUE));
        }
    }
    
    public function LoginUsuario($id) {
        $this->load->model('UsuariosModel', 'um', true);
        $jsondata['data']['users'] = $this->um->buscar($id);
        $jsondata["data"]["message"] = sprintf("Se han encontrado %d usuarios", 1);

        if ($jsondata['data']['users']) {
            $jsondata['success'] = true;
            //echo $jsondata;
        } else {
            $jsondata['success'] = false;
            echo $jsondata;
        }
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsondata, JSON_FORCE_OBJECT);
    }

    public function Sesion($usuario, $password, $nombre) {
        session_start();
        $_SESSION["user_id"] = $usuario;
        $_SESSION["user_name"] = $password;
        $_SESSION["name"] = $nombre;
        $_SESSION["autenticado"] = "SI";
        $_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s");
    }

    public function CerrarSesion() {
        session_start();
        session_destroy();
        header("Location: ". base_url());
    }

    public function ChkUsuario() {
        if ($_SESSION["autenticado"] != "SI") {
            echo "No esta logueado";
            //si no existe, va a la página de autenticacion
            header("Location: ". base_url());
            //salimos de este script
            exit();
        } else {
            //valida pasado diez minutos, entonces cierra sesión
            $fechaGuardada = $_SESSION["ultimoAcceso"];
            $ahora = date("Y-n-j H:i:s");
            $tiempo_transcurrido = (strtotime($ahora) - strtotime($fechaGuardada));

            if ($tiempo_transcurrido >= 600) {
                session_destroy();
                header("Location: ". base_url());
            } else {
                $_SESSION["ultimoAcceso"] = $ahora;
            }
        }
    }

}
