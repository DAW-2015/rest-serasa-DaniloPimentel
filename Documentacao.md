# Documentação Serasa REST
## Clientes
##### GET /clientes/:cpf
##### Parâmetros:
1. CPF
##### Retorno
Retorna um objeto com as informações do cliente, como nome, cpf e sua cidade.

##### GET /clientes
##### Parâmetros:
- Nenhum
##### Retorno
Retorna um array de objetos com as informações dos cliente cadastrados, como nome, cpf e sua cidade.

##### POST /clientes
##### Parâmetros:
1. Objeto JSON contendo as informações do cliente a ser cadastrado
##### Retorno
- Successo: Retorna um objeto com as informações cadastradas
- Erro: Retorna uma mensagem de erro

##### PUT /clientes/:id
##### Parâmetros:
1. O ID do cliente a ser atualizado
2. Objeto JSON contendo as informações do cliente a ser cadastrado
##### Retorno
- Successo: Retorna um objeto com as informações atualizadas
- Erro: Retorna uma mensagem de erro

##### DELETE /clientes/:id
##### Parâmetros:
1. O ID do cliente a ser atualizado
2. Objeto JSON contendo as informações do cliente a ser cadastrado
##### Retorno
Retorna um objeto contendo uma mensagem de erro ou sucesso

## Estabelecimentos
##### GET /estabelecimentos/:id
##### Parâmetros:
1. ID
##### Retorno
Retorna um objeto com as informações do estabelecimento, como nome, id e sua cidade.

##### GET /estabelecimentos
##### Parâmetros:
- Nenhum
##### Retorno
Retorna um array de objetos com as informações dos estabelecimento cadastrados, como nome, id e sua cidade.

##### POST /estabelecimentos
##### Parâmetros:
1. Objeto JSON contendo as informações do estabelecimento a ser cadastrado
##### Retorno
- Successo: Retorna um objeto com as informações cadastradas
- Erro: Retorna uma mensagem de erro

##### PUT /estabelecimentos/:id
##### Parâmetros:
1. O ID do estabelecimento a ser atualizado
2. Objeto JSON contendo as informações do estabelecimento a ser cadastrado
##### Retorno
- Successo: Retorna um objeto com as informações atualizadas
- Erro: Retorna uma mensagem de erro

##### DELETE /estabelecimentos/:id
##### Parâmetros:
1. O ID do estabelecimento a ser atualizado
2. Objeto JSON contendo as informações do estabelecimento a ser cadastrado
##### Retorno
Retorna um objeto contendo uma mensagem de erro ou sucesso

## Cidades
##### GET /cidades/:id
##### Parâmetros:
1. ID
##### Retorno
Retorna um objeto com as informações do cidade, como nome, id e seu estado.

##### GET /cidades
##### Parâmetros:
- Nenhum
##### Retorno
Retorna um array de objetos com as informações dos cidade cadastrados, como nome, id e seu estado.

##### POST /cidades
##### Parâmetros:
1. Objeto JSON contendo as informações da cidade a ser cadastrado
##### Retorno
- Successo: Retorna um objeto com as informações cadastradas
- Erro: Retorna uma mensagem de erro

##### PUT /cidades/:id
##### Parâmetros:
1. O ID da cidade a ser atualizado
2. Objeto JSON contendo as informações da cidade a ser cadastrado
##### Retorno
- Successo: Retorna um objeto com as informações atualizadas
- Erro: Retorna uma mensagem de erro

##### DELETE /cidades/:id
##### Parâmetros:
1. O ID do cidade a ser atualizado
2. Objeto JSON contendo as informações do cidade a ser cadastrado
##### Retorno
Retorna um objeto contendo uma mensagem de erro ou sucesso

## Estados
##### GET /estados/:cpf
##### Parâmetros:
1. CPF
##### Retorno
Retorna um objeto com as informações do estado, como nome.

##### GET /estados
##### Parâmetros:
- Nenhum
##### Retorno
Retorna um array de objetos com as informações dos estado cadastrados, como nome.

##### POST /estados
##### Parâmetros:
1. Objeto JSON contendo as informações do estado a ser cadastrado
##### Retorno
- Successo: Retorna um objeto com as informações cadastradas
- Erro: Retorna uma mensagem de erro

##### PUT /estados/:id
##### Parâmetros:
1. O ID do estado a ser atualizado
2. Objeto JSON contendo as informações do estado a ser cadastrado
##### Retorno
- Successo: Retorna um objeto com as informações atualizadas
- Erro: Retorna uma mensagem de erro

##### DELETE /estados/:id
##### Parâmetros:
1. O ID do estado a ser atualizado
2. Objeto JSON contendo as informações do estado a ser cadastrado
##### Retorno
Retorna um objeto contendo uma mensagem de erro ou sucesso

## Dividas
##### GET /dividas/:id
##### Parâmetros:
1. ID
##### Retorno
Retorna um objeto com as informações da divida, como o cliente, o estabelecimento, e o valor.

##### GET /dividas
##### Parâmetros:
- Nenhum
##### Retorno
Retorna um array de objetos com as informações das divida cadastradass, como o cliente, o estabelecimento, e o valor.

##### POST /dividas
##### Parâmetros:
1. Objeto JSON contendo as informações da divida a ser cadastradas
##### Retorno
- Successo: Retorna um objeto com as informações cadastradas
- Erro: Retorna uma mensagem de erro

##### PUT /dividas/:id
##### Parâmetros:
1. O ID da divida a ser atualizado
2. Objeto JSON contendo as informações da divida a ser cadastradas
##### Retorno
- Successo: Retorna um objeto com as informações atualizadas
- Erro: Retorna uma mensagem de erro

##### DELETE /dividas/:id
##### Parâmetros:
1. O ID da divida a ser atualizado
2. Objeto JSON contendo as informações da divida a ser cadastradas
##### Retorno
Retorna um objeto contendo uma mensagem de erro ou sucesso