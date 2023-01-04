<?php

include_once SMARTY_BASEFILE;

class Plantilla extends Smarty {

   function Plantilla() {

        $this->template_dir = APP_BASEDIR .'/plantillas/templates/';
        $this->compile_dir  = APP_BASEDIR .'/plantillas/templates_c/';
        $this->config_dir   = APP_BASEDIR .'/plantillas/configs/';
        $this->cache_dir    = APP_BASEDIR .'/plantillas/cache/';

        // ASIGNACION DE VARIABLES DEL PROYECTO
        //$this->assign('TITLE','PROYECTO MODELO');
   }  
    
}


        //
        //$this->caching = false; // El cache debe ser por plantilla
        //$this->compile_check = false; // Maximal performance
        //$this->force_compile = false; // Este parametro sobrescribe el compile_check

?>