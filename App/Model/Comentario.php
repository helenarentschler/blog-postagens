<?php

class Comentario {

    public static function selecionarComentarios($idPost) {
        $con = Connection::getConn();

        $query = "SELECT * FROM comentario WHERE id_postagem = :id";

        $query = $con->prepare($query);

        $query->bindValue(':id', $idPost, PDO::PARAM_INT);

        $query->execute();

        $resultado = array();

        while($row = $query->fetchObject('Comentario')) {
            $resultado[] = $row;
        }

        return $resultado;
    }
}