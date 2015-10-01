<?php

require 'connection.php';

class EstabelecimentoDao
{

  public static function getEstabelecimentoById($id) {
    $connection = Connection::getConnection();
    $sql = "SELECT * FROM serasa_estabelecimentos WHERE id=$id";
    $result  = mysqli_query($connection, $sql);
    if(mysqli_num_rows($result) == 0){
        return "Estabelecimento not found";
    }
    $estabelecimento = mysqli_fetch_object($result);

    //recupera cidade do cliente
    $sql = "SELECT * FROM serasa_cidades WHERE id=$estabelecimento->cidades_id";
    $result = mysqli_query($connection, $sql);
    $estabelecimento->cidade =  mysqli_fetch_object($result);

    return $estabelecimento;
  }


  public static function getAll()
  {
    $connection = Connection::getConnection();
    $sql = "SELECT * FROM serasa_estabelecimentos";

    // recupera todos os clientes
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

    $estabelecimentoAtualizado = EstabelecimentoDao::getEstabelecimentoById($estabelecimento->id);
    return $estabelecimentoAtualizado;
  }


  public static function deleteEstabelecimento($id) {
    $connection = Connection::getConnection();
    $sql = "DELETE FROM serasa_estabelecimentos WHERE id=$id";
    $result  = mysqli_query($connection, $sql);

    if ($result === FALSE) {
      return false;
    } else {
      return true;
    }
  }


  public static function addEstabelecimento($estabelecimento) {
    $connection = Connection::getConnection();
    $sql = "INSERT INTO serasa_estabelecimentos (id, nome, cidades_id) VALUES ($estabelecimento->id, '$estabelecimento->nome', $estabelecimento->cidades_id)";
    $result  = mysqli_query($connection, $sql);

    $novoEstabelecimento = EstabelecimentoDao::getEstabelecimentoById($estabelecimento->id);
    return $novoEstabelecimento;
  }
}
