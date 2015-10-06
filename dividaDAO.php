<?php

require 'connection.php';

class DividaDAO
{

  public static function getDividaByClienteAndEstabelecimento($clientes_id, $estabelecimentos_id) {
    $connection = Connection::getConnection();
    $sql = "SELECT * FROM serasa_dividas WHERE clienteS_id='clientes_$id' && estabelecimentos_id='estabelecimentos_id';";
    $result  = mysqli_query($connection, $sql);
    if(mysqli_num_rows($result) == 0){
        return "Divida not found" . $sql;
    }
    $divida = mysqli_fetch_object($result);
    return $divida;
  }


  public static function getAll()
  {
    $connection = Connection::getConnection();
    $sql = "SELECT * FROM serasa_dividas";

    // recupera todos os dividas
    $result  = mysqli_query($connection, $sql);
    $dividas = array();
    while ($divida = mysqli_fetch_object($result)) {
      if ($divida != null) {
        $dividas[] = $divida;
      }
    }
    return $dividas;
  }


  public static function updateDivida($divida, $clientes_id, $estabelecimentos_id) {
    $connection = Connection::getConnection();
    $sql = "UPDATE serasa_dividas SET clienteS_id='clientes_$id' && estabelecimentos_id='estabelecimentos_id' WHERE clienteS_id='clientes_$id' && estabelecimentos_id='estabelecimentos_id';";
    $result  = mysqli_query($connection, $sql);

    $dividaAtualizado = DividaDAO::getDividaByID($divida->id);
    return $dividaAtualizado;
  }


  public static function deleteDivida($clientes_id, $estabelecimentos_id) {
    $connection = Connection::getConnection();
    $sql = "DELETE FROM serasa_dividas WHERE WHERE clienteS_id='clientes_$id' && estabelecimentos_id='estabelecimentos_id';";
    $result  = mysqli_query($connection, $sql);

    if ($result == false) {
      return false;
    } else {
      return true;
    }
  }


  public static function addDivida($divida) {
    $connection = Connection::getConnection();
    $sql = "INSERT INTO serasa_dividas (clienteS_id, estabelecimentos_id, valor) VALUES ('$divida->clienteS_id', '$divida->estabelecimentos_id', '$divida->valor');";
    $result  = mysqli_query($connection, $sql);
    if(!$result){
        http_response_code(403);
        return "Não foi possível adicionar o divida :  " . $sql;
    }
    $novoDivida = DividaDAO::getDividaByID($divida->id);
    return $novoDivida;
  }
}

?>