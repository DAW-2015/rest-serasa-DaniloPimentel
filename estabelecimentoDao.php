<?php

require 'connection.php';

class EstabelecimentoDAO
{

  public static function getEstabelecimentoByID($id) {
    $connection = Connection::getConnection();
    $sql = "SELECT * FROM serasa_estabelecimentos WHERE id='$id';";
    $result  = mysqli_query($connection, $sql);
    if(mysqli_num_rows($result) == 0){
        return "Estabelecimento not found" . $sql;
    }
    $estabelecimento = mysqli_fetch_object($result);

    //recupera cidade do estabelecimento
    $sql = "SELECT * FROM serasa_cidades WHERE id=$estabelecimento->cidades_id";
    $result = mysqli_query($connection, $sql);
    $estabelecimento->cidade =  mysqli_fetch_object($result);

    return $estabelecimento;
  }


  public static function getAll()
  {
    $connection = Connection::getConnection();
    $sql = "SELECT * FROM serasa_estabelecimentos";

    // recupera todos os estabelecimentos
    $result  = mysqli_query($connection, $sql);
    $estabelecimentos = array();
    while ($estabelecimento = mysqli_fetch_object($result)) {
      if ($estabelecimento != null) {
        $estabelecimentos[] = $estabelecimento;
      }
    }
    return $estabelecimentos;
  }


  public static function updateEstabelecimento($estabelecimento, $id) {
    $connection = Connection::getConnection();
    $sql = "UPDATE serasa_estabelecimentos SET nome='$estabelecimento->nome', cidades_id=$estabelecimento->cidades_id WHERE id=$id";
    $result  = mysqli_query($connection, $sql);

    $estabelecimentoAtualizado = EstabelecimentoDAO::getEstabelecimentoByID($estabelecimento->id);
    return $estabelecimentoAtualizado;
  }


  public static function deleteEstabelecimento($id) {
    $connection = Connection::getConnection();
    $sql = "DELETE FROM serasa_estabelecimentos WHERE id=$id";
    $result  = mysqli_query($connection, $sql);

    if ($result == false) {
      return false;
    } else {
      return true;
    }
  }


  public static function addEstabelecimento($estabelecimento) {
    $connection = Connection::getConnection();
    $sql = "INSERT INTO serasa_estabelecimentos (nome, cidades_id) VALUES ('$estabelecimento->nome', '$estabelecimento->cidades_id');";
    $result  = mysqli_query($connection, $sql);
    if(!$result){
        http_response_code(403);
        return "Não foi possível adicionar o estabelecimento :  " . $sql;
    }
    $novoEstabelecimento = EstabelecimentoDAO::getEstabelecimentoByID($estabelecimento->id);
    return $novoEstabelecimento;
  }
}
