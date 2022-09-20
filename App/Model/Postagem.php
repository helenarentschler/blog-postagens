<?php

class Postagem {

    public static function selecionarTodos() {

       $con = Connection::getConn();

       $query = "SELECT * FROM postagem ORDER BY id DESC";

       $query = $con->prepare($query);

       $query->execute();

       $resultado = array();

       #guarda objetos da classe postagem em $row
       while ($row = $query->fetchObject('Postagem')) {
            $resultado[] = $row;
       }

       if (!$resultado) {
            #interrompe execuçao do codigo
            throw new Exception('Nao foi encontrado nenhum registro no banco');
       }

       return $resultado;
    }

    public static function selecionaPorId($idPost) {
        
        $con = Connection::getConn();
        
        $query = "SELECT * FROM postagem WHERE id = :id";

        $query = $con->prepare($query);

        $query->bindValue(':id', $idPost, PDO::PARAM_INT);

        $query->execute();

        $resultado = $query->fetchObject('Postagem');

        if (!$resultado) {
          #interrompe execuçao do codigo
          throw new Exception('Nao foi encontrado nenhum registro no banco');

        } else {

          $resultado->comentarios = Comentario::selecionarComentarios($resultado->id);
        }

       return $resultado;
    }

}