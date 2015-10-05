<?php
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();
require 'clienteDAO.php';

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
  $estabelecimento = EstabelecimentoDAO::getEstabelecimentoById($id);
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
    echo "{'message':'Produto excluído'}";
  } else {
    echo "{'message':'Erro ao excluir produto'}";
  }
});

$app->run();
