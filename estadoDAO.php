<?php

require 'connection.php';

class EstadoDAO
{

  public static function getEstadoByID($id) {
    $connection = Connection::getConnection();
    $sql = "SELECT * FROM serasa_estados WHERE id='$id';";
    $result  = mysqli_query($connection, $sql);
    if(mysqli_num_rows($result) == 0){
        return "Estado not found" . $sql;
    }
    $estado = mysqli_fetch_object($result);
    return $estado;
  }


  public static function getAll()
  {
    $connection = Connection::getConnection();
    $sql = "SELECT * FROM serasa_estados";

    // recupera todos os estados
    $result  = mysqli_query($connection, $sql);
    $estados = array();
    while ($estado = mysqli_fetch_object($result)) {
      if ($estado != null) {
        $estados[] = $estado;
      }
    }
    return $estados;
  }


  public static function updateEstado($estado, $id) {
    $connection = Connection::getConnection();
    $sql = "UPDATE serasa_estados SET nome='$estado->nome' WHERE id=$id";
    $result  = mysqli_query($connection, $sql);

    $estadoAtualizado = EstadoDAO::getEstadoByID($estado->id);
    return $estadoAtualizado;
  }


  public static function deleteEstado($id) {
    $connection = Connection::getConnection();
    $sql = "DELETE FROM serasa_estados WHERE id=$id";
    $result  = mysqli_query($connection, $sql);

    if ($result == false) {
      return false;
    } else {
      return true;
    }
  }


  public static function addEstado($estado) {
    $connection = Connection::getConnection();
    $sql = "INSERT INTO serasa_estados (nome) VALUES ('$estado->nome');";
    $result  = mysqli_query($connection, $sql);
    if(!$result){
        http_response_code(403);
        return "Não foi possível adicionar o estado :  " . $sql;
    }
    $novoEstado = EstadoDAO::getEstadoByID($estado->id);
    return $novoEstado;
  }
}

?>