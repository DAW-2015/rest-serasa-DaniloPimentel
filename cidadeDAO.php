<?php

require 'connection.php';

class CidadeDAO
{

  public static function getCidadeByID($id) {
    $connection = Connection::getConnection();
    $sql = "SELECT * FROM serasa_cidades WHERE id='$id';";
    $result  = mysqli_query($connection, $sql);
    if(mysqli_num_rows($result) == 0){
        return "Cidade not found" . $sql;
    }
    $cidade = mysqli_fetch_object($result);

    return $cidade;
  }


  public static function getAll()
  {
    $connection = Connection::getConnection();
    $sql = "SELECT * FROM serasa_cidades";

    // recupera todos os cidades
    $result  = mysqli_query($connection, $sql);
    $cidades = array();
    while ($cidade = mysqli_fetch_object($result)) {
      if ($cidade != null) {
        $cidades[] = $cidade;
      }
    }
    return $cidades;
  }


  public static function updateCidade($cidade, $id) {
    $connection = Connection::getConnection();
    $sql = "UPDATE serasa_cidades SET nome='$cidade->nome', estados_id=$cidade->estados_id WHERE id=$id";
    $result  = mysqli_query($connection, $sql);

    $cidadeAtualizado = CidadeDAO::getCidadeByID($cidade->id);
    return $cidadeAtualizado;
  }


  public static function deleteCidade($id) {
    $connection = Connection::getConnection();
    $sql = "DELETE FROM serasa_cidades WHERE id=$id";
    $result  = mysqli_query($connection, $sql);

    if ($result == false) {
      return false;
    } else {
      return true;
    }
  }


  public static function addCidade($cidade) {
    $connection = Connection::getConnection();
    $sql = "INSERT INTO serasa_cidades (nome, estados_id) VALUES ('$cidade->nome', '$cidade->estados_id');";
    $result  = mysqli_query($connection, $sql);
    if(!$result){
        http_response_code(403);
        return "Não foi possível adicionar o cidade :  " . $sql;
    }
    $novoCidade = CidadeDAO::getCidadeByID($cidade->id);
    return $novoCidade;
  }
}