<?php
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();
require 'clienteDAO.php';
require 'estabelecimentoDAO.php';

$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');

$app->get('/clientes/:cpf', function ($cpf) {
  //recupera o cliente
  $cliente = ClienteDAO::getClienteByCPF($cpf);
  echo json_encode($cliente);
});

$app->get('/clientes', function() {
  // recupera todos os clientes
  $clientes = ClienteDAO::getAll();
  echo json_encode($clientes);
});

$app->post('/clientes', function() {
  // recupera o request
  $request = \Slim\Slim::getInstance()->request();

  // insere o cliente
  $novoCliente = json_decode($request->getBody());
  $novoCliente = ClienteDAO::addCliente($novoCliente);

  echo json_encode($novoCliente);
});

$app->put('/clientes/:id', function ($id) {
  // recupera o request
  $request = \Slim\Slim::getInstance()->request();

  // atualiza o cliente
  $cliente = json_decode($request->getBody());
  $cliente = ClienteDAO::updateCliente($cliente, $id);

   echo json_encode($cliente);
});

$app->delete('/clientes/:id', function($id) {
  // exclui o cliente
  $isDeleted = ClienteDAO::deleteCliente($id);

  // verifica se houve problema na exclusão
  if ($isDeleted) {
    echo "{'message':'Cliente excluído'}";
  } else {
    echo "{'message':'Erro ao excluir cliente'}";
  }
});

$app->get('/estabelecimentos/:id', function ($id) {
  //recupera o estabelecimento
  $estabelecimento = EstabelecimentoDAO::getEstabelecimentoByID($id);
  echo json_encode($estabelecimento);
});

$app->get('/estabelecimentos', function() {
  // recupera todos os estabelecimentos
  $estabelecimentos = EstabelecimentoDAO::getAll();
  echo json_encode($estabelecimentos);
});

$app->post('/estabelecimentos', function() {
  // recupera o request
  $request = \Slim\Slim::getInstance()->request();

  // insere o estabelecimento
  $novoEstabelecimento = json_decode($request->getBody());
  $novoEstabelecimento = EstabelecimentoDAO::addEstabelecimento($novoEstabelecimento);

  echo json_encode($novoEstabelecimento);
});

$app->put('/estabelecimentos/:id', function ($id) {
  // recupera o request
  $request = \Slim\Slim::getInstance()->request();

  // atualiza o estabelecimento
  $estabelecimento = json_decode($request->getBody());
  $estabelecimento = EstabelecimentoDAO::updateEstabelecimento($estabelecimento, $id);

   echo json_encode($estabelecimento);
});

$app->delete('/estabelecimentos/:id', function($id) {
  // exclui o estabelecimento
  $isDeleted = EstabelecimentoDAO::deleteEstabelecimento($id);

  // verifica se houve problema na exclusão
  if ($isDeleted) {
    echo "{'message':'Estabelecimento excluído'}";
  } else {
    echo "{'message':'Erro ao excluir estabelecimento'}";
  }
});

$app->get('/cidades/:id', function ($id) {
  //recupera o cidade
  $cidade = CidadeDAO::getCidadeByID($id);
  echo json_encode($cidade);
});

$app->get('/cidades', function() {
  // recupera todos os cidades
  $cidades = CidadeDAO::getAll();
  echo json_encode($cidades);
});

$app->post('/cidades', function() {
  // recupera o request
  $request = \Slim\Slim::getInstance()->request();

  // insere o cidade
  $novaCidade = json_decode($request->getBody());
  $novaCidade = CidadeDAO::addCidade($novaCidade);

  echo json_encode($novaCidade);
});

$app->put('/cidades/:id', function ($id) {
  // recupera o request
  $request = \Slim\Slim::getInstance()->request();

  // atualiza o cidade
  $cidade = json_decode($request->getBody());
  $cidade = CidadeDAO::updateCidade($cidade, $id);

   echo json_encode($cidade);
});

$app->delete('/cidades/:id', function($id) {
  // exclui o cidade
  $isDeleted = CidadeDAO::deleteCidade($id);

  // verifica se houve problema na exclusão
  if ($isDeleted) {
    echo "{'message':'Cidade excluída'}";
  } else {
    echo "{'message':'Erro ao excluir cidade'}";
  }
});

$app->get('/estados/:id', function ($id) {
  //recupera o estado
  $estado = EstadoDAO::getEstadoByID($id);
  echo json_encode($estado);
});

$app->get('/estados', function() {
  // recupera todos os estados
  $estados = EstadoDAO::getAll();
  echo json_encode($estados);
});

$app->post('/estados', function() {
  // recupera o request
  $request = \Slim\Slim::getInstance()->request();

  // insere o estado
  $novoEstado = json_decode($request->getBody());
  $novoEstado = EstadoDAO::addEstado($novoEstado);

  echo json_encode($novoEstado);
});

$app->put('/estados/:id', function ($id) {
  // recupera o request
  $request = \Slim\Slim::getInstance()->request();

  // atualiza o estado
  $estado = json_decode($request->getBody());
  $estado = EstadoDAO::updateEstado($estado, $id);

   echo json_encode($estado);
});

$app->delete('/estados/:id', function($id) {
  // exclui o estado
  $isDeleted = EstadoDAO::deleteEstado($id);

  // verifica se houve problema na exclusão
  if ($isDeleted) {
    echo "{'message':'Estado excluído'}";
  } else {
    echo "{'message':'Erro ao excluir estado'}";
  }
});

$app->get('/dividas/:id', function ($id) {
  //recupera o divida
  $divida = EstadoDAO::getEstadoByID($id);
  echo json_encode($divida);
});

$app->get('/dividas', function() {
  // recupera todos os dividas
  $dividas = EstadoDAO::getAll();
  echo json_encode($dividas);
});

$app->post('/dividas', function() {
  // recupera o request
  $request = \Slim\Slim::getInstance()->request();

  // insere o divida
  $novaEstado = json_decode($request->getBody());
  $novaEstado = EstadoDAO::addEstado($novaEstado);

  echo json_encode($novaEstado);
});

$app->put('/dividas/:id', function ($id) {
  // recupera o request
  $request = \Slim\Slim::getInstance()->request();

  // atualiza o divida
  $divida = json_decode($request->getBody());
  $divida = EstadoDAO::updateEstado($divida, $id);

   echo json_encode($divida);
});

$app->delete('/dividas/:id', function($id) {
  // exclui o divida
  $isDeleted = EstadoDAO::deleteEstado($id);

  // verifica se houve problema na exclusão
  if ($isDeleted) {
    echo "{'message':'Estado excluído'}";
  } else {
    echo "{'message':'Erro ao excluir divida'}";
  }
});

$app->run();
