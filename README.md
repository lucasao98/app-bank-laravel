# Projeto FullStack

## Passos para executar

Ao realizar o clone da aplicação, é necessário criar uma pasta chamada dbdata dentro da pasta .docker do projeto. Depois disso, deve-se criar dois diretórios dentro dele. Esse será o volume do container mysql.
Então basta executar o comando: 

```docker
docker-compose up -d
```

O docker foi configurado para executar no localhost na porta 8001. Dessa forma, ao criar o container, a aplicação estará disponível nesse ip e porta.

# Rodando Migrações
Para executar as migrações, basta listar os containers ativos com o comando:
```docker
docker ps
```

Em seguida procurar pelo container com nome
```text
desafio_fullstack_app
```

E então, entre execute o comando de migrate com o nome do container:
```docker
docker exec desafio_fullstack_app php artisan migrate
```

## Rotas
| rota                               | descrição                                                |
|------------------------------------|----------------------------------------------------------|
| <kbd>GET / </kbd>                  | Rota responsável pela tela de login                      |
| <kbd>POST /login </kbd>            | Responsável pela verificação de usuário, para prosseguir |
| <kbd>GET /logout </kbd>            | Responsável por limpar a sessão do usuário atual         |
| <kbd>GET /signup/ </kbd>           | Renderiza a tela de cadastro de novos usuário no sistema |
| <kbd>POST /signup/store </kbd>     | Realiza o cadastro do usuário no sistema caso todos os requisitos tenham sidos cumpridos |
| <kbd>GET /dashboard/ </kbd>        | Renderiza a tela de dashboard dos clientes com algumas informações                       |
| <kbd>GET /dashboard/bank_transfer </kbd>  | Renderiza a tela de transferências                                                |
| <kbd>GET /dashboard/bank_statement </kbd> | Renderiza a tela de extrato do usuário logado                                     |
| <kbd>GET /dashboard/bank_deposit </kbd>   | Renderiza a tela de depósito                                                      |
| <kbd>POST /operations/deposit </kbd>      | Responsável por fazer validações de depósito antes de efetuar a operação em si    |
| <kbd>POST /operations/transfer </kbd>     | Responsável por fazer validações de depósito antes de efetuar a operação em si    |
