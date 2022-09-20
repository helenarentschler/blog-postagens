<?php

class Core {

    public function start($urlGet) {

        $acao = 'index';

        if (isset($urlGet['pagina'])) {

            $controller = ucfirst($urlGet['pagina'].'Controller');  

        } else {

            $controller = 'HomeController';
            
        }

        if (!class_exists($controller)) {

            $controller = 'ErroController';

        }

        #urlGet['id'] vai ser o parametro da funçao index de cada controller

        if (isset($urlGet['id']) && $urlGet['id'] != null) {

            $id = $urlGet['id'];
        } else {
            $id = null;
        }
        
        call_user_func_array(array(new $controller, $acao), array('id' => $id));
    }

}