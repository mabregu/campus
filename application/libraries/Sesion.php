<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Sesion {
	public function chkUsuario() {
		session_start();
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